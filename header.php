<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MWBC
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.min.js"></script>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png"
		sizes="300x300">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap" rel="stylesheet">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-77787154-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-77787154-1');
	</script>

</head>

<body <?php body_class(); ?>>
	<h1 class="outline">Header</h1>
	<a class="skip-main" href="#primary">Skip to main content</a>
	<div id="page" class="site">

		<header id="masthead" class="site-header">
			<nav class="navbar fixed-top navbar-expand-md custom-navbar">
				<h1 class="outline">Main Navigation</h1>
				<div class="container">
					<!-- Navbar brand -->
					<a class="navbar-brand" href="/">
						<img id="logo" class="logo"
							src="<?php echo (get_header_image()) ? get_header_image() : get_template_directory_uri()."/images/GKA-Theme-Logo-Color.png"; ?>"
							alt="Logo">
					</a>

					<!-- Collapse button -->
					<button class="navbar-toggler third-button" type="button" data-toggle="collapse"
						data-target="#navigation" aria-controls="navigation" aria-expanded="false"
						aria-label="Toggle navigation">
						<div class="animated-icon3"><span></span><span></span><span></span></div>
					</button>
					<!-- Main navigation -->
					<div class="container">
						<div class="collapse navbar-collapse" id="navigation">
							<ul id="sub-nav" class="navbar-nav ml-auto">
								<?php 
									$sec_nav = wp_get_nav_menu_items(3); 
									foreach ($sec_nav as $key => $item) {
										switch ($item->ID) {
											case 55:
												$menu_icon = "donate";
												break;
											case 479:
												$menu_icon = "news";
												break;
											case 53:
												$menu_icon = "contact-us";
												break;
											default:
												$menu_icon = "";
												break;
										}
								?>
								<li class="nav-item <?php echo ($post->ID == $item->object_id) ? "active" : ""; ?>">
									<a class="nav-link" href="<?php echo $item->url; ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/images/icons/<?php echo $menu_icon; ?>.svg"
											alt="<?php echo $item->title; ?>'s icon'">
										<span><?php echo $item->title; ?></span>
									</a>
								</li>
								<?php
									}
								?>
								<li class="nav-item d-flex align-items-center justify-content-center">
									<div class="social-menu text-center">
										<a target="_blank" href="https://www.facebook.com/Marylandwbc/">
											<img src="<?php echo get_template_directory_uri(); ?>/images/icons/facebook.svg"
												alt="Facebook">
										</a>
										<a target="_blank" href="https://www.linkedin.com/company/4848444">
											<img src="<?php echo get_template_directory_uri(); ?>/images/icons/linkedin.svg"
												alt="Linkedin">
										</a>
										<a target="_blank" href="https://twitter.com/marylandwbc">
											<img src="<?php echo get_template_directory_uri(); ?>/images/icons/twitter.svg"
												alt="Twitter">
										</a>
										<a target="_blank" href="https://www.instagram.com/maryland.wbc/">
											<img src="<?php echo get_template_directory_uri(); ?>/images/icons/instagram.svg"
												alt="Instagram">
										</a>
										<a target="_blank" href="https://www.youtube.com/channel/UClpl_Jc75mf_jfXloXuEjSw">
											<img src="<?php echo get_template_directory_uri(); ?>/images/icons/youtube.svg"
												alt="Youtube">
										</a>
									</div>
								</li>
							</ul>
							<ul id="primary-nav" class="navbar-nav ml-auto">
								<?php 
									$primary_nav = wp_get_nav_menu_items(2); 
									foreach ($primary_nav as $key => $item) {
								?>
								<li class="nav-item <?php echo ($post->ID == $item->object_id) ? "active" : ""; ?>">
									<a class="nav-link" href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
								</li>
								<?php
									}
								?>
							</ul>

						</div>
					</div>
				</div>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">