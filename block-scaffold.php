<?php
/**
 * Plugin Name:     Block Scaffold
 * Plugin URI:      https://github.com/carrieforde/block-scaffold.git
 * Description:     A simple plugin scaffold for a WP Content Block.
 * Author:          carrieforde
 * Author URI:      https://carrieforde.com
 * Text Domain:     block-scaffold
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Block_Scaffold
 */

// Your code starts here.
add_action( 'init', 'block_scaffold_init' );
/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function block_scaffold_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	$index_js = 'dist/block-scaffold-block.js';
	wp_register_script(
		'block-scaffold-editor',
		plugins_url( $index_js, __FILE__ ),
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		),
		'1.0.0',
		false
	);

	register_block_type(
		'block-scaffold/block-scaffold',
		array(
			'editor_script' => 'block-scaffold-editor',
		)
	);
}

// add_action( 'wp_enqueue_scripts', 'block_scaffold_enqueue_scripts' );
/**
 *  Enqueue front end scripts.
 */
function block_scaffold_enqueue_scripts() {
	if ( has_block( 'block-scaffold/block-scaffold' ) ) {

		$index_js = 'dist/block-scaffold-component.js';

		wp_enqueue_script(
			'block-scaffold-component',
			plugins_url( $index_js, __FILE__ ),
			array(),
			'1.0.0',
			false
		);
	}
}
