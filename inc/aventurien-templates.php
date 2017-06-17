<?php

function aventurien_parchment_html($name, $content) {

    $path_local = plugin_dir_path(__FILE__);
    $path_url = plugins_url() . "/aventurien-shortcodes";

    $output = "";
    $template = new AventurienShortcodes\Template($path_local . "../tpl/parchment.html");
    $template->set("Name", $name);
    $template->set("Content", $content);
    $output .= $template->output();

	return $output;
}

function aventurien_cover_html($image) {

    $path_local = plugin_dir_path(__FILE__);
    $path_url = plugins_url() . "/aventurien-shortcodes";

    $output = "";
    $template = new AventurienShortcodes\Template($path_local . "../tpl/cover.html");
    $template->set("Image", $image);
    $output .= $template->output();

	return $output;
}


?>