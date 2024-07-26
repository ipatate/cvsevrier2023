<?php

namespace CVSevrier\Inc;

/**
 * query for team list block
 */
add_filter(
    'pre_render_block',
    function ($prerender, $block) {
        if ($block['attrs'] &&
            array_key_exists('namespace', $block['attrs']) && $block['attrs']['namespace']
            === 'cvsevrier/team-list'
        ) {
            add_filter(
                'query_loop_block_query_vars',
                function ($query) {

                    $query['post_type'] = 'teams';

                    return $query;
                }
            );
        }
    },
    1,
    2
);
