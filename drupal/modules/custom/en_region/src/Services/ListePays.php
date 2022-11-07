<?php

namespace Drupal\en_region\Services;
use Drupal\Core\Database\Database;

/**
 * Récupérer la liste des pays ACTIFS (@TODO : en fonction des node types ??)
 *
 * @author alasserre
 */
class ListePays {

  private $pays_options;

  public function __construct() {
    $connection = Database::getConnection();
    $data = $connection->select('node__field_pays', 'table_pays')
    ->fields('table_pays', array('field_pays_value'))
    ->condition('table_pays.bundle', ["contact_et_ressource","agenda"], 'IN')
    ->groupBy('field_pays_value')
    ->execute();

    // Get all the results
    $results = $data->fetchAll(\PDO::FETCH_OBJ);

    // Iterate results
    $this->pays_options = ['All' => ' - Tous -'];
    foreach ($results as $row) {
        $this->pays_options[$row->field_pays_value] = t($row->field_pays_value);
    }
  }
  
  public function get() {
    return $this->pays_options;
  }

}
