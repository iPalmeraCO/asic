
<!DOCTYPE html>
<html>
    <head>
        <?php
        echo $this->Html->script('jquery/jquery-2.0.3.min.js');
        echo $this->Html->script('jquery/jquery.min.js');
        echo $this->Html->script('alertify/lib/alertify.js');
        echo $this->Html->script('alerta.js');
        echo $this->Html->css('alertify/themes/alertify.core.css');
        echo $this->Html->css('alertify/themes/alertify.default.css');
        ?>
        <?= $this->Element('Body/head'); ?>
    </head>
    <body class="boxed pattern_1">
        <div id="wrapper_all">
            <?= $this->Element('Body/header'); ?>
            <section class="container clearfix main_section">
                <div id="main_content_outer" class="clearfix">
                    <div id="main_content">
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
                <?php
                $session = $this->request->session();
                $user = $session->read('Auth.User');
                if ($user) {
                    if ($user['group_id'] == 10) {
                        echo $this->Element('Body/nav_sidebar');
                    } elseif ($user['group_id'] == 20) {
                        echo $this->Element('Body/nav_sidebar_2');
                    }
                }
                ?>
            </section>
            <?php echo '<div id="footer_space"></div>'; ?>
        </div>
        <?= $this->Element('Body/footer') ?>
        <?= $this->Element('Script/js') ?>
    </body>
</html>
