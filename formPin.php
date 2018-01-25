<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
	<!--link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css"
	rel="stylesheet" type="text/css" /!-->
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="js2/jquery.validate.js"></script>
	<script type="text/javascript" language="javascript" src="js2/jquery.ui.datepicker.js"></script>
	<script type="text/JavaScript" language="javascript" src="js2/jquery.ui.core.js"></script>
	
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
				  //document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';
				}			    
			}
			});
		}
	});	 
</script>	    
 


		<!-- breadcrumbs Fin -->
		<div id="service" class="service-business-area pt-90 pb-60 fix" style="padding-top: 30px;">        
            <div class="container">
                <div class="section-title text-center">
                    <h2>Mantente en contácto</h2>
                    <p>Envianos tus datos y pronto uno de nuestros agentes te atenderá.</p>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-8">
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
                        <div class="container-fluid" style="background-image:url(images/sociales.jpg); background-size: cover; background-position: right;">			
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
                    <!--div class="modal" id="light" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="height: 196px;">
							<div class="modal-content">
								<div class="modal-header" style="background-color:#white; color:black;">	
									<h4 class="modal-title" id="myModalLabel">
										Formulario Recibido
									</h4>
								</div>
								<div class="modal-body" style="color: #04314C">
									Hemos recibido tu información. <br>                               
								</div>
								<div class="modal-footer">			
										<a href = "formPinListo.html" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
										<button type="button" class="btn btn-primary" data-dismiss="modal" style="width: 114px;">
									   Ok
									</button> 
										</a>					
								</div>
							</div>						
						</div>					
					</div!-->  
                    
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
                </div>
            </div>
        </div>

        
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