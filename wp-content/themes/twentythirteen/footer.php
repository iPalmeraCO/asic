<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
    
		<div class="ultimocuadro">
            <div class="row container">
                <div class="col-md-3 col-sm-4 col-xs-12">
            <ul style="float:left; margin-right:100px;">
                

                <?php $items = wp_get_nav_menu_items( "main-menu" ); 
                $exludes= array('115','144','165');
                    foreach($items as $item)
                    {
                        if (!in_array($item->ID,$exludes)){
                                if ( $item->menu_item_parent == 0 ) :
                                           echo "<a id='text5' href='".$item->url."'>".$item->title."</a><br>";
                                endif;
                         }
                    }
                ?>    
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12">
            <ul style="float:left; margin-right:80px;">
                 <?php $items = wp_get_nav_menu_items( "main-menu" ); 
                    $parent= array('115');
                        foreach($items as $item)
                        {                   
                              if (in_array($item->menu_item_parent,$parent)){                             
                                               echo "<a id='text5' href='".$item->url."'>".$item->title."</a><br>";                                
                             }
                        }
                ?>  
             </ul>
           </div>
           <div class="col-md-4 col-sm-4  col-xs-12">
                <ul>
                      <?php $items = wp_get_nav_menu_items( "main-menu" ); 
                    $parent= array('144');
                        foreach($items as $item)
                        {                   
                              if (in_array($item->menu_item_parent,$parent)){                             
                                               echo "<a id='text5' href='".$item->url."'>".$item->title."</a><br>";                                
                             }
                        }
                    ?> 
                </ul>
                </div>
            </div>
    </div>

    <div id="footermobile">
        <?php dynamic_sidebar( 'sidebar-4' ); ?>  
    </div>
    
	</div><!-- #page -->

	<?php wp_footer(); ?>
  <script type="text/javascript">

function ajustar(){
  var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
  if (width > 1200){
  var alto = jQuery('.headerasic').height();
  alto= alto;
  jQuery("#content").css("margin-top",alto+"px");
}else {
  jQuery("#content").css("margin-top","0px");
}
}
    jQuery( document ).ready(function() {
   ajustar();
});
jQuery( window ).resize(function() {
  ajustar();
});

    
    </script>
</body>
</html>