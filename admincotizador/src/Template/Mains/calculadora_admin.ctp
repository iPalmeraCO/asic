<?php
echo $this->Html->script('angular/angular.min.js');
//echo $this->Html->css('/bootstrap-dist/css/bootstrap');
echo $this->Html->css('header_1');
echo $this->Html->css('calculator');
//echo $this->Html->css('responsive_1');
?>

<div class="row" ng-app="MyApp" ng-controller="CalculatorCtrl" ng-cloak>
    <div class="col-sm-12">
        <?php
        //<!-- PAGE HEADER-->
        echo $this->element('Body/page_headerAsic');
        ?>
        <div class="panel panel-danger">
            <div class="panel-heading">
            </div>
            <div class="row">
                <div class="col-md-4" style="text-align:center;padding-top:20px;">
                    <?php echo $this->Html->image('PC.png', ['height' => 200]) ?>
                </div>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-bordered"  width="100%" >
                            <thead>
                                <tr >
                                    <th colspan="2"><span style="color: #48A0DF;font-size: 18px;">COTIZADOR</span>
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-question-sign"></span> Tabla compatibilidad', '/files/ayuda.pdf', ['class' => 'btn btn-warning btn-xs', 'target' => '_blank', 'style' => 'float:right', 'escape' => false]); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        <span class="titulocolor">SERVIDOR</span>
                                        <p class="textocolor">{{selectedServidores.name}} x {{selectedServidores.cantidad}}</p>
                                        <span class="titulocolor">S.O.</span>
                                        <p class="textocolor">{{selectedSistema.name}} x {{selectedSistema.cantidad}}</p>
                                        <span class="titulocolor">CPU</span>
                                        <p class="textocolor">{{selectedProcesador.name}} x {{selectedProcesador.cantidad}}</p>
                                        <span class="titulocolor">MEMORIA</span>
                                        <p class="textocolor">{{selectedMemoria.name}} x {{selectedMemoria.cantidad}}</p>
                                    </td>
                                    <td width="50%">
                                        <span class="titulocolor">DISCO DURO</span>
                                        <p class="textocolor">{{selectedDisco.name}} x {{selectedDisco.cantidad}}</p>
                                        <span class="titulocolor">CONECTIVIDAD</span>
                                        <p class="textocolor">{{selectedConectividad.name}} x {{selectedConectividad.cantidad}}</p>
                                        <span class="titulocolor">ADICIONALES</span>
                                        <ul class="ultable" >
                                            <li  ng-repeat="name in selection"class="litable"><span class="textocolor">{{name.name}} x {{name.cantidad}}</span></li>
                                        </ul>
                                        <br/><br/><br/>
                                        <h4 class="titulocolor ">
                                            SUBTOTAL COP - 
                                            {{
                                                (suma(selectedSistema.costunitario, selectedSistema.tirs[selectedSistema.tirsselected].op, selectedSistema.cantidad)) +
                                                (suma(selectedProcesador.costunitario, selectedProcesador.tirs[selectedProcesador.tirsselected].op, selectedProcesador.cantidad)) +
                                                (suma(selectedMemoria.costunitario, selectedMemoria.tirs[selectedMemoria.tirsselected].op, selectedMemoria.cantidad)) +
                                                (suma(selectedDisco.costunitario, selectedDisco.tirs[selectedDisco.tirsselected].op, selectedDisco.cantidad)) +
                                                (suma(selectedConectividad.costunitario, selectedConectividad.tirs[selectedConectividad.tirsselected].op, selectedConectividad.cantidad)) +
                                                (suma(selectedServidores.costunitario, selectedServidores.tirs[selectedServidores.tirsselected].op, selectedServidores.cantidad)) +
                                                 getTotalAdicional() + 0 | currency
                                           }} 
                                        </h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <!-- Nav tabs -->
                        <ul id="myTabs" class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#servidor" aria-controls="servidor" role="tab" data-toggle="tab"><?php echo $this->Html->image('memoria.png', ['class' => 'img-icono', 'height' => '15']); ?> Servidores</a></li>
                            <li role="presentation" ><a href="#sop" aria-controls="sop" role="tab" data-toggle="tab"><?php echo $this->Html->image('sistema-operativo.png', ['class' => 'img-icono', 'height' => '15']); ?>  S.O.</a></li>
                            <li role="presentation" ><a href="#procesadore" aria-controls="procesadore" role="tab" data-toggle="tab"><?php echo $this->Html->image('procesador.png', ['class' => 'img-icono', 'height' => '15']); ?> CPUs</a></li>                                                
                            <li role="presentation" ><a href="#memoria" aria-controls="memoria" role="tab" data-toggle="tab"><?php echo $this->Html->image('memoria.png', ['class' => 'img-icono', 'height' => '15']); ?> Memorias</a></li>
                            <li role="presentation" ><a href="#discod" aria-controls="discod" role="tab" data-toggle="tab"><?php echo $this->Html->image('disco-duro.png', ['class' => 'img-icono', 'height' => '15']); ?> Discos Duros</a></li>
                            <li role="presentation" ><a href="#conectividad" aria-controls="conectividad" role="tab" data-toggle="tab"><?php echo $this->Html->image('disco-duro.png', ['class' => 'img-icono', 'height' => '15']); ?> Conectividad</a></li>
                            <li role="presentation" ><a href="#adicionales" aria-controls="adicionales" role="tab" data-toggle="tab"><?php echo $this->Html->image('adicional.png', ['class' => 'img-icono', 'height' => '15']); ?></span> Adicionales</a></li>
                        </ul>
                        <div class="row" style="margin-bottom:20px;">
                            <br />
                            <div class="col-md-12">
                                <div style="width:50%;float:left;">
                                    <?php echo $this->Form->button(__('<span class="glyphicon glyphicon-user"></span>  ' . 'Enviar Cotización'), ['class' => 'btn btn-default btn-sm', 'style' => 'margin-left:10px', 'ng-click' => 'cotizar()']); ?>
                                    <p style="color:red;margin:10px 0 0 0" ng-show="fillQuantity"><i class="fa fa-warning"></i> Por favor seleccione los elementos y las cantidades a cotizar.</p>
                                </div>
                                <div style="width:50%;float:left;">
                                    <select id="searchTech" ng-model="search.technology.name" class="form-control input-sm" style="width:auto;float:right; margin-right: 10px; display: none;">
                                        <option value="">Tipo de tecnología</option>
                                        <option value="POWER">POWER</option>
                                        <option value="SPARC">SPARC</option>
                                        <option value="INTEL">INTEL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="sop">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped" width="100%" >
                                                <thead>
                                                    <tr >
                                                        <th width="15%"><center><span class="titulocolor">ELEMENTO</span></center></th> 
                                                <th width="20%"> <center><span class="titulocolor">DESCRIPCIÓN</span></center></th> 
                                                <th width="5%"><center><span class="titulocolor">CANTIDAD</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">TIER</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO UNITARIO</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO TOTAL</span></center></th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="element in sistemaop | filter:search">
                                                        <td vAlign="middle" align="left" >
                                                            <div class="radio-inline">
                                                                <label >
                                                                    <input type="radio" ng-value="element"  ng-model="$parent.selectedSistema" /> <p class="textocolor " style="font-weight: bold;">{{element.name}}</p>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td><center><p class="textocolor" >{{element.description}} </p></center></td>
                                                <td><div class="col-sm-2 "><input type="number" min="0"  maxlength="4"size="4" style="width: 40px;" name="cantidad"  ng-model="element.cantidad"></div></td>
                                                <td><center> 
                                                    <select name="tirs" ng-model="element.tirsselected" ng-options="option.id as option.text for option in element.tirs"></select>
                                                </center></td>
                                                <td ><center><span class="textocolor">{{element.configuracion[0].total_sale_price + 0| currency}}</span></center></td>
                                                <td ><center><span class="textocolor">{{(suma(element.configuracion[0].total_sale_price, element.tirs[element.tirsselected].op, element.cantidad)) | currency}}</span></center></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="procesadore">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped" width="100%" >
                                                <thead>
                                                    <tr>
                                                        <th width="15%"><center><span class="titulocolor">ELEMENTO</span></center></th> 
                                                <th width="20%"> <center><span class="titulocolor">DESCRIPCIÓN</span></center></th> 
                                                <th width="5%"><center><span class="titulocolor">CANTIDAD</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">TIER</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO UNITARIO</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO TOTAL</span></center></th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="element in procesadores">
                                                        <td vAlign="middle" align="left" >
                                                            <div class="radio-inline">
                                                                <label >
                                                                    <input type="radio" ng-value="element"  ng-model="$parent.selectedProcesador" /> <p class="textocolor" style="font-weight: bold;">{{element.name}}</p>
                                                                </label>

                                                            </div>
                                                        </td>
                                                        <td><center><p class="textocolor">{{element.description}} </p></center></td>
                                                <td><div class="col-sm-2"><input type="number" min="0"    maxlength="4"size="4" style="width: 40px;" name="cantidad" ng-model="element.cantidad"></div></td>
                                                <td><center> 
                                                    <select name="tirs" ng-model="element.tirsselected" ng-options="option.id as option.text for option in element.tirs"></select>
                                                </center></td>
                                                <td ><center><span class="textocolor">{{element.configuracion[0].total_sale_price + 0| currency}}</span></center></td>
                                                <td ><center><span class="textocolor">{{(suma(element.configuracion[0].total_sale_price, element.tirs[element.tirsselected].op, element.cantidad)) | currency}}</span></center></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="memoria">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped" width="100%" >
                                                <thead>
                                                    <tr >
                                                        <th width="15%"><center><span class="titulocolor">ELEMENTO</span></center></th> 
                                                <th width="20%"> <center><span class="titulocolor">DESCRIPCIÓN</span></center></th> 
                                                <th width="5%"><center><span class="titulocolor">CANTIDAD</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">TIER</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO UNITARIO</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO TOTAL</span></center></th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="element in memoria">
                                                        <td vAlign="middle" align="left" >
                                                            <div class="radio-inline">
                                                                <label >
                                                                    <input type="radio" ng-value="element"  ng-model="$parent.selectedMemoria" /> <p class="textocolor" style="font-weight: bold;">{{element.name}}</p>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td><center><p class="textocolor">{{element.description}} </p></center></td>
                                                <td><div class="col-sm-2"><input type="number" min="0"    maxlength="4"size="4" style="width: 40px;" name="cantidad" ng-model="element.cantidad"></div></td>
                                                <td><center> 
                                                    <select name="tirs" ng-model="element.tirsselected" ng-options="option.id as option.text for option in element.tirs"></select>
                                                </center></td>
                                                <td ><center><span class="textocolor">{{element.configuracion[0].total_sale_price + 0| currency}}</span></center></td>
                                                <td ><center><span class="textocolor">{{(suma(element.configuracion[0].total_sale_price, element.tirs[element.tirsselected].op, element.cantidad)) | currency}}</span></center></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="discod">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped" width="100%" >
                                                <thead>
                                                    <tr>
                                                        <th width="15%"><center><span class="titulocolor">ELEMENTO</span></center></th> 
                                                <th width="20%"> <center><span class="titulocolor">DESCRIPCIÓN</span></center></th> 
                                                <th width="5%"><center><span class="titulocolor">CANTIDAD</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">TIER</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO UNITARIO</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO TOTAL</span></center></th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="element in discoduro">
                                                        <td vAlign="middle" align="left" >
                                                            <div class="radio-inline">
                                                                <label >
                                                                    <input type="radio" ng-value="element"  ng-model="$parent.selectedDisco" /> <p class="textocolor" style="font-weight: bold;">{{element.name}}</p>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td><center><p class="textocolor">{{element.description}} </p></center></td>
                                                <td><div class="col-sm-2"><input type="number" min="0"    maxlength="4" size="4" style="width: 40px;"  name="cantidad" ng-model="element.cantidad"></div></td>
                                                <td><center> 
                                                    <select name="tirs" ng-model="element.tirsselected" ng-options="option.id as option.text for option in element.tirs"></select>
                                                </center></td>
                                                <td ><center><span class="textocolor">{{element.configuracion[0].total_sale_price + 0| currency}}</span></center></td>
                                                <td ><center><span class="textocolor">{{(suma(element.configuracion[0].total_sale_price, element.tirs[element.tirsselected].op, element.cantidad)) | currency}}</span></center></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="conectividad">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped" width="100%" >
                                                <thead>
                                                    <tr >
                                                        <th width="15%"><center><span class="titulocolor">ELEMENTO</span></center></th> 
                                                <th width="20%"> <center><span class="titulocolor">DESCRIPCIÓN</span></center></th> 
                                                <th width="5%"><center><span class="titulocolor">CANTIDAD</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">TIER</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO UNITARIO</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO TOTAL</span></center></th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="element in conectividad">
                                                        <td vAlign="middle" align="left" >
                                                            <div class="radio-inline">
                                                                <label >
                                                                    <input type="radio" ng-value="element"  ng-model="$parent.selectedConectividad" /> <p class="textocolor" style="font-weight: bold;">{{element.name}}</p>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td><center><p class="textocolor">{{element.description}} </p></center></td>
                                                <td><div class="col-sm-2"><input type="number" min="0"    maxlength="4"size="4" style="width: 40px;"  name="cantidad" ng-model="element.cantidad"></div></td>
                                                <td><center> 
                                                    <select name="tirs" ng-model="element.tirsselected" ng-options="option.id as option.text for option in element.tirs"></select>
                                                </center></td>
                                                <td ><center><span class="textocolor">{{element.configuracion[0].total_sale_price + 0| currency}}</span></center></td>
                                                <td ><center><span class="textocolor">{{(suma(element.configuracion[0].total_sale_price, element.tirs[element.tirsselected].op, element.cantidad)) | currency}}</span></center></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="servidor">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped" width="100%" >
                                                <thead>

                                                    <tr >
                                                        <th width="15%"><center><span class="titulocolor">ELEMENTO</span></center></th> 
                                                <th width="20%"> <center><span class="titulocolor">DESCRIPCIÓN</span></center></th> 
                                                <th width="5%"><center><span class="titulocolor">CANTIDAD</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">TIER</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO UNITARIO</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO TOTAL</span></center></th> 
                                                </tr>
                                                </thead>
                                                <tbody>

                                                    <tr ng-repeat="element in servidores">
                                                        <td vAlign="middle" align="left" >
                                                            <div class="radio-inline">
                                                                <label >
                                                                    <input type="radio" ng-value="element"  ng-model="$parent.selectedServidores" /> <p class="textocolor">{{element.name}}</p>
                                                                </label>

                                                            </div>


                                                        </td>
                                                        <td><center><p class="textocolor">{{element.description}} </p></center></td>
                                                <td><div class="col-sm-2"><input type="number" min="0"    maxlength="4"size="4" style="width: 40px;"  name="cantidad" ng-model="element.cantidad"></div></td>
                                                <td><center> 
                                                    <select name="tirs" ng-model="element.tirsselected" ng-options="option.id as option.text for option in element.tirs"></select>
                                                </center></td>
                                                <td ><center><span class="textocolor">{{element.configuracion[0].total_sale_price + 0| currency}}</span></center></td>
                                                <td ><center><span class="textocolor">{{(suma(element.configuracion[0].total_sale_price, element.tirs[element.tirsselected].op, element.cantidad)) | currency}}</span></center></td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="adicionales">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped" width="100%">
                                                <thead>
                                                    <tr >
                                                        <th width="15%"><center><span class="titulocolor">ELEMENTO</span></center></th> 
                                                <th width="20%"> <center><span class="titulocolor">DESCRIPCIÓN</span></center></th> 
                                                <th width="5%"><center><span class="titulocolor">CANTIDAD</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">TIER</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO UNITARIO</span></center></th> 
                                                <th width="20%"><center><span class="titulocolor">COSTO TOTAL</span></center></th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="otro in adicionales">
                                                        <td>
                                                            <div class="radio-inline">
                                                                <label >
                                                                    <input id="{{otro.name}}" type="checkbox" value="{{otro.name}}" ng-checked="selection.indexOf(otro.name) > -1"
                                                                           ng-click="toggleSelection(otro)" /><span class="textocolor" style="font-weight: bold;"> {{otro.name}}</span>
                                                                                                                                    <!--<input type="checkbox"> {{otro.description_resource_units}}-->

                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td align="center"><p class="textocolor">{{otro.description}}</p></td>
                                                        <td><div class="col-sm-2"><input type="number" min="0"    maxlength="4"size="4" style="width: 40px;"  name="cantidad" ng-model="otro.cantidad"></div></td>
                                                        <td>
                                                            <center> 
                                                                <select name="tirs" ng-model="otro.tirsselected" ng-options="option.id as option.text for option in otro.tirs"></select>
                                                            </center>
                                                        </td>
                                                        <td><center><span class="textocolor">{{otro.configuracion[0].total_sale_price + 0| currency}}</span></center></td>
                                                        <td ><center><span class="textocolor" >{{(suma(otro.configuracion[0].total_sale_price, otro.tirs[otro.tirsselected].op, otro.cantidad)) | currency}}</span></center></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var prevIndex = 0;
    $('#myTabs a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
        $("#myTabs li:eq(" + prevIndex + ")").addClass("completo");
        prevIndex = $("#myTabs li a").index(this);
        if ($(this).attr("href") == "#sop") {
            $("#searchTech").fadeIn();
        } else {
            $("#searchTech").fadeOut();
        }
    });

</script>
<script>
    var app = angular.module('MyApp', []);
    var url = "<?= $this->Url->build(array('controller' => 'mains', 'action' => 'elements.json')) ?>";
    app.controller('CalculatorCtrl', function($scope, $http) {
        $http.post(url, {name: 'sistema operativo'}).success(function(data) {
            $scope.sistemaop = data.listObj;
            $scope.selectedSistema = $scope.sistemaop[0];
            $scope.tirs = [];
            for (var i = 0; i < $scope.sistemaop.length; i++) {
                $scope.tir = [{"id": 0, "op": $scope.sistemaop[i].configuracion[0].tier1, "text": 'Tier 1', "select":false},
                    {"id": 1, "op": $scope.sistemaop[i].configuracion[0].tier2, "text": 'Tier 2', "select":false},
                    {"id": 2, "op": $scope.sistemaop[i].configuracion[0].tier3, "text": 'Tier 3', "select":false},
                    {"id": 3, "op": $scope.sistemaop[i].configuracion[0].tier4, "text": 'Tier 4', "select":true}];
                $scope.sistemaop[i].tirs = $scope.tir;
                $scope.sistemaop[i].tirsselected =3;
                $scope.sistemaop[i].cantidad = 0;
                $scope.sistemaop[i].costunitario = $scope.sistemaop[i].configuracion[0].total_sale_price;
            }
        });
        $http.post(url, {name: 'procesadores'}).success(function(data) {
            $scope.procesadores = data.listObj;
            $scope.selectedProcesador = $scope.procesadores[0];
            $scope.tirs = [];
            for (var i = 0; i < $scope.procesadores.length; i++) {
                $scope.tir = [{"id": 0, "op": $scope.procesadores[i].configuracion[0].tier1, "text": 'Tier 1', "select":false},
                    {"id": 1, "op": $scope.procesadores[i].configuracion[0].tier2, "text": 'Tier 2', "select":false},
                    {"id": 2, "op": $scope.procesadores[i].configuracion[0].tier3, "text": 'Tier 3', "select":false},
                    {"id": 3, "op": $scope.procesadores[i].configuracion[0].tier4, "text": 'Tier 4', "select":true}];
                $scope.procesadores[i].tirs = $scope.tir;
                $scope.procesadores[i].tirsselected = 3;
                $scope.procesadores[i].cantidad = 0;
                $scope.procesadores[i].costunitario = $scope.procesadores[i].configuracion[0].total_sale_price;
            }
        });
        $http.post(url, {name: 'memorias'}).success(function(data) {
            $scope.memoria = data.listObj;
            $scope.selectedMemoria = $scope.memoria[0];
            $scope.tirs = [];
            for (var i = 0; i < $scope.memoria.length; i++) {
                $scope.tir = [{"id": 0, "op": $scope.memoria[i].configuracion[0].tier1, "text": 'Tier 1', "select":false},
                    {"id": 1, "op": $scope.memoria[i].configuracion[0].tier2, "text": 'Tier 2', "select":false},
                    {"id": 2, "op": $scope.memoria[i].configuracion[0].tier3, "text": 'Tier 3', "select":false},
                    {"id": 3, "op": $scope.memoria[i].configuracion[0].tier4, "text": 'Tier 4', "select":true}];
                $scope.memoria[i].tirs = $scope.tir;
                $scope.memoria[i].tirsselected = 3;
                $scope.memoria[i].cantidad = 0;
                $scope.memoria[i].costunitario = $scope.memoria[i].configuracion[0].total_sale_price;
            }
        });
        $http.post(url, {name: 'discos duros'}).success(function(data) {
            $scope.discoduro = data.listObj;
            $scope.selectedDisco = $scope.discoduro[0];
            $scope.tirs = [];
            for (var i = 0; i < $scope.discoduro.length; i++) {
                $scope.tir = [{"id": 0, "op": $scope.discoduro[i].configuracion[0].tier1, "text": 'Tier 1', "select":false},
                    {"id": 1, "op": $scope.discoduro[i].configuracion[0].tier2, "text": 'Tier 2', "select":false},
                    {"id": 2, "op": $scope.discoduro[i].configuracion[0].tier3, "text": 'Tier 3', "select":false},
                    {"id": 3, "op": $scope.discoduro[i].configuracion[0].tier4, "text": 'Tier 4', "select":true}];
                $scope.discoduro[i].tirs = $scope.tir;
                $scope.discoduro[i].tirsselected = 3;
                $scope.discoduro[i].cantidad = 0;
                $scope.discoduro[i].costunitario = $scope.discoduro[i].configuracion[0].total_sale_price;
            }
        });
        $http.post(url, {name: 'conectividad'}).success(function(data) {
            $scope.conectividad = data.listObj;
            $scope.selectedConectividad = $scope.conectividad[0];
            $scope.tirs = [];
            for (var i = 0; i < $scope.conectividad.length; i++) {
                $scope.tir = [{"id": 0, "op": $scope.conectividad[i].configuracion[0].tier1, "text": 'Tier 1', "select":false},
                    {"id": 1, "op": $scope.conectividad[i].configuracion[0].tier2, "text": 'Tier 2', "select":false},
                    {"id": 2, "op": $scope.conectividad[i].configuracion[0].tier3, "text": 'Tier 3', "select":false},
                    {"id": 3, "op": $scope.conectividad[i].configuracion[0].tier4, "text": 'Tier 4', "select":true}];
                $scope.conectividad[i].tirs = $scope.tir;
                $scope.conectividad[i].tirsselected = 3;
                $scope.conectividad[i].cantidad = 0;
                $scope.conectividad[i].costunitario = $scope.conectividad[i].configuracion[0].total_sale_price;
            }
        });
        $http.post(url, {name: 'servidores'}).success(function(data) {
            $scope.servidores = data.listObj;
            $scope.selectedServidores = $scope.servidores[0];
            $scope.tirs = [];
            for (var i = 0; i < $scope.servidores.length; i++) {
                $scope.tir = [{"id": 0, "op": $scope.servidores[i].configuracion[0].tier1, "text": 'Tier 1', "select":false},
                    {"id": 1, "op": $scope.servidores[i].configuracion[0].tier2, "text": 'Tier 2', "select":false},
                    {"id": 2, "op": $scope.servidores[i].configuracion[0].tier3, "text": 'Tier 3', "select":false},
                    {"id": 3, "op": $scope.servidores[i].configuracion[0].tier4, "text": 'Tier 4', "select":true}];
                $scope.servidores[i].tirs = $scope.tir;
                $scope.servidores[i].tirsselected = 3;
                $scope.servidores[i].cantidad = 0;
                $scope.servidores[i].costunitario = $scope.servidores[i].configuracion[0].total_sale_price;
            }
        });
        $http.post(url, {name: 'adicionales'}).success(function(data) {
            $scope.adicionales = data.listObj;
            $scope.tirs = [];
            for (var i = 0; i < $scope.adicionales.length; i++) {
                $scope.tir = [{"id": 0, "op": $scope.adicionales[i].configuracion[0].tier1, "text": 'Tier 1', "select":false},
                    {"id": 1, "op": $scope.adicionales[i].configuracion[0].tier2, "text": 'Tier 2', "select":false},
                    {"id": 2, "op": $scope.adicionales[i].configuracion[0].tier3, "text": 'Tier 3', "select":false},
                    {"id": 3, "op": $scope.adicionales[i].configuracion[0].tier4, "text": 'Tier 4', "select":true}];
                $scope.adicionales[i].tirs = $scope.tir;
                $scope.adicionales[i].tirsselected = 3;
                $scope.adicionales[i].cantidad = 0;
                $scope.adicionales[i].costunitario = $scope.adicionales[i].configuracion[0].total_sale_price;
            }
        });


        $scope.comprobar = function(d1) {
            if (d1 < 0) {
                return 0;
            }
        };

        $scope.suma = function(d1, d2, d3) {
            var sum = 0;
            if ((d1 != null) && (d2 != null) && (d3 != null)) {
                sum = parseFloat(d1) + parseFloat(d2);
                sum = sum * parseFloat(d3);
                if (sum === null) {
                    sum = 0;
                }
            }
            return sum;
        };

        $scope.selection = [];
        $scope.toggleSelection = function toggleSelection(Adcional) {
            var idx = $scope.selection.indexOf(Adcional);
            if (idx > -1) {
                $scope.selection.splice(idx, 1);
            }
            else {
                $scope.selection.push(Adcional);
            }
        };

        $scope.getTotalA = function() {
            var total = 0;
            for (var i = 0; i < $scope.selection.length; i++) {
                var precio = $scope.selection[i];
                total += 0;
            }
            return total;
        };

        $scope.getTotalAdicional = function() {
            var total = 0;
            for (var i = 0; i < $scope.selection.length; i++) {
                var precio = $scope.selection[i];
                if ((parseFloat(precio.costunitario) !== null) && (parseFloat(precio.tirs[precio.tirsselected].op) !== null) && (parseFloat(precio.cantidad) !== null)) {
                    total += ((parseFloat(precio.costunitario) + parseFloat(precio.tirs[precio.tirsselected].op)) * parseFloat(precio.cantidad));
                }
            }
            return total;
        };


        $scope.cotizar = function() {
            if(
            $scope.selectedServidores.cantidad > 0 && $scope.selectedSistema.cantidad > 0 && 
            $scope.selectedProcesador.cantidad > 0 && $scope.selectedMemoria.cantidad > 0 && 
            $scope.selectedDisco.cantidad > 0 && $scope.selectedConectividad.cantidad > 0 && 
            $scope.selectedConectividad.cantidad > 0
              ){
                $scope.fillQuantity = false;
              }else{
                $scope.fillQuantity = true;
              }
            if(!$scope.fillQuantity){
            var selection = [];
            $scope.selection.forEach(function(elem) {
                selection.push({
                    id: elem.id,
                    name: elem.name,
                    quantity: elem.cantidad,
                    description: elem.description,
                    unit_cost: elem.costunitario,
                    tir: elem.tirs[elem.tirsselected].text,
                    total: $scope.suma(elem.costunitario, elem.tirs[elem.tirsselected].op, elem.cantidad)
                });
            });
            var data = {
                system: {
                    id: $scope.selectedSistema.id,
                    name: $scope.selectedSistema.name,
                    quantity: $scope.selectedSistema.cantidad,
                    description: $scope.selectedSistema.description,
                    unit_cost: $scope.selectedSistema.costunitario,
                    tir: $scope.selectedSistema.tirs[$scope.selectedSistema.tirsselected].text,
                    total: $scope.suma($scope.selectedSistema.costunitario,$scope.selectedSistema.tirs[$scope.selectedSistema.tirsselected].op, $scope.selectedSistema.cantidad)
                },
                processor: {
                    id: $scope.selectedProcesador.id,
                    name: $scope.selectedProcesador.name,
                    quantity: $scope.selectedProcesador.cantidad,
                    description: $scope.selectedProcesador.description,
                    unit_cost: $scope.selectedProcesador.costunitario,
                    tir: $scope.selectedProcesador.tirs[$scope.selectedProcesador.tirsselected].text,
                    total: $scope.suma($scope.selectedProcesador.costunitario, $scope.selectedProcesador.tirs[$scope.selectedProcesador.tirsselected].op, $scope.selectedProcesador.cantidad)
                },
                memory: {
                    id: $scope.selectedMemoria.id,
                    name: $scope.selectedMemoria.name,
                    quantity: $scope.selectedMemoria.cantidad,
                    description: $scope.selectedMemoria.description,
                    unit_cost: $scope.selectedMemoria.costunitario,
                    tir: $scope.selectedMemoria.tirs[$scope.selectedMemoria.tirsselected].text,
                    total: $scope.suma($scope.selectedMemoria.costunitario, $scope.selectedMemoria.tirs[$scope.selectedMemoria.tirsselected].op, $scope.selectedMemoria.cantidad)
                },
                harddisk: {
                    id: $scope.selectedDisco.id,
                    name: $scope.selectedDisco.name,
                    quantity: $scope.selectedDisco.cantidad,
                    description: $scope.selectedDisco.description,
                    unit_cost: $scope.selectedDisco.costunitario,
                    tir: $scope.selectedDisco.tirs[$scope.selectedDisco.tirsselected].text,
                    total: $scope.suma($scope.selectedDisco.costunitario, $scope.selectedDisco.tirs[$scope.selectedDisco.tirsselected].op, $scope.selectedDisco.cantidad)
                },
                connectivity: {
                    id: $scope.selectedConectividad.id,
                    name: $scope.selectedConectividad.name,
                    quantity: $scope.selectedConectividad.cantidad,
                    description: $scope.selectedConectividad.description,
                    unit_cost: $scope.selectedConectividad.costunitario,
                    tir: $scope.selectedConectividad.tirs[$scope.selectedConectividad.tirsselected].text,
                    total: $scope.suma($scope.selectedConectividad.costunitario, $scope.selectedConectividad.tirs[$scope.selectedConectividad.tirsselected].op, $scope.selectedConectividad.cantidad)
                },
                servers: {
                    id: $scope.selectedServidores.id,
                    name: $scope.selectedServidores.name,
                    quantity: $scope.selectedServidores.cantidad,
                    description: $scope.selectedServidores.description,
                    unit_cost: $scope.selectedServidores.costunitario,
                    tir: $scope.selectedServidores.tirs[$scope.selectedServidores.tirsselected].text,
                    total: $scope.suma($scope.selectedServidores.costunitario, $scope.selectedServidores.tirs[$scope.selectedServidores.tirsselected].op, $scope.selectedServidores.cantidad)
                },
                additionals: selection,
                subtotal: ($scope.suma($scope.selectedSistema.costunitario,$scope.selectedSistema.tirs[$scope.selectedSistema.tirsselected].op, $scope.selectedSistema.cantidad))
                        + ($scope.suma($scope.selectedProcesador.costunitario, $scope.selectedProcesador.tirs[$scope.selectedProcesador.tirsselected].op, $scope.selectedProcesador.cantidad))
                        + ($scope.suma($scope.selectedMemoria.costunitario, $scope.selectedMemoria.tirs[$scope.selectedMemoria.tirsselected].op, $scope.selectedMemoria.cantidad))
                        + ($scope.suma($scope.selectedDisco.costunitario, $scope.selectedDisco.tirs[$scope.selectedDisco.tirsselected].op, $scope.selectedDisco.cantidad))
                        + ($scope.suma($scope.selectedConectividad.costunitario, $scope.selectedConectividad.tirs[$scope.selectedConectividad.tirsselected].op, $scope.selectedConectividad.cantidad))
                        + ($scope.suma($scope.selectedServidores.costunitario, $scope.selectedServidores.tirs[$scope.selectedServidores.tirsselected].op, $scope.selectedServidores.cantidad))
                        + $scope.getTotalAdicional()
                
            };
            var url = "<?= $this->Url->build(['controller' => 'mains', 'action' => 'quotesAdd']) ?>";
<?php
$session = $this->request->session();
$user = $session->read('Auth.User');
?>
            var correo = "<?= $user['email'] ?>";
            $http.post(url, data).success(function(res) {
                //console.log(res);
                ok(" <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> La Cotización Ha sido enviada al correo " + correo);
            });
            }
        };
    });
</script>
