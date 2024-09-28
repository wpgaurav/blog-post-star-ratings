<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://gauravtiwari.org
 * @since             1.0.0
 * @package           Blog_Post_Star_Ratings
 *
 * @wordpress-plugin
 * Plugin Name:       Blog Post Star Ratings
 * Plugin URI:        https://gauravtiwari.org/blog-post-star-ratings/
 * Description:       Use a Simple Shortcode to show star-ratings with your blog posts. Manipulate ratings, counts with ease. Get better CTR and Search Engine Rankings.
 * Version:           1.0.0
 * Author:            Gaurav Tiwari
 * Author URI:        https://gauravtiwari.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dynamic-month-year-into-posts
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
define( 'BLOG_POST_STAR_RATINGS_VERSION', '1.0.0' );

function rated_shortcode($attr){
 
    $args = shortcode_atts( array(
     
            'stars' => '5',
            'by' => '2'
 
        ), $attr );
 
    $output = '<script type="application/ld+json">{
    "@context": "https://schema.org/",
    "@type": "CreativeWorkSeries",
    "name": "'. get_the_title() .'",
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "'.$args['stars'].'","bestRating":"5","ratingCount": "'.$args['by'].'"}}</script>';
    return $output;
 
}
 
add_shortcode( 'rated' , 'rated_shortcode' );