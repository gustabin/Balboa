<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
include_once("analyticstracking.php");
?> 
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Contácto | Balboa Telecom</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet"> 
	<!-- all css here -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/meanmenu.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>

	<!-- ***************desde aqui ***************************!-->
	<script type="text/javascript" language="javascript" src="js2/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="js2/jquery-ui.js"></script> 
	<script src="js2/jquery.min.js"></script>
	<script src="js2/modernizr.min.js"></script>  
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	<!--link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css"
	rel="stylesheet" type="text/css" /!-->
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
	rel="stylesheet" type="text/css" />
	<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
	type="text/javascript"></script>
	<script type="text/javascript" language="javascript" src="js2/jquery.validate.js"></script>
	<script type="text/javascript" language="javascript" src="js2/jquery.ui.datepicker.js"></script>
	<script type="text/JavaScript" language="javascript" src="js2/jquery.ui.core.js"></script>
	<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
	<!-- ***************hasta aqui ***************************!-->
<!-- Global site tag (gtag.js) - Google AdWords: 831379312 -->

<script async src="https://www.googletagmanager.com/gtag/js?id=AW-831379312"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-831379312');
</script>

</head>  
<body>
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
 
    	<!-- Header Area Inicio -->
		<header class="header-area fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="logo">
                            <a href="index.php"><img src="img/logo.png" alt="Balboa Telecom"></a>
                        </div>
                    </div>
                    <div class="col-md-8 hidden-sm hidden-xs">
                        <div class="main-menu text-center">
                            <nav>
                                <ul>
                                    <li><a href="index.php">Inicio</a></li>
                                    <li><a href="pbx.html">Cloud PBX</a></li>
                                    <!--li><a href="internet.html">Internet</a></li!-->
                                    <!--li><a href="sipTrunking.html">SIP Trunking</a></li!-->
                                    <li><a href="beneficios.html">Beneficios</a></li>
                                    <li class="active"><a href="contact-us.php">Contáctos</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--div class="col-md-2 col-sm-4 hidden-xs">
                        <button class="modal-view nav-btn" data-toggle="modal" data-target="#productModal"><i class="fa fa-bars"></i><span>Login / Registrar</span></button> 
                    </div!-->
                    <div class="col-md-12">
                       <div class="mobile-menu  hidden-lg hidden-md">
                            <nav>
                                <ul>
                                    <li><a href="index.php">Inicio</a></li>
                                    <li><a href="pbx.html">Cloud PBX</a></li>
                                    <!--li><a href="internet.html">Internet</a></li!-->
                                    <!--li><a href="sipTrunking.html">SIP Trunking</a></li!-->
                                    <li><a href="beneficios.html">Beneficios</a></li>
                                    <li class="active"><a href="contact-us.php">Contáctos</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div> 
                </div>
            </div>
		</header>
		<!-- Header Area Fin -->
		<!-- breadcrumbs Inicio -->
		<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="breadcrumbs">
                            <h2 class="page-title">contáctanos</h2>
                            <ul>
                                <li>
                                    <a class="active" href="#">Inicio</a>
                                </li>
                                <li>contáctanos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- breadcrumbs Fin -->
		<div id="service" class="service-business-area pt-90 pb-60 fix" style="padding-top: 30px;">        
            <div class="container">
                <div class="section-title text-center">
                    <h2>Mantente en contácto</h2>
                    <p>Envianos tus datos y pronto uno de nuestros agentes te atenderá.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-8">
						 <section id="contactForm" class="section">
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
					 			<button type="submit"  style="background-color:#0D96EB; border-radius:3px; width: 100px; padding: 10px; margin-left: 0px;" class="btn btn-default">Submit</button>
					  			<button type="reset" class="btn btn-primary" style="background-color:#0D96EB; border-radius:3px; width: 100px; padding: 10px;">Reset</button>
					  		</form>
                            <p class="form-messege"></p>
                        </div>
						</section>
						
					<section id="bannerInferiorExitoso" style="display: none;">			
                        <div class="container-fluid" style="background-image:url(img/sociales.jpg); background-size: cover; background-position: right;">			
                            <div class= "halfsearch">
                                <div id="Confirm"><br><br>
                                    
                                    <br><br>
                                    <br><br>                       
                                    <h3>Gracias por enviarnos tu información.</h3><br>
                                        <h5><font color="#000000">Uno de nuestros agentes de venta se pondrá en contácto muy pronto con usted!<br> Si usted quiere hablarnos ahora puede llamarnos! </font></h5>
                                        <p><b>Nuestro horario de oficina es:</b><br>Lunes a Viernes<br>8am - 5pm &nbsp;<font size="-1">(UTC -4)</font>
                                    <h3><font color="#FFFFFF">+507 834 5050</font></h3>
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
                    
                    
					
						
						
                    </div>
                     <div class="col-lg-6 col-md-8">
		                <div class="feature-image-content" >
                            <div class="about-image wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".3s">
                                <img src="img/banner/18.png" alt="Balboa Telecom" class="floatright">
                            </div>
		                </div>
		            </div>
                </div>
                <div class="conatct-info fix">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 text-center">
                            <div class="single-contact-info">
                                <div class="contact-icon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="contact-text">
                                    <span>
                                        +507 834 5050
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <div class="single-contact-info res-xs2">
                                <div class="contact-icon">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                </div>
                                <div class="contact-text">
                                    <span>
                                        <a href="mailto:info@bt.net.pa">info@bt.net.pa</a>                                           
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <div class="single-contact-info">
                                <div class="contact-icon">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="contact-text">
                                    <span>
                                        Piso 5, PH Blue Business Center, <br>
                                        Calle 67 Este, Panamá City, Panamá.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map-area">
            <div class="contact-map">
                <div id="hastech"></div>
            </div>
        </div>
		
               <!-- Footer Widget Area Inicio -->
        <div class="footer-widget-area bg-light pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="single-footer-widget">
                            <div class="footer-title">
                                <!--h1>01</h1!-->
                                <h2>Contácto</h2>
                            </div>
                            <div class="footer-content">                              
                                <div class="contact-info">
                                    <h4 class="c-content">Dirección :	</h4>
                                    <span>Piso 5, PH Blue Business Center, Calle 67 Este, <br>Panamá city, Panamá</span>
                                </div>
                                <div class="contact-info">
                                    <h4 class="c-content">Teléfono :	</h4>
                                    <span>+507 834 5050</span>
                                </div>
                                <div class="contact-info">
                                    <h4 class="c-content">E-mail :	</h4>
                                    <span>info@bt.net.pa</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="single-footer-widget">
                            <div class="footer-title">
                                <!--h1>02</h1!-->
                                <!--h2>Información</h2!--> 
                            </div>
                            <div class="footer-content">
                                <ul class="footer-widget-list"> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="single-footer-widget">
                            <div class="footer-title">
                                <!--h1>03</h1!-->
                                <h2>Servicios</h2>
                            </div>
                            <div class="footer-content">
                                <ul class="footer-widget-list">
                                    <li><a href="pbx.html">Cloud PBX</a></li>
                                    <li><a href="https://www.pbx.pa/residencial_PTY.php">Servicio Residencial</a></li>                                    
                                    <li><a href="faq.html">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div class="single-footer-widget">
                            <div class="footer-title">
                                <!--h1>04</h1!-->
                                <h2>Información</h2>
                            </div>
                            <div class="footer-content">
                                <ul class="footer-widget-list">
                                    <li><a href="beneficios.html">Beneficios</a></li>
                                    
                                    <li><a href="nosotros.html">Quienes somos</a></li>
                                    <li><a href="clientes.html">Clientes</a></li>    
									<li><a href="contrato.html">Términos y condiciones</a></li>
								</ul></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Widget Area Fin -->
        <!-- Footer Area Inicio -->
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="footer-text">
                            <span class="block">Copyright&copy; 2017 <a href="#">Balboa Telecom</a>. All rights reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Area Fin -->
        <!-- Login Register Inicio -->
        <div id="quickview-login">
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="header-tab-menu">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">login</a></li>
                                    <li role="presentation"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Registrárse</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="login"> 
                                    <div class="login-form-container">
                                        <span>Por favor ingrese la información solicitada.</span>
                                        <form action="#" method="post">
                                            <input type="text" name="user-name" placeholder="Username">
                                            <input type="password" name="user-password" placeholder="Password">
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" id="remember">
                                                    <label for="remember">Recuerdame</label>
                                                    <a href="#">Olvido su Password?</a>
                                                </div>
                                                <button type="submit" class="default-btn floatright">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="register"> 
                                    <div class="register-form">
                                        <span>Por favor ingrese la información solicitada.</span>
                                        <form action="#" method="post">
                                            <input type="text" name="user-name" placeholder="Username">
                                            <input type="password" name="user-password" placeholder="Password">
                                            <input type="email" name="user-email" placeholder="Email">
                                            <div class="button-box">
                                                <button type="submit" class="default-btn floatright">Registrárse</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>    
						</div>	

					</div>	
				</div>
			</div>
        </div>
        <!-- Login Register Fin -->
        
		<!--script src="js/vendor/jquery-1.12.4.min.js"></script!-->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.nav.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/ajax-mail.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/counterup.js"></script>
        <script src="js/jquery.meanmenu.js"></script>
        <script src="js/plugins.js"></script>
        <!-- google map api -->
        <!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_qDiT4MyM7IxaGPbQyLnMjVUsJck02N0"></script!-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeaWn2IFwmF-no3xi2nUv6dPbYArnVkX0"></script>
        <script src="js/map.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>