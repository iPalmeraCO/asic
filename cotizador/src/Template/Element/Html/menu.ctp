<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <!-- SIDEBAR MENU -->
        <ul>
            <li class="active">
                <?php
                echo $this->Html->link('<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>'
                    //.'<span class="selected"></span>'
                    ,['controller'=>'mains','action'=>'index']
                    ,['class'=>'','escape'=>false]
                    );
                ?>
            </li>

            <li class="has-sub">
                <?php
                echo $this->Html->link('<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">Base De Datos</span>'
                    .'<span class="arrow"></span>'
                    ,'javascript:;'
                    ,['class'=>'','escape'=>false]
                    );
                ?>
                <ul class="sub">
                    <?php
                    //Base de Datos
                    
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Licencia OS</span>'
                        ,['controller'=>'mains','action'=>'licencia_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Costos Generales</span>'
                        ,['controller'=>'mains','action'=>'costos_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Disco Externo</span>'
                        ,['controller'=>'mains','action'=>'discoexterno_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                     echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Comunicaciones</span>'
                        ,['controller'=>'mains','action'=>'comunicaciones_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Costos Power AIX</span>'
                        ,['controller'=>'mains','action'=>'costospoweraix_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Costos Power iSeries</span>'
                        ,['controller'=>'mains','action'=>'costospoweriseries_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Costos Power Linux</span>'
                        ,['controller'=>'mains','action'=>'costospowerlinux_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Costos Intel Windows</span>'
                        ,['controller'=>'mains','action'=>'costosintelwindows_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Costos Intel Linux</span>'
                        ,['controller'=>'mains','action'=>'costosintellinux_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Costos Sparc</span>'
                        ,['controller'=>'mains','action'=>'costossparc_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Tipos de Servidores</span>'
                        ,['controller'=>'mains','action'=>'tiposervidores_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Canales</span>'
                        ,['controller'=>'mains','action'=>'canales_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Interface</span>'
                        ,['controller'=>'mains','action'=>'interface_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">vCPU de CPU</span>'
                        ,['controller'=>'mains','action'=>'vcpu_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Calculator</span>'
                        ,['controller'=>'mains','action'=>'calculator']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Categoría</span>'
                        ,['controller'=>'mains','action'=>'category_views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    echo '<li>';
                    echo $this->Html->link('<span class="sub-menu-text">Usuarios</span>'
                        ,['controller'=>'users','action'=>'views']
                        ,['class'=>'','escape'=>false]
                    );
                    echo '</li>';
                    
                    ?>
                </ul>
            </li>

        </ul>
    </div>
</div>