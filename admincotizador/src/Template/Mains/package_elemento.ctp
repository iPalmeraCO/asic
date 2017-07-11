

<div class="row">
    <?= $this->Html->css(array('/js/bootstrap-switch/bootstrap-switch.min'), array('block' => true)); ?>
    <div class="col-sm-12">
        <?php
                //<!-- PAGE HEADER-->
                echo $this->element('Body/page_headerAsic');
                ?>
        <div class="panel panel-danger">
            <div class="panel-heading">
                
            </div>
            
            <?php
                        foreach ($infoView['table2'] as $obj):
                             if ($obj[0] == 'os_id') {
                                $data =  $listObjP['element']['name'];
                            }
                            else if ($obj[0] == 'image') {
                                if($listObjP['image'] ){
                                    $img = WWW_ROOT.'attachment/packages/'.$listObjP['image']; 
                                    if (file_exists($img)){
                                        $data = $this->Html->image('../attachment/packages/'.$listObjP['image'], ['alt' => '', 'width'=>60,'height'=>90]);
                                    }
                                    else{
                                        $data =   $this->Html->image('default_asic.jpg', ['alt' => '', 'height'=>90]);
                                    }
                                }
                                else{
                                     $data =   $this->Html->image('default_asic.jpg', ['alt' => '', 'height'=>90]);
                                }
                                
                            }
                            else if ($obj[0] == 'technology_id') {
                                $data = $listObjP['technology']['name'];
                            }
                            else if ($obj[0] == 'status_id') {
                                if ($listObjP[$obj[0]]==1){
                                    $data = 'Activo';
                                }
                                else{
                                    $data = 'Inactivo';
                                }
                            }
                            else {
                                $data = $listObjP[$obj[0]];
                            }
                            echo '<br><strong>' . $obj[1] . ':' . '</strong>   ' . $data . '</br>';
//                            echo '<br><strong>' . $obj[1] . ':' . '</strong>   ' . $listObjP[$obj[0]] . '</br>';
                        endforeach;
                        ?>
            <br/>
            <br/>
            <table id="dt_basic" class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <?php
                        foreach ($infoView['table'] as $obj):
                            echo '<th class="' . $obj['class'] . '">' . $obj[1] . '</th>';
                        endforeach;
                        
                        ?>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach ($listObj as $objData):
                        echo '<tr class="gradeX">';
                        foreach ($infoView['table'] as $obj):
                            // echo '<td class="' . $obj['class'] . ' center">' . $objData[$obj[0]] . '</td>';
                            echo '<td class="' . $obj['class'] . ' center">';
                            if ($obj[0] == 'category_id') {
                                echo $objData['category']['name'];
                            } else if ($obj[0] == 'technology_id') {
                                echo $objData['technology']['name'];
                            } else if ($obj[0] == 'Unity_measure_id') {
                                echo $objData['unitymeasure']['name'];
                            } 
                            else if ($obj[0] == 'element_id') {
                                $r =array_column($listObjPE, 'elements_id');
                                $rid =array_column($listObjPE, 'id');
                                
                                $id = $objData['id'];
                                
                                $key = array_search($id, $r);
                                
                                
                                if (in_array($objData['id'], $r)){
                                    echo $this->Form->input('status_id',['elements_id' => $objData['id'],'package_id' => $listObjP['id'],'class'=>'checkboxelemento','label'=>false,'type'=>'checkbox','checked'=>'checked']);
                                }
                                else{
                                    echo $this->Form->input('status_id',['elements_id' => $objData['id'],'package_id' => $listObjP['id'],'class'=>'checkboxelemento','label'=>false,'type'=>'checkbox']);
                                }
                                
                            }else {
                                echo $objData[$obj[0]];
                            }
                            echo '</td>';
                            //  echo '<td class="' . $obj['class'] . ' center">' .($obj[0] == 'category_id' ? $objData['Category']['name'] : $objData[$obj[0]]). ($obj[0] == 'technology_id' ? $objData['technology']['name'] : $objData[$obj[0]]).  ($obj[0] == 'unitymeasure_id' ? $objData['unitymeasure']['name'] : $objData[$obj[0]]).'</td>';
//                                               echo '<td class="' . $obj['class'] . ' center">' .($obj[0] == 'category_id' ? $objData['Category']['name'] : $objData[$obj[0]]). '</td>';
                        endforeach;
                        

                        echo '</tr>';
                    endforeach;
                    ?>                                        
                </tbody>
            </table>

        </div>
    </div>
</div>


<script>
$(function(){
   $(".checkboxelemento").change(function(){
       var class1 = $(this).attr("class").split(" ");
       class1 = class1[class1.length-1];
       var this1 = this;
       $.ajax({
           method: "POST",
           url: "<?=$this->Url->build(['action' => 'package_elem'])?>",
           data: { class: class1, ide: $(this).attr("elements_id"),idp: $(this).attr("package_id"), value: $(this1).is(":checked") }
   
       }).done(function(msg){
           
       });
       
   });
   
   
});
</script>