<?php

namespace Drupal\tadaa_base\Plugin\Filter;

// Base class for the filter.
use Drupal\filter\Plugin\FilterBase;
// Necessary for settings forms.
use Drupal\Core\Form\FormStateInterface;
// Necessary for result of process().
use Drupal\filter\FilterProcessResult;
//use Drupal\filter\Plugin\FilterInterface;

/**
 * @Filter(
 *   id = "filter_cai",
 *   title = @Translation("Filtrer le terme Ces Années Incroyables"),
 *   description = @Translation("Remplace CES ANNEES INCROYABLES par de petites majuscules"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 * )
 */
class CaiFilter extends FilterBase {

    /* Par défaut */
    const TO_BE_REPLACED = "CES ANNEES INCROYABLES";
    const TO_REPLACE_BY = "CES ANNÉES INCROYABLES";


    /**
     * {@inheritdoc}
     */
    public function __construct(array $configuration, $plugin_id, array $plugin_definition) {
        parent::__construct($configuration, $plugin_id, $plugin_definition);
    }

  
    /**
     * Get the tips for the filter.
     *
     * @param bool $long
     *   If get the long or short tip.
     *
     * @return string
     *   The tip to show for the user.
     */
    public function tips($long = FALSE) {
        if ($long) {
            return t("Remplace le texte CES ANNEES INCROYABLES en petites minuscules");
        } else {
            return t("Remplace le texte CES ANNEES INCROYABLES en petites minuscules");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function process($text_init, $langcode) {
        // On modifie / créé les tags si besoin --- remplacé CES ANNÉES en CES ANNEES puis en tag
        $text_modified1 = str_ireplace(self::TO_REPLACE_BY, self::TO_BE_REPLACED, $text_init);
        $text_modified2 = str_ireplace(self::TO_BE_REPLACED, '<span class="terme-cai">' . self::TO_REPLACE_BY . '</span>', $text_modified1);

        // On défini le texte comme étant filtré
        $result = new FilterProcessResult($text_modified2);

        return $result;
    }

    /**
     * Create the settings form for the filter.
     *
     * @param array $form
     *   A minimally prepopulated form array.
     * @param FormStateInterface $form_state
     *   The state of the (entire) configuration form.
     *
     * @return array
     *   The $form array with additional form elements for the settings of
     *   this filter. The submitted form values should match $this->settings.
     *
     * @todo Add validation of submited form values, it already exists for
     *       drupal 7, must update it only.
     * 
     * @todo Choix d'une facette ?
     */
    public function settingsForm(array $form, FormStateInterface $form_state) {
        $options = [];
        return $settings;
    }

}
