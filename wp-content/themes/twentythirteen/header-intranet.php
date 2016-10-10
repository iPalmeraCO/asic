<?php
session_start();
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<html>
	<head>
		<title>Intranet</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/intranet/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/intranet/css/main.css">		
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/intranet/js/jquery.min.js"></script>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/intranet/js/bootstrap.min.js"></script>		
		<style type="text/css">
		#menu-item-445 {
			display: none;
		}
		</style>
		<!--<script type="text/javascript">
			$(document).ready(function() {

				    
				    $('form').submit(function(event) {
				    	event.preventDefault();

				        var formData = {
				        	'accion':1,
				            'logusername'              : $('input[name=logusername]').val(),
				            'logpassword'             : $('input[name=logpassword]').val(),				            
				        };
				        if ( $('input[name=logusername]').val() !="" &&  $('input[name=logpassword]').val() != "")
				        {
				       
				        $.ajax({
				            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				            url         : "<?php echo get_template_directory_uri(); ?>/ingreso.php", // the url where we want to POST
				            data        : formData, // our data object
				            dataType    : 'json', // what type of data do we expect back from the server
				                        encode          : true
				        })
				            // using the done promise callback
				            .done(function(data) {
				            	 if ( data.success) {
				            	 	$('#logueo').modal('hide');
				            	 	$("#menu-item-445").show();
				            	 	$("#menu-item-445 a").html("Cerrar Sesión Usuario");
				            	 }else {
				            	 	alert("Por favor verifica los datos de ingreso");
				            	 	$("#menu-item-445").hide();
				            	 }
				                // log data to the console so we can see
				                

				                // here we will handle errors and validation messages
				            });
						} else {
							var required = $('[required]'); // change to [required] if not using true option as part of the attribute as it is not really needed.
							    var error = false;

							    for(var i = 0; i <= (required.length - 1);i++)
							    {
							        if(required[i].value == '') // tests that each required value does not equal blank, you could put in more stringent checks here if you wish.
							        {
							            required[i].style.backgroundColor = 'rgb(255,155,155)';
							            error = true; // if any inputs fail validation then the error variable will be set to true;     
							        }
							        else 
							        {
							        	required[i].style.backgroundColor = '#FFF';
							        }
							    }
						}
				        
				        
				    });
			
				$('#menu-item-445').click(function(){
  					   $.ajax({
				            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				            url         : "<?php echo get_template_directory_uri(); ?>/ingreso.php", // the url where we want to POST
				            data        : "accion=2", // our data object
				            dataType    : 'json', // what type of data do we expect back from the server
				                        encode          : true
				        })				            
				            .done(function(data) {				            	 
				            	 	$("#menu-item-445").hide();
				            	 	$("#abrirlogueo").click();
				            });
				});

				});
		</script>-->
	</head>
<body>

<!-- Trigger the modal with a button -->

<button data-target="#logueo" data-toggle="modal" data-backdrop="static" data-keyboard="false" id="abrirlogueo"></button>`
<!-- Modal -->
<div id="logueo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    
    <div class="modal-content">
      <div class="modal-header">        
        <h4 class="modal-title">Bienvenio(a) a la Intranet de ASIC</h4>
      </div>
      <div class="modal-body">
        <form id="ingreso">
        	<div class="col-md-12 camposform">
        		<input id="logusername" type="text" name="logusername" class="input-small" tabindex="0" size="18" placeholder="Username" required>
        	</div>
        	<div class="col-md-12 camposform">
        		<input id="logpassword" type="password" name="logpassword" class="input-small" tabindex="0" size="18" placeholder="Password" required>
        	</div>
        	<div class="col-md-12 camposform divsubmit">
        		<button id="ingresar" type="submit" tabindex="0" name="Submit" class="btn btn-primary">Ingresar</button>
        	</div>


        </form>
      </div>
   
    </div>

  </div>
</div>

<?php 
/*if (isset($_SESSION['usuario'])){

}else { ?>
 <script type="text/javascript">
$("#abrirlogueo").click();
</script>

<?php }  */ ?>