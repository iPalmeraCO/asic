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
<style type="text/css">
.politcss{
    color: #ffffff;
    text-align: left;
    font-size: 15px;
    text-align: center;
    width: 100%;
    display: inline-block;
    padding: 8px;

}
.politcss:hover {
    color: #E4002B;
text-decoration: none;
}
.politcss:focus{
color: #ffffff;
text-decoration: none;
}
</style>
	<div class="footer">
    <div class="container">
      <div class="row ">
        <div class="col-md-5 col-sm-4 textofooter col-xs-12">       
          <?php dynamic_sidebar( 'sidebar-5' );  ?>
          <div class="row">
            <div class="col-md-12">
                <a class="politcss" href="https://www.asicamericas.com/wp-content/uploads/2017/05/Politica-tratamiento-de-datos.pdf" target="_Blank" style="text-align: right;">Política de Manejo de Datos</a>
            </div>
        </div>   
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

	
