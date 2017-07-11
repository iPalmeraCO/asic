

<div class="panel panel-danger">
            
            <div class="panel-heading">
                
            </div>
    <br/><br/>
    <?php
                                        echo $this->Form->create($objData,['class'=>'form-horizontal','role'=>'form']);
                                        echo '<div class="form-group '.$error.' input-sm">';
                                        echo $this->Form->input('password', [
                                            'label' => ['text' => 'Contraseña', 'class' => 'col-sm-3 control-label'],
                                            'type' => 'password',
                                            'class' => 'form-control input-sm',
                                            'placeholder' => 'Contraseña',
                                            'value'=>"",
                                            'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4', 'group' => 1, 'content_icon' => 'icon-lock'])
                                        ]); 
                                        echo $this->Form->input('password2', [
                                            'label' => ['text' => 'Repite Contraseña', 'class' => 'col-sm-3 control-label'],
                                            'type' => 'password',
                                            'class' => 'form-control input-sm',
                                            'placeholder' => 'Repite Contraseña',
                                            'required' => true,
                                            'value'=>"",
                                            'templates' => $this->functiones->getFormInputDiv(['class' => 'col-sm-4', 'group' => 1, 'content_icon' => 'icon-lock'])
                                            ]);
                                        echo '</div>';
                                        echo '<div align="center">';
                                        
                                        echo '<div class="clearfix"></div>';  
                                        echo '<p class="modal-footer" >';  
                                        echo $this->Html->link($infoView['cmdBack']['title'], $infoView['cmdBack']['url'],['class'=>'btn btn-warning']);
                                        echo $this->Form->button(__('Guardar'), ['data-ajax' => 'false','class'=>'btn btn-success']);
                                        echo '</p>';
                                        echo '</div>';
                                        
                                        echo $this->Form->end();
                                        ?><b style="color:#FB0808"><?= $this->Flash->render('msgUserEdit') ?></b>
            <br/>
            <br/>
</div>