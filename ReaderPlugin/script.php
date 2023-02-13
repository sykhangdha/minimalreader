<?php
/*
Plugin Name: Manga Reader
Description: A plugin to display manga in WordPress posts. Super basic manga reader that uses arrow keys to navigate
Version: 1.0
Author: Ha Sky
*/

function manga_reader_scripts() {
    wp_enqueue_script( 'manga-reader', plugin_dir_url( __FILE__ ) . 'manga-reader.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'manga_reader_scripts' );

function manga_reader_shortcode( $atts, $content = null ) {
    $output = '<div class="manga-reader">';

    // Split the content into an array of image links
    $images = explode( ' ', $content );

    // Loop through the image links and add them to the output
    foreach ( $images as $image ) {
        $output .= '<img src="' . $image . '" class="manga-page" />';
    }

    $output .= '</div>';

    return $output;
}
add_shortcode( 'manga', 'manga_reader_shortcode' );

