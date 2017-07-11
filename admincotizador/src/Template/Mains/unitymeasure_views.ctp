<div class="row">
    <div class="col-sm-12">
        <?php
                //<!-- PAGE HEADER-->
                echo $this->element('Body/page_headerAsic', ['infoView' => $infoView,'cmdAdd' => $infoView['cmdAdd']]);
                ?>
        <div class="panel panel-danger">
            <div class="panel-heading">
            </div>
            <table id="dt_table_tools" class="table table-striped table-condensed">
                <thead>
                    <tr>
                                <?php
                                foreach($infoView[ 'table'] as $obj):
                        echo '<th class="' . $obj['class'] . '">' . $obj[1] . '</th>';
                        endforeach;
                        echo '<th class="center">ACCIONES</th>';
                        ?>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listObj as $objData):
                    echo '<tr class="gradeX">';
                    foreach ($infoView['table'] as $obj):
                    //ESTADOS
                    if ($obj[0] == 'status_id') {
                    switch ($objData[$obj[0]]) {
                    case 0: $data = $inactive;
                    break;
                    case 1: $data = $active;
                    break;
                    case 2: $data = $delete;
                    break;
                    }
                    } else {
                    $data = $objData[$obj[0] ];
                        }
                        /////
                        //echo '<td class="' . $obj['class'] . ' center">' . $objData[$obj[0]] . '</td>';
                        //echo '<td class="' . $obj['class'] . ' center">' .($obj[0] == 'category_id' ? $objData['Category']['name'] : $objData[$obj[0]]). '</td>';
                        echo '<td class="' . $obj['class'] . ' center">' . $data . '</td>';

                    endforeach;
                    echo '<td class="btn-toolbar center">'; 
                        //--
                        echo'<div class="btn-group dropdown">
								<button class="btn btn-light-grey fa fa-cog" data-toggle="dropdown"> 
								<span class="caret"></span>
								</button>
								<ul class="dropdown-menu pull-right">
								<li>';
                            echo $this->Html->link('<i class="fa fa-pencil"></i> '
                            . $infoView['cmdEdit']['title']
                            , $infoView['cmdEdit']['url'] + [0 => $objData['id']]
                            , ['class' => 'btn btn-success btn-xs', 'escape' => false]
                            );
                            echo '</li>
								<li>';
                            echo $this->Form->postLink('<i class="fa fa-times"></i> '
                            . $infoView['cmdDel']['title']
                            , $infoView['cmdDel']['url'] + [0 => $objData['id']]
                            , ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => '¿Estás seguro de eliminar la información?']
                            );
                            echo '</li>
								</ul>
								</div>';
                            //--



                            echo '</td>';

                            echo '</tr>';
                            endforeach;
                            ?>                                                
                </tbody>
            </table>

        </div>
    </div>
</div>


