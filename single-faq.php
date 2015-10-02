<?php
/**
 * The template for displaying all single faq posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package McClelland Insurance
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<div class="content-box faq">
				<nav class="clearfix page-heading">
					<h2><a href="http://mcclellandinsurance.com/faq">FAQ</a></h2>
					<p><a href="#">Add A Question</a></p>
				</nav>
				<div class="faq-archive_container clearfix">
		
					<?include('template-parts/archive-faq/categories.php');?>
					<div class="faqs">
						<?php while( have_posts() ): the_post(); ?>
							<div class="faq-single-post">
								<h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php the_content(); ?></p>
							</div>
						<?php endwhile ?>
						<div class="nav-previous"><?php next_posts_link('Older FAQs') ?></div>
						<div class="nav-next"><?php previous_posts_link('Newer FAQs') ?></div>
					</div>
					<?include('template-parts/archive-faq/recent-faq.php');?>
				</div>
			</div> <!-- /.content-box -->
		<?php else : ?>

			 <?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
