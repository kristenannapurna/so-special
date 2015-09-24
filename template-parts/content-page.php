<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package McClelland Insurance
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<nav class="clearfix page-heading">
		<h2 class="entry-title">
			<?if(empty($post->post_parent)):?>
				<?=get_the_title($post->ID)?>
			<?else:?>
				<?=get_the_title($post->post_parent)?><span>></span><?=get_the_title($post->ID)?>
			<?endif?>
		</h2>
		<?php $submenu = wp_nav_menu( [
			"menu"=> empty( $post->post_parent ) ? strtolower(get_the_title( $post->ID )) : strtolower(get_the_title( $post->post_parent ) ), 
    		"submenu" => empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent ) ,
			"depth"=>1,
			"echo"=>0
		]); ?>
		<?if($submenu):?>
			<div class="entry-submenu-holder">
				<a href="#" class="entry-submenu-button">&#9776;</a>
				<div class="entry-submenu">
					<?=$submenu?>
				</div>
			</div>
		<?endif?>
	</nav><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mcclellandinsurance' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'mcclellandinsurance' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

