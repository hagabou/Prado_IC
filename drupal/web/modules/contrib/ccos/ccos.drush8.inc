<?php

/**
 * @file
 * Contains the code to generate the custom drush commands.
 */

/**
 * Implements hook_drush_command().
 */
function ccos_drush_command() {
  $commands = [];

  $commands['entity-type-lists'] = [
    'description' => 'This shows all the available entity type in the system.',
    'aliases' => ['ccos:etl'],
    'core' => ['8+'],
    'example' => [
      'drush ccos:etl' => 'List down all the entity type in the system.',
    ],
  ];

  $commands['clear-cache-of-sole'] = [
    'description' => 'This will clear cache of the sole/specified entity type id&#39;s.',
    'aliases' => ['ccos'],
    'core' => ['8+'],
    'arguments' => [
      'entity_type_id' => 'The machine name of the entity type.',
      'id' => 'Machine name(or id) of the blocks, node, user etc. created inside(or under) the entity type.',
    ],
    'example' => [
      'drush ccos node 20' => 'This will clear cache of the provided &#39;node 20&#39;.',
    ],
    'required-arguments' => 2,
  ];

  return $commands;
}

/**
 * Command callback. List available entity type.
 */
function drush_ccos_entity_type_lists() {
  $rows[] = [dt("\033[1mMachine name\033[0m"), dt("\033[1mLabel\033[0m")];
  $all = \Drupal::service('ccos.clear_cache')->getEntityTypeLists();
  foreach ($all as $key => $value) {
    $rows[] = [$key, $value];
  }
  drush_print_table($rows, TRUE);
}

/**
 * Command callback. Clear cache of the details.
 */
function drush_ccos_clear_cache_of_sole(string $entity_type_id, string $id) {

  // Set $ccos filled with all the instructions of 'ccos.clear_cache' service.
  // Set default $replace array with keys and values.
  $ccos = \Drupal::service('ccos.clear_cache');
  $replace = ['@type' => $entity_type_id, '@name' => $id];

  // Check if entity type exists or not, if not return.
  if ($ccos->checkEntityTypeId($entity_type_id) == FALSE) {
    return drush_set_error(dt("\033[1m@type\033[0m is unknown entity type.", $replace));
  }

  // Get lists of all the entity type in the system.
  // Replace @type key in $replace array with the label found.
  $lists = $ccos->getEntityTypeLists();
  $replace['@type'] = $lists[$entity_type_id] . ' (' . $entity_type_id . ')';

  // Check entered id belongs to the given entity type or not, if not return.
  if ($ccos->checkEntityTypeIdBundle($entity_type_id, $id) == FALSE) {
    return drush_set_error(dt("\033[1m@name\033[0m does not belong to \033[1m@type\033[0m entity type.", $replace));
  }

  // Get label and tags inside $all array.
  // Check if $all['tags'] is empty or not, if empty return.
  $all = $ccos->loadEntityTypeIdGetTags($entity_type_id, $id, TRUE);
  $replace['@name'] = $all['label'] . ' (' . $id . ')';
  if (empty($all['tags'])) {
    return drush_set_error(dt("Something went wrong while clearing cache of \033[1m@type: @name\033[0m.", $replace));
  }

  // Invalidate cache tags.
  $ccos->invalidateCacheTags($all['tags']);
  return drush_log(dt("\033[1m@type: @name\033[0m cache cleared.", $replace), 'ok');
}
