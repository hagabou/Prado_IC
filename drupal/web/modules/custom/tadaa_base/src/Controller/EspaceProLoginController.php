<?php

namespace Drupal\tadaa_base\Controller;

use Drupal\Core\Controller\ControllerBase;


/**
 * Renvoyer en Ajax (html pur sans insertion des headers Drupal) le contenu d'une modale Département Infos
 *
 * @author adrien
 */
class EspaceProLoginController extends ControllerBase {

    /**
     * Récupérer le code HTML de la modale directement injecté dans la page
     * @param string $dpt
     * @return string
     */
    public function login() {
        $account = \Drupal::currentUser();
        $out = [];
        
        // Page de login : si on est connecté et autorisé, on redirige
        if($account->hasPermission('acces espace pro')) {
            return new \Symfony\Component\HttpFoundation\RedirectResponse("/espace-pro"); 
        }
        
        // Login form -- changer la destination first (petit hack ..)
        $request = \Drupal::service('request_stack')->getCurrentRequest();
        $request->query->set('destination', '/espace-pro');
        $login_form = \Drupal::formBuilder()->getForm(\Drupal\user\Form\UserLoginForm::class);
        
        $out = [
            '#type' => 'container',
            '#attributes' => ['class' => 'pure-g'],
            'colg' => [
                '#type' => 'container',
                '#attributes' => ['class' => 'pure-u pure-u-md-1-2'],
                'contenu' => ['#markup' => 
                    "<p><strong>L'Espace Pro est accessible uniquement aux professionnels et animateurs abonnés.</strong></p>"
                    . "<p><a class='btn' href='/professionnels/offre-pro'>Pas encore abonné ?</a></p>"
                    . "<p>Cet espace est le vôtre ! Vous y trouverez les ressources et les outils qui vous permettront "
                    . "de contribuer au déploiement du programme auprès des familles et de travailler ensemble.</p>"
                    . "<p>Le contenu de cet espace est collaboratif et évolutif, n'hésitez pas à vous connecter "
                    . "régulièrement pour y consulter les nouveautés, et contactez-nous si vous souhaitez y contribuer.</p>"
                    . "<p><a class='btn-third' href='/professionnels/contactez-nous?objet=Problème de connexion'>Un problème de connexion ?</a>"
                ]
            ],
            'cold' => [
                '#type' => 'container',
                '#attributes' => ['class' => 'pure-u pure-u-md-1-2'],
                'form' => $login_form
            ]
        ];
    
        return $out;
    }

}
