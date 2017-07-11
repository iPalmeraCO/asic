<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <!-- BREADCRUMBS -->
            <ul class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <?=$this->Html->link('Asic',['controller'=>'Mains','action'=>'index']);?>
                </li>
                <?php
                if (isset($infoView['menu'])):
                    foreach ($infoView['menu'] as $objMenu):
                        echo '<li>';
                        echo (!isset($objMenu['url']))?$objMenu['title']:$this->Html->link($objMenu['title'],$objMenu['url'],[]);
                        echo '</li>';
                    endforeach;
                endif;
                ?>
            </ul>
            <!-- /BREADCRUMBS -->
            <div class="clearfix">
                <h3 class="content-title pull-left">
                    <?=$infoView['main_title'];?>
                </h3>
                <!-- DATE RANGE PICKER -->
                <span class="date-range pull-right">
                    <?php 
                    if (!empty($cmdAdd)){
                        echo $this->Html->link('<i class="fa fa-plus"></i> '.$cmdAdd['title'],$cmdAdd['url'],['class'=>'btn btn-success','escape'=>false]);
                    }
//                    if (!empty($cmdBack)){
//                        echo $this->Html->link($cmdBack['title'],$cmdBack['url'],['class'=>'btn btn-success','escape'=>false]);
//                    }
                    ?>
                </span>
                <!-- /DATE RANGE PICKER -->
            </div>
            <div class="description"><?=$infoView['main_desc'];?></div>
        </div>
    </div>
</div>
<!-- /PAGE HEADER -->