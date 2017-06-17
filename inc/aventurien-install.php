<?php
    
////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_action('init', 'aventurien_shortcodes_css_and_js');

function aventurien_shortcodes_css_and_js() {
    wp_register_style('aventurien_shortcodes_css', plugins_url('aventurien-shortcodes.css', __FILE__));
    wp_enqueue_style('aventurien_shortcodes_css');
    wp_enqueue_style('dashicons');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>