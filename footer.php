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
		<div class="secondary-nav">
			<nav id="secondary-nav" class="secondary-navigation" role="navigation">
				<div class="wrapper clearfix">
					<ul class="menu clearfix">
						<li class="personal">
							<a class='menu-item' href="http://localhost:8888/mcclellandinsurance/personal">
								<span class='menu-icon'></span>
								<span class='menu-text'>Personal</span>
							</a>
						</li>
						<li class="commercial">
							<a href="http://localhost:8888/mcclellandinsurance/commercial">
								<span class='menu-icon'></span>
								<span class='menu-text'>Commercial</span>
							</a>
						</li>
					</ul>
					<div class="info-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'info', 'menu_id' => 'info', 'depth'=>1 ) ); ?>
					</div>
				</div>
			</nav>
		</div> <!-- /secondary-nav -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info grid-12 pad-2">
			<div class="grid-3 footerLinks">
				<h4>Services</h4>
				<?php wp_nav_menu([
					"menu"=>"services"
				]); ?>
			</div>
			<div class="grid-3 footerLinks">
				<h4>Insurance</h4>
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
				<h4>Info</h4>
				<?php wp_nav_menu([
					"menu"=>"info"
				]); ?>
			</div>
			<div class="grid-3 s-grid-12 footerInfo">
				<div class="icon-contact"></div>
				<div class="grid-12"></div>
				<p class="grid-6 offset-6 s-offset-0 s-grid-12">Join our Newsletter</p>
				<hr class="grid-2 offset-10 s-offset-0 s-grid-2"/>
				<p class="grid-6 offset-6 s-offset-0 s-grid-12">Brampton Office</p>
				<p class="grid-6 offset-6 s-offset-0 s-grid-12"><a href="tel:+19054510755">(905) 451-0755</a></p>
				<p class="grid-6 offset-6 s-offset-0 s-grid-12">Etobicoke Office</p>
				<p class="grid-6 offset-6 s-offset-0 s-grid-12"><a href="tel:+14162370436">(416) 237-0436</a></p>
				<hr class="grid-2 offset-10 s-offset-0 s-grid-2"/>
				<div class="icon-social-container s-grid-12">
					<a href="http://twitter.com/mcclellandins" target="_blank"><div class="icon-social icon-social-twitter"></div></a>
					<a href="http://facebook.com/mcclellandinsurance" target="_blank"><div class="icon-social icon-social-facebook"></div></a>
					<a href="http://plus.google.com/115046320952444036268" target="_blank"><div class="icon-social icon-social-google"></div></a>
					<a href="http://linkedin.com/company/mcclelland-insurance" target="_blank"><div class="icon-social icon-social-linkedin"></div></a>
				</div>
			</div>
		</div><!-- .site-info -->
		<div class="textCenter">
			McClelland Insurance Brokers Limited is an independent insurance brokerage operating in Ontario since 1971. As an independent insurance brokerage we represent you, our customer, not the insurance company. © 2014
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>