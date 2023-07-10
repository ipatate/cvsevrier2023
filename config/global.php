<?php

return [
  // directory target for assets generated
  'iconsDir' => 'public',
  // logo source for generate icons
  'source' => './assets/media/icon.svg',
  'manifest' => [
    'appName' => 'Club de Voile de Sevrier',
    'appShortName' => 'CVSevrier',
    'appDescription' => 'Site du Club de Voile de Sevrier',
    'background' => '#fff',
    'theme_color' => '#1e515d',
    'lang' => 'fr-FR',
    // see settings https://www.npmjs.com/package/favicons#usage
    'preferRelatedApplications' => false,
    'pixel_art' => false,
    'loadManifestWithCredentials' => false,
    'manifestMaskable' => false,
    'icons' => [
      'favicons' => true,
      'android' => true,
      'appleIcon' => true,
      'appleStartup' => false,
      'coast' => false,
      'yandex' => false,
      'windows' => false,
    ],
  ],
  // 'disable' => [
  //   // disable rss links
  //   'rss' => true,
  //   // remove all comments views
  //   'comment' => true,
  //   // disable emojis
  //   'emoji' => true,
  //   // media page
  //   'media' => true,
  //   // disable oembed
  //   'oembed' => true,
  //   // disable xmlrpc
  //   'xmlrpc' => true,
  //   // disble rest user endpoint
  //   'rest_user' => true,
  //   // disable jquery
  //   'jquery' => false
  // ]
];
