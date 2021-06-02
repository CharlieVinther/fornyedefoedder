<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

		<header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

			<div class="container">
				<a id="logo" href="http://charlievinther.dk/fornyedefoedder/"><img src="http://charlievinther.dk/fornyedefoedder/wp-content/uploads/2021/06/logo-1.svg" alt="fornyede fødder"></a>
				<nav>
				<ul>
					<li><a href="http://charlievinther.dk/fornyedefoedder/">Forside</a></li>
					<li><a href="http://charlievinther.dk/fornyedefoedder/behandlinger/">Behandlinger</a></li>
					<li><a href="http://charlievinther.dk/fornyedefoedder/produkter/">Produkter</a></li>
					<li><a href="http://charlievinther.dk/fornyedefoedder/klinikken/">Om klinikken</a></li>
					<li class="bestil_nav"><a href="http://charlievinther.dk/fornyedefoedder/bestiltid/">Bestil tid</a></li>
					</ul>
				</nav>
			</div>
		</header><!-- #masthead -->
	<script>
	window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("logo").style.width = "140px";
	 document.getElementById("masthead").style.fontSize = "0.7rem";
	  document.getElementById("masthead").style.transition = "ease-in-out 0.4s";
	  document.getElementById("logo").style.transition = "ease-in-out 0.4s";
  } else {
   document.getElementById("logo").style.width = "180px";
	  document.getElementById("masthead").style.fontSize = "0.8rem";
	document.getElementById("masthead").style.transition = "ease-in-out 0.2s";
	  document.getElementById("logo").style.transition = "ease-in-out 0.2s";
  }
};
	</script>

	<div id="content" class="site-content">
