<?php

namespace Drupal\en_region\Services;

/**
 * Description of GetListeRegions
 *
 * @author alasserre
 */
class ListeRegions {

  private $regions;

  public function __construct() {
    $this->regions["- Région -"] = ['0'];
    $this->regions["Etranger"] = ['0'];
    $this->regions["Auvergne-Rhône-Alpes"] = ['1', '3', '7', '15', '26', '38', '42', '43', '63', '69', '73', '74'];
    $this->regions["Bourgogne-Franche-Comté"] = ['21', '25', '39', '58', '70', '71', '89', '90'];
    $this->regions["Bretagne"] = ['22', '29', '35', '56'];
    $this->regions["Centre-Val de Loire"] = ['18', '28', '36', '37', '41', '45'];
    $this->regions["Corse"] = ['2A', '2B'];
    $this->regions["Grand Est"] = ['8', '10', '51', '52', '54', '55', '57', '67', '68', '88'];
    $this->regions["Guadeloupe"] = ['971'];
    $this->regions["Guyane"] = ['973'];
    $this->regions["Hauts-de-France"] = ['2', '59', '60', '62', '80'];
    $this->regions["Île-de-France"] = ['75', '77', '78', '91', '92', '93', '94', '95'];
    $this->regions["La Réunion"] = ['974', '976'];
    $this->regions["Martinique"] = ['972'];
    $this->regions["Normandie"] = ['14', '27', '50', '61', '76'];
    $this->regions["Nouvelle-Aquitaine"] = ['16', '17', '19', '23', '24', '33', '40', '47', '64', '79', '86', '87'];
    $this->regions["Occitanie"] = ['9', '11', '12', '30', '31', '32', '34', '46', '48', '65', '66', '81', '82'];
    $this->regions["Pays de la Loire"] = ['44', '49', '53', '72', '85'];
    $this->regions["Provence-Alpes-Côte d'Azur"] = ['4', '5', '6', '13', '83', '84'];
    $this->regions["- Choisir les départements (liste) -"] = ['0'];
    $this->regions["- Choisir les départements (carte) -"] = ['0'];
  }
  
  public function get() {
    return $this->regions;
  }
  
  public function getDepartementsLimitrophes($dpt) {
    foreach($this->regions as $region) {
      if(in_array($dpt, $region)) {
        return $region;
      }
    }
    return NULL;
  }

}
