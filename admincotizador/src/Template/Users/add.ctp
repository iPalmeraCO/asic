<!-- src/Template/Users/add.ctp -->

<?php
//echo $this->element('Body/box_config'); //Ventanas Flotantes de COnfiguracion
$this->Html->css(array('/js/bootstrap-switch/bootstrap-switch.min'), array('block' => true));
?>
<div class="row">
    <div class="col-sm-12">
        <?php
        //<!-- PAGE HEADER-->
        echo $this->element('Body/page_headerAsic');
        ?>
        <div class="panel panel-danger">

            <div class="panel-heading">

            </div>
            <br/>
            <br/>
            
            <?php
            echo $this->Form->create('users', ['class' => 'form-horizontal', 'role' => 'form','enctype' => 'multipart/form-data']);

            echo $this->Form->input('name', [
                'label' => ['text' => 'Nombre', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input-sm',
                'required' => true,
                'placeholder' => 'Nombre',
                
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);

            echo $this->Form->input('surname', [
                'label' => ['text' => 'Apellido', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input-sm',
                'required' => true,
                'placeholder' => 'Apellido',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);

            echo $this->Form->input('type_doc', [
                'label' => ['text' => 'Tipo Documento', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input col-md-12',
                'required' => true,
                'options' => $listObj01,
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);

            echo $this->Form->input('document', [
                'label' => ['text' => 'No Documento', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input-sm',
                'required' => true,
                'type'=>'number',
                'placeholder' => 'Numero del Documento',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);

            echo $this->Form->input('email', [
                'label' => ['text' => 'Correo', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input-sm',
                'required' => true,
                'placeholder' => 'Correo',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);
            
            
            echo $this->Form->input('status_id', ['type' => 'hidden', 'value' => 0]);
            echo '<div class="form-group">
					   <label class="col-sm-3 control-label">Estado</label>
				           <div class="make-switch switch-small" data-on="' . $switchOn . '" data-off="' . $switchOff . '" data-on-label="ACTIVO" 
                                                data-off-label="INACTIVO" style="width: 25%; margin-left:2.5%">
					   <input type="radio" name="status_id" value="1" checked>
					   </div>
					   </div>';

           
       
            

 ?>
            <div class="form-group">
                <label class="col-sm-3 control-label">Seleccionar Imagen</label>
                <div class="col-sm-4">

                    <div class="input-group-btn">


                        <?php echo $this->Form->input('image', ['label' => false, 'class' => 'file-input', 'type' => 'file']); ?>



                    </div>


                </div>
            </div>
            <?php

            
            
            
            
            echo $this->Form->input('group_id', [
                'label' => ['text' => 'Rol Usuario', 'class' => 'col-sm-3 control-label'],
                'class' => 'col-md-12 form-control input-sm',
                'required' => true,
                'options' => $arrayGroup,
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);
             echo '<div class="form-group ' . $error . ' input-sm">';

            echo $this->Form->input('password', [
                'label' => ['text' => 'Clave', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input-sm',
                'required' => true,
                'placeholder' => 'Clave',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);

            echo $this->Form->input('password2', [
                'label' => ['text' => 'Repita Clave', 'class' => 'col-sm-3 control-label'],
                'type' => 'password',
                'class' => 'form-control input-sm',
                'required' => true,
                'placeholder' => 'Repita Clave',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);
            echo '</div>';


echo '<div align="center">';
            echo '<p class="btn-toolbar">';
            echo $this->Html->link($infoView['cmdBack']['title'], $infoView['cmdBack']['url'], ['class' => 'btn btn-warning']);
            echo $this->Form->button(__('Guardar'), ['data-ajax' => 'false', 'class' => 'btn btn-success']);
            echo '</p>';
            echo '</div>';
            ?>

            <div class="clearfix">
                <b style="color:#FB0808"><?= $this->Flash->render('msgUserEdit') ?></b>
            </div>

            <?php
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>


