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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
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
<script type="text/javascript">
function calcHeight()
   {
    //find the height of the internal page
    var the_height=
    document.getElementById('the_iframe').contentWindow.
    document.body.scrollHeight;

    //change the height of the iframe
    document.getElementById('the_iframe').height=
    the_height;
   }
</script>
<style>
.motopress-text-obj span {
  margin-top : 10px;
  display: inline-block;
  line-height: 1.4em !important;
}
</style>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<div class="headerasic">
		   <div id="cuadro">
		   		<div class="container">
		   		<div class="col-md-12  col-sm-12 col-xs-12 ">
		   				   		
            	<?php get_sidebar(); ?>
            	</div>
            	<!-- <div class="col-md-6  col-sm-6 col-xs-6 socialnetworks">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>			        
			     </div> -->
			     </div>
            </div>
    <div class="container">
		<header id="masthead" role="banner">		
		<div class="flota">
            <a class='flotante' target="_blank" href='http://chat.asicamericas.com:8080/webchat/userinfo.jsp?chatID=QMkuU4hwQQ&workgroup=asic@workgroup.asboglabvchat.asic.loc#'><img src="<?php echo site_url(); ?>/wp-content/uploads/2016/07/chat.png" border="0" /></a>
            </div>
            <div class="flotante-responsive">
            <a class='flotante-dos' target="_blank" href='http://chat.asicamericas.com:8080/webchat/userinfo.jsp?chatID=QMkuU4hwQQ&workgroup=asic@workgroup.asboglabvchat.asic.loc#'><img src="<?php echo site_url(); ?>/wp-content/uploads/2016/07/chatmobile.png" border="0" /></a>
            </div>
        
 
            <div class="redes row">
            	<div class="col-md-6 col-sm-4 col-xs-12 slogan">
            		<?php if ( get_header_image() ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  class="img-responsive image" alt="Imagen responsive" style="float:left;"/ width="150px" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
					<?php endif; ?>
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
					<button id="toggle-search" class="header-button"><i class="fa fa-search" aria-hidden="true"></i></button>
					<div id="search-form" action="">
						<?php get_search_form(); ?>
					</div>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->		 
	</div>   
	</div>  
	<script>
		(function($) {

		// Handle click on toggle search button
		$('#toggle-search').click(function() {
			$('.search-form, #toggle-search').toggleClass('open');
			return false;
		});

		// Handle click on search submit button
		$('#search-form input[type=submit]').click(function() {
			$('.search-form, #toggle-search').toggleClass('open');
			return true;
		});

		// Clicking outside the search form closes it
		$(document).click(function(event) {
			var target = $(event.target);
      
			if (!target.is('#toggle-search') && !target.closest('.search-form').size()) {
				$('.search-form, #toggle-search').removeClass('open');
			}
		});

})(jQuery);
	</script>
	<div id="content" class="site-content">



		<div id="main" class="site-main">
