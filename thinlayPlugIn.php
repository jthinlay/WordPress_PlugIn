<?php
/*
Plugin Name: thinlayPlugIn
Plugin URI: https://www.jtwebarchitect.com
Description: Display Youtube sub button and count
Version: 1.0.0
Author: Jampa Thinlay 
Author URI: http://www.jtwebarchitect.com
*/

// Exit if accessed directly 
if(!defined('ABSPATH')){
    exit;
}

//Load scripts
require_once(plugin_dir_path(__FILE__). '/includes/thinlayPlugIn-script.php');

//Load class
require_once(plugin_dir_path(__FILE__). '/includes/thinlayPlugIn-class.php');


// register Widget
function register_thinlayPlugIn(){
    register_widget('ThinlayPlugIn_Widget');
}

//Hook in function
add_action('widgets_init', 'register_thinlayPlugIn');