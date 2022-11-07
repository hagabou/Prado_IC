<?php

/*
 * @file
 * Contains \Drupal\en_region\Plugin\Block\ArticlesEnRegion
 */

namespace Drupal\en_region\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Affiche une carte des départements cliquable
 *
 * @Block(
 *   id = "carte_departements",
 *   admin_label = @Translation("Carte des départements"),
 *   category = @Translation("Tadaa")
 * )
 */
class CarteDepartements extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $out = CarteBase::buildBase();
    return $out;
  }

}
