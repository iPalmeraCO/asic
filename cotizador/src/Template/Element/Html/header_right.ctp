<!-- BEGIN TOP NAVIGATION MENU -->					
<ul class="nav navbar-nav pull-right">
    <!-- BEGIN USER LOGIN DROPDOWN -->
    <li class="dropdown user" id="header-user">
        <?php
        echo $this->Html->link(''
            .$this->Html->image('logo/users.png')
            .'<span class="username"></span><i class="fa fa-angle-down"></i>','#'
            ,['class'=>'dropdown-toggle','data-toggle'=>'dropdown','escape'=>false]
        );?>
        <ul class="dropdown-menu">
            <?php
            /*
             * <li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
            <li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
            <li><a href="#"><i class="fa fa-eye"></i> Privacy Settings</a></li>
            <li><a href="login.html"><i class="fa fa-power-off"></i> Log Out</a></li>
             */
            echo '<li>'.$this->Html->link('<i class="fa fa-power-off"></i> Salir',['controller'=>'users','action'=>'logout'],['escape'=>false]);
            ?>
        </ul>
    </li>
    <!-- END USER LOGIN DROPDOWN -->
</ul>
<!-- END TOP NAVIGATION MENU -->