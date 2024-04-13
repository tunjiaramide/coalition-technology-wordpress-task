<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>

	<header class="header">
		<!-- top bar -->
		<div class="topbar container">
			<div class="topbar__call">
				<?php
					$phone_number = get_option('phone_number');
					if(empty($phone_number)) {
						$phone_number = '385.154.11.28.35';
					}
				?>
				<h4>Call us Now! <span><?php echo $phone_number; ?></span></h4>
			</div>
			<div class="topbar__account">
				<ul>
					<li><a href="#">Login</a></li>
					<li class="signup"><a href="#">Signup</a></li>
				<ul>
			</div>
		</div>

		<!-- logo and menu bar -->
		<div class="branding container">
			<div class="header__logo">
				<?php
					$logo_url = get_option('logo_upload');
					if(empty($logo_url)) {
						$logo_url = get_template_directory_uri() . '/images/ct_logo.png';
					}
				?>
				<img src="<?php echo $logo_url; ?>" />
			</div>

			<nav class="header__nav">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content container">
