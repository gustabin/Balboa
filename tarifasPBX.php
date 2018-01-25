<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
include_once("analyticstracking.php");

$posted = $_POST["chatteeposted"];
//=============================================================
//Check on submit...
//=============================================================
if ($posted==1){
}
?> 
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Bolsa | Balboa Telecom</title>
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
<style>
.h1 {font-family: 'Montserrat', sans-serif;}
.h2 {font-family: 'Raleway', sans-serif;}
			
 /* Small Devices, Tablets */
@media (min-width: 1197px) and (max-width: 1700px) {
	.alinearDerecha {
    
  }	
}
@media (min-width: 980px) and (max-width: 1197px) {
	.alinearDerecha {
    padding-left: 50px;
	
  }	
}
@media (min-width: 763px) and (max-width: 980px) {
	.alinearDerecha {
    padding-left: 50px;
	
  }	
}
@media (min-width: 472px) and (max-width: 763px) {
	.alinearDerecha {
    padding-left: 10px;
	
  }	
@media (min-width: 321px) and (max-width: 472px) {
	.alinearDerecha {
    padding-left: 5px;	
  }	
}

/*table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}*/

</style> 
    <body>
 <script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar las tarifas	 
function check(myval,bucket) {

if (myval == 0) return;

dataString = "action=1&iso2=" + myval + "&bucket=" + bucket;
    $.ajax(
                    {
                        'url': 'check.php',
                        'type': 'GET',
                        'dataType' : 'json',
                        'data': dataString,
                       'success' : function(data)
                        {
                         var output='';
                         var arrayLength = data.length;
                         $("#xresult").html(data);

                        }
                    });


}
</script>       
    	<!-- Header Area Inicio -->
		<header class="header-area fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="logo">
                            <a href="index.php"><img src="img/logo.png" alt="cloud pbx, pbx en la nube, central telefonica ip, central telefonica en la nube"></a>
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
                                    <li><a href="contact-us.php">Contáctos</a></li>
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
                                    <li class="active"><a href="index.php">Inicio</a></li>
                                    <li><a href="pbx.html">Cloud PBX</a></li>
                                    <!--li><a href="internet.html">Internet</a></li!-->
                                    <!--li><a href="sipTrunking.html">SIP Trunking</a></li!-->
                                    <li><a href="beneficios.html">Beneficios</a></li>
                                    <li><a href="contact-us.php">Contáctos</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div> 
                </div>
            </div>
		</header>
		<!-- Header Area Fin -->
		<!-- breadcrumbs Inicio -->
		<section class="breadcrumbs-area pt-100 pb-140 bg-4 bg-blue fix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="breadcrumbs">
                            <h2 class="page-title">servicios</h2>
                            <ul>
                                <li>
                                    <a class="active" href="index.php">Inicio</a> 
                                    <a class="active" href="pbx.html"> PBX</a> 
                                    <a class="active" href="propuestaPlanes.html"> Propuesta Comercial</a> 
                                </li>
                                <li>Bolsa</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- breadcrumbs Fin -->
		<!-- service Area Inicio -->
		
	    <div id="service" class="service-business-area pt-90 pb-60 fix" style="padding-top: 30px;">
		    <div class="container">
                <div class="row">
                	<div class="col-md-12 text-center">                
                		<h1 style="font-family: 'Montserrat', sans-serif;">Bolsa</h1>
					</div>
				</div>
            </div>     

			      <div class="container">
            <div class="">
                <div class="col-lg-6 col-md-8">
                    <div class="formularioRegistro register">
                        <font style="color: rgb(208, 0, 0); text-align: center; font-family: helvetica,arial,sans-serif,comic; font-size: 18.1px;"><?php echo $chatteemsg; ?></font><br><br>
                        <form name="chatteetel" id="chatteetel" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <INPUT TYPE="hidden" NAME="chatteeposted" value=1>
                        <INPUT TYPE="hidden" NAME="chatteevalemail" value=false>
                        <input type="hidden" name="chatteeresell_sel" value="133">
<hr>
                            <div class="doublemyinput">
                                <label for="country">Pais/Country</label>
                                <select name="chatteecountry" onchange="check($(this).val(),19);">
                                        <option value="0"> Escoja un País </option>
                                        <option value="AF">Afghanistan</option>
        <!--option value="AX">Åland Islands</option-->
        <option value="AL">Albania</option>
        <option value="DZ">Algeria</option>
        <option value="AS">American Samoa</option>
        <option value="AD">Andorra</option>
        <option value="AO">Angola</option>
        <option value="AI">Anguilla</option>
        <option value="AQ">Antarctica</option>
        <option value="AG">Antigua and Barbuda</option>
        <option value="AR">Argentina</option>
        <option value="AM">Armenia</option>
        <option value="AW">Aruba</option>
        <option value="AU">Australia</option>
        <option value="AT">Austria</option>
        <option value="AZ">Azerbaijan</option>
        <option value="BS">Bahamas</option>
        <option value="BH">Bahrain</option>
        <option value="BD">Bangladesh</option>
        <option value="BB">Barbados</option>
        <option value="BY">Belarus</option>
        <option value="BE">Belgium</option>
        <option value="BZ">Belize</option>
        <option value="BJ">Benin</option>
        <option value="BM">Bermuda</option>
        <option value="BT">Bhutan</option>
        <option value="BO">Bolivia</option>
        <!--option value="BQ">Bonaire, Sint Eustatius and Saba</option-->
        <option value="BA">Bosnia and Herzegovina</option>
        <option value="BW">Botswana</option>
        <!--option value="BV">Bouvet Island</option-->
        <option value="BR">Brazil</option>
<option value="IO">British Indian Ocean Territory</option>                                                                    
        <option value="BN">Brunei Darussalam</option>                                                                                 
        <option value="BG">Bulgaria</option>                                                                                          
        <option value="BF">Burkina Faso</option>                                                                                      
        <option value="BI">Burundi</option>                                                                                           
        <option value="KH">Cambodia</option>                                                                                          
        <option value="CM">Cameroon</option>                                                                                          
        <option value="CA">Canada</option>                                                                                            
        <option value="CV">Cape Verde</option>                                                                                        
        <option value="KY">Cayman Islands</option>                                                                                    
        <option value="CF">Central African Republic</option>                                                                          
        <option value="TD">Chad</option>                                                                                              
        <option value="CL">Chile</option>                                                                                             
        <option value="CN">China</option>                                                                                             
        <!--option value="CC">Cocos (Keeling) Islands</option-->                                                                           
        <option value="CO">Colombia</option>                                                                                          
        <option value="KM">Comoros</option>                                                                                           
        <option value="CG">Congo</option>                                                                                             
        <option value="CD">Congo, the Democratic Republic of the</option>                                                             
        <option value="CK">Cook Islands</option>                                                                                      
        <option value="CR">Costa Rica</option>                                                                                        
        <option value="HR">Croatia</option>                                                                                           
        <option value="CU">Cuba</option> 
        <option value="CW">Curacao</option>                                                                                           
        <option value="CY">Cyprus</option>                                                                                            
        <option value="CZ">Czech Republic</option>                                                                                    
        <option value="DK">Denmark</option>                                                                                           
        <option value="DJ">Djibouti</option>                                                                                          
        <option value="DM">Dominica</option>                                                                                          
        <option value="DO">Dominican Republic</option> 
        <option value="TL">East Timor</option>                                                                                       
        <option value="EC">Ecuador</option>                                                                                           
        <option value="EG">Egypt</option>                                                                                             
        <option value="SV">El Salvador</option>                                                                                       
        <option value="GQ">Equatorial Guinea</option>                                                                                 
        <option value="ER">Eritrea</option>                                                                                           
        <option value="EE">Estonia</option>                                                                                           
        <option value="ET">Ethiopia</option>                                                                                          
        <option value="FK">Falkland Islands (Malvinas)</option>                                                                       
        <option value="FJ">Fiji</option>                                                                                              
        <option value="FI">Finland</option>                                                                                           
        <option value="FR">France</option>                                                                                            
        <option value="GF">French Guiana</option>                                                                                     
        <option value="PF">French Polynesia</option>                                                                                  
        <!--option value="TF">French Southern Territories</option--> 
        <option value="GA">Gabon</option>                                                                                             
        <option value="GM">Gambia</option>                                                                                            
        <option value="GE">Georgia</option>                                                                                           
        <option value="DE">Germany</option>                                                                                           
        <option value="GH">Ghana</option>                                                                                             
        <option value="GI">Gibraltar</option>                                                                                         
        <option value="GR">Greece</option>                                                                                            
        <option value="GL">Greenland</option>                                                                                         
        <option value="GD">Grenada</option>                                                                                           
        <option value="GP">Guadeloupe</option>                                                                                        
        <option value="GU">Guam</option>                                                                                              
        <option value="GT">Guatemala</option>                                                                                         
        <option value="GN">Guinea</option>                                                                                            
        <option value="GW">Guinea-Bissau</option>                                                                                     
        <option value="GY">Guyana</option>                                                                                            
        <option value="HT">Haiti</option>                                                                                             
        <!--option value="HM">Heard Island and McDonald Islands</option-->
        <option value="VA">Holy See (Vatican City State)</option>                                                                     
        <option value="HN">Honduras</option>                                                                                          
        <option value="HK">Hong Kong</option>                                                                                         
        <option value="HU">Hungary</option>                                                                                           
        <option value="IS">Iceland</option>                                                                                           
        <option value="IN">India</option>                                                                                             
        <option value="ID">Indonesia</option>                                                                                         
        <option value="IR">Iran, Islamic Republic of</option>                                                                         
        <option value="IQ">Iraq</option>                                                                                              
        <option value="IE">Ireland</option>                                                                                           
        <!--option value="IM">Isle of Man</option-->                                                                                       
        <option value="IL">Israel</option>                                                                                            
        <option value="IT">Italy</option>                                                                                             
        <option value="CI">Ivory Coast</option>                                                                                     
        <option value="JM">Jamaica</option>                                                                                           
        <option value="JP">Japan</option>                                                                                             
        <option value="JO">Jordan</option>                                                                                            
        <option value="KZ">Kazakhstan</option>                                                                                        
        <option value="KE">Kenya</option>                                                                                             
        <option value="KI">Kiribati</option>                                                                                          
        <option value="KP">Korea (North)</option>                                                            
        <option value="KR">Korea (South)</option>                                                                                
        <option value="KW">Kuwait</option>                                                                                            
        <option value="KG">Kyrgyzstan</option>                                                                                        
        <option value="LA">Lao People's Democratic Republic</option>                                                                  
        <option value="LV">Latvia</option>                                                                                            
        <option value="LB">Lebanon</option>                                                                                           
        <option value="LS">Lesotho</option>                                                                                           
        <option value="LR">Liberia</option>                                                                                           
        <option value="LY">Libya</option>                                                                                             
        <option value="LI">Liechtenstein</option>                                                                                     
        <option value="LT">Lithuania</option>                                                                                         
        <option value="LU">Luxembourg</option>                                                                                        
        <option value="MO">Macau</option>                                                                                             
        <option value="MK">Macedonia, the former Yugoslav Republic of</option>                                                        
        <option value="MG">Madagascar</option>                                                                                        
        <option value="MW">Malawi</option>                                                                                            
        <option value="MY">Malaysia</option>                                                                                          
        <option value="MV">Maldives</option>                                                                                          
        <option value="ML">Mali</option>                                                                                              
        <option value="MT">Malta</option>                                                                                             
        <option value="MH">Marshall Islands</option>                                                                                  
        <option value="MQ">Martinique</option>                                                                                        
        <option value="MR">Mauritania</option>                                                                                        
        <option value="MU">Mauritius</option>                                                                                         
        <option value="YT">Mayotte, Reunion Island</option>                                                                                           
        <option value="MX">Mexico</option>                                                                                            
        <option value="FM">Micronesia, Federated States of</option>                                                                   
        <option value="MD">Moldova, Republic of</option>                                                                              
        <option value="MC">Monaco</option>                                                                                            
        <option value="MN">Mongolia</option>                                                                                          
        <option value="ME">Montenegro</option>                                                                                        
        <option value="MS">Montserrat</option>                                                                                        
        <option value="MA">Morocco</option>                                                                                           
        <option value="MZ">Mozambique</option>                                                                                        
        <option value="MM">Myanmar</option>                                                                                           
        <option value="NA">Namibia</option>                                                                                           
        <option value="NR">Nauru</option>                                                                                             
        <option value="NP">Nepal</option>                                                                                             
        <option value="NL">Netherlands</option>
         <option value="NC">New Caledonia</option>                                                                                     
        <option value="NZ">New Zealand</option>                                                                                       
        <option value="NI">Nicaragua</option>                                                                                         
        <option value="NE">Niger</option>                                                                                             
        <option value="NG">Nigeria</option>                                                                                           
        <option value="NU">Niue</option>                                                                                              
        <option value="NO">Norway</option>                                                                                            
        <option value="OM">Oman</option>                                                                                              
        <option value="PK">Pakistan</option>                                                                                          
        <option value="PW">Palau</option>                                                                                             
        <option value="PS">Palestinian Territory</option>                                                                   
        <option value="PA">Panama</option>                                                                                            
        <option value="PG">Papua New Guinea</option>                                                                                  
        <option value="PY">Paraguay</option>                                                                                          
        <option value="PE">Peru</option>                                                                                              
        <option value="PH">Philippines</option>                                                                                       
        <option value="PL">Poland</option>                                                                                            
        <option value="PT">Portugal</option>                                                                                          
        <option value="PR">Puerto Rico</option>                                                                                       
        <option value="QA">Qatar</option>                                                                                             
        <option value="RO">Romania</option>                                                                                           
        <option value="RU">Russian Federation</option>                                                                                
        <option value="RW">Rwanda</option>                                                                                            
        <option value="KN">St. Kitts</option>                                                                             
        <option value="LC">St. Lucia</option>                                                                                       
        <option value="MF">St. Martin</option>                                                                        
        <option value="PM">St. Pierre</option>                                                                         
        <option value="VC">St. Vincent</option>                                                                  
        <option value="SM">San Marino</option>                                                                                        
        <option value="ST">Sao Tome and Principe</option>                                                                             
        <option value="SA">Saudi Arabia</option>                                                                                      
        <option value="SN">Senegal</option>                                                                                           
        <option value="RS">Serbia</option>                                                                                            
        <option value="SC">Seychelles</option>                                                                                        
        <option value="SL">Sierra Leone</option>                                                                                      
        <option value="SG">Singapore</option>                                                                                         
        <option value="SK">Slovakia</option>                                                                                          
        <option value="SI">Slovenia</option>                                                                                          
        <option value="SB">Solomon Islands</option>                                                                                   
        <option value="SO">Somalia</option>                                                                                           
        <option value="ZA">South Africa</option>                                                                                      
        <!--option value="GS">South Georgia and the South Sandwich Islands</option-->
        <option value="SS">South Sudan</option>                                                                                       
        <option value="ES">Spain</option>                                                                                             
        <option value="LK">Sri Lanka</option>                                                                                         
        <option value="SD">Sudan</option>                                                                                             
        <option value="SR">Suriname</option>                                                                                          
        <!--option value="SJ">Svalbard and Jan Mayen</option-->
	<option value="SZ">Swaziland</option>                                                                                         
        <option value="SE">Sweden</option>                                                                                            
        <option value="CH">Switzerland</option>                                                                                       
        <option value="SY">Syria</option>                                                                              
        <option value="TW">Taiwan, Province of China</option>                                                                         
        <option value="TJ">Tajikistan</option>                                                                                        
        <option value="TZ">Tanzania, United Republic of</option>                                                                      
        <option value="TH">Thailand</option>                                                                                          
        <option value="TG">Togo</option>                                                                                              
        <option value="TK">Tokelau</option>                                                                                           
        <option value="TO">Tonga</option>                                                                                             
        <option value="TT">Trinidad and Tobago</option>                                                                               
        <option value="TN">Tunisia</option>                                                                                           
        <option value="TR">Turkey</option>                                                                                            
        <option value="TM">Turkmenistan</option>                                                                                      
        <option value="TC">Turks and Caicos Islands</option>                                                                          
        <option value="TV">Tuvalu</option>                                                                                            
        <option value="UG">Uganda</option>                                                                                            
        <option value="UA">Ukraine</option>                                                                                           
        <option value="AE">United Arab Emirates</option>                                                                              
        <option value="GB">United Kingdom</option>                                                                                    
        <option value="US">United States</option>                                                                                    
        <!--option value="UM">United States Minor Islands</option-->                                              
        <option value="UY">Uruguay</option> 
        <option value="VI">US Virgin Islands</option>                                                                              
        <option value="UZ">Uzbekistan</option>                                                                                        
        <option value="VU">Vanuatu</option>                                                                                           
        <option value="VE">Venezuela</option>                                                                                         
        <option value="VN">Viet Nam</option>                                                                                          
        <option value="VG">Virgin Islands, British</option>                                                                           
        <option value="WF">Wallis and Futuna</option>                                                                                 
        <option value="WS">Western Samoa</option>                                                                                             
        <!--option value="EH">Western Sahara</option-->
        <option value="YE">Yemen</option>
        <option value="ZM">Zambia</option>
        <option value="ZW">Zimbabwe</option>
                                </select>
                                </div>

                             <div class="doublemyinput" id="xresult" name="xresult">
                             <!--input type="submit" class="sendFormularioRegister"-->
                             </div>                                
                            </div><!--formualrioDerecho-->
                        </form>
                    </div><!--formularioRegistro register-->  
                    <div class="col-lg-6 col-md-8" >
		                <div class="feature-image-content" >
                            <div class="about-image wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".3s">
                                <img src="img/banner/7.png" alt="Balboa Telecom" class="floatright">
                            </div>
		                </div>
		            </div>                  	
                </div><!--registerCont-->
            </div><!--container register-->
        </div><!--sistemaRegister-->
		</div>
		<!-- service Area Fin -->
        <div class="container">
			<div class="row">
				<div class="col-md-12 text-center alinearDerecha">
					<div class="row">					
						<div class="btn-group btn-breadcrumb">
							<a href="index.php" class="btn btn-primary"><i class="fa fa-home"></i></a>
							<a class="btn btn-primary" href="pbxCloud.html">Características</a>
							<a class="btn btn-primary" href="pbxBeneficios.html">Beneficios de la PBX</a>
							<a class="btn btn-primary" href="propuesta.html">Propuesta comercial</a>
							<a class="btn btn-primary" href="adicionales.html">Servicios adicionales</a>
						</div>
					</div>   
				</div>
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
                                    <span>+507 834 5000</span>
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
                                    <!--li><a href="internet.html">Internet</a></li!-->
                                    
                                    <!--li><a href="sipTrunking.html">SIP Trunking</a></li!-->
                                                                           
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
