<?php

namespace Drupal\en_region\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\InvokeCommand;
use Drupal\taxonomy\Entity\Term;

/**
 * Renvoyer en Ajax (html pur sans insertion des headers Drupal) le contenu d'une modale Département Infos
 *
 * @author adrien
 */
class DptInfosController extends ControllerBase {

    private $isAnimateur;
    private $animateurContent;

    public function __construct() {
        $this->isAnimateur = false;
        $this->animateurContent = "";
    }

    public function getModalAnimateurs(string $dpt) {
        $this->isAnimateur = true;
        return $this->getModal($dpt);
    }

    /**
     * Récupérer le code HTML de la modale directement injecté dans la page
     * @param string $dpt
     * @return string
     */
    public function getModal(string $dpt) {
        // Si < 10 on ajoute 0 devant !
        if (is_numeric($dpt) && $dpt < 10) {
            $dpt = "0" . $dpt;
        }
        $response = new AjaxResponse();

        $modalId = "#modalInfosDpt";
        $selector = "$modalId .contenu";

        // Récupérer le Terme de taxomonie associé à ce département
        $argsTaxon = [
            'vid' => 'departements',
            'field_code' => $dpt
        ];
        $taxons = $this->entityTypeManager()->getStorage('taxonomy_term')->loadByProperties($argsTaxon);
        if (is_array($taxons) && count($taxons) == 1) {
            /* @var $taxon Term */
            $taxon = reset($taxons);
            $titre = $taxon->label();
            $description = $taxon->getDescription();
            $colg_familles = trim($taxon->get('field_texte_groupes_familles')->value);
            $cold_virtuels = trim($taxon->get('field_texte_groupes_virtuels')->value);
        } else {
            // RIEN
            return;
        }

        // Récupérer les Groupes associés à ce département (affichés par commune)
        $groupesEnCours = $groupesVirtuelsNb = $groupesTermines = $groupesPhysiques = 0;
        $virtuels = $communes = "";
        $argsGroupe = [
            'type' => 'salon_des_familles',
            'field_departement' => ['target_id' => $taxon->id()],
            'field_etat' => ['encours', 'terminé']
        ];
        $query = \Drupal::entityQuery('group');
        $query->accessCheck(FALSE);
        $query->condition('type', 'salon_des_familles');
        $query->condition('field_etat', ['encours', 'terminé'], "IN");
        $condition_or = $query->orConditionGroup();
        $condition_or->condition('field_departement', $taxon->id());
        $condition_or->notExists('field_departement');
        $query->condition($condition_or);
        $groups_ids = $query->execute();

        $groupes = $this->entityTypeManager()->getStorage('group')->loadMultiple($groups_ids);
        foreach ($groupes as $groupe) {
            if ($groupe->field_etat->value == "terminé") {
                $groupesTermines++;
                continue;
            } else {
                $groupesEnCours++;
            }
            if ($groupe->field_groupe_virtuel->value) {
                // Virtuel
                $groupesVirtuelsNb++;
                /* @var $groupe Node */
                /*$virtuels .= "<li><h5>" . $groupe->label() . '</h5>';
                $virtuels .= $groupe->field_description->value;*/
                // $virtuels .= "<p><a href=''>En savoir plus</a></p>";
            } else {
                // Physiques
                $groupesPhysiques++;
                /*$atab = $groupe->field_adresse->first() ? $groupe->field_adresse->first()->toArray() : NULL;
                if ($atab) {
                    $communes .= '<li>' . $groupe->label() . ($atab['organization'] ? (' - ' . $atab['organization']) : '');
                    $communes .= '<p>' . $atab['address_line1'] . ', ' . $atab['postal_code'] . ' ' . $atab['locality'] . '</p></li>';
                }*/
            }
        }

        /* Ajout de wrappers * /
        if ($virtuels || ($dpt == "01")) {
            if ($dpt == "01") {
                $virtuels = "<li>5 petites récrés en ligne (groupes complets)</li><li>3 petites récrés en ligne à venir</li>";
            }
            $virtuels = "<h4>Groupes virtuels</h4><ul>$virtuels</ul>";
        }
        if ($groupesPhysiques > 0  || ($dpt == "13" || $dpt == "01")) {
            if ($dpt == "01") {
                $communes = "<li>4 groupes terminés</li><li>4 groupes prévus fin 2021</li>";
                $communes = "<h4>Groupes familles</h4><ul>$communes</ul>";
            }
            else if ($dpt == "13") {
                $groupesTermines = 1;
                $communes = "<li>3 groupes complets</li>";
                $communes = "<h4>Groupes virtuels</h4><ul>$communes</ul>";
            }
            else {
                $communes = "<h4>Groupes familles</h4><ul>$communes</ul>";
            }
        }
         */
        
        if($colg_familles) {
            $communes = "<h4>Groupes familles</h4><p>$colg_familles</p>";
            if($groupesPhysiques == 0) {
                $groupesPhysiques++;
                $groupesEnCours++;
            }
        }
        if($cold_virtuels) {
            $virtuels = "<h4>Groupes virtuels</h4><p>$cold_virtuels</p>";
            if($groupesVirtuelsNb == 0) {
                $groupesVirtuelsNb++;
                $groupesEnCours++;
            }
        }

        // Intro
        // $groupesEnCours > 0 || $groupesVirtuelsNb > 0 
        if ($communes || $virtuels || $this->isAnimateur) {
            // RIEN à dire, ils verront la liste 
        } elseif ($groupesTermines > 0) {
            // Bon il reste des groupes fermés
            $introGroupes = "<p>Tous les groupes famille CES ANNEES INCROYABLES du territoire sont actuellement complets.</p>"
                    . ($this->isAnimateur ? '' : "<p>N’hésitez pas à <a href='/parents/contactez-nous?objet=interet_territoire'>manifester votre intérêt si vous voulez être informé(e) de l’organisation du prochain groupe</a>.");
        } else {
            // Il n'y a rien du tout .. 
            $introGroupes = "<p>Il n’y a pas de groupe famille CES ANNEES INCROYABLES sur le territoire actuellement.</p>"
                    . ($this->isAnimateur ? '' : "<p>N’hésitez pas à <a href='/parents/contactez-nous?objet=interet_territoire'>manifester votre intérêt si vous voulez être informé(e) de l’organisation du prochain groupe</a>.</p>");
        }

        // Bouton
        $texte_bouton = $this->isAnimateur ? "Contacter la coordinatrice départementale" : "Demande d'inscription";
        $lien_bouton = $this->isAnimateur ? "/espace-pro/contact" : ("/parents/s-inscrire-au-programme?territoire=" . urlencode($titre));

        // On construit la structure HTML, le CSS sera appliqué via le module dans la page qui appelle l'Ajax
        $content = [
            'titre' => ['#markup' => '<h3>' . $titre . '</h3>' . ($description ?? '')],
            'intro' => [
                'groupes' => ['#markup' => "<h4>$introGroupes</h4>"],
            ],
            'separateur' => $this->isAnimateur ? '' : ['#markup' => '<hr class="jaune" />'],
            'contenu' => $this->isAnimateur ? '' : [
        '#type' => 'container',
        '#attributes' => ['class' => 'pure-g'],
        'colg' => [
            '#type' => 'container',
            '#attributes' => ['class' => 'pure-u-1-2'], // trouver le moyen de dire que c'est une colonne de 6 / 12
            'content' => [
                '#markup' => $communes,
            ],
            'bouton' => [
                '#markup' => $communes ? '<p><a href="/parents/contactez-nous?objet=interet_territoire" class="btn">Manifestez votre intérêt</a></p>' : ''
            ]
        ],
        'cold' => [
            '#type' => 'container',
            '#attributes' => ['class' => 'pure-u-1-2'], // trouver le moyen de dire que c'est une colonne de 6 / 12
            'content' => [
                '#markup' => $virtuels,
            ],
            'bouton' => [
                '#markup' => $virtuels ? '<p><a href="' . $lien_bouton . '" class="btn">' . $texte_bouton . '</a></p>' : ''
            ]
        ],
            ],
            'animateurs' => [],
            'bouton' => $this->isAnimateur ? [
        '#markup' => '<p><a href="' . $lien_bouton . '" class="btn">' . $texte_bouton . '</a></p>'] : '',
        ];

        // Animateurs
        if ($this->isAnimateur) {
            $query = \Drupal::entityQuery('user');
            $query->accessCheck(FALSE);
            $query->condition('field_departement', $taxon->id());
            $query->condition('roles', 'animateur', 'CONTAINS');
            $nb_animateurs = $query->count()->execute();

            if ($nb_animateurs > 0) {
                $intro_animateurs = ['#markup' => "<p>$nb_animateurs animateur(s) sur ce département</p>"];
            } else {
                $intro_animateurs = "";
            }

            $content['animateurs'] = [
                'intro_animateurs' => $intro_animateurs,
                'separateur' => ['#markup' => '<hr class="jaune" /><br>'],
                'vue' => [views_embed_view("liste_des_animateurs", "default", '' . $dpt)]
            ];
        } else {
            unset($content['animateurs']);
        }

        $response->addCommand(new HtmlCommand($selector, $content));
        $response->addCommand(new InvokeCommand($modalId, 'show'));

        return $response;
    }

}
