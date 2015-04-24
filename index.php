<?php
/**
 * Plugin Name: SC To Top
 * Plugin URI: https://profiles.wordpress.org/sergiuscosta
 * Description: A button that allows the users to reach the top of the page
 * Version: 1.0.1
 * Author: Sergio Costa
 * Author URI: http://sergiocosta.net.br/
 * Text Domain: sctotop
 * License: GPLv2 or later
 */

add_action( 'wp_enqueue_scripts', 'sctotop_files' );
function sctotop_files(){ 
    wp_enqueue_script( 'sc-to-top', plugins_url( 'js/sc-to-top.js', __FILE__ ), array( 'jquery' ), null, true );
    wp_enqueue_style( 'sc-to-top', plugins_url( 'css/sc-to-top.css', __FILE__ ), array(), null, 'all' );
}

add_action( 'wp_footer', 'sctotop_btn', 9999 );
function sctotop_btn(){
	echo '<a href="#" class="sc-to-top"></a>';
}

?>