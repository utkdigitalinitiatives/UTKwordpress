<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage UT-TheHill
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: <strong>%s</strong>', 'utthehill' ), get_search_query() ); ?></h1>
			</header>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php utthehill_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div>
<?php get_footer(); ?>