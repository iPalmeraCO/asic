<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <!-- SIDEBAR MENU -->
        <ul>

            <li class="has-sub">
                <?php
                echo $this->Html->link('<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">CONFIGURADOR</span>'
                    .'<span class="arrow"></span>'
                    ,'javascript:;'
                    ,['class'=>'','escape'=>false]
                    );
                ?>
                <ul class="sub">
                    <?php
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Categoría</span>'
                        ,['controller'=>'mains','action'=>'category_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Tipo de Tecnlogia</span>'
                        ,['controller'=>'mains','action'=>'technology_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Unidad de medida</span>'
                        ,['controller'=>'mains','action'=>'unitymeasure_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Elementos</span>'
                        ,['controller'=>'mains','action'=>'elements_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    ?>
                </ul>
            </li>
            <li >
                <?php
                echo $this->Html->link('<i class="fa fa-usd"></i> <span class="menu-text">Configurador costos</span>'
                    //.'<span class="selected"></span>'
                    ,['controller'=>'mains','action'=>'configuracion_views']
                    ,['class'=>'','escape'=>false]
                    );
                ?>
            </li>
            
            <li >
                <?php
                echo $this->Html->link('<i class="fa fa-plus-square"></i> <span class="menu-text">Calculadora</span>'
                    //.'<span class="selected"></span>'
                    ,['controller'=>'mains','action'=>'calculadora_admin']
                    ,['class'=>'','escape'=>false]
                    );
                ?>
            </li>
            
            <li >
                <?php
                echo $this->Html->link('<i class="fa fa-user"></i> <span class="menu-text">Usuarios</span>'
                    //.'<span class="selected"></span>'
                    ,['controller'=>'users','action'=>'views']
                    ,['class'=>'','escape'=>false]
                    );
                ?>
            </li>
            <li >
                <?php
                echo $this->Html->link('<i class="fa fa-suitcase"></i> <span class="menu-text">Paquetes</span>'
                    //.'<span class="selected"></span>'
                    ,['controller'=>'mains','action'=>'packages_views']
                    ,['class'=>'','escape'=>false]
                    );
                ?>
            </li>
            

        </ul>
    </div>
</div>