
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
    <head>
        <?php
        echo $this->Html->charset();
        echo '<meta charset="utf-8">';
        echo '<title>Asic - LINK TIC</title>';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">';
        echo $this->Html->meta('favicon.ico', '/favicon.ico', ['type' => 'icon']);
        echo $this->Html->meta('keywords', 'enter any meta keyword here');
        echo $this->Html->meta('description', 'enter any meta description here');
        echo $this->Html->meta('author', 'LINK TIC 2015');
        echo $this->fetch('meta');

        echo '<!-- STYLESHEETS -->';
        echo '<!--[if lt IE 9]>';
        echo $this->Html->script('flot/excanvas.min.js');
        echo $this->Html->script('/boostrap-dist/js/bootstrap');
        echo $this->Html->script('http://html5shiv.googlecode.com/svn/trunk/html5.js');
        echo $this->Html->script('http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js');
        echo '<![endif]-->';
        
        echo $this->Html->script('alertify/lib/alertify.js');

        echo $this->element('Script/home');
        echo $this->fetch('script');
        
        echo $this->Html->css('../fonts/css/font-awesome.min.css');

        echo $this->element('Style/home');

        echo $this->Html->css('http://fonts.googleapis.com/css?family=Montserrat:400,700');
        echo $this->Html->css('http://fonts.googleapis.com/css?family=News+Cycle:400,700');

        //echo $this->Html->css('responsive.css');
        //echo $this->Html->css('header.css');

        echo $this->Html->css('/js/alertify/themes/alertify.core.css');
        echo $this->Html->css('/js/alertify/themes/alertify.default.css');

        echo $this->Html->css('style.css');

        echo $this->fetch('css');
        ?>
    </head>
    <body>
        <header>
          <div class="container">
            <div class="row">
              <div class="col-md-10" style="float:none;margin:0 auto;">
                <div class="row">
                  <div class="col-md-3">
                    <?=$this->Html->image('asic_logo.png', ['style' => 'margin-top:15px;'])?>
                  </div>
                  <div class="col-md-9">
                    <div id="navbar" class="collapse navbar-collapse">
                      <ul class="nav navbar-nav">
                        <li><a href="http://www.asicamericas.com/asic-americas-conocenos">CONÓCENOS</a></li>
                        <li><a href="http://www.asicamericas.com/asic-americas-unete-a-asic">UNETE A ASIC</a></li>
                        <li><a href="http://www.asicamericas.com/asic-americas-negocios">CLIENTES & <br/>ALIADOS</a></li>
                        <li><a href="http://www.asicamericas.com/asic-americas-contectate">CONÉCTATE</a></li>
                        <li><a href="http://tublogasic.blogspot.com/">TU BLOG</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
        <section id="content">
          <div class="container">
            <div class="row">
              <div class="col-md-10" style="float:none;margin:0 auto;">
                <?= $this->fetch('content'); ?>
              </div>
            </div>
          </div>
        </section>
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-10" style="float:none;margin:0 auto;text-align:center">
                Carrera 7 No. 74-56 Edificio Corporación Financiera de Caldas Oficina 102 Tel: +571 376 9333
              </div>
            </div>
          </div>
        </footer>
    </body>
</html>