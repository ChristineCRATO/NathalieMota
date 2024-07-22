<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Nathalie Mota
 * @since Nathalie MOTA 1.0
 * @author GitPixel
 */

get_header();

if (have_posts()) {
    while(have_posts()):the_post();
        the_title();
        the_content();
endwhile;
}

get_template_part('/templates/single-photo');

get_footer();