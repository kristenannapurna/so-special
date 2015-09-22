<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package McClelland Insurance
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='https://fonts.googleapis.com/css?family=Dosis:400,500' rel='stylesheet' type='text/css'>
<title></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mcclellandinsurance' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="main-nav grid-12">
			<div class="wrapper clearfix">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src=" <?php bloginfo(template_directory) ?>/img/mcclellandlogo.png " alt="McClelland Insurance Logo"></a></h1>
				</div><!-- .site-branding -->
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Services Menu', 'mcclellandinsurance' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'services', 'menu_id' => 'services' ) ); ?>
				</nav><!-- #site-navigation -->
				<div class="search-container">
					<form method="get" id="searchform" role="search" action="<?php bloginfo('home'); ?>/">
						<div>
							<label class="search_icon" for="s"></label>
							<input type="text" name="s" value="Search..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
						</div>	
					</form>
				</div>
			</div>
		</div><!-- /main-navigation -->
		<div class="secondary-nav">
			<nav id="secondary-nav" class="secondary-navigation" role="navigation">
				<div class="wrapper clearfix">
					<ul class="menu clearfix">
						<li class="personal"><a href="http://mcclellandinsurance.com/personal">Personal</a></li>
						<li class="commercial"><a href="http://mcclellandinsurance.com/commercial">Commercial</a></li>
					</ul>
					<div class="info-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'info', 'menu_id' => 'info' ) ); ?>
					</div>
				</div>
			</nav>
		</div> <!-- /secondary-nav -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
