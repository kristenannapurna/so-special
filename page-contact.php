<?php
/**
 * Template Name: Contact Us
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package McClelland Insurance
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main content-box" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<nav class="clearfix page-heading">
					<h2 class="entry-title">
						<span class='desktop'><?=getMcClellandPageParentName($post)?></span>
						<span class='mobile'><?=the_title()?>
						</h2>
						<div id="desktop-sub-menu">
							<ul class="menu">
								<li class="current_page_item"><a href="#brampton"><span>Brampton</span></a></li>
								<li><a href="#etobicoke"><span>Etobicoke</span></a></li>	
							</ul>
						</div>
					</nav><!-- .entry-header -->

					<div class="entry-content clearfix">
						<section id="brampton">
							<div class="branch-address">
								<h2>Brampton Branch</h2>
								<address>
									McClelland Insurance Brokers Limited</br>
									350 Rutherford Road South </br>
									Plaza 1, Suite 7 </br>
									Brampton, Ontario </br>
									L6W 3P6
								</address>
								<div class="phone">
									<p>Phone</p>
									<p>905-451-0755</p>
								</div>
								<div class="email">
									<p>Email</p>
									<a href="mailto:brampton@mcclellandinsurance.biz">brampton@mcclellandinsurance.biz</a>
								</div>
								
							</div>
							<div class="branch-map">
								
							</div>
						</section>
						<section id="etobicoke">
							<div class="branch-address">
								<h2>Etobicoke Branch</h2>
								<address>
									McClelland Insurance Brokers Limited</br>
									2842 Bloor St. West </br>
									Etobicoke, Ontario </br>
									M8X 1B1 </br>
								</address>
								<div class="phone">
									<p>Phone</p>
									<p>416-237-0436</p>
								</div>
								<div class="email">
									<p>Email</p>
									<a href="mailto:etobicoke@mcclellandinsurance.biz">etobicoke@mcclellandinsurance.biz</a>
								</div>
							</div>
							<div class="branch-map">
								
							</div>
						</section>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->
				<div id="content-cursor" data-post-parent="<?echo getMcClellandMenuName($post)?>"></div>


				<?php
					// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_footer(); ?>
