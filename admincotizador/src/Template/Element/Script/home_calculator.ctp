<?php 
/*
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
 */
echo $this->Html->script('jquery/jquery-2.0.3.min.js');
//<!-- JQUERY UI-->
echo $this->Html->script('jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js');
//<!-- BOOTSTRAP -->
echo $this->Html->script('../bootstrap-dist/js/bootstrap.min.js');//BOOTSTRAP 


//<!-- DATE RANGE PICKER -->
echo $this->Html->script('bootstrap-daterangepicker/moment.min.js');
echo $this->Html->script('bootstrap-daterangepicker/daterangepicker.min.js');

//<!-- SLIMSCROLL -->
echo $this->Html->script('jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js');
echo $this->Html->script('jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js');
//<!-- BLOCK UI -->
echo $this->Html->script('jQuery-BlockUI/jquery.blockUI.min.js');


//<!-- TYPEHEAD -->
echo $this->Html->script('typeahead/typeahead.min.js');
//<!-- AUTOSIZE -->
echo $this->Html->script('autosize/jquery.autosize.min.js');
//<!-- COUNTABLE -->
echo $this->Html->script('countable/jquery.simplyCountable.min.js');
//<!-- INPUT MASK -->
echo $this->Html->script('bootstrap-inputmask/bootstrap-inputmask.min.js');
//<!-- SELECT2 -->
echo $this->Html->script('select2/select2.min.js');
//<!-- UNIFORM -->
echo $this->Html->script('uniform/jquery.uniform.min.js');

//<!-- SPARKLINES -->
echo $this->Html->script('sparklines/jquery.sparkline.min.js');
//<!-- EASY PIE CHART -->
echo $this->Html->script('jquery-easing/jquery.easing.min.js');
echo $this->Html->script('easypiechart/jquery.easypiechart.min.js');
//<!-- FLOT CHARTS -->
//echo $this->Html->script('flot/jquery.flot.min.js');
//echo $this->Html->script('flot/jquery.flot.time.min.js');
//echo $this->Html->script('flot/jquery.flot.selection.min.js');
//echo $this->Html->script('flot/jquery.flot.resize.min.js');
//echo $this->Html->script('flot/jquery.flot.pie.min.js');
//echo $this->Html->script('flot/jquery.flot.stack.min.js');
//echo $this->Html->script('flot/jquery.flot.crosshair.min.js');
////<!-- TODO -->
//echo $this->Html->script('jquery-todo/js/paddystodolist.js');
////<!-- TIMEAGO -->
//echo $this->Html->script('timeago/jquery.timeago.min.js');
////<!-- FULL CALENDAR -->
//echo $this->Html->script('fullcalendar/fullcalendar.min.js');

//<!-- COOKIE -->
echo $this->Html->script('jQuery-Cookie/jquery.cookie.min.js');
//<!-- GRITTER -->
echo $this->Html->script('gritter/js/jquery.gritter.min.js');

//<!-- CUSTOM SCRIPT -->
echo $this->Html->script('script.js');

echo $this->fetch('script');
?>
<script>
    jQuery(document).ready(function () {
        //App.setPage("index");  //Set current page
        App.init(); //Initialise plugins and elements
        //$('select').select2();
    });
</script>
<!-- /JAVASCRIPTS -->