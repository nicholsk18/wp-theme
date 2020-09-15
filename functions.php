<?php

function willcannon_theme_support() {
    // This adds dynamic title tag
    add_theme_support('title-tag');
    add_theme_support('custom-logo');

}

add_action('after_setup_theme', 'willcannon_theme_support');

function willcannon_menus() {
    $locations = array(
        'primary' => 'Desktop Primary Top Sidebar',
        'footer' => 'Footer Menu Items'
    );

    register_nav_menus($locations);
}

add_action('init', 'willcannon_menus');

function willcannon_register_styles() {
    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style('willcannon-bootstrap', "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css", array(), '4.5.2', 'all');
    wp_enqueue_style('willcannon-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css", array(), '4.7.0', 'all');
    wp_enqueue_style('willcannon-font', "https://fonts.googleapis.com/css?family=Courgette&display=swap", array(), '1.0', 'all');
    wp_enqueue_style('willcannon-style', get_template_directory_uri() . "/style.min.css", array('willcannon-bootstrap', 'willcannon-font'), $version, 'all');
}

add_action( 'wp_enqueue_scripts', 'willcannon_register_styles' );

function willcannon_register_scripts() {

    wp_enqueue_script('willcannon-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true);
    wp_enqueue_script('willcannon-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js', array(), '4.5.2', true);
    wp_enqueue_script('willcannon-script', get_template_directory_uri() . '/assets/js/index.js', array(), '$version', true);
}

add_action( 'wp_enqueue_scripts', 'willcannon_register_scripts' );

