<?php 
/*
Plugin Name: Force Login Bypass
Plugin URI:  https://github.com/
Description: Add pages to allow viewing if custom field open-post = true
Version:     1.0
Author:      ALT Lab
Author URI:  http://altlab.vcu.edu
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset

*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


//exclude page for force login 
/**
 * Bypass Force Login to allow for exceptions.
 *
 * @param bool $bypass Whether to disable Force Login. Default false.
 * @return bool
 */
function onl_forcelogin_bypass( $bypass ) {
   global $post;
   $status = get_post_meta( $post->ID, 'open-post', true);
//|| is_home() || is_front_page()
  if ($status === 'true' ) {
    $bypass = true;
  }
  return $bypass;
}
add_filter( 'v_forcelogin_bypass', 'onl_forcelogin_bypass' );

add_filter('acf/settings/remove_wp_meta_box', '__return_false');//show custom fields just in case they're hidden by acf


