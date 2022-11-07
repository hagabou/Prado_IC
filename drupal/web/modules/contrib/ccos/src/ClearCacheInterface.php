<?php

namespace Drupal\ccos;

/**
 * Interface ClearCacheInterface.
 */
interface ClearCacheInterface {

  /**
   * Provide the lists of entity_type_id's.
   */
  public function getEntityTypeLists();

  /**
   * Check if valid entity_type_id.
   *
   * @param string $entity_type_id
   *   String of entity_type_id.
   */
  public function checkEntityTypeId(string $entity_type_id);

  /**
   * Check if valid entity_type_id bundle.
   *
   * @param string $entity_type_id
   *   String of entity_type_id.
   * @param string $id
   *   String of entity_type_id bundle.
   */
  public function checkEntityTypeIdBundle(string $entity_type_id, string $id);

  /**
   * This sends the lists of cache tags.
   *
   * @param string $entity_type_id
   *   String of entity_type_id.
   * @param string $id
   *   String of entity_type_id bundle.
   * @param mixed $invalidated_tags
   *   TRUE or FALSE to get invalidate tag.
   */
  public function loadEntityTypeIdGetTags(string $entity_type_id, string $id, $invalidated_tags = TRUE);

  /**
   * Clear and re-generate the cache.
   *
   * @param array $tags
   *   Array of tags to invalidate.
   */
  public function invalidateCacheTags(array $tags);

  /**
   * Create url to use for cache clear.
   *
   * @param string $entity_type_id
   *   String of entity_type_id.
   * @param string $id
   *   String of entity_type_id bundle.
   */
  public function createUrl(string $entity_type_id, string $id);

  /**
   * Provide current request uri.
   */
  public function getDestinationUri();

}
