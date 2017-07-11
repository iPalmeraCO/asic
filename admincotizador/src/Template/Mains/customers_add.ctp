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
            echo $this->Form->create($objData, ['name' => 'customers', 'class' => 'form-horizontal', 'role' => 'form']);
            ?>
            <div class='form-group'>

                <div class="col-sm-4">
                    <?php
                    echo $this->Form->radio(
                            'empresaradio', [
                        ['value' => 'empresa', 'text' => 'Empresa', 'onclick' => 'mostrarReferencia();', 'class' => 'form-horizontal col-sm-4',],
                        ['value' => 'particular', 'text' => 'Particular', 'onclick' => 'mostrarReferencia();', 'class' => 'form-horizontal col-sm-4', 'checked' => 'checked'],
                            ]
                    );
                    ?>
                </div>
            </div>
            <?php
//div oculto
            echo '<div id="empresa" style="display:none;">';
            echo $this->Form->input('namecompany', [
                'label' => ['text' => 'Nombre Empresa', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input',
                'required' => false,
                'placeholder' => 'Nombre Empresa',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);
            echo $this->Form->input('nit', [
                'label' => ['text' => 'Nit Empresa', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input',
                'required' => false,
                'placeholder' => 'Nit',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);
            echo '</div>';
            ?>
            <h4>Persona de Contacto</h4>
            <?php
            echo $this->Form->input('name', [
                'label' => ['text' => 'Nombre', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input',
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

            echo $this->Form->input('email', [
                'label' => ['text' => 'Correo', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input-sm',
                'required' => true,
                'placeholder' => 'Correo',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);

            echo $this->Form->input('phone_number', [
                'label' => ['text' => 'Numero de Telefono', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input-sm',
                'required' => true,
                'placeholder' => 'Numero de telefono',
                'type' => 'number',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);




            echo $this->Form->input('department_id', [
                'label' => ['text' => 'Departamento', 'class' => 'col-sm-3 control-label'],
                'class' => 'col-md-12',
                'id' => 'department_id',
                'options' => $lstObj,
                'empty' => 'Seleccione Uno',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);

            echo $this->Form->input('city_id', [
                'label' => ['text' => 'Municipio', 'class' => 'col-sm-3 control-label'],
                'class' => 'col-md-12',
                'empty' => 'Seleccione Uno',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4 city'])
            ]);

            echo '<div align="center">';

            echo $this->Form->input('address', [
                'label' => ['text' => 'Direccion', 'class' => 'col-sm-3 control-label'],
                'class' => 'form-control input',
                'required' => true,
                'placeholder' => 'Dirección',
                'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4'])
            ]);



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
<script type="text/javascript">

    function mostrarReferencia() {
//Si la opcion con id Conocido_1 (dentro del documento > formulario con name fcontacto >     y a la vez dentro del array de Conocido) esta activada
        if (document.customers.empresaradio[1].checked == true) {
//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
            document.getElementById('empresa').style.display = 'block';
//por el contrario, si no esta seleccionada
        } else {
//oculta el div con id 'desdeotro'
            document.getElementById('empresa').style.display = 'none';
        }
    }

</script>
<script>
    $(document).ready(function () {

        $('#department_id').change(function () {
            var selected = $(this).val();
            $(".city").html('<?= $this->Html->image('loaders/1.gif') ?>');
            $.ajax({
                method: "POST",
                url: "<?= $this->Url->build(['action' => 'getCityByDepartment']) ?>",
                data: {id: $(this).val()}
            }).done(function (msg) {
                $(".city").html(msg);
            });
        });
    });

</script>