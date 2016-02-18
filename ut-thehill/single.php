<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage UT-TheHill
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>


  
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php utthehill_post_nav(); ?>
				<?php comments_template(); ?>

			<?php endwhile; ?>
		</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>