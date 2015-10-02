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
			<span class='desktop'><?=getMcClellandPageParentName($post)?></span>
			<span class='mobile'><?=the_title()?>
		</h2>
		<?php $submenu = wp_nav_menu( [
			"menu"=> getMcClellandMenuName($post),
    		"submenu" => getMcClellandMenuName($post, false), 
			"link_before"=>"<span>",
			"link_after"=>"</span>",
			"echo"=>0
		]); ?>
		<?if($submenu):?>
			<div id="desktop-sub-menu">
				<?=$submenu?>
			</div>
			<div class="entry-submenu-holder">
				<a href="#" class="entry-submenu-button">&#9776;</a>
				<div class="entry-submenu <?echo getMcClellandMenuName($post)?>">
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

