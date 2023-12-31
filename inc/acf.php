<?php

namespace CVSevrier\Inc;

function useACF(): void
{
    add_filter('acf/settings/save_json', __NAMESPACE__.'\json_save_point');
    add_filter('acf/settings/load_json', __NAMESPACE__.'\json_load_point');
}

// save fields ACF to json
function json_save_point($path): string
{
    $path = dirname(__FILE__).'/../acf-json';

    return $path;
}

// load fields ACF from json
function json_load_point($paths): array
{

    unset($paths[0]);
    $paths[] = dirname(__FILE__).'/../acf-json';

    return $paths;
}
