/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// https://github.com/manifestinteractive/jqvmap

function carteDepartementsResize($) {
    /** On écarte la carte en fonction de la largeur de l'écran. Hauteur = 1.023 x Largeur **/
    var largeur = $("#carte_departements").width();
    var hauteur = largeur * 1.023;
    $('#map_departements').css('width', largeur + 'px');
    $('#map_departements').css('height', hauteur + 'px');
}


(function ($, Drupal, drupalSettings) {

    'use strict';
    Drupal.behaviors.carteDepartements = {
        attach: function (context, settings) {
            
            /* Action au chargement de la page avec #map_deprtements dedans */
             $('#map_departements', context).once('map-departements').each(function () {
                /* Racadrage */
                carteDepartementsResize($); // à l'ouverture
                $(window).on('resize', function () {
                    carteDepartementsResize($);
                });

                /*
                 * Fonction pour ressortir un dpt propre depuis la carte et vice-versa
                 */
                function getDtpNumFromMap(code) {
                    var dpt = code.replace('fr-', '');
                    // Départements du type 01 ou 08
                    if (dpt[0] == 0) {
                        dpt = dpt.replace(/^0/, '');
                    }
                    // Départements d'outre-mer
                    switch (dpt) {
                        case "re":
                            dpt = 974;
                            break;
                        case "gf":
                            dpt = 973;
                            break;
                        case "mq":
                            dpt = 972;
                            break;
                        case "gp":
                            dpt = 971;
                            break;
                        default:
                            break;
                    }
                    return dpt;
                }
                
                /**
                 * Fermer la carte
                 */
                function fermerCarte() {
                    $("#modalInfosDpt").hide();
                }
                $("#modalInfosDpt").click(function (e) {
                    if ("modalInfosDpt" == $(e.target).attr('id')) {
                        fermerCarte();
                    }
                });
                $("#modalInfosDpt .fermer").click(function () {
                    fermerCarte();
                });

                /**
                 * Carte SVG
                 */
                $('#map_departements').vectorMap(
                        {
                            map: 'fr_merc',
                            backgroundColor: 'transparent',
                            borderColor: '#818181',
                            borderOpacity: 0.25,
                            borderWidth: 1,
                            color: '#f4f3f0',
                            enableZoom: true,
                            hoverColor: '#E63E4B',
                            hoverOpacity: null,
                            normalizeFunction: 'linear',
                            scaleColors: ['#b6d6ff', '#005ace'],
                            selectedColor: '#672371',
                            selectedRegions: [],
                            multiSelectRegion: false,
                            showTooltip: true,
                            onRegionOver: function (element, code, region)
                            {
                            },
                            onRegionOut: function (event, code, region) {
                            },
                            onRegionDeselect: function (event, code, region) {
                            },
                            onRegionSelect: function (event, code, region) {
                                /**
                                 * Clic sur une région (et sélection donc) :
                                 *   - on récupère le code du Département
                                 *   - on charge le contenu en Ajax dans un cadre #modalInfosDpt
                                 *   - on affiche ce cadre
                                 */
                                var dpt = getDtpNumFromMap(code);
                                if(drupalSettings.carteVoirAnimateurs === 1) {
                                    var endpoint = Drupal.url('carte-departements/modal-animateurs/' + dpt);
                                } else {
                                    var endpoint = Drupal.url('carte-departements/modal/' + dpt);
                                }
                                Drupal.ajax({url: endpoint}).execute();
                                //$("#modalInfosDpt .contenu").html("HELLO " + dpt);
                                //$("#modalInfosDpt").show();
                            }
                        });

                });

                /*
                 * On sélectionne via la liste ?
                 */
                
                $('#liste_carte_dpts').on('change',function() {
                    var dpt = $(this).val();
                    if(dpt !== '_none') {
                        jQuery('#map_departements').vectorMap('select', dpt);
                    }
                });
                
            }
    };

})(jQuery, Drupal, drupalSettings);
