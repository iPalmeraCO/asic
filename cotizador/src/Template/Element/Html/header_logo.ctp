<div class="navbar-brand">
    <!-- COMPANY LOGO -->
    <?php
    echo $this->Html->link(''
            .$this->Html->image('logo/asic_logo.png',[
                'alt' => 'Asic Admin Logo', 
                'class' => 'img-responsive',
                
                
                
            ])
        ,['controller'=>'Mains','action'=>'index']
        ,['escape'=>false]
        );
    ?>
    <!-- /COMPANY LOGO -->
    <!-- TEAM STATUS FOR MOBILE -->
    <div class="visible-xs">
        <a href="#" class="team-status-toggle switcher btn dropdown-toggle">
            <i class="fa fa-users"></i>
        </a>
    </div>
    <!-- /TEAM STATUS FOR MOBILE -->
    <!-- SIDEBAR COLLAPSE -->
    <div id="sidebar-collapse" class="sidebar-collapse btn">
        <i class="fa fa-bars" 
           data-icon1="fa fa-bars" 
           data-icon2="fa fa-bars" ></i>
    </div>
    <!-- /SIDEBAR COLLAPSE -->
</div>