<?php
/**
 * Plugin Name: wpscript blocks
 * Plugin URI: 
 * Description: This plugin creates a simple Gutenberg block
 * Version: 1.0.0
 * Author: CR
 * Author URI: 
 * License: GPL2
 * License URI:
 * Text Domain: wpscript-block
 * Domain Path: /languages
 *
 * @package wpscript block
 */

function wpscript_blocks_gutenberg_custom_blocks() {
   // Block Editor Script.
   wp_register_script(
      'wpscript-blocks-editor-js',
      plugins_url('build/index.js', $plugin=__FILE__),
      $deps=array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
      $ver_timestamp= filemtime( plugin_dir_path( __FILE__ )  . 'build/index.js' ),
      true
   );
   // Block front end styles.
   wp_register_style(
      'wpscript-blocks-front-end-styles',
      plugins_url('src/style.css', $plugin=__FILE__),
      $deps=array( 'wp-edit-blocks' ),
      $ver_timestamp= filemtime( plugin_dir_path( __FILE__ )  . 'src/style.css' )
   );
   // Block editor styles.
   wp_register_style(
      'wpscript-blocks-editor-styles',
      plugins_url('src/editor.css', $plugin=__FILE__),
      $deps=array( 'wp-edit-blocks' ),
      $ver_timestamp= filemtime( plugin_dir_path( __FILE__ )  . 'src/editor.css' )
   );
   //
   register_block_type(
      'wpscript-blocks/test-block',
      $deps=array(
         'style'         => 'wpscript-blocks-front-end-styles',
         // dashboard
         'editor_style'  => 'wpscript-blocks-editor-styles',
         'editor_script' => 'wpscript-blocks-editor-js',
      )
   );

}

add_action( 'init', 'wpscript_blocks_gutenberg_custom_blocks' );
?>