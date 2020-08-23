<?php
/**
 * The template for displaying a static Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Estera
 */

get_header(); ?>

<div class="container">
	<div class="wrapper">
		<main id="primary" class="site-main">

		<?php /*do_action('estera_action_recent_products_section');
		do_action('estera_action_recent_posts_section');
		do_action('estera_action_front_page_banner'); */
			
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
