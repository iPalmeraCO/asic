<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/main.css">
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-3.1.0.min.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script type="text/javascript">
	 function buscar(){
	 	$("#formbuscar").toggle();
	 }
	</script>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<div class="headerasic">
		   <div id="cuadro">		   		
            	<?php get_sidebar(); ?>
            </div>
    <div class="container">
		<header id="masthead" role="banner">		
		<div class="flota">
            <a class='flotante' href='<?php echo site_url(); ?>/chat'><img src="<?php echo site_url(); ?>/wp-content/uploads/2016/07/chat.png" border="0" /></a>
            </div>
        
 
            <div class="redes row">
            	<div class="col-md-6 col-sm-4 col-xs-12 slogan">
            		<?php if ( get_header_image() ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  class="img-responsive image" alt="Imagen responsive" style="float:left;"/ width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
					<?php endif; ?>
            	</div>
            	<div class="col-md-6  col-sm-8 col-xs-12 socialnetworks">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>			        
			     </div>
              
            </div>

			<div id="navbar" class="navbar">
				
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<!--<button class="menum" aria-expanded="true" aria-controls="primary-menu">
						<img src="<?php echo site_url(); ?>/wp-content/uploads/2016/07/menumobile.png" border="0" />
					</button>-->
						<button class="menu-toggle">
						<img src="<?php echo site_url(); ?>/wp-content/uploads/2016/07/menumobile.png" border="0" />
						<?php //_e( 'Menu', 'twentythirteen' ); ?></button>
					
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
				
					<div id="formbuscar">
						<?php get_search_form(); ?>
					</div>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->		 
	</div>   
	</div>  

	<div id="content" class="site-content">



		<div id="main" class="site-main">
