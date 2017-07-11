<div  >
 
 <?php
//            echo $this->Html->link(''
//                    //.'<span class="selected"></span>'
//                    , ['controller' => 'mains', 'action' => 'index']
//                    , ['id' => 'logo', 'escape' => false]
//            );
 
 echo $this->Html->image("asic_logo.png", [
    "alt" => "Asic",
    'url' => ['controller' => 'Mains', 'action' => 'index'],
     'class' => 'logo'
     
     
     
]);
            ?>
</div>