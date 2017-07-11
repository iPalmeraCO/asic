<nav id="sidebar">
    <?php /*
    <div class="sepH_b">
        <a href="javascript:void(0)" id="text_nav_v_collapse" class="btn btn-default btn-xs">Collapse All</a>
        <a href="javascript:void(0)" id="text_nav_v_expand" class="btn btn-default btn-xs">Expand All</a>
    </div> */ ?>
    <ul id="text_nav_v" class="side_text_nav">
        <?php
        // Menu de Configuracion - class="parent_active"
        echo '<li>';
        echo $this->Html->link('<span class="icon-dashboard"></span>CONFIGURAR','javascript:void(0)',['escape'=>false]);
        echo '<ul>';
        
        echo '<li class="">'.$this->Html->link('Categoria Elemento',['controller'=>'Mains','action'=>'category_views']).'</li>';
        echo '<li class="">'.$this->Html->link('Tipo de Tecnología',['controller'=>'Mains','action'=>'technology_views']).'</li>';
        echo '<li class="">'.$this->Html->link('Unidad de Medida',['controller'=>'Mains','action'=>'unitymeasure_views']).'</li>';
        //echo '<li class="">'.$this->Html->link('Sistema Operativo',['controller'=>'Mains','action'=>'licencia_views']).'</li>';
        //echo '<li class="">'.$this->Html->link('Fabricante Paquete',['controller'=>'Mains','action'=>'#']).'</li>';
        
        echo '</ul>';
        echo '</li>';
        
        //Menu De Usuarios
        echo '<li class="">';
        echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>USUARIOS','javascript:void(0)',['escape'=>false]);
        echo '<ul>';
        
        echo '<li class="">'.$this->Html->link('Crear',['controller'=>'Users','action'=>'add']).'</li>';
        echo '<li class="">'.$this->Html->link('Listar',['controller'=>'Users','action'=>'views']).'</li>';
        
        echo '</ul>';
        echo '</li>';
        
        //Menu De Elemento
        echo '<li class="">';
        echo $this->Html->link('<span class="icon-th-list"></span>ELEMENTOS','javascript:void(0)',['escape'=>false]);
        echo '<ul>';
        
        echo '<li class="">'.$this->Html->link('Crear',['controller'=>'Mains','action'=>'elements_add']).'</li>';
        echo '<li class="">'.$this->Html->link('Listar',['controller'=>'Mains','action'=>'elements_views']).'</li>';
        
        echo '</ul>';
        echo '</li>';
       
        //Menu De Costos
        echo '<li class="">';
        echo $this->Html->link('<span class="icon-puzzle-piece"></span>COSTOS','javascript:void(0)',['escape'=>false]);
        echo '<ul>';
        
        
        echo '<li class="">'.$this->Html->link('Listar',['controller'=>'Mains','action'=>'configuracion_views']).'</li>';
        
        echo '</ul>';
        echo '</li>';
        
        //Menu Paquetes
        echo '<li class="">';
        echo $this->Html->link('<span class="icon-beaker"></span>PAQUETES','javascript:void(0)',['escape'=>false]);
        echo '<ul>';
        
        echo '<li class="">'.$this->Html->link('Crear',['controller'=>'Mains','action'=>'packages_add']).'</li>';
        echo '<li class="">'.$this->Html->link('Listar',['controller'=>'Mains','action'=>'packages_views']).'</li>';
        
        echo '</ul>';
        echo '</li>';
        
        //Menu Clientes
        echo '<li class="">';
        echo $this->Html->link('<span class="icon-beaker"></span>CLIENTES','javascript:void(0)',['escape'=>false]);
        echo '<ul>';
        
        
        echo '<li class="">'.$this->Html->link('Listar',['controller'=>'Mains','action'=>'customers_views']).'</li>';
        
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