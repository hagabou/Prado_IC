<?php

namespace Drupal\ccos\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\ccos\ClearCacheInterface;
use Drupal\Core\Routing\LocalRedirectResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ClearCacheController.
 */
class ClearCacheController extends ControllerBase {

  /**
   * Drupal\ccos\ClearCacheInterface definition.
   *
   * @var \Drupal\ccos\ClearCacheInterface
   */
  protected $ccosClearCache;

  /**
   * Create a new ClearCacheService object.
   */
  public function __construct(ClearCacheInterface $ccosClearCache) {
    $this->ccosClearCache = $ccosClearCache;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('ccos.clear_cache')
    );
  }

  /**
   * Clear cache of single entity type.
   *
   * @param string $entity_type_id
   *   Available enity type.
   * @param string $id
   *   Bundle id of entity type.
   *
   * @return \Drupal\Core\Routing\LocalRedirectResponse
   *   Return to same url.
   */
  public function clearCacheSingle(string $entity_type_id, string $id) {

    // Set default $destination variable to return back from ccos service.
    // Set default $replace array.
    $destination = $this->ccosClearCache->getDestinationUri();
    $replace = ['@name' => $id, '@type' => $entity_type_id];

    // Check entity type exists or not, if not then return back.
    if ($this->ccosClearCache->checkEntityTypeId($entity_type_id) === FALSE) {
      $this->messenger()->addError($this->t('<b>@type</b> is unknown entity type.', $replace));
      return new LocalRedirectResponse($destination);
    }

    // Replace value of @type key in $replace array with entity type label.
    $lists = $this->ccosClearCache->getEntityTypeLists();
    $replace['@type'] = $lists[$entity_type_id] . ' (' . $entity_type_id . ')';

    // Check whether entered id belongs to the given entity type or not.
    // If not then return back.
    if ($this->ccosClearCache->checkEntityTypeIdBundle($entity_type_id, $id) === FALSE) {
      $this->messenger()->addError($this->t('<b>@name</b> does not belong to <b>@type</b> entity type.', $replace));
      return new LocalRedirectResponse($destination);
    }

    // Get tags and label in $all array.
    // Check if $all['tags'] is empty or not, if empty then return back.
    // Replace value of @name key in $replace variable with $id label found.
    $all = $this->ccosClearCache->loadEntityTypeIdGetTags($entity_type_id, $id, TRUE);
    $replace['@name'] = $all['label'] . ' (' . $id . ')';
    if (empty($all['tags'])) {
      $this->messenger()->addError($this->t('Something went wrong while clearing cache of <b>@type</b>: <b>@name</b>.', $replace));
      return new LocalRedirectResponse($destination);
    }

    // Invalidate(Drupal says to invalidate rather than delete) all tags.
    // Return back to $destination url.
    $this->ccosClearCache->invalidateCacheTags($all['tags']);
    $this->messenger()->addStatus($this->t('<b>@type</b>: <b>@name</b> cache cleared.', $replace));
    return new LocalRedirectResponse($destination);
  }

}
