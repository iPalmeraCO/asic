<nav id="sidebar">
    <?php /*
    <div class="sepH_b">
        <a href="javascript:void(0)" id="text_nav_v_collapse" class="btn btn-default btn-xs">Collapse All</a>
        <a href="javascript:void(0)" id="text_nav_v_expand" class="btn btn-default btn-xs">Expand All</a>
    </div> */ ?>
    <ul id="text_nav_v" class="side_text_nav">
        <?php
       
        //Menu De Costos
        echo '<li class="">';
        echo $this->Html->link('<span class="icon-puzzle-piece"></span>COSTOS','javascript:void(0)',['escape'=>false]);
        echo '<ul>';
        
        
        echo '<li class="">'.$this->Html->link('Listar',['controller'=>'Mains','action'=>'configuracion_arquitecto']).'</li>';
        
        echo '</ul>';
        echo '</li>';
               
        //Menu Calculadora
        echo '<li class="">';
        echo $this->Html->link('<span class="icon-left"></span>CALCULADORA','javascript:void(0)',['escape'=>false]);
        echo '<ul>';
        
        //echo '<li class="">'.$this->Html->link('Crear',['controller'=>'Mains','action'=>'index']).'</li>';
        echo '<li class="">'.$this->Html->link('Listar',['controller'=>'Mains','action'=>'calculadora_admin']).'</li>';
        
        echo '</ul>';
        echo '</li>';
        
        ?>
    </ul>
</nav>