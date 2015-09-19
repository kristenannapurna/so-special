<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package McClelland Insurance
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info grid-12 pad-2">
			<div class="grid-3 footerLinks">
				<h5>Services</h5>
				<?php wp_nav_menu([
					"menu"=>"services"
				]); ?>
			</div>
			<div class="grid-3 footerLinks">
				<h5>Insurance</h5>
				<div class="innerFooterLinks">
					<?php wp_nav_menu([
						"menu"=>"personal",
						"depth"=>2
					]);?>
				</div>
				<div class="innerFooterLinks">
					<?php wp_nav_menu([
						"menu"=>"commercial",
						"depth"=>2
					]);?>
				</div>
			</div>
			<div class="grid-3 footerLinks">
				<h5>Info</h5>
				<?php wp_nav_menu([
					"menu"=>"info"
				]); ?>
			</div>
			<div class="grid-3 footerInfo">
				<p class="grid-6 offset-6">Join our Newsletter</p>
				<hr class="grid-3 offset-8"/>
				<p class="grid-6 offset-6">Brampton Office</p>
				<p class="grid-6 offset-6"><a href="tel:+19054510755">(905) 451-0755</a></p>
				<p class="grid-6 offset-6">Etobicoke Office</p>
				<p class="grid-6 offset-6"><a href="tel:+14162370436">(416) 237-0436</a></p>
				<hr class="grid-3 offset-8"/>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
