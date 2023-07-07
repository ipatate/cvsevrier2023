<?php

namespace PressWind\Inc;

add_action('wp_head', function () {
  echo "<script type=\"text/javascript\">
      var _gdpr = _gdpr || [];
      var youtubeCB = [];
      var vimeoCB = [];
      var _gdpr_lang = 'fr';
      var _gdpr_options = {
        types: ['booking', 'stats', 'video']
      };
      var _gdpr_messages = {
        fr: {
          alert_text:
        \"En poursuivant votre navigation, vous acceptez l'utilisation de services tiers pouvant installer des cookies\",
          banner_ok_bt: 'Ok, tout accepter',
          banner_custom_bt: 'Personnaliser',
          modal_header_txt: 'Préférence pour tous les services',
          service_accept: 'Activer',
          service_accept_all: 'Activer tout',
          service_bloc_all: 'Bloquer tout',
          service_activated: 'Service activé',
          service_blocked: 'Service bloqué',
          modal_valid: 'Sauvegarder',
          ads: 'Publicités',
          stats: 'Statistiques',
          others: 'Autres services',
          mask_text_start: 'Le service',
          mask_text_end: 'est désactivé, si vous l\'activez, vous acceptez les cookies de ce service',
          booking: 'Réservation',
          video: 'Vidéo'
        }
      };
      _gdpr.push([
        {
          type: 'video',
          name: 'Youtube',
          description: 'Service de vidéo en ligne'
        },
          youtubeCB
        ]);
      _gdpr.push([
        {
          type: 'video',
          name: 'Vimeo',
          description: 'Service de vidéo en ligne'
        },
          vimeoCB
        ]);
      _gdpr.push([
        {
          type: 'stats',
          name: 'Google Tag Manager',
          description: 'Service pour les statistiques de visites'},
          [
            function(helpers) {
              // use helpers
              helpers.createScript('https://www.googletagmanager.com/gtag/js?id=UA-160602339-1');

              window.dataLayer = window.dataLayer || [];
              function gtag() {
                dataLayer.push(arguments)
              }
              gtag('js', new Date());
              gtag('config', 'UA-160602339-1');
            }
          ]
        ]);
        </script>";
});
