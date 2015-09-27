<?php
/*
 * Template Name: Our Team
 */

/**

 * The template for displaying faq archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package McClelland Insurance
 */

get_header(); 

$employeeQuery = new WP_Query([
	'posts_per_page'=>-1,
	'post_type'=>'employee',
	'order'=>'ASC'
]);
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( $employeeQuery->have_posts() ) : ?>

			<div class="content-box our-team">
				<nav class="clearfix page-heading">
					<h2>Our Team</h2>
				</nav>

				<div class="wrapper clearfix">
					<div class="entry-content grid-12 pad-2">
						<div class="grid-12">
							<?php $num = 0; while( $employeeQuery->have_posts() ): $employeeQuery->the_post();$num++ ?>
								<div class="grid-4 s-grid-12 pad-2 employee">
									<div class="employeeImageHolder">
										<?php echo the_post_thumbnail([150,150]);?>
									</div>
									<p class="employeeLine">____________________</p>
									<h4><?=get_the_title($post->ID)?></h4>
									<p><?=get_post_meta($post->ID, 'position', true)?></p>
									<a href="mailto:<?=get_post_meta($post->ID, 'email_address', true)?>">
										<img src="<?php bloginfo('template_directory') ?>/img/icon-contact.png"/>
									</a>
									<?$linkedIn = get_post_meta($post->ID, 'linkedin', true);?>
									<?if($linkedIn != ''):?>
										<a href="<?=$linkedIn?>">
											<img src="<?php bloginfo('template_directory') ?>/img/linkedin.png"/>
										</a>
									<?endif?>
									<p class="employeeLine">____________________</p>
									<p>
										<?=the_content()?>
									</p>
								</div>
								<?if($num % 3 == 0):?></div><div class="grid-12"><?endif?>
							<?endwhile?>
						</div>

						<? wp_reset_postdata()?>
					</div>
				</div>
			</div> <!-- /.content-box -->
		<?php else : ?>

			 <?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
