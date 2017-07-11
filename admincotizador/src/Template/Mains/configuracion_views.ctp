<style>
    .currency {
        padding-left:12px;
    }

    .currency-symbol {
        position:absolute;
        padding: 1px 5px;
    }
</style>


<div class="row">
    <div class="col-sm-12">
        <?php
        //<!-- PAGE HEADER-->
        echo $this->element('Body/page_headerAsic');
        ?>
        <div class="panel panel-danger">
            <div class="panel-heading">
                
            </div>

            <table id="dt_scroll2" class="dt_table_tools table table-striped" style="font-size:9px;" width="100%">
                <thead> 
                    <tr>
                        <?php
                        foreach ($infoView['table'] as $obj):
                            echo '<th width="4%" class="' . $obj['class'] . '" >' . $obj[1] . '</th>';
                        endforeach;
                        echo '<th width="10%" class="center" title="COSTO UNITARIO">C.U.</th>';
                        echo '<th width="9%" class="center" title="% MARGEN">% MRG</th>';
                        echo '<th width="13%" class="center" title="PRECIO DE VENTA TOTAL">P VENTA</th>';
                        echo '<th width="11%" class="center">COSTO TIER 1</th>';
                        echo '<th width="11%" class="center">COSTO TIER 2</th>';
                        echo '<th width="11%" class="center">COSTO TIER 3</th>';
                        echo '<th width="11%" class="center">COSTO TIER 4</th>';
                        echo '<th width="12%" class="center">OBSERVACIONES</th>';
                        ?>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listObj as $objData):
                        echo '<tr >';
                        foreach ($infoView['table'] as $obj):
                            echo '<td class="' . $obj['class'] . ' center">';
                            if ($obj[0] == 'element_id') {
                                if ($obj[3] == 'category') {
                                    echo $objData['element']['category']['name'];
                                }
                                if ($obj[3] == 'name') {
                                    echo $objData['element']['name'];
                                }
                                if ($obj[3] == 'description') {
                                    echo $objData['element']['description'] . ' ' . $objData['element']['unitymeasure']['name'];
                                }
                                if ($obj[3] == 'medida') {
                                    echo $objData['element']['unitymeasure']['name'];
                                }
                            } else {
                                echo $objData[$obj[0]];
                            }
                            echo '</td>';
                        endforeach;
                        $url = $this->Url->build(['controller' => 'mains', 'action' => 'configurador_edit', $objData['id']]);
                        echo '<td>';
                        
                        $strName = number_format($objData['unit_cost'], 2, '.', ',');
                        echo $this->Form->input('unit_cost', [
                            'value' => number_format($objData['unit_cost'], 2, '.', ','),
                            'conf_id' => $objData['id'],
                            'type' => 'text',
                            'label' => false,
                            'style' => 'width:70px;',
                            'class' => 'form-control input-sm number unit_cost',
                            'required' => false,
                            'placeholder' => 'Costo Unitario',
                            'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                        ]);
                        echo '<span class="strName unit_cost_2">'.$strName.'</span>';
                        
                        echo '</td>';

                        echo '<td >';
                        $strName = $objData['margin'];
                        echo $this->Form->input('margin', [
                            'value' => $objData['margin'],
                            'conf_id' => $objData['id'],
                            'label' => false,
                            'style' => 'width:40px;',
                            'class' => 'form-control input-sm margin',
                            'required' => false,
                            'placeholder' => 'Margen %',
                            'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                        ]);
                        echo '<span id="margin" class="strName margin_2">'.$strName.'</span>';
                        echo '</td>';

                        echo '<td style="text-align: left;"  class="total_sale_price" width="30px">';
                        echo '$      ' . number_format($objData['total_sale_price'], 2, '.', ',');
                        echo '</td>';

                        echo '<td >';
                        $strName =  number_format($objData['tier1'], 2, '.', ',');
                        echo $this->Form->input('tier1', [
                            'value' => number_format($objData['tier1'], 2, '.', ','),
                            'conf_id' => $objData['id'],
                            'label' => false,
                            'style' => 'width:50px;',
                            'class' => 'form-control number input-sm tier1',
                            'required' => false,
                            'placeholder' => 'Tier 1',
                            'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                        ]);
                        echo '<span id="tier1" class="strName tier1_2">'.$strName.'</span>';
                        echo '</td>';

                        echo '<td >';
                        $strName = number_format($objData['tier2'], 2, '.', ',');
                        echo $this->Form->input('tier2', [
                            'value' => number_format($objData['tier2'], 2, '.', ','),
                            'conf_id' => $objData['id'],
                            'label' => false,
                            'style' => 'width:50px;',
                            'class' => 'form-control number input-sm tier2',
                            'required' => false,
                            'placeholder' => 'Tier 2',
                            'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                        ]);
                        echo '<span id="tier2" class="strName tier2_2">'.$strName.'</span>';
                        echo '</td>';

                        echo '<td class="btn-toolbar center">';
                        echo $this->Form->input('tier3', [
                            'value' => number_format($objData['tier3'], 2, '.', ','),
                            'conf_id' => $objData['id'],
                            'label' => false,
                            'style' => 'width:50px;',
                            'class' => 'form-control number input-sm tier3',
                            'required' => false,
                            'placeholder' => 'Tier 3',
                            'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                        ]);
                        echo '<span id="tier3" class="strName tier3_2">'.$strName.'</span>';
                        echo '</td>';
                        echo '<td >';
                        $strName = number_format($objData['tier4'], 2, '.', ',');
                        echo $this->Form->input('tier4', [
                            'value' => $strName,
                            'conf_id' => $objData['id'],
                            'label' => false,
                            'style' => 'width:50px;',
                            'class' => 'form-control number input-sm tier4',
                            'required' => false,
                            'placeholder' => 'Tier 4',
                            'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                        ]);
                        echo '<span id="tier4" class="strName tier4_2">'.$strName.'</span>';
                        echo '</td>';
                        echo '<td >';
                        $strName = $objData['observations'];
                        echo $this->Form->input('observations', [
                            'value' => $strName,
                            'conf_id' => $objData['id'],
                            'label' => false,
                            'style' => 'width:70px;',
                            'class' => 'form-control input-sm observations',
                            'required' => false,
                            'placeholder' => 'Observaciones',
                            'maxlength' => '255',
                            'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-9'])
                        ]);
                        echo '<span id="tier4" class="strName observaciones_2">'.$strName.'</span>';
                        echo '</td>';
                        echo '</tr>';
                    endforeach;
                    ?>                                        
                </tbody>
            </table>

        </div>
    </div>
</div>




<script>
    /*document.getElementsByClassName("number").onblur =function (){    
     this.value = parseFloat(this.value.replace(/,/g, ""))
     .toFixed(2)
     .toString()
     .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     
     //ocument.getElementById("display").value = this.value.replace(/,/g, "")
     
     }*/
    alertify.error(" <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Tenga en cuenta que si los datos no le aparecen actualizados al exportar, Refresque la pagina"); 
    $(function () {
        $(".number").blur(function () {
            $(this).val(parseFloat($(this).val().replace(/,/g, ""))
                    .toFixed(2)
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        });

        $("#dt_scroll1").dataTable();
        var num;
        $(".margin").focus(function () {
            num = $(this).val();
        });
        $(".unit_cost, .margin, .tier1, .tier2, .tier3, .tier4, .observations").change(function () {
            var valid = true;
            if ($(this).hasClass("margin")) {
                if ($(this).val() > 100 || $(this).val() < 0) {
                    
                    alertify.error(" <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> El valor debe ser entre 0 y 100"); 
                    $(this).val(num);
                    $(this).focus();
                    valid = false;
                }
                else{
                    
                }
                
            }
            if (valid) {
                var class1 = $(this).attr("class").split(" ");
                class1 = class1[class1.length - 1];
                var this1 = this;
                
                $.ajax({
                    method: "POST",
                    url: "<?= $this->Url->build(['action' => 'configurador_edit_field']) ?>",
                    data: {class: class1, id: $(this).attr("conf_id"), value: $(this).val()}
                }).done(function (msg) {
                                        $(this1).parent().parent().parent().parent().find(".total_sale_price").text(msg);
                                        
                });
            }
        });
    });


</script>

<style type="text/css" >
    .strName{
        display: none;
        visibility: hidden;
    }
</style>

<style type="text/css" media="print">
    .strName{
        visibility: visible;
    }
</style>