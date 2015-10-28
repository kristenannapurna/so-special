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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Dosis:200,400,500' rel='stylesheet' type='text/css'>
<title></title>
<?php wp_head(); ?>
</head>

<body data-templateUrl = '<?= bloginfo("template_url"); ?>' <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mcclellandinsurance' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="main-nav grid-12">
			<div class="wrapper clearfix">
				<div class="site-branding grid-3 pad-2-right s-grid-10 s-pad-1">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src=" <?php bloginfo('template_directory') ?>/img/mcclellandlogo.png " alt="McClelland Insurance Logo"></a></h1>
				</div><!-- .site-branding -->
				<div class="mobile-navigation s-grid-2"><a href="#" id="mainMobileNavigation">&#9776;</a></div>
				<nav id="site-navigation" class="main-navigation grid-6 m-grid-8" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Services Menu', 'mcclellandinsurance' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'services', 'menu_id' => 'services', 'link_before'=>'<span class="menu-item"><span class="menu-icon">&nbsp;</span><span class="menu-text">', 'link_after'=>'</span></span>' ) ); ?>
				</nav><!-- #site-navigation -->
				<div class="search-container grid-3 m-grid-1">
					<form method="get" id="searchform" role="search" action="<?php bloginfo('url'); ?>/">
						<div>
							<label class="search_icon" for="s"></label>
							<input type="text" name="s" value="Search..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
						</div>
					</form>
				</div>
			</div>
		</div><!-- /main-navigation -->
	</header><!-- #masthead -->

	<div id="mobileMenu" class="mobile-nav">
		<?php wp_nav_menu( array( 'theme_location' => 'services', 'menu_id' => 'services' ) ); ?>
		<hr/>
		<div class="wrapper clearfix">
			<ul class="menu clearfix">
				<li class="personal"><a href="http://mcclellandinsurance.com/personal">Personal</a></li>
				<li class="commercial"><a href="http://mcclellandinsurance.com/commercial">Commercial</a></li>
			</ul>
			<hr/>
			<div class="search-container">
				<form method="get" id="searchform" role="search" action="<?php bloginfo('url'); ?>/">
					<div>
						<label class="search_icon" for="s"></label>
						<input type="text" name="s" value="Search..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
					</div>
				</form>
			</div>
			<hr/>
			<div class="info-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'info', 'menu_id' => 'info' ) ); ?>
			</div>
		</div>
	</div>
	<div id="content" class="site-content">
