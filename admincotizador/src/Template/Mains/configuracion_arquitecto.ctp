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

            <table id="dt_table_tools" class="dt_table_tools table table-striped" style="font-size:9px;" width="100%">
                <thead> 
                    <tr>
                        <?php
                        foreach ($infoView['table'] as $obj):
                            $title = '';
                            $width='10%';
                            if (isset($obj['title'])){$title = $obj['title'];}
                            if (isset($obj['width'])){$width = $obj['width'];}
                            echo '<th title="'.$title.'" width="'.$width.'" class="' . $obj['class'] . '" >' . $obj[1] . '</th>';
                        endforeach;
                        
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
                            } 
                            else if($obj[0] == 'unit_cost'){
                                echo '$ ' . number_format($objData[$obj[0]], 2, '.', ',');
                            }
                            else if($obj[0] == 'total_sale_price'){
                                echo '$ ' . number_format($objData[$obj[0]], 2, '.', ',');
                            }
                            else if($obj[0] == 'tier1'){
                                echo  number_format($objData[$obj[0]], 2, '.', ',');
                            }
                            else if($obj[0] == 'tier2'){
                                echo  number_format($objData[$obj[0]], 2, '.', ',');
                            }
                            else if($obj[0] == 'tier3'){
                                echo number_format($objData[$obj[0]], 2, '.', ',');
                            }
                            else if($obj[0] == 'tier4'){
                                echo number_format($objData[$obj[0]], 2, '.', ',');
                            }
                            else {
                                echo $objData[$obj[0]];
                            }
                            echo '</td>';
                        endforeach;
                        
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