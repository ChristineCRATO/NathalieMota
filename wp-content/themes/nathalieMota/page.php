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
 *
 */
?>

<?php get_header(); ?>

<!-- Start the Loop -->
<div id="wrap">
	<section id="content">
			<?php if (have_posts()) : while (have_posts()):the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
			<?php endwhile; endif; ?>
	</section>
</div>

<?php get_footer(); ?>