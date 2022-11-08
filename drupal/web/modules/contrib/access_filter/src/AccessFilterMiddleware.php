<?php

namespace Drupal\access_filter;

use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Site\Settings;
use Drupal\access_filter\Entity\Filter;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * Provides a HTTP middleware to implement access filtering.
 */
class AccessFilterMiddleware implements HttpKernelInterface {

  /**
   * The decorated kernel.
   *
   * @var \Symfony\Component\HttpKernel\HttpKernelInterface
   */
  protected $httpKernel;

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * Constructs a new AccessFilterMiddleware object.
   *
   * @param \Symfony\Component\HttpKernel\HttpKernelInterface $http_kernel
   *   The decorated kernel.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   */
  public function __construct(HttpKernelInterface $http_kernel, ModuleHandlerInterface $module_handler) {
    $this->httpKernel = $http_kernel;
    $this->moduleHandler = $module_handler;
  }

  /**
   * {@inheritdoc}
   */
  public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = TRUE) {
    if (!Settings::get('access_filter_disabled')) {
      $this->moduleHandler->loadAll();
      $filters = Filter::loadMultiple();
      foreach ($filters as $filter) {
        if ($filter->status()) {
          $filter->parse();
          if (!$filter->isAllowed($request)) {
            $code = $filter->get('parsedResponse')['code'];
            if (in_array($code, [301, 302])) {
              return new RedirectResponse($filter->get('parsedResponse')['redirect_url'], $code);
            }
            else {
              return new Response($filter->get('parsedResponse')['body'], $code);
            }
          }
        }
      }
    }

    return $this->httpKernel->handle($request, $type, $catch);
  }

}
