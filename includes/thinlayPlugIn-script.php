<?php
// Add Scripts

function thinlay_add_scripts(){
    // Add Main CSS
    wp_enqueue_style('thinlay-main-style', plugins_url(). '/thinlayPlugIn/css/style.css');

    // Add Main JS
    wp_enqueue_script('thinlay-main-script', plugins_url(). '/thinlayPlugIn/js/main.js');

    //Add Google Script
    wp_register_script('google', 'https://apis.google.com/js/platform.js');
    wp_enqueue_script('google');
}

add_action('wp_enqueue_scripts', 'thinlay_add_scripts');
