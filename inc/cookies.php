<?php

namespace PressWind\Inc;

if (!defined('GTM_ID')) {
  define('GTM_ID', 'GTM-XXXXXX');
}

/** RGPD */

add_action(
  'wp_head',
  function () {
    echo '<script type="text/javascript">
      var _gdpr = _gdpr || [];
      var contentdisplayCB = [];
      var _gdpr_messages = {
        fr: {
        banner_title: "' . addslashes(__("Information sur l'utilisation de cookies sur le site.", "cvsevrier")) . '",
        modal_intro_txt:
        "' . addslashes(__("Personnalisez vos choix en fonction des différentes finalités. Nous conserverons vos choix pendant 6 mois, ensuite nous vous reposerons la question. Vous pourrez changer d’avis à tout moment, en utilisant le lien “Gestion des cookies” en bas de chaque page. Les traceurs “techniques” sont indispensables au fonctionnement du site et ne peuvent donc pas être désactivés.", "cvsevrier")) . '",
        modal_info_txt:
        "' . addslashes(__("Vous devez accepter ou refuser les cookies pour chaque catégorie, puis sauvegarder votre choix.", "cvsevrier")) . '",
        alert_text:
        "' . addslashes(__("En poursuivant votre navigation, vous acceptez l'utilisation de services tiers pouvant installer des cookies.", "cvsevrier")) . '",
        banner_ok_bt: "' . addslashes(__("Tout accepter", "cvsevrier")) . '",
        banner_custom_bt: "' . addslashes(__("Personnaliser les cookies", "cvsevrier")) . '",
        modal_header_txt: "' . addslashes(__("Centre de préférences", "cvsevrier")) . '",
        close_modale_label: "' . addslashes(__("Fermer la fenêtre", "cvsevrier")) . '",
        service_accept: "' . addslashes(__("Activer", "cvsevrier")) . '",
        service_accept_all: "' . addslashes(__("Activer tous les services", "cvsevrier")) . '",
        service_bloc_all: "' . addslashes(__("Bloquer tous les services", "cvsevrier")) . '",
        service_activated: "' . addslashes(__("Service activé", "cvsevrier")) . '",
        service_blocked: "' . addslashes(__("Service bloqué", "cvsevrier")) . '",
        modal_valid: "' . addslashes(__("Valider les préférences", "cvsevrier")) . '",
        ads: "' . addslashes(__("Publicités", "cvsevrier")) . '",
        stats: "' . addslashes(__("Statistiques", "cvsevrier")) . '",
        others: "' . addslashes(__("Autres services", "cvsevrier")) . '",
        mask_text_start: "' . addslashes(__("Le service", "cvsevrier")) . '",
        mask_text_end: "' . addslashes(__("est désactivé", "cvsevrier")) . '",
        activate: "' . addslashes(__("activer", "cvsevrier")) . '",
        deactivate: "' . addslashes(__("désactiver", "cvsevrier")) . '",
      },
    };
    var _gdpr_lang = "fr";
    window._gdpr_options = {
      keepCookies: [],
      types: ["ads", "stats", "video"],
      optout: true,
    };
        _gdpr.push([
          {
            type: "video",
            name: "contentdisplay",
            label: "' . addslashes(__("Partage et affichage de contenus", "cvsevrier")) . '",
            description: "' . addslashes(__(
      "Ces traceurs permettent de partager les contenus de notre site sur des sites tiers (notamment Facebook) et d’afficher des contenus provenant de sites tiers (notamment YouTube) sur notre site.",
      "cvsevrier"
    )) . '"
            ,
          },
          contentdisplayCB,
        ]);

        // use script
        _gdpr.push([
          {
            type: "stats",
            label: "' . addslashes(__("Mesure d’audience et de performance", "cvsevrier")) . '",
            name: "mesureStats",
            description: "' . addslashes(__("Ces traceurs collectent la performance, le volume et le comportement du trafic du site. L’analyse de ces données permet de mieux répondre aux attentes des utilisateurs.", "cvsevrier")) . '",
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
              })(window, document, "script", "dataLayer", "' .  GTM_ID  . '");
            },
          ],
        ]);
      </script>';
  },
  2
);

/** video mask iframe rgpd */
// if (!function_exists('file_get_html')) {
//   require_once(dirname(__FILE__) . '/../helpers/simplehtmldom/simple_html_dom.php');
// }

// function iframe_render($content, $name, $service, $label)
// {
//   $html = new \simple_html_dom();
//   $html->load($content);
//   // find container
//   $container = $html->find('.embed-' . strtolower($name));
//   if (count($container) < 1) {
//     return $content;
//   }
//   $items = $html->find('iframe');
//   if (count($items) === 0) {
//     return $content;
//   }
//   // generate key random
//   $randomkey = random_bytes(5);
//   // create script
//   $script = '<script type="text/javascript">'
//     . 'var ' . strtolower($service) . 'CB = ' . strtolower($service) . 'CB || [];'
//     . strtolower($service) . 'CB.push(function(helpers) {'
//     . 'var id = "mask' . bin2hex($randomkey) . '";'
//     // remove padding
//     . 'helpers.createIframe(\'.\'+id+\' .fluid-width-video-wrapper\', {';
//   foreach ($items[0]->attr as $key => $value) {
//     $script .= $key . ': "' . $value . '",';
//   }
//   $script .= '});setTimeout(function(){var maskContent = document.querySelector(\'.\'+id+\' .gdpr_mask-content\');if(maskContent) maskContent.style.display = "none";}, 1000)';
//   $script .= '});</script>';
//   $script .= '<span class="fluid-width-video-wrapper" style="display: block;padding-top: 56.3158%;"></span>';
//   $_class = $container[0]->getAttribute('class');
//   $container[0]->setAttribute('class', $_class . ' gdpr-mask mask' . bin2hex($randomkey));
//   $container[0]->setAttribute('data-gdpr', $service);
//   $container[0]->setAttribute('id', bin2hex($randomkey));
//   // add padding for ratio
//   $container[0]->setAttribute('style', "display:block;");
//   $container[0]->innertext = $script;
//   return $html->save();
// }

// // search video
// add_filter('the_content', function ($content) {
//   // work with Vimeo
//   return namespace\iframe_render($content, 'Youtube', 'contentdisplay', __("Partage et affichage de contenus", "cvsevrier"));
// });
