<?php
/**
 * 
 * Template Name: do Intranet
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header("intranet");

$img  = get_field('fondo',get_the_ID());
$rutimg =$img["url"];
$css = "background-image: url('".$rutimg."');";

?>		<div class="headerasic">
		<div id="cuadro">
		   		<div class="container">
		   		<div class="col-md-12  col-sm-12 col-xs-12 aligns">
		   			<p class="header-text">Carrera 7 No 74-56 Edificio Corporación Finaciera de Caldas</p>
		   			<p>Oficina 102</p>   		
		   			<p>Tel: +571 3769333</p>   		
            	
            	</div>
            	
			     </div>
            </div>
		<div class="flota">
            <a class="flotante" target="_blank" href="http://chat.asicamericas.com:8080/webchat/userinfo.jsp?chatID=QMkuU4hwQQ&workgroup=asic@workgroup.asboglabvchat.asic.loc#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/intranet/images/chat.png" border="0"></a>
            </div>
            <div class="flotante-responsive">
            <a class='flotante-dos' target="_blank" href='http://chat.asicamericas.com:8080/webchat/userinfo.jsp?chatID=QMkuU4hwQQ&workgroup=asic@workgroup.asboglabvchat.asic.loc#'><img src="<?php echo site_url(); ?>/wp-content/uploads/2016/07/chatmobile.png" border="0" /></a>
            </div>

		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-3 col-xs-12 logo">					
					<?php dynamic_sidebar( 'sidebar-8' ); ?>	
				</div>
				
				<div class="col-md-8 menu col-sm-9 con-xs-12">
				<div class="usuario">					
				</div>
				 <nav class="navmenu navbar navbar-inverse" role="navigation">
					
					<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<!-- 	<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span> -->
								<img src="<?php echo site_url(); ?>/wp-content/uploads/2016/07/menumobile.png" border="0" />
							</button>
						</div>

					
					<div class="collapse navbar-collapse navbar-ex1-collapse">
					<?php wp_nav_menu( array(  'menu' => 'menu-intranet', 'menu_class'=>'nav navbar-nav') ); ?>
					<div class="centro"><a href="http://smart.asicamericas.com:9000/ux/myitapp/#/updates" target="_blank"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/logocsc.png" alt="" height="45"></a></div>
					</div><!-- /.navbar-collapse -->
					
					</nav><!-- #site-navigation -->
					
					    <!--  <div id="chatmobile" class="col-xs-12">
				            <a target="_blank" href='http://chat.asicamericas.com:8080/webchat/userinfo.jsp?chatID=QMkuU4hwQQ&workgroup=asic@workgroup.asboglabvchat.asic.loc#'><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/intranet/images/chatmobile.png"></a>
				        </div>	 -->
				</div>
			</div>
		</div>
		</div>
		<!-- <div class="row slide"> -->
		<div class="slide" style="background-image: url('http://159.203.108.98/asic/wp-content/uploads/2016/09/asic-intranet.png');    width: 100% !important; ">
			<div class="contenido">
					
					<p class="conte"> <?php echo $titulo =  get_post_field('titulo',get_the_ID()); ?></p>					
					<p class="conte"> <?php echo $contenido =  get_post_field('contenido',get_the_ID()); ?> </p>
			</div>

		</div>	
		<div  class="container">

			<?php the_content(); ?>

		</div>		
<?php get_footer("intranet"); ?>