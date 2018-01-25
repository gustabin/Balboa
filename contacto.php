<?php 
include_once("analyticstracking.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Cloud PBX | Balboa Telecom</title>  
        <!-- Plugins CSS -->
        <link href="css/plugins/plugins.css" rel="stylesheet">
        <!--sky form pro css-->
        <link href="smart-form/contact-recaptcha/css/smart-forms.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
        
<!-- LIBRERIAS MINIMAS NECESARIAS PARA AJAX !-->        
<script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" /!-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<!-- FIN LIBRERIAS MINIMAS NECESARIAS PARA AJAX !-->  
    </head>

    <body data-spy="scroll" data-darget=".navbar-seconday">
       <script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar los datos personales
	 $("body").on('submit', '#formContacto', function(event) {
		event.preventDefault()
		if ($('#formContacto').valid()) {
			$.ajax({
			type: "POST",
			url: "registrar_Procesar.php",
			dataType: "json",
			data: $(this).serialize(),
			success: function(respuesta) {
				if (respuesta.error == 1) {
				  $('#contactForm').hide();
				  $('#error1').show();
				//setTimeout(function() {
				  //$('#error1').hide();
				//}, 3000);
				}

				if (respuesta.exito == 1) {			 	
				  $('#contactForm').hide();
				  $('#bannerInferiorExitoso').show();	  			  			  
				  //window.location.href='http://www.oikosplus.com/luxury/enviarEmail.php?Page=index&Id=<?php //echo $_SESSION["Id"]?>';
				  //window.location.href='enviarEmail.php?Page=contact&Id=<?php //echo $_SESSION["Id"]?>';
				  document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';
				}			    
			}
			});
		}
	});	 
</script>
        <div id="preloader">
            <div id="preloader-inner"></div>
        </div><!--/preloader-->
        
        <!-- Site Overlay -->
        <div class="site-overlay"></div>

		<nav class="navbar navbar-expand-lg navbar-light navbar-transparent bg-faded" style="height: 90px;">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="margin-top: 20px">
                    <img class='logo logo-dark visible-md-up  hidden-lg-up' src="images/logo.png" alt="Balboa Telecom">
                    <img class='logo logo-light hidden-xs-down hidden-sm-down hidden-md-down' src="images/logo-light.png" alt="Balboa Telecom" style="top: 10px;">
                </a>
                <div  id="navbarNavDropdown" class="navbar-collapse collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                           <a class="nav-link dropdown-toggle"  href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown dropdown-full-width">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu dropdown-mega-fw">
                                <li class="container">
                                    <div class="mega-menu-content">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <h4 class="mega-title">Residencial</h4>
                                                <ul class="mega-inner-nav list-unstyled">
                                                    <li><a href="pin.php"><i class="ti-settings"></i> Global Pin</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-2">
                                                <h4 class="mega-title">Corporativo</h4>
                                                <ul class="mega-inner-nav list-unstyled">
                                                    <li><a href="pbx.html"><i class="ti-light-bulb"></i> Cloud PBX</a></li>
                                                    <li class="disabled"><a href="#"><i class="ti-image"></i> Sip Trunking</a></li>
                                                    <li class="disabled"><a href="#"><i class="ti-star"></i> Internet</a></li>
                                                </ul>
                                            </div>
                                           <div class="col-lg-4">
                                                <h4 class="mega-title">Tarifas</h4>
                                                <ul class="mega-inner-nav list-unstyled">
                                                    <li><a href="tBasico.html"><i class="fa fa-magnet"></i> Plan Básico</a></li> 
                                                    <li><a href="tSalientes.html"><i class="fa fa-ravelry"></i> Plan Llamadas salientes</a></li> 
                                                    <li><a href="tDid.html"><i class="fa fa-podcast"></i> Números de acceso DID's</a></li> 
                                                    <li><a href="tSim.html"><i class="fa fa-barcode"></i> Tárjetas SIM</a></li> 
                                                    <li><a href="tTelefonos.html"><i class="fa fa-commenting-o"></i> Teléfonos</a></li> 
                                                    <li><a href="tEspeciales.html"><i class="fa fa-cogs"></i> Configuraciones especiales</a></li> 
                                                </ul>
                                            </div>
                                            <div class="col-lg-2">
                                                <h4 class="mega-title">Empresa</h4>
                                                <ul class="mega-inner-nav list-unstyled">
                                                    <li><a href="about.html"><i class="fa fa-cog"></i> Quienes somos</a></li>
                                                    <li><a href="clientes.html"><i class="fa fa-magic"></i> Clientes</a></li>
                                                    <li><a href="terminos.html"><i class="ti-align-left"></i> Términos y condiciones</a></li>
                                                    <li><a href="contacto.php"><i class="ti-control-play"></i> Contácto</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-2">
                                                <h4 class="mega-title">Soporte</h4>
                                                <ul class="mega-inner-nav list-unstyled">
                                                    <li><a href="https://cloud.deskgreen.com/"><i class="ti-bolt"></i> Dash Board</a></li>
                                                    <li class="disabled"><a href="#"><i class="ti-blackboard"></i> Chat Online</a></li>
                                                    <li class="disabled"><a href="#"><i class="ti-map"></i> Google Map</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>                 
                    </ul>        
                </div>                
            </div>
        </nav>
        
        <div class="page-titles-img title-space-lg parallax-overlay bg-parallax" data-jarallax='{"speed": 0.4}' style='background-image: url("images/bg9.jpg");background-position:top center;'>
            <div class="container">
                <div class="row">
                    <div class=" col-md-12">
                        <h1 class="text-uppercase">Contácto</h1>
                    </div>
                </div>
            </div>
        </div><!--page title end-->
        <div id="markermap" style="width: 100%;height: 350px;"></div>
        <div class="container pt90 pb50">
            <div class="row">
                <div class="col-md-6 mb40">
                    <h4 class="text-uppercase">Dirección</h4>
                    <p>
                         Piso 5, PH Blue Business  <br> 
                         Center, Calle 67 Este, <br>
                         Panamá city, Panamá
                    </p>
                    <br>
                    <h4 class="text-uppercase">Horario de oficina</h4>
                    <p>
                        Lunes-Viernes: 8am a 5pm<br>
                        Sabados y Domingos: Cerrados
                    </p>
                    <br>
                    <h4 class="text-uppercase">Email</h4>
                    <p>
                        <a href="mailto: info@bt.net.pa"> info@bt.net.pa</a></p>
                    <br>
                    <h4 class="text-uppercase">Teléfono</h4>
                    <p>
                        <a href="#"> +507 834 5000</a></p>
                    <br>
                    <h4 class="text-uppercase">Redes Sociales</h4>
                    <div class="clearfix pt10">
                        <a href="#" class="social-icon si-border si-facebook">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-border si-twitter">
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-border si-g-plus">
                            <i class="fa fa-google-plus"></i>
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#" class="social-icon si-border si-skype">
                            <i class="fa fa-skype"></i>
                            <i class="fa fa-skype"></i>
                        </a>
                        <a href="#" class="social-icon si-border si-linkedin">
                            <i class="fa fa-linkedin"></i>
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 pb50">                    
                    <div class="smart-wrap">
                        <div class="smart-forms smart-container wrap-2">                            
						 <section id="contactForm" class="section">
                       		<h2>Manténte en contácto</h2> 
							<p>
								Envianos tus datos y pronto uno de nuestros agentes te atenderá.
							</p>
                        <div class="contact-from">
                            <form data-toggle="validator" class="form-vertical" role="form" id="formContacto"  enctype="multipart/form-data">
							  	<input type="hidden" id="tipo" name="tipo" value="Contact">							   		
								 <div class="form-group" style="margin-left:0px;">
									  <div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
										<input required id="fullName" type="text" class="form-control" name="fullName" placeholder="Full Name" style="color: #000000"> 
									  </div>
									  <div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
										<input required id="phone" type="text" class="form-control" name="phone" placeholder="Phone No." style="color: #000000"> 
									  </div>
									  <div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
										<input required id="inputEmail" type="email" class="form-control" name="inputEmail" placeholder="Email" data-error="Invalid email format" style="color: #000000"> 
									  </div>								                             
								 </div>	 <br>
								 	
								 <div class="form-group" style="margin-left:0px;">
									 <div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="fa fa-check-square-o" aria-hidden="true"></i></span>
										<textarea rows="5" id="anythingelse" type="text" class="form-control" name="anythingelse" placeholder="Tu mensaje" style="color: #000000"></textarea> 
									 </div>	
								</div>
					 			<button type="submit"  style="background-color:#0D96EB; border-radius:3px; width: 100px; padding: 10px; margin-left: 0px;" class="btn btn-default">Enviar</button>
					  			<button type="reset" class="btn btn-primary" style="background-color:#0D96EB; border-radius:3px; width: 100px; padding: 10px;">Reset</button>
					  		</form>
                            <p class="form-messege"></p>
                        </div>
						</section>
						
					<section id="bannerInferiorExitoso" style="display: none;">			
                        <div class="container-fluid" style="background-image:url(images/sociales.jpg); background-size: cover; background-position: right;">			
                            <div class= "halfsearch">
                                <div id="Confirm"><br><br>
                                    
                                    <br><br>
                                    <br><br>                       
                                    <h3>Gracias por enviarnos tu información.</h3><br>
                                        <h5><font color="#000000">Uno de nuestros agentes de venta se pondrá en contácto muy pronto con usted!<br> Si usted quiere hablarnos ahora puede llamarnos! </font></h5>
                                        <p><b>Nuestro horario de oficina es:</b><br>Lunes a Viernes<br>8am - 5pm &nbsp;<font size="-1">(UTC -4)</font>
                                    <h3><font color="#FFFFFF">+507 834 5000</font></h3>
                                    <br><br>
                                    <br><br>
                                    <br><br>
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <section id="error1" style="display: none;">			
                        <div class="container-fluid" style="background-image:url(img/sociales.jpg); background-size: cover; background-position: right;">			
                            <div class= "halfsearch">
                                <div id="Confirm"><br><br>
                                    
                                    <br><br>
                                    <br><br>                       
                                    <h3>Ha ocurrido un error.</h3><br>
                                        <h5><font color="#000000">Lo lamentamos nuestro personal técnico está resolviendo el problema! </font></h5>
                                    <br><br>
                                    <br><br>
                                    <br><br>
                                    <br><br>
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                    
                        </div><!-- end .smart-forms section -->
                    </div><!-- end .smart-wrap section -->
                </div>
            </div>
        </div>
        <footer class="footer footer-dark pt50 pb30">
       		<div class="container">
                <div class="row">
                    <div class="col-lg-6  ml-auto mr-auto text-center">
                        <ul class="social-icons list-inline">
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/BalboaTelecom/">
                                    <i class="fa fa-facebook"></i>Facebook
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-twitter"></i>twitter
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-instagram"></i>instagram
                                </a>
                            </li>                            
                        </ul>
                        <h4><i class="fa fa-phone"></i> +507 834 5000</h4>
                        <h4><i class="fa fa-envelope"></i> info@bt.net.pa</h4>
                        <p>&copy; Copyright 2017. Balboa Telecom</p>
                    </div>
                </div>
            </div>
        </footer>
        <div class="footer-bottomAlt">
            <div class="container">
                <div class="row">
                      <div class="col-lg-7">
                        <div class="clearfix">
                           <a href="https://www.facebook.com/BalboaTelecom/" class="social-icon-sm si-dark si-facebook si-dark-round">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon-sm si-dark si-twitter si-dark-round">
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon-sm si-dark si-g-plus si-dark-round">
                            <i class="fa fa-google-plus"></i>
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#" class="social-icon-sm si-dark si-skype si-dark-round">
                            <i class="fa fa-skype"></i>
                            <i class="fa fa-skype"></i>
                        </a>
                        <a href="#" class="social-icon-sm si-dark si-linkedin si-dark-round">
                            <i class="fa fa-linkedin"></i>
                            <i class="fa fa-linkedin"></i>
                        </a>  
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <span>&copy; Copyright 2017. All Right Reserved</span>
                    </div>
                </div>
            </div>
        </div><!--/footer bottom-->

        <!--back to top-->
        <a href="#" class="back-to-top hidden-xs-down" id="back-to-top"><i class="ti-angle-up"></i></a>
        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="js/plugins/plugins.js"></script> 
        <script src="js/assan.custom.js"></script> 
        <!--google map-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMwVpUj3-oHHW8N21819BhKttOga2Rj2s"></script>
        <script src="js/jquery.gmap.min.js"></script> 
        <script>
            // Marker Map
            $(document).ready(function () {
                map = new GMaps({
                    scrollwheel: false,
                    el: '#markermap',
                    lat: 8.995020898805699,
                    lng: -79.51236277135922

                });
                map.addMarker({
                    lat: 8.995020898805699,
                    lng: -79.51236277135922,
                    title: 'Marcado con InfoWindow',
                    infoWindow: {
                        content: '<h4>BALBOA TELECOM</h4><p>Comunicación sin fronteras</p>'
                    }
                });
            });
        </script> 
        <!--sky form plugin js-->
        <!-- LIBRERIAS MINIMAS NECESARIAS PARA AJAX !-->     
        <script type="text/javascript" src="smart-form/contact-recaptcha/js/jquery.form.min.js"></script>
        <script type="text/javascript" src="smart-form/contact-recaptcha/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="smart-form/contact-recaptcha/js/additional-methods.min.js"></script>
        <script type="text/javascript" src="smart-form/contact-recaptcha/js/smart-form.js"></script> 
        <!-- FIN LIBRERIAS MINIMAS NECESARIAS PARA AJAX !-->     
    </body>
</html>
