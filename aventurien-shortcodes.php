<?php
/*
Plugin Name: Aventurien Shortcodes
Plugin URI: https://wordpress.org/plugins/aventurien-shortcodes/
Description: This plugin allows you to display style blocks in your posts using shortcodes.
Version: 1.00
Author: Klemens
Author URI: https://profiles.wordpress.org/Klemens#content-plugins
Text Domain: aventurien-shortcodes
*/ 

include 'template.class.php';

require_once('inc/aventurien-install.php'); 
require_once('inc/aventurien-templates.php'); 

register_deactivation_hook(__FILE__, 'aventurien_uninstall');
register_activation_hook(__FILE__, 'aventurien_install');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 'aventurien-shortcodes' Parchment Shortcode
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_shortcode ('aventurien-parchment', 'aventurien_parchment_shortcode');

function aventurien_parchment_shortcode($atts, $content) {

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	extract(shortcode_atts(array(
		'title' => __('Parchment', 'parchment'),
		'name' => get_the_title(),
        'style' => 'default'
	), $atts));

	return aventurien_parchment_html($name, $content);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 'aventurien-shortcodes' Cover Shortcode
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_shortcode ('aventurien-cover', 'aventurien_cover_shortcode');

function aventurien_cover_shortcode($atts, $content) {

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	extract(shortcode_atts(array(
		'title' => __('Cover', 'cover'),
        'image' => get_the_post_thumbnail_url(),
        'style' => 'default'
	), $atts));

	return aventurien_cover_html($image);
}

?>