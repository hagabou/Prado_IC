<?php

namespace Drupal\en_region\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Description of CarteBase
 *
 * code de Base pour créer un Bloc avec la carte des départements affichées
 */
class CarteBase {

    static function buildBase() {
        $out = [];
        /*
         * Ajout du module map
         */
        
        /*
         * Liste
         */
        $argsTaxons = [
            'vid' => 'departements',
        ];
        $taxons = \Drupal::service('entity_type.manager')->getStorage('taxonomy_term')->loadByProperties($argsTaxons);
        $liste = ['_none' => "Choisir un département"];
        foreach($taxons as $term) {
           $liste[$term->field_code->value] = $term->label(); 
        }
        $out['liste'] = [
            '#title' => 'Choisir un département dans la liste, ou sélectionner sur la carte ci-dessous :',
            '#type' => 'select',
            '#options' => $liste,
            '#attributes' => ['id' => 'liste_carte_dpts'],
            '#size' => 100
        ];
        
        /*
         * Carte
         */
        $out['carte'] = ['#type' => 'container', '#attributes' => ['id' => 'carte_departements']];
        $out['carte']['carte_js'] = ['#type' => 'container', '#attributes' => ['id' => 'map_departements']];
        $out['carte']['modal'] = ['#type' => 'container', '#attributes' => ['id' => 'modalInfosDpt']];
        $out['carte']['modal']['inner'] = ['#type' => 'container', '#attributes' => ['class' => 'inner']];
        $out['carte']['modal']['inner']['fermer'] = ['#markup' => '<span class="fermer">X</span>'];
        $out['carte']['modal']['inner']['contenu'] = ['#type' => 'container', '#attributes' => ['class' => 'contenu']];
        $out['#attached']['library'][] = 'en_region/map_departements';

        $out['#cache']['max-age'] = 0;
        return $out;
    }

}
