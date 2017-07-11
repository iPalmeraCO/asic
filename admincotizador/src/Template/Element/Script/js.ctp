<?php

//<!-- jQuery -->
echo $this->Html->script('jquery.min.js');
//<!-- bootstrap framework -->
echo $this->Html->script('../bootstrap/js/bootstrap.min.js');
//<!-- jQuery resize event -->
echo $this->Html->script('jquery.ba-resize.min.js');
//<!-- retina ready -->
echo $this->Html->script('jquery_cookie.min.js');
//<!-- retina ready -->
echo $this->Html->script('retina.min.js');
//<!-- tinyNav -->
echo $this->Html->script('tinynav.js');
//<!-- sticky sidebar -->
echo $this->Html->script('jquery.sticky.js');
//<!-- Navgoco -->
echo $this->Html->script('lib/navgoco/jquery.navgoco.min.js');
//<!-- jMenu -->
echo $this->Html->script('lib/jMenu/js/jMenu.jquery.js');
//<!-- typeahead -->
echo $this->Html->script('lib/typeahead.js/typeahead.min.js');
echo $this->Html->script('lib/typeahead.js/hogan-2.0.0.js');

echo $this->Html->script('ebro_common.js');


//<!-- datatables -->
echo $this->Html->script('lib/dataTables/media/js/jquery.dataTables.min.js');
//<!-- datatables column reorder -->
echo $this->Html->script('lib/dataTables/extras/ColReorder/media/js/ColReorder.min.js');
//<!-- datatable fixed columns -->
echo $this->Html->script('lib/dataTables/extras/FixedColumns/media/js/FixedColumns.min.js');
//<!-- datatables column toggle visibility -->
echo $this->Html->script('lib/dataTables/extras/ColVis/media/js/ColVis.min.js');
//<!-- datatable table tools -->
echo $this->Html->script('lib/dataTables/extras/TableTools/media/js/TableTools.min.js');
echo $this->Html->script('lib/dataTables/extras/TableTools/media/js/ZeroClipboard.js');
//<!-- datatable bootstrap style -->
echo $this->Html->script('lib/dataTables/media/DT_bootstrap.js');

//<!-- peity (small charts) -->
echo $this->Html->script('lib/peity/jquery.peity.min.js');
//<!-- vector map -->
echo $this->Html->script('lib/jvectormap/jquery-jvectormap-1.2.2.min.js');
echo $this->Html->script('lib/jvectormap/maps/jquery-jvectormap-world-mill-en.js');
//<!-- charts -->
echo $this->Html->script('lib/flot/jquery.flot.min.js');
echo $this->Html->script('lib/flot/jquery.flot.pie.min.js');
echo $this->Html->script('lib/flot/jquery.flot.time.min.js');
echo $this->Html->script('lib/flot/jquery.flot.tooltip.min.js');
echo $this->Html->script('lib/flot/jquery.flot.resize.js');
//<!-- easy pie chart -->
echo $this->Html->script('lib/easy-pie-chart/jquery.easy-pie-chart.js');

echo $this->Html->script('pages/ebro_dashboard1.js');
echo $this->Html->script('pages/ebro_datatables.js');

echo $this->Html->script(array('bootstrap-switch/bootstrap-switch.min') );




echo '<!--[if lte IE 9]>';
echo $this->Html->script('ie/jquery.placeholder.js');
?>
<script>
    $(function () {
        $('input, textarea').placeholder();
    });
    
</script>

<?php

echo '<![endif]-->';
