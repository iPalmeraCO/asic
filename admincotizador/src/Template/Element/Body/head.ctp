<?= $this->Html->charset() ?>
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>ASIC</title>
<?php
//<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
echo $this->Html->meta('icon');
//<!-- bootstrap framework-->
echo $this->Html->css('../bootstrap/css/bootstrap.min.css');
//<!-- todc-bootstrap -->
echo $this->Html->css('todc-bootstrap.min.css');
//<!-- font awesome -->        
echo $this->Html->css('font-awesome/css/font-awesome.min.css');
//<!-- flag icon set -->        
echo $this->Html->css('../img/flags/flags.css');
//<!-- retina ready -->
echo $this->Html->css('retina.css');


//<!-- aditional stylesheets -->
//<!-- vector map -->
//echo $this->Html->css('../js/lib/jvectormap/jquery-jvectormap-1.2.2.css');

//<!-- datatbles -->
echo $this->Html->css('../js/lib/dataTables/media/DT_bootstrap.css');
echo $this->Html->css('../js/lib/dataTables/extras/TableTools/media/css/TableTools.css');

//<!-- ebro styles -->
echo $this->Html->css('style.css');
//<!-- ebro theme -->
echo $this->Html->css('theme/color_4.css', ['id' => 'theme']);

echo '<!--[if lt IE 9]>';
echo $this->Html->css('ie.css');
echo $this->Html->script('ie/html5shiv.js');
echo $this->Html->script('ie/respond.min.js');
echo $this->Html->script('js/ie/excanvas.min.js');
echo '<![endif]-->';

//<!-- custom fonts -->
echo $this->Html->css('http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext');

echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>
