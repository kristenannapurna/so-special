<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package McClelland Insurance
 */

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main content-box" role="main">

		<?php if ( have_posts() ) : ?>

			<nav class=" clearfix page-heading">
				<h2 class="page-title"><?php printf( esc_html__( 'Search Results for:%s', 'mcclellandinsurance' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				<div class="next-search-links">
					<span class="nav-previous"><?php previous_posts_link('<i class="fa fa-arrow-left"></i> Previous') ?></span>
					<span class="nav-next"><?php next_posts_link('Next <i class="fa fa-arrow-right"></i>') ?></span>
				</div>
			</nav><!-- .page-header -->
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>

			<?php endwhile; ?>

			<div class="next-posts-links">
				<span class="nav-previous"><?php previous_posts_link('<i class="fa fa-arrow-left"></i> Previous') ?></span>
				<span class="nav-next"><?php next_posts_link('Next <i class="fa fa-arrow-right"></i>') ?></span>
			</div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
