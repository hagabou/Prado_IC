<?php

namespace Drupal\ccos;

use Drupal\Core\Cache\CacheTagsInvalidatorInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Drupal\Core\Url;

/**
 * Class ClearCacheService.
 */
class ClearCacheService implements ClearCacheInterface {

  /**
   * Drupal\Core\Cache\CacheTagsInvalidatorInterface definition.
   *
   * @var \Drupal\Core\Cache\CacheTagsInvalidatorInterface
   */
  protected $cacheTagsInvalidator;

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Symfony\Component\HttpFoundation\RequestStack definition.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * Constructs a new ClearCacheService object.
   */
  public function __construct(CacheTagsInvalidatorInterface $cache_tags_invalidator, EntityTypeManagerInterface $entity_type_manager, RequestStack $request_stack) {
    $this->cacheTagsInvalidator = $cache_tags_invalidator;
    $this->entityTypeManager = $entity_type_manager;
    $this->requestStack = $request_stack;
  }

  /**
   * Provide the lists of entity_type_id's.
   *
   * @return array
   *   An index array.
   */
  public function getEntityTypeLists() {
    $lists = [];
    foreach ($this->entityTypeManager->getDefinitions() as $value) {
      $lists[$value->id()] = $value->getLabel();
    }

    return $lists;
  }

  /**
   * Check if valid entity_type_id.
   *
   * @param string $entity_type_id
   *   String of entity_type_id.
   *
   * @return bool
   *   Return TRUE or FALSE.
   */
  public function checkEntityTypeId(string $entity_type_id) {
    return array_key_exists($entity_type_id, $this->getEntityTypeLists()) ? TRUE : FALSE;
  }

  /**
   * Check if valid entity_type_id bundle.
   *
   * @param string $entity_type_id
   *   String of entity_type_id.
   * @param string $id
   *   String of entity_type_id bundle.
   *
   * @return bool
   *   Return TRUE or FALSE.
   */
  public function checkEntityTypeIdBundle(string $entity_type_id, string $id) {
    return !empty($this->entityTypeManager->getStorage($entity_type_id)->load($id)) ? TRUE : FALSE;
  }

  /**
   * This sends the lists of cache tags.
   *
   * @param string $entity_type_id
   *   String of entity_type_id.
   * @param string $id
   *   String of entity_type_id bundle.
   * @param mixed $invalidated_tags
   *   TRUE or FALSE to get invalidate tag.
   *
   * @return array
   *   An array of cache tags or FALSE, if entity_type_id mismatch.
   */
  public function loadEntityTypeIdGetTags(string $entity_type_id, string $id, $invalidated_tags = TRUE) {
    $all = [];
    $load = $this->entityTypeManager->getStorage($entity_type_id)->load($id);
    $all['label'] = $load->label();
    // Returns the cache tags that should be used to invalidate caches.
    // This will not return additional cache tags added through addCacheTags().
    if ($invalidated_tags == TRUE) {
      $all['tags'] = $load->getCacheTagsToInvalidate();
    }
    else {
      // The cache tags associated with this object.
      // When this object is modified, these cache tags will be invalidated.
      $all['tags'] = $load->getCacheTags();
    }

    return $all;
  }

  /**
   * Clear and re-generate the cache.
   *
   * @param array $tags
   *   Array of tags to invalidate.
   */
  public function invalidateCacheTags(array $tags) {
    return $this->cacheTagsInvalidator->invalidateTags($tags);
  }

  /**
   * Create url to use for cache clear.
   *
   * @param string $entity_type_id
   *   String of entity_type_id.
   * @param string $id
   *   String of entity_type_id bundle.
   *
   * @return url
   *   An associative array of url.
   */
  public function createUrl(string $entity_type_id, string $id) {
    $parameters = ['entity_type_id' => $entity_type_id, 'id' => $id];
    $options = ['query' => ['destination' => $this->requestStack->getCurrentRequest()->getRequestUri()]];
    return Url::fromRoute('ccos.single', $parameters, $options);
  }

  /**
   * Provide current request uri in the destination query param.
   *
   * @return string
   *   String of uri.
   */
  public function getDestinationUri() {
    // Set default $destination variable to return back.
    // Also check destination param in url to set $destination variable finally.
    $destination = '/';
    if ($this->requestStack->getCurrentRequest()->query->has('destination')) {
      $destination = $this->requestStack->getCurrentRequest()->query->get('destination');
    }
    return $destination;
  }

}
