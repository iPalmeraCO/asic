<div class="row">
    <div class="col-md-12">
        <?php
        echo $this->Html->image("Personaliza_Coti.png", [
            "alt" => "paquetes",
            'url' => ['controller' => 'Mains', 'action' => 'calculadora'],
            'width' => '200', 'height' => '37',
            'style' => 'float:right'
        ]);
        ?>
        <br/>
    </div>
</div>
<div class="col-md-12">
    
    <br/>
</div>
<h4 style="color:#48A0DF">Ahora puedes acelerar al máximo rendimiento tu empresa porque tienes todo en nuestra Nube.</h4>
<p style="color:#888888">En La NUBE de ASIC ahora puedes alinear tus estrategias corporativas con soluciones efectivas de bajo costo en infraestructura TIC virtual porque lo tienes todo a continuación puedes encontrar tu solución preconfigurada:</p>
<?php
    $sw = 0;
    $backgrounds = ['#006FC1', '#6BA616', '#FB7900', '#449EDA'];
?>
<?php foreach($listObj as $key=>$obj) { $sw = ($sw == 4) ? 0 : $sw; ?>
    <?php echo (($key == 0 || $key % 4 == 0) ? '<div class="row">' : ''); ?>
    <div class="col-md-3 package">
        <div class="package-header">
            <?php
            if($obj['image']){
                $filename = WWW_ROOT.'attachment/packages/'.$obj['image'];
                if (file_exists($filename)) {
                    echo $this->Html->image('../attachment/packages/'.$obj['image'], ['width' => '90', 'height' => '100']);
                }else{
                    echo $this->Html->image('default_asic.jpg', ['height' => '100']);
                }
            }else{
                echo $this->Html->image('default_asic.jpg', ['height' => '100']);
            }
            ?>

            <h3 style="background-color:<?=$backgrounds[$sw]?>;"><?=$obj['name']?></h3>
            <h4><?=$obj['description']?> 7</h4>

        </div>
        <div class="package-body">
            <?php foreach($obj['packages_elements'] as $pe){ ?>
            <p class="category"><?=$pe['element']['category']['name']?></p>
            <p><?=$pe['element']['name']?></p>
            <?php } ?>
        </div>
        <button type="button" style="position:absolute;bottom:0;" class="btn btn-default sendQuote" data-toggle="modal" data-target="#myModal" rel="<?=$obj['id']?>">Cotizar</button>
    </div>
    <?php echo ((($key+1) % 4 == 0 || $key+1 == count($listObj)) ? '</div>' : ''); ?>
<?php $sw++; } ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo $this->Form->create('customer', ['name' => 'customers', 'class' => 'form-horizontal', 'role' => 'form']); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Completa tus datos:</h4>
            </div>
            <div class="modal-body">
                <div class='form-group'>
                    <div style="width:150px;margin: 0 auto;">
                    <input id="radio-button-yes"  name="empresaradio" onclick="mostrarReferencia();" class="hide-radio" type="radio" value="Empresa" />
                    <label for="radio-button-yes">Empresa </label>
                    <input id="radio-button-no" checked="checked" name="empresaradio" onclick="mostrarReferencia();" class="hide-radio" type="radio" value="Particular" />
                    <label for="radio-button-no">Particular</label>
                    </div>
                </div>
                <div id="empresa" style="display:none;">
                    <?php
                    echo $this->Form->input('customer.company.name', [
                        'label' => ['text' => 'Nombre Empresa', 'class' => 'col-sm-3 control-label titulocolor titulocolor2'],
                        'class' => 'form-control input-sm',
                        'placeholder' => 'Nombre Empresa',
                        'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                    ]);
                    ?>
                    <?php
                    echo $this->Form->input('customer.company.nit', [
                        'label' => ['text' => 'Nit Empresa', 'class' => 'col-sm-3 control-label titulocolor titulocolor2'],
                        'class' => 'form-control input-sm',
                        'placeholder' => 'Nit',
                        'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                    ]);
                    ?>
                </div>
                <h4 class="text-primary">Persona de Contacto</h4>
                <?php
                echo $this->Form->input('customer.name', [
                    'label' => ['text' => 'Nombre', 'class' => 'col-sm-3 control-label titulocolor titulocolor2'],
                    'class' => 'form-control input-sm required',
                    'placeholder' => 'Nombre',
                    'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                ]);
                ?>
                <?php
                echo $this->Form->input('customer.surname', [
                    'label' => ['text' => 'Apellido', 'class' => 'col-sm-3 control-label titulocolor titulocolor2'],
                    'class' => 'form-control input-sm required',
                    'placeholder' => 'Apellido',
                    'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9 titulocolor'])
                ]);
                ?> 
                <?php
                echo $this->Form->input('customer.email', [
                    'label' => ['text' => 'Correo', 'class' => 'col-sm-3 control-label titulocolor titulocolor2'],
                    'class' => 'form-control input-sm required',
                    'id' => 'email',
                    'type' => 'email',
                    'placeholder' => 'Correo',
                    'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                ]);
                ?>
                <?php
                echo $this->Form->input('customer.phone_number', [
                    'label' => ['text' => 'Numero de Telefono', 'class' => 'col-sm-3 control-label titulocolor titulocolor2'],
                    'class' => 'form-control input-sm required',
                    'placeholder' => 'Número de teléfono',
                    'type' => 'number',
                    'min' => '0',
                    'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                ]);
                ?>
                <?php
                echo $this->Form->input('customer.department_id', [
                    'label' => ['text' => 'Departamento', 'class' => 'col-sm-3 control-label titulocolor titulocolor2'],
                    'class' => 'form-control input-sm required',
                    'id' => 'department_id',
                    'options' => $lstDpto,
                    'empty' => 'Seleccione Uno',
                    'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                ]);
                ?>
                <?php
                echo $this->Form->input('customer.city_id', [
                    'label' => ['text' => 'Municipio', 'class' => 'col-sm-3 control-label titulocolor titulocolor2'],
                    'class' => 'form-control input-sm required',
                    'empty' => 'Seleccione Uno',
                    'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9 city'])
                ]);
                ?>
                <?php
                echo $this->Form->input('customer.address', [
                    'label' => ['text' => 'Direccion', 'class' => 'col-sm-3 control-label titulocolor titulocolor2'],
                    'class' => 'form-control input-sm required',
                    'placeholder' => 'Dirección',
                    'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                ]);
                ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" required="true" class="form-checkbox" id="policy">
                        <strong>He leido y acepto las 
                        <?php echo $this->Html->link('Politicas de privacidad', '/files/terminos.pdf', ['class' => 'button', 'target' => '_blank']); ?> *</strong>
                    </label><br />
                    <span id="policy-message" style="display:none;color:red;">Debe estar de acuerdo con las políticas de privacidad</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="sendQuote">Enviar Cotización</button>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>

<script>
    function mostrarReferencia() {
        if (document.customers.empresaradio[0].checked == true) {
            document.getElementById('empresa').style.display = 'block';
        } else {
            document.getElementById('empresa').style.display = 'none';
        }
    }
    [].forEach.call(document.querySelectorAll('.hide-radio'), function (element) {
        element.style.display = 'none';
    });
    $(document).ready(function () {
        $('#department_id').change(function () {
            var selected = $(this).val();
            $.ajax({
                method: "POST",
                url: "<?= $this->Url->build(['action' => 'getCityByDepartment']) ?>",
                data: {id: $(this).val()}
            }).done(function (msg) {
                $(".city select").html(msg);
            });
        });
        var package_id;
        $(".sendQuote").click(function(){
           package_id = $(this).attr("rel"); 
        });
        $("#sendQuote").click(function(){
            var valid = true;
            $(".required").each(function(){
                if($(this).val() == ""){
                    valid = false;
                    $(this).css("background", "#FFE6E6");
                }else{
                    $(this).css("background", "#FFFFFF");
                }
            });
            if(IsEmail($("#email").val())){
                $("#email").css("background", "#FFFFFF");
            }else{
                valid = false;
                $("#email").css("background", "#FFE6E6");
            }
            if(valid){
                if(!$("#policy").is(":checked")){
                    valid = false;
                    $("#policy-message").fadeIn();
                }
            }
            if(valid){
                var url = "<?= $this->Url->build(['action' => 'quotesadd']) ?>";
                var data = $("form").serialize();
                data += "&package_id="+package_id;
                $.post(url, data).done(function(res){
                    if(res != 'error'){
                        $('#myModal').modal('hide');
                        alertify.success(" <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> La cotización Ha sido enviada al correo electrónico " + res);
                    }else{
                        alert("Ha ocurrido un error, por favor intente nuevamente.")
                    }
                });
            }
        });
    });
    function IsEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
</script>