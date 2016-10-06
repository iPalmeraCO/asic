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

	<div class="footer">
    <div class="container">
      <div class="row ">
        <div class="col-md-5 col-sm-4 textofooter col-xs-12">       
          <?php dynamic_sidebar( 'sidebar-5' );  ?>  
        </div>
        <div class="col-md-1 col-sm-2 col-xs-12 chicafooter">
          <?php dynamic_sidebar( 'sidebar-6' );  ?>  
        </div>
        <div class="col-xs-1">
        </div>
        <div class="col-md-4  col-sm-6 col-xs-10 redesociales">   
        <?php dynamic_sidebar( 'sidebar-7' );  ?>                           
        </div>
        <div class="col-xs-1">
        </div>

      </div>
    </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>

	
