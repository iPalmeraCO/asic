<?php
$session = $this->request->session();
$user = $session->read('Auth.User');
?>
<header id="top_header">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-2">
                <?php
                echo $this->Html->link('' . $this->Html->image('logo_main.png', ['alt' => 'asic', 'title' => 'Asic', 'style' => 'width: 60%;']), ['controller' => 'Mains', 'action' => 'index'], ['class' => 'logo_main', 'escape' => false]);
                ?>
            </div>
            <div class="col-sm-push-4 col-sm-3 text-right hidden-xs"></div>
            <div class="col-xs-6 col-sm-push-4 col-sm-3">
                <div class="pull-right dropdown">
                    <a href="#" class="user_info dropdown-toggle" title="<?php echo $user['name'] . ' ' . $user['surname'] ?>" data-toggle="dropdown">
                        <?php
                        
                        $urlImage = '../attachment/users/'.$this->request->session()->read('Auth.User.image');
                        if ($user['image'] != '') {
                            if($user['image'] ){
                                    $img = WWW_ROOT.'attachment/users/'.$user['image']; 
                                    if (file_exists($img)){
                                        echo $this->Html->image($urlImage, ['alt' => $user['name'],'title'=>$user['name']]);
                                    }
                                    else{
                                        echo $this->Html->image('default_asic.jpg', ['alt' => $user['name'],'title'=>$user['name']]);
                                    }
                                }
                                else{
                                     echo $this->Html->image('default_asic.jpg', ['alt' => $user['name'],'title'=>$user['name']]);
                                }
                           
                        } else {
                            echo $this->Html->image('asic_logo.png', ['alt' => '']);
                        }
                        ?> 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        echo '<li>'.$this->Html->link('<i class="fa fa-lock"></i> Cambiar Contraseña', ['controller' => 'users', 'action' => 'users_password', $this->request->session()->read('Auth.User.id')], ['escape' => false]).'</li>';
                        echo '<li>'.$this->Html->link('<i class="fa fa-lock"></i> Perfil', ['controller' => 'users', 'action' => 'edit', $this->request->session()->read('Auth.User.id')], ['escape' => false]).'</li>';
                        echo '<li>'.$this->Html->link('Salir', ['controller' => 'Users', 'action' => 'logout']).'</li>';
                        ?>
                    </ul>
                </div>

            </div>
            <div class="col-xs-12 col-sm-pull-6 col-sm-4">
                <?php //$this->Element('Body/header_notification');  ?>
            </div>
        </div>
    </div>
</header>						
