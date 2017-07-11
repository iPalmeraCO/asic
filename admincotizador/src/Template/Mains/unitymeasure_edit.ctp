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
            echo $this->Form->create($objData, ['class' => 'form-horizontal', 'role' => 'form']);

            echo $this->Form->input('name', [
                'label' => ['text' => 'Nombre Unidad de medida', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input-sm',
                'required' => true,
                'placeholder' => 'Nombre Unidad de medida',
                'maxlength'=>'120',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);

            echo $this->Form->input('description', [
                'label' => ['text' => 'Descripción unidad de medida', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input-sm',
                'required' => true,
                'placeholder' => 'Descripción unidad de medida',
                'maxlength'=>'255',
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
            echo '<div align="center">';
            echo '<p class="btn-toolbar ">';
            echo $this->Html->link($infoView['cmdBack']['title'], $infoView['cmdBack']['url'], ['class' => 'btn btn-warning']);
            echo $this->Form->button(__('Guardar'), ['data-ajax' => 'false', 'class' => 'btn btn-success']);
            echo '</p>';
            echo '</div>';
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
