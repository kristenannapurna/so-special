<?php

get_header(); ?>

	<div id="primary" class="content-area home">
		<main id="main" class="site-main" role="main">
			<div class="main-gallery">
				<?php while( has_sub_field('gallery_image') ): ?>
					<div class="gallery-cell"><img src="<?php the_sub_field('image') ?>" alt=""></div>
				<?php endwhile ?>
			</div>
			

			<div id="content" class="site-content mobile-main content-box">
					<?php wp_nav_menu( array( 'theme_location' => 'services', 'menu_id' => 'services' ) ); ?>				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>


