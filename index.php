<?php
/**
 * Plugin Name: SC To Top
 * Plugin URI: https://profiles.wordpress.org/sergiuscosta
 * Description: A button that allows the users to reach the top of the page
 * Version: 2.2
 * Author: Sergio Costa
 * Author URI: http://republicainterativa.com.br/
 * Text Domain: sctotop
 * License: GPLv2 or later
 */

require_once 'functions/options.php';

add_action( 'wp_enqueue_scripts', 'sctotop_files' );
function sctotop_files(){ 
    wp_enqueue_script( 'sc-to-top', plugins_url( 'js/sc-to-top.js', __FILE__ ), array( 'jquery' ), null, true );
    wp_enqueue_style( 'sc-to-top', plugins_url( 'css/sc-to-top.css', __FILE__ ), array(), null, 'all' );
    wp_enqueue_style('sc_fontello', plugins_url('css/fontello.css',__FILE__), array(), null, 'all' );
}


add_action( 'admin_enqueue_scripts', 'my_enqueue' );
function my_enqueue($hook) {
    global $page_hook_suffix;
    if( $hook != $page_hook_suffix )
        return;
    wp_register_style('sc_fontello', plugins_url('css/fontello.css',__FILE__));
    wp_enqueue_style('sc_fontello');

    wp_register_style('sc_bootstrap', plugins_url('css/sc-bootstrap.css',__FILE__));
    wp_enqueue_style('sc_bootstrap');

    wp_register_style('sc_style', plugins_url('css/sc-admin.css',__FILE__));
    wp_enqueue_style('sc_style');

    wp_register_script('sc_script', plugins_url('js/sc-admin.js',__FILE__));
    wp_enqueue_script('sc_script');
}

add_action( 'wp_footer', 'sctotop_btn', 9999 );
function sctotop_btn()
{ ?>
    <style>
        .sc-to-top {
            background-color: <?php echo get_option('sc_color'); ?>;
            color: <?php echo get_option( 'sc_icon_color' ); ?>;
        } <?php
        if ( get_option( 'sc_css' ) ) {
            echo get_option( 'sc_css' );
        } ?>
    </style> <?php
    if (get_option('sc_icon')) { ?>
        <a href="#" class="sc-to-top" title="<?php echo get_option( 'sc_titleattr' ); ?>">
            <i class="<?php echo get_option( 'sc_icon' ); ?>"></i>
        </a> <?php
    } else { ?>
        <a href="#" class="sc-to-top no-icon"></a> <?php
    }
}
?>