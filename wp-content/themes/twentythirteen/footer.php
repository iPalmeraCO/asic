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
                <div class="col-md-12">
            <ul style="float:left; margin-right:100px;">
                <a id="text5" href="<?php echo site_url(); ?>">Home</a><br>

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
    
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>