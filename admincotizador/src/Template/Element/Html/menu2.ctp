
<nav >
    <a href="#" id="menu-icon"></a>
    <ul class="ul">
        <li class="li">
            <?php
            echo $this->Html->link('<span class="menu-text">CONÓCENOS</span>'
                    //.'<span class="selected"></span>'
                    , ['controller' => 'mains', 'action' => 'index']
                    , ['class' => 'current', 'escape' => false]
            );
            ?>
        </li>
        <li class="li">
            <?php
            echo $this->Html->link('<span class="menu-text">ÚNETE</span>'
                    //.'<span class="selected"></span>'
                    , ['controller' => 'mains', 'action' => 'index']
                    , ['class' => '', 'escape' => false]
            );
            ?>
            
        </li>
        <li class="li">
            <?php
            echo $this->Html->link('<span class="menu-text">CLIENTES & ALIADOS</span>'
                    //.'<span class="selected"></span>'
                    , ['controller' => 'mains', 'action' => 'index']
                    , ['class' => '', 'escape' => false]
            );
            ?>
        </li>
        <li class="li">
        <?php
            echo $this->Html->link('<span class="menu-text">CONECTATE</span>'
                    //.'<span class="selected"></span>'
                    , ['controller' => 'mains', 'action' => 'index']
                    , ['class' => '', 'escape' => false]
            );
            ?>    
            
        </li>
        <li class="li">
            <?php
            echo $this->Html->link('<span class="menu-text">TU BLOG</span>'
                    //.'<span class="selected"></span>'
                    , ['controller' => 'mains', 'action' => 'index']
                    , ['class' => '', 'escape' => false]
            );
            ?>
            
        
        </li>
    </ul>
</nav>
