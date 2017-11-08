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

function aventurien_list_html($atts) {

    $path_local = plugin_dir_path(__FILE__);
    $path_url = plugins_url() . "/aventurien-shortcodes";

    $args = array(
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_parent' => $atts['id'],
        'orderby' => 'menu_order',
        'order' => $atts['order'],
        'nopaging' => true,
    );

    $args = apply_filters('aventurien_list_query', $args, $atts);

    $items = "";
    $pages = get_posts($args);
    foreach ($pages as $post) {
        $url = esc_url(get_permalink($post->ID));
        $img = get_the_post_thumbnail_url($post->ID, 'full');
        // $img = preg_replace( '/(width|height)="\d*"\s/', "", $img);

        $item_template = new AventurienShortcodes\Template($path_local . "../tpl/listitem.html");
        $item_template->setObject($post);
        $item_template->set("URL", $url);
        $item_template->set("Thumbnail", $img);
        $item_template->set("Size", $atts['size']);
        $items .= $item_template->output();
    }

    $output = "";
    $template = new AventurienShortcodes\Template($path_local . "../tpl/list.html");
    $template->set("ID", $atts['id']);
    $template->set("Order", $atts['order']);
    $template->set("Title", $atts['title']);
    $template->set("Items", $items);
    $output .= $template->output();

	return $output;
}

function aventurien_date_html($atts) {
    
    $path_local = plugin_dir_path(__FILE__);
    $path_url = plugins_url() . "/aventurien-shortcodes";

    $day = "1";
    $month = "PRA";
    $year = "1014";
    preg_match_all('/(\d+)\. (\w+) (\d+) [Bb][Ff]/', $atts['date'], $matches);
    $count = count($matches[0]);
    if ($count > 0)
    {
        $day = $matches[1][0];
        $month = $matches[2][0];
        $year = $matches[3][0];
    }

    $output = "";
    $template = new AventurienShortcodes\Template($path_local . "../tpl/date.html");
    $template->set("Day", $day);
    $template->set("Month", $month);
    $template->set("Year", $year);
    $template->set("Location", $atts['location']);
    $template->set("Info", $atts['info']);
    $output .= $template->output();

	return $output;
}

?>