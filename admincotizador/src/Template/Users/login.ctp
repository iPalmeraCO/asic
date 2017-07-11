<!-- LOGIN -->
<section id="login_bg" class="visible">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-box">                   
                    <?=$this->Form->create(null,['url'=>['controller'=>'Users','action'=>'login'],'method'=>'post','role'=>'form']);?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuario</label>
                            <i class="fa fa-envelope"></i>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="username" >
                        </div>
                        <div class="form-group"> 
                            <label for="exampleInputPassword1">Contraseña</label>
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-danger">Entrar</button>
                        </div>
                        <br/>
                        <b style="color:#FB0808"><?= $this->Flash->render('msgLogin') ?></b>
                    </form>                    
                    <!-- SOCIAL LOGIN -->
                    <div class="divide-20"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/LOGIN -->


<?php /*
<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div> */ ?>