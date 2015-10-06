<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package McClelland Insurance
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<div class="content-box faq">
				<nav class="clearfix page-heading">
					<h2><a href="http://mcclellandinsurance.com/news">News</a></h2>
				</nav>
				<div class="faq-archive_container clearfix">
					<div class="left-sidebar">
						<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get">
						        <input class="inlineSearch" type="text" name="s" placeholder="Search..." onblur="if (this.value == '') {this.value = 'Search';}" onfocus="if (this.value == 'Search') {this.value = '';}" />
						</form>
						<h2>Categories</h2>
						<?php 
							$args = array(
								'title_li' => null
								);
						wp_list_categories( $args ); ?>
						<h2>Tags</h2>
						<ul class="tags">
							<?php 
								$tags = get_tags();
								if ($tags) {
								foreach ($tags as $tag) {
								echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a> </li> ';
									}
								}
							 ?>
						</ul>
					</div>
					<div class="faqs">
						<div class="next-posts-links">
							<span class="nav-next"><?php previous_posts_link('<i class="fa fa-arrow-left"></i> Newer Posts') ?></span>
							<span class="nav-previous"><?php next_posts_link('Older Posts <i class="fa fa-arrow-right"></i>') ?></span>
						</div>
						    <?php while ( have_posts() ) : the_post(); ?>

						        <article id="post-<?php the_ID(); ?>" <?php post_class('archive-list'); ?>>
						            <a href=" <?php the_permalink(); ?> ">
							                <h2><?php the_title(); ?></h2>
						            </a>
						            <?php if( has_post_thumbnail() ){
						            	the_post_thumbnail();
						            	} ?>
						            <?php the_excerpt(); ?>

						        </article><!-- #post-<?php the_ID(); ?> -->

						    <?php endwhile; ?>
						    <div class="next-posts-links">
						    	<span class="nav-next"><?php previous_posts_link('<i class="fa fa-arrow-left"></i> Newer Posts') ?></span>
						    	<span class="nav-previous"><?php next_posts_link('Older Posts <i class="fa fa-arrow-right"></i>') ?></span>
						    </div>
					</div>
					<div class="right-sidebar">
						<h2>Recent Posts</h2>
						<?php $recentPosts = new WP_Query(
							array(
								'posts_per_page' => 5,
								'post_type' => 'post',
								'order' => 'DESC'
								)
						); ?>

						<?php if ($recentPosts->have_posts() ): ?>
							<?php while ($recentPosts ->have_posts()): $recentPosts->the_post(); ?>
								<h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php endwhile ?>
						<?php wp_reset_postdata(); ?>
					<?php endif ?>
					</div>
					
				</div>
				<div id="content-cursor" data-post-parent="news"></div>
			</div> <!-- /.content-box -->
		<?php else : ?>

			 <?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
