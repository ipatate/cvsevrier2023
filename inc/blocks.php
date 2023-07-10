<?php

namespace PressWind\Inc;

require_once(dirname(__FILE__) . '/../old-blocks//block-page/index.php');
require_once(dirname(__FILE__) . '/../old-blocks//block-addock/index.php');

add_action(
  'init',
  function () {
    // logo svg
    register_block_type_from_metadata(dirname(__FILE__) . '/../blocks/logo');
    // social links
    register_block_type_from_metadata(dirname(__FILE__) . '/../blocks/social-links');
    // burger btn
    register_block_type_from_metadata(dirname(__FILE__) . '/../blocks/burger-btn');
    // carousel home
    register_block_type_from_metadata(dirname(__FILE__) . '/../blocks/carousel-hero');
    // breadcrumb
    register_block_type_from_metadata(dirname(__FILE__) . '/../blocks/breadcrumb');
    // role field
    register_block_type_from_metadata(dirname(__FILE__) . '/../blocks/role-field');
    // description field
    register_block_type_from_metadata(dirname(__FILE__) . '/../blocks/description-field');
    // partners
    register_block_type_from_metadata(dirname(__FILE__) . '/../blocks/partners');
    // top-bar
    register_block_type_from_metadata(dirname(__FILE__) . '/../blocks/top-bar');
    // address
    register_block_type_from_metadata(dirname(__FILE__) . '/../blocks/address');
    // links-credit
    register_block_type_from_metadata(dirname(__FILE__) . '/../blocks/links-credit');
  }
);
