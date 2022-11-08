<?php

namespace Drupal\ccos\Commands;

use Drush\Commands\DrushCommands;
use Drupal\ccos\ClearCacheInterface;
use Consolidation\OutputFormatters\StructuredData\RowsOfFields;

/**
 * A Drush9 command file.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 */
class ClearCacheDrush9Commands extends DrushCommands {

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
   * Print list of available entity type.
   *
   * @command entity-type-lists
   * @aliases ccos:etl
   * @field-labels
   *   machine_name: Machine Name
   *   label: Label
   * @usage drush ccos:etl
   *   List down all the entity type in the system.
   *
   * @return \Consolidation\OutputFormatters\StructuredData\RowsOfFields
   *   An associative array in tabular form.
   */
  public function entityTypeLists() {
    $rows = [];
    $all = $this->ccosClearCache->getEntityTypeLists();
    foreach ($all as $key => $value) {
      $rows[] = [
        'machine_name' => $key,
        'label' => $value,
      ];
    }
    return new RowsOfFields($rows);
  }

  /**
   * Clear cache of entity type and id provided.
   *
   * @command clear-cache-of-sole
   * @aliases ccos
   * @param string $entity_type_id
   *   The machine name of the entity type.
   * @param string $id
   *   Machine name(or id) of the blocks, node, user etc.
   *
   * @usage drush ccos node 20
   *   This will clear cache of the provided &#39;node 20&#39;.
   *
   * @return string
   *   Strings of success & errors messages.
   */
  public function clearCacheOfSole(string $entity_type_id, string $id) {

    // Set $ccos filled with all the instructions of 'ccos.clear_cache' service.
    // Set default $replace array with keys and values.
    $ccos = $this->ccosClearCache;
    $replace = ['@type' => $entity_type_id, '@name' => $id];

    // Check if entity type exists or not, if not return.
    if ($ccos->checkEntityTypeId($entity_type_id) == FALSE) {
      throw new \Exception(dt("{@type} is unknown entity type.", $replace));
    }

    // Get lists of all the entity type in the system.
    // Replace @type key in $replace array with the label found.
    $lists = $ccos->getEntityTypeLists();
    $replace['@type'] = $lists[$entity_type_id] . ' (' . $entity_type_id . ')';

    // Check entered id belongs to the given entity type or not, if not return.
    if ($ccos->checkEntityTypeIdBundle($entity_type_id, $id) == FALSE) {
      throw new \Exception(dt("{@name} does not belong to {@type} entity type.", $replace));
    }

    // Get label and tags inside $all array.
    // Check if $all['tags'] is empty or not, if empty return.
    $all = $ccos->loadEntityTypeIdGetTags($entity_type_id, $id, TRUE);
    $replace['@name'] = $all['label'] . ' (' . $id . ')';
    if (empty($all['tags'])) {
      throw new \Exception(dt("Something went wrong while clearing cache of @type: @name.", $replace));
    }

    // Invalidate cache tags.
    $ccos->invalidateCacheTags($all['tags']);
    return $this->output()->writeln(dt("<bg=green;fg=white>[success]</> @type: @name cache cleared.", $replace));
  }

}
