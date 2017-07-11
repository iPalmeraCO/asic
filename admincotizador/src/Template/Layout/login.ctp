<?php
//use Cake\Cache\Cache;
//use Cake\Core\Configure;
//use Cake\Datasource\ConnectionManager;
//use Cake\Error\Debugger;
//use Cake\Network\Exception\NotFoundException;
//$this->layout = false;
/*
  if (Configure::read('debug')):
  throw new NotFoundException();
  endif; */
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        echo $this->Html->charset();
        echo '<meta charset="utf-8">';
        echo '<title>ASIC - LINK TIC</title>';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">';
        echo $this->Html->meta('favicon.ico', '/favicon.ico', ['type' => 'icon']);
        echo $this->Html->meta('keywords', 'enter any meta keyword here');
        echo $this->Html->meta('description', 'enter any meta description here');
        echo $this->Html->meta('author', 'LINK TIC 2015');
        
        echo $this->Html->script('alertify/lib/alertify.js');
        echo $this->Html->css('alertify/themes/alertify.core.css');
        echo $this->Html->css('alertify/themes/alertify.default.css');

        echo '<!-- STYLESHEETS -->';
        echo '<!--[if lt IE 9]>';
        echo $this->Html->script('flot/excanvas.min.js');
        echo $this->Html->script('http://html5shiv.googlecode.com/svn/trunk/html5.js');
        echo $this->Html->script('http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js');
        echo '<![endif]-->';
        echo $this->Html->css('cloud-admin.css');
        echo $this->Html->css('../fonts/css/font-awesome.min.css');

        //<!-- DATE RANGE PICKER -->
        echo $this->Html->css('../js/bootstrap-daterangepicker/daterangepicker-bs3.css');
        //<!-- UNIFORM -->
        echo $this->Html->css('../js/uniform/css/uniform.default.min.css');

        //<!-- ANIMATE -->
        echo $this->Html->css('animatecss/animate.min.css');

        //<!-- FONTS -->
        echo $this->Html->css('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        
        ?>

    </head>
    <body class="login">
        <!-- PAGE -->
        <section id="page">
            <?= $this->element('Html/login_header'); //Header dle Sistema?>
            <?= $this->fetch('content'); //Contenido?>
        </section>

        <?php
        /*
        <!-- JAVASCRIPTS -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- JQUERY -->
         */
        echo $this->Html->script('jquery/jquery-2.0.3.min.js');
        //<!-- JQUERY UI-->
        echo $this->Html->script('jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js');
        //<!-- BOOTSTRAP -->
        echo $this->Html->script('../bootstrap-dist/js/bootstrap.min.js');//BOOTSTRAP 
        //<!-- UNIFORM -->
        echo $this->Html->script('uniform/jquery.uniform.min.js');
        //<!-- BACKSTRETCH -->
        echo $this->Html->script('backstretch/jquery.backstretch.min.js');
        //<!-- CUSTOM SCRIPT -->
        //echo $this->Html->script('script.js');
        
        echo $this->fetch('script');
        ?>
        <script>
            jQuery(document).ready(function () {
                //App.init(); //Initialise plugins and elements
            });
        </script>
        <script type="text/javascript">
            function swapScreen(id) {
                jQuery('.visible').removeClass('visible animated fadeInUp');
                jQuery('#' + id).addClass('visible animated fadeInUp');
            }
        </script>
        <!-- /JAVASCRIPTS -->
    </body>
</html>