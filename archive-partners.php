<?php
/*
 * Template Name: Our Partners
 */

/**

 * The template for displaying our partners.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package McClelland Insurance
 */

get_header(); 

$employeeQuery = new WP_Query([
	'posts_per_page'=>-1,
	'post_type'=>'partner',
	'order'=>'ASC'
]);
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( $employeeQuery->have_posts() ) : ?>

			<div class="content-box our-team">
				<nav class="clearfix page-heading">
					<h2>Our Partners</h2>
				</nav>

				<div class="wrapper clearfix">
					<div class="entry-content employee-content grid-12 pad-2">
						<div class="grid-12">
							<?php $num = 0; while( $employeeQuery->have_posts() ): $employeeQuery->the_post();$num++ ?>
								<div class="grid-4 s-grid-12 pad-2 employeeBox">
									<a href=" <?php the_field('web_link') ?>">
										<div class="employeeImageHolder">
											<?php echo the_post_thumbnail();?>
										</div>
									
										<p class="employeeLine">____________________</p><h4><?=get_the_title($post->ID)?></h4>
										<p><?=get_post_meta($post->ID, 'position', true)?></p>
										<p class="employeeLine">____________________</p>
									</a>
									<?=the_content()?>
								</div>
								<?if($num % 3 == 0):?></div><div class="grid-12"><?endif?>
							<?endwhile?>
						</div>

						<? wp_reset_postdata()?>
					</div>
				</div>
				<div id="content-cursor" data-post-parent="<?echo getMcClellandMenuName($post)?>"></div>
			</div> <!-- /.content-box -->
		<?php else : ?>

			 <?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
