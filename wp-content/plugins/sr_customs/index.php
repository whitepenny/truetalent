<?php
/*
Plugin Name: Custom Posts
Description: Custom Post Types
Author: [whitepenny]
Author URI: http://www.whitepenny.com
*/



// add_action('init', 'sr_slider_cpt');

// function sr_slider_cpt() {
//   register_post_type('slide', array(
//       'labels' => array(
//         'name' => 'Slides',
//         'singular_name' => 'Slide',
//         ),
//       'description' => 'Slider Slides',
//       'public' => true,
//       'supports' => array('title', 'editor', 'thumbnail',),
//       'capability_type' => 'post',
//     ));
// }

add_action( 'init', 'sr_member_cpt' );

function sr_member_cpt() {

    register_post_type( 'member', array(
      'labels' => array(
        'name' => 'Members',
        'singular_name' => 'Member',
       ),
      'description' => 'Members',
      'has_archive' => false,
      'public' => true,
      'menu_position' => 20,
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'show_in_nav_menus' => true,
      'capability_type' => 'page',
    ));
}

add_action( 'init', 'sr_event_cpt' );

function sr_event_cpt() {

    register_post_type( 'event', array(
      'labels' => array(
        'name' => 'Events',
        'singular_name' => 'Event',
       ),
      'description' => 'Events',
      'has_archive' => false,
      'public' => true,
      'menu_position' => 20,
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'show_in_nav_menus' => true,
      'capability_type' => 'page',
    ));
}

add_action('init', 'sr_news_cpt');

function sr_news_cpt() {
  register_post_type('newsposts', array(
      'labels' => array(
        'name' => 'News Posts',
        'singular_name' => 'News Post',
        ),
      'description' => 'News Posts',
      'public' => true,
      'supports' => array('title', 'editor', 'thumbnail',),
      'capability_type' => 'post',
      'has_archive' => true
    ));
}
