<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <!--<div class="page-header">-->
            <!-- BREADCRUMBS -->
            
            <!-- /BREADCRUMBS -->
            <div class="clearfix">
                <h3 class="content-title pull-left">
                    <?=$infoView['main_title'];?>
                </h3>
                <!-- DATE RANGE PICKER -->
                <span class="date-range pull-right">
                    <?php 
                    if (!empty($cmdAdd)){
                        echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.$cmdAdd['title'],$cmdAdd['url'],['class'=>'btn btn-success','escape'=>false]);
                    }
//                    if (!empty($cmdBack)){
//                        echo $this->Html->link($cmdBack['title'],$cmdBack['url'],['class'=>'btn btn-success','escape'=>false]);
//                    }
                    ?>
                </span>
                <!-- /DATE RANGE PICKER -->
            </div>
          
        <!--</div>-->
    </div>
</div>
<!-- /PAGE HEADER -->