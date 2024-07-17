<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Nathalie Mota
 * @since Twenty Twenty-One 1.0
 * @author GitPixel
 */

get_header();

/* Start the Loop */
if (have_posts()){
	 while (have_posts()):the_post();
		the_title();
		the_content();
endwhile;
}

get_footer();