<?php

/*
 * @file
 * Contains \Drupal\en_region\Plugin\Block\ArticlesEnRegion
 */

namespace Drupal\en_region\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Affiche une carte des animateurs par départements
 *
 * @Block(
 *   id = "carte_departements_animateur",
 *   admin_label = @Translation("Carte des départements ET animateurs"),
 *   category = @Translation("Tadaa")
 * )
 */
class CarteAnimateurs extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $out = CarteBase::buildBase();
    $out['#attached']['drupalSettings']['carteVoirAnimateurs'] = 1;
    return $out;
  }

}
