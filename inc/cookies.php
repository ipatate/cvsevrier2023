<?php

namespace PressWind\Inc;

if (! defined('GTM_ID')) {
    define('GTM_ID', 'GTM-XXXXXX');
}

/** RGPD */
add_action(
    'wp_head',
    function () {
        echo '<script type="text/javascript">
      var _gdpr = _gdpr || [];
      var contentdisplayCB = [];
      var _gdpr_lang = "fr_FR";
    window._gdpr_options = {
      keepCookies: [],
      types: ["booking", "stats", "video"],
      optout: true,
    };
    </script>';
    },
    2
);

add_action(
    'wp_head',
    function () {
        echo '<script type="text/javascript">
      var _gdpr_messages = {
        fr_FR: {
        banner_title: "'.addslashes(__("Information sur l'utilisation de cookies sur le site.", 'cvsevrier')).'",
        modal_intro_txt:
        "'.addslashes(__('Personnalisez vos choix en fonction des différentes finalités. Vous pourrez changer d’avis à tout moment, en utilisant le lien “Gestion des cookies” en bas de chaque page.', 'cvsevrier')).'",
        modal_info_txt:
        "'.addslashes(__('Vous devez accepter ou refuser les cookies pour chaque catégorie, puis sauvegarder votre choix.', 'cvsevrier')).'",
        alert_text:
        "'.addslashes(__("En poursuivant votre navigation, vous acceptez l'utilisation de services tiers pouvant installer des cookies.", 'cvsevrier')).'",
        banner_ok_bt: "'.addslashes(__('Tout accepter', 'cvsevrier')).'",
        banner_custom_bt: "'.addslashes(__('Personnaliser les cookies', 'cvsevrier')).'",
        modal_header_txt: "'.addslashes(__('Centre de préférences', 'cvsevrier')).'",
        close_modale_label: "'.addslashes(__('Fermer la fenêtre', 'cvsevrier')).'",
        service_accept: "'.addslashes(__('Activer', 'cvsevrier')).'",
        service_accept_all: "'.addslashes(__('Activer tous les services', 'cvsevrier')).'",
        service_bloc_all: "'.addslashes(__('Bloquer tous les services', 'cvsevrier')).'",
        service_activated: "'.addslashes(__('Service activé', 'cvsevrier')).'",
        service_blocked: "'.addslashes(__('Service bloqué', 'cvsevrier')).'",
        modal_valid: "'.addslashes(__('Valider les préférences', 'cvsevrier')).'",
        booking: "'.addslashes(__('Réservation', 'cvsevrier')).'",
        stats: "'.addslashes(__('Statistiques', 'cvsevrier')).'",
        others: "'.addslashes(__('Autres services', 'cvsevrier')).'",
        mask_text_start: "'.addslashes(__('Le service', 'cvsevrier')).'",
        mask_text_end: "'.addslashes(__('est désactivé', 'cvsevrier')).'",
        activate: "'.addslashes(__('activer', 'cvsevrier')).'",
        deactivate: "'.addslashes(__('désactiver', 'cvsevrier')).'",
      },
    };
        _gdpr.push([
          {
            type: "video",
            name: "contentdisplay",
            label: "'.addslashes(__('Partage et affichage de contenus', 'cvsevrier')).'",
            description: "'.addslashes(__(
            'Ces traceurs permettent de partager les contenus de notre site sur des sites tiers (notamment Facebook) et d’afficher des contenus provenant de sites tiers (notamment YouTube) sur notre site.',
            'cvsevrier'
        )).'"
            ,
          },
          contentdisplayCB,
        ]);

        // use script
        _gdpr.push([
          {
            type: "stats",
            label: "'.addslashes(__('Mesure d’audience et de performance', 'cvsevrier')).'",
            name: "mesureStats",
            description: "'.addslashes(__('Ces traceurs collectent la performance, le volume et le comportement du trafic du site. L’analyse de ces données permet de mieux répondre aux attentes des utilisateurs.', 'cvsevrier')).'",
          },
          [
            function () {
              (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
                var f = d.getElementsByTagName(s)[0],
                  j = d.createElement(s),
                  dl = l != "dataLayer" ? "&l=" + l : "";
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
              })(window, document, "script", "dataLayer", "'.GTM_ID.'");
            },
          ],
        ]);
        document.addEventListener(\'DOMContentLoaded\', () => {
            window.initGdprCookie.default("'.get_locale().'")
            var link_gdpr = document.querySelector(\'.gm-gdpr-cookie a\')
            if (link_gdpr) {
              link_gdpr.addEventListener(\'click\', function (e) {
                e.preventDefault()
                window._gdpr_showModal()
              })
            }
                  })
      </script>';
    }
);
