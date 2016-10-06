<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?> /css/main.css">

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php // wp_head(); ?>
</head>

<body>
<div id="page" class="hfeed site">


	<!--
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>

	<div id="sidebar" class="sidebar">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif;
				?>
				<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'twentyfifteen' ); ?></button>
			</div>
		</header>

		<?php //get_sidebar(); ?>
	</div>
-->
	    <div class="flota">
            <a class='flotante' href='chat.html'><img src="images/boton_flotante.png" border="0" /></a>
            </div>
    <div id="cuadro">
            <p id="text1">Carrera 7 No. 74-56 Edificio Corporación Financiera de Caldas Oficina 102 Tel: +571 376 9333</p>
            </div>
            <div class="redes">
                <a href="index.html"><img src="images/logo.png" class="img-responsive image" alt="Imagen responsive" style="float:left;"/></a>
                <div>
            <a href="https://www.linkedin.com/company/594627?trk=prof-0-ovw-curr_pos"><img src="images/linkedin.png" class="img-responsive image" alt="Imagen responsive"align="right" style="margin-right:9px;"/></a>
            <a href="https://plus.google.com/113086828629138970922/posts"><img src="images/google.png" class="img-responsive image" alt="Imagen responsive" align="right" style="margin-right:5px;"/></a>
            <a href="https://www.youtube.com/channel/UC8N-mfKa7MDBGAu9pRdAvuQ"><img src="images/youtube.png" class="img-responsive image" alt="Imagen responsive" align="right" style="margin-right:5px;"/></a>
            <a href="https://twitter.com/ASICsoluciones"><img src="images/twitter.png" class="img-responsive image" alt="Imagen responsive" align="right" style="margin-right:5px;"/></a>
            <a href="https://www.facebook.com/ASICamericas"><img src="images/facebook.png" class="img-responsive image" alt="Imagen responsive" align="right" style="margin-right:5px;"/></a>
            <br><br>
            <img src="images/ingles.png" class="img-responsive image" alt="Imagen responsive" align="right" style="margin-right:10px;"/>
            <img src="images/espanol.png" class="img-responsive image" alt="Imagen responsive" align="right" style="margin-right:10px;"/>
                    <br>
        </div>
            </div>
                <center>
    <div class="header">
			<ul class="nav">
                <li><a href="index.html" target="_blank"><img src="images/icono_home.png" width="25px"></a></li>
				<li><a href="conocenos.html">Conócenos</a></li>
				<li><a href="servicios-optim.html">Servicios<span class="flecha">&#9660</span></a>
					<ul>
                        <li><a href="servicios-nube.html">Nube</a></li>
                        <li><a href="servicios-sts.html">STS</a></li>
                        <li><a href="servicios-sertic.html">Sertic</a></li>
						<li><a href="servicios-optim.html">Optim</a></li>
						<li><a href="servicios-open.html">Open</a></li>
                        
                        
					</ul>
				</li>
                <li><a href="productos_punto_venta.html">Productos<span class="flecha">&#9660</span></a>
					<ul>
						<li align="left"><a href="productos_punto_venta.html">Punto de venta</a></li>
                        <li><a href="productos_autoservicio.html">Soluciones de autoservicio</a></li>
						<li><a href="productos_continuidad.html">Continuidad de negocio</a></li>
                        <li><a href="productos_licenciamiento.html">Licenciamiento</a></li>
                        <li><a href="productos_infraestructura.html">Infraestructura</a></li>
					</ul>
				</li>
				<li><a href="unidades_ams.html">Unidades de apoyo<span class="flecha">&#9660</span></a>
					<ul>
						<li><a href="unidad_ams.html">AMS</a></li>
						<li><a href="unidad_myg.html">M&amp;G</a></li>
					</ul>
				</li>
				<li><a href="unete.html">Únete a Asic</a></li>
                <li><a href="clientes_aliados.html">Cliente y Aliados</a></li>
                <li><a href="conectate.html">Conéctate</a></li>
                <li><a href="blog.html">Tu Blog</a></li>
                <li><a href="index.html" target="_blank"><img src="images/icono_buscar.png" width="25px"></a></li>
                </ul>
		</div></center><br>


	<div id="content" class="site-content">
