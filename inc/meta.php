<?php

namespace CVSevrier\Inc;



function register_meta() {
}

//add_action( 'init', __NAMESPACE__ . '\register_meta' );



function register_binding_sources(): void {
	register_block_bindings_source( 'cvsevrier/team-role', array(
		'label'              => __( 'Team role', 'cvsevrier' ),
		'uses_context'            => ['postId'],
		'get_value_callback' => function( $source_args, $block_instance ) {
			return get_field( 'team_role', $block_instance->context['postId']);
		},
	) );

	register_block_bindings_source( 'cvsevrier/team-description', array(
		'label'              => __( 'Team description', 'cvsevrier' ),
		'uses_context'            => ['postId'],
		'get_value_callback' => function( $source_args, $block_instance ) {
			return get_field( 'team_description',
				$block_instance->context['postId']);
		},
	) );
}



add_action( 'init', __NAMESPACE__ . '\register_binding_sources' );
