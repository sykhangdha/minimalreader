<?php
/*
Plugin Name: Manga Reader
Description: A plugin to display manga in WordPress posts. Super basic manga reader that uses arrow keys to navigate
Version: 1.0
Author: Ha Sky
*/

function manga_reader_scripts() {
  wp_enqueue_script( 'manga-reader-script', plugins_url( 'manga-reader.js', __FILE__ ), array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'manga_reader_scripts' );

function manga_reader_shortcode( $atts ) {
  extract( shortcode_atts( array(
    'images' => ''
  ), $atts ) );

  $images = explode( ',', $images );
  $output = '<div class="manga-reader">';
  foreach ( $images as $image ) {
    $output .= '<img src="' . $image . '" class="manga-page" />';
  }
  $output .= '</div>';

  return $output;
}
add_shortcode( 'manga', 'manga_reader_shortcode' );


