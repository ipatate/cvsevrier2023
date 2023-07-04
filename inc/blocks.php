<?php

namespace PressWind\Inc;

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
  }
);
