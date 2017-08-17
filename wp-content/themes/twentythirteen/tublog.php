<?php
/**
 * The template for displaying all pages
 *
 * Template Name: Tu blog
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header(); ?>


<script type="text/javascript">
$( document ).ready(function() {
	$(".toggle-open").hide();
	$(".postbymonth .blogp").hide();
    $( ".monthp" ).click(function() {
    var padre = $(this).parent().attr('id');
    var hijos = $("#"+padre+ " .blogp").toggle();
    var isVisible = $("#"+padre+ " .blogp").is( ":visible" );
    if (isVisible){
    	var hijos = $("#"+padre+ " .monthp .toggle-open").show();
    	var hijos = $("#"+padre+ " .monthp .toggle-close").hide();
    	
    }else{
    	
    	var hijos = $("#"+padre+ " .monthp .toggle-open").hide();
    	var hijos = $("#"+padre+ " .monthp .toggle-close").show();
    }	
});
 $( ".year" ).click(function() {
    var padre = $(this).parent().attr('id');
    var hijos = $("#"+padre+ " .postbymonth").toggle();
    var isVisible = $("#"+padre+ " .postbymonth").is( ":visible" );
       if (isVisible){
    	var hijos = $("#"+padre+ " .year .toggle-open").show();
    	var hijos = $("#"+padre+ " .year .toggle-close").hide();
    	
    }else{
    	
    	var hijos = $("#"+padre+ " .year .toggle-open").hide();
    	var hijos = $("#"+padre+ " .year .toggle-close").show();
    }
});
});
</script>
<?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
}
?>
<div class="container">
	<div class="col-md-8 blogs">
<?php 
 	$args = array('orderby'=>'date','order'=>'DESC');
                 	$the_query = new WP_Query( $args ); 
                 	if ( $the_query->have_posts() ) {
                 		while ( $the_query->have_posts() ) : $the_query->the_post(); 
						?>
							
							  <div class="row">
                              <div class="col-md-12 blogcontainer">
							  		<div class="col-md-12 dateblog">
							  			<?php echo get_the_date(); ?>
							  		</div>
           							<div class="col-md-12 titleblog">
										<a href="<?php echo get_permalink(); ?>"><h2 class="titconta"><?php echo the_title(); ?></h2></a>
           							</div>
           							<div class="col-md-12 titleblog">
                                        <div class="col-md-12 imagetublog">
                                            <?php echo get_the_post_thumbnail( $_post->ID, 'thumbnail' ); ?>
                                        </div>                                        
										
                                            <?php echo the_content(); ?>
                                         
           							</div>
           							<div class="col-md-12 autor">
           								<p>Publicado por : <?php  echo get_the_author();  echo " ".get_the_time(); ?> </p>
										
           							</div>


           						</div>
                                </div>
					<?php	endwhile;
					} else {
                 		echo "No se encontaron articulos";
                 	}
 ?>
 	</div>
 	<div class="col-md-4 listadopost">
 		<h3 class="titconta"> ARCHIVOS DE BLOG </h3>


<?php
    // Get years that have posts
    $years = $wpdb->get_results( "SELECT YEAR(post_date) AS year FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' GROUP BY year DESC" );
    //  For each year, do the following
    foreach ( $years as $year ) {
        // Get all posts for the year
        $posts_this_year = $wpdb->get_results( "SELECT ID, post_title, post_date FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' AND YEAR(post_date) = '" . $year->year . "' ORDER BY MONTH(post_date) DESC" );
        // Display the year as a header
        echo '</ul><ul class="postbyyear" id="'.$year->year.'"><h2 class="titconta year" ><span class="toggle-open">▼&nbsp;</span><span class="toggle-close"">
        ►&nbsp;
      
</span>' . $year->year . '</h2>';
        // Start an unorder list
       // echo '<ul>';
         $ymdate = '';
        // For each post for that year, do the following
        foreach ( $posts_this_year as $post ) {
        	$ympost = mysql2date("F", $post->post_date);
        	//echo '<li><h1>'.$ympost.'</h1></li>';
            // Display the title as a hyperlinked list item
            if ( $ympost != $ymdate) {
            	if ($ymdate!=''){
            		echo "</ul>";
            	}
            	$id = $year->year."".$ympost;
		  		echo '<ul class="postbymonth" id="'.$id.'"><li class="monthp"><span class="toggle-open">▼&nbsp;</span><span class="toggle-close"">
        ►&nbsp;
      
</span><h1 class="titconta inline">'.$ympost.'</h1></li>';
		  		$ymdate = $ympost;
		  } 
		   
		   
		echo '<li class="blogp"><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '</a></li>';
		
           
        }
        $mydate = '';
        // End the unordered list
        echo '</ul>';
    }
    ?>

 	</div>


</div>



<?php // get_sidebar(); ?>
<?php get_footer(); ?>