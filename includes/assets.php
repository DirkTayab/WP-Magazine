<?php

function magazine_assets() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style/main.css', microtime());
    wp_enqueue_script('main-style', get_template_directory_uri() . '/script/script.js',[], microtime(), true);
}

add_action('wp_enqueue_scripts', 'magazine_assets');