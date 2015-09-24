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
					<div class="left-sidebar">
						<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get">
						        <input class="inlineSearch" type="text" name="s" placeholder="Search FAQ..." onblur="if (this.value == '') {this.value = 'Search FAQ';}" onfocus="if (this.value == 'Search FAQ') {this.value = '';}" />
						        <input type="hidden" name="post_type" value="faq" />
						</form>
						<h2>Categories</h2>
						<?php 
							$faq = get_object_taxonomies('faq');

							if($faq)
							{
								foreach($faq as $tax)
								{
									$args = array(
											'orderby' => 'name',
											'show_count' => 0,
											'pad_counts' => 0,
											'heirarchical' => 1,
											'taxonomy' => $tax,
											'title_li' => ''
										);
									wp_list_categories( $args );
								}
							}
						 ?>
					</div>
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
					<div class="right-sidebar">
						<h2>Recent FAQs</h2>
						<?php $recentFAQ = new WP_Query(
							array(
								'posts_per_page' => 3,
								'post_type' => 'faq',
								'order' => 'ASC'
								)
						); ?>

						<?php if ($recentFAQ->have_posts() ): ?>
							<?php while ($recentFAQ ->have_posts()): $recentFAQ->the_post(); ?>
								<h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php endwhile ?>
					<?php endif ?>
					</div>
					
				</div>
			</div> <!-- /.content-box -->
		<?php else : ?>

			 <?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
