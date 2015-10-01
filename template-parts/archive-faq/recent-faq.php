<div class="right-sidebar">
	<h2>Recent FAQs</h2>
	<?php 
		$recentFAQ = new WP_Query([
			'posts_per_page' => 3,
			'post_type' => 'faq',
			'order' => 'ASC'
		]);
	?>
	<?php if ($recentFAQ->have_posts() ): ?>
		<?php while ($recentFAQ ->have_posts()): $recentFAQ->the_post(); ?>
			<h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php endwhile; wp_reset_postdata(); ?>
	<?php endif ?>
</div>