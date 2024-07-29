<?php

namespace CVSevrier;

if (! defined('WP_ENV')) {
    define('WP_ENV', 'development');
}

// inc, you can modify this files like you want
require_once dirname(__FILE__).'/inc/setup.php';
require_once dirname(__FILE__).'/inc/assets.php';
require_once dirname(__FILE__).'/inc/gutenberg.php';
require_once dirname(__FILE__).'/inc/sortable.php';
//require_once dirname(__FILE__).'/inc/meta.php';
require_once dirname(__FILE__).'/inc/blocks-variations.php';

// login
require_once dirname(__FILE__).'/inc/login_assets.php';

// pwa icons injected in head
if (file_exists(dirname(__FILE__).'/inc/pwa_head.php')) {
    include dirname(__FILE__).'/inc/pwa_head.php';
}

// acf
require_once dirname(__FILE__).'/inc/acf.php';
require_once dirname(__FILE__).'/inc/acf-config.php';

// post type
if (file_exists(dirname(__FILE__).'/post-type/team.php')) {
    include dirname(__FILE__).'/post-type/team.php';
}

// blocks
if (file_exists(dirname(__FILE__).'/inc/blocks.php')) {
    include dirname(__FILE__).'/inc/blocks.php';
}

// clean html carousel
if (file_exists(dirname(__FILE__).'/inc/clean_html.php')) {
    include dirname(__FILE__).'/inc/clean_html.php';
}


/** Excerpt  */
//add_filter('excerpt_length', function () {
//    return 10;
//}, 999);
//
//add_filter('excerpt_more', function () {
//    return '...';
//}, 999);



add_filter('gcc_list_iframes', function ($iframes) {
	$iframes = array_merge([
		'webcam' => [
			'name' => 'Webcam',
			'slug' => 'webcam',
			'content' => [
				'col1' => '',
				'col2' => 'm.webcam-hd.com',
				'col3' => __('Webcam', 'goodmotion-cookie-consent'),
			],
			'settings' => [
				'embedUrl' => '{data-id}',
				'useId' => false,
				'thumbnailUrl' => '',
				'iframe' => [
					'allow' => [
						'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture',
						'frameBorder' => 0,
					],
				],
			],
		],
		'meteo' => [
			'name' => 'Météo',
			'slug' => 'meteo',
			'content' => [
				'col1' => '',
				'col2' => 'www.meteoblue.com',
				'col3' => __('Météo Blue', 'goodmotion-cookie-consent'),
			],
			'settings' => [
				'embedUrl' => '{data-id}',
				'useId' => false,
				'thumbnailUrl' => '',
				'iframe' => [
					"frameborder"=> "0",
					"scrolling"=> "NO",
					"allowtransparency"=>"true",
					'allow' => [
						'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture',
						'frameBorder' => 0,
					],
				],
			],
		],
	], $iframes);

	return $iframes;
}, 1, 1);
