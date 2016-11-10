<?php
/**
 * 
 * Template Name: Intranet
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header("intranet");

$img  = get_field('fondo',get_the_ID());
$rutimg =$img["url"];
$css = "background-image: url('".$rutimg."');";

?>

		<div class="flota">
            <a class="flotante" target="_blank" href="http://chat.asicamericas.com:8080/webchat/userinfo.jsp?chatID=QMkuU4hwQQ&workgroup=asic@workgroup.asboglabvchat.asic.loc#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/intranet/images/chat.png" border="0"></a>
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
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

					
					<div class="collapse navbar-collapse navbar-ex1-collapse">
					<?php wp_nav_menu( array(  'menu' => 'menu-intranet', 'menu_class'=>'nav navbar-nav') ); ?>
					</div><!-- /.navbar-collapse -->
				
					</nav><!-- #site-navigation -->
					
					     <div id="chatmobile" class="col-xs-12">
				            <a target="_blank" href='http://chat.asicamericas.com:8080/webchat/userinfo.jsp?chatID=QMkuU4hwQQ&workgroup=asic@workgroup.asboglabvchat.asic.loc#'><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/intranet/images/chatmobile.png"></a>
				        </div>	
				</div>
			</div>
		</div>
		<!-- <div class="row slide"> -->
		<div class="slide" style="<?php  echo $css; ?>">
			<div class="contenido">
					
					<p class="conte"> <?php echo $titulo =  get_post_field('titulo',get_the_ID()); ?></p>					
					<p class="conte"> <?php echo $contenido =  get_post_field('contenido',get_the_ID()); ?> </p>
			</div>

		</div>		
<?php get_footer("intranet"); ?>