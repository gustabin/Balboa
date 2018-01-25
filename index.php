<?php 
include_once("analyticstracking.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Inicio | Balboa Telecom</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
        <link href="css/plugins/plugins.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">       
    </head>
    <body>
        <div id="preloader">
            <div id="preloader-inner"></div>
        </div><!--/preloader-->

        <!-- Site Overlay -->
        <div class="site-overlay"></div>

        <nav class="navbar navbar-expand-lg navbar-light navbar-transparent bg-faded">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img class='logo logo-dark visible-md-up  hidden-lg-up' src="images/logo.png" alt="">
                    <img class='logo logo-light hidden-xs-down hidden-sm-down hidden-md-down' src="images/logo-light.png" alt="">
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

        <div class="owl-main-slide owl-carousel carousel-dark owl-theme fullscreen">
            <div class="item bg-parallax fullscreen parallax-overlay" style='background-image: url("images/bg09.jpg")'>
                <div class="d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 ml-auto mr-auto text-center">
                                <h3 class="text-white h1 font700 text-capitalize mb20">
                                  Cloud PBX
                                </h3>
                                <p class="text-white-gray">
                                    Tecnología de punta de manera sencilla
                                </p>
                                <a href="#" class="btn btn-white-outline btn-rounded">Ver Más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item bg-parallax fullscreen parallax-overlay" style='background-image: url("images/bg010.jpg")'>
                <div class="d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 ml-auto mr-auto text-center">
                                <h3 class="text-white h1 font700 text-capitalize mb20">
                                   Central telefónica
                                </h3>
                                <p class="text-white-gray">
                                   Hospedada en la nube, para ser usada a nivel mundial. 
                                </p>
                                <a href="#" class="btn btn-white-outline btn-rounded">Ver Más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item bg-parallax fullscreen parallax-overlay" style='background-image: url("images/bg011.jpg")'>
                <div class="d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 ml-auto mr-auto text-center">
                                <h3 class="text-white h1 font700 text-capitalize mb20">
                                    Global Pin
                                </h3>
                                <p class="text-white-gray">
                                    Permite que sus amigos lo llamen desde cualquier lugar de Venezuela y usted recibe la llamada en su celular, en cualquier parte del mundo.
                                </p>
                                <a href="#" class="btn btn-white-outline btn-rounded">Ver Más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item bg-parallax fullscreen parallax-overlay" style='background-image: url("images/bg012.jpg")'>
                <div class="d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 ml-auto mr-auto text-center">
                                <h3 class="text-white h1 font700 text-capitalize mb20">
                                    Tarifa económica
                                </h3>
                                <p class="text-white-gray">
									Precios competitivos para llamadas salientes.
                                </p>
                                <a href="#" class="btn btn-white-outline btn-rounded">Ver Más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item bg-parallax fullscreen parallax-overlay" style='background-image: url("images/bg013.jpg")'>
                <div class="d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 ml-auto mr-auto text-center">
                                <h3 class="text-white h1 font700 text-capitalize mb20">
                                    DID's Gratis
                                </h3>
                                <p class="text-white-gray">
                                    Un número de acceso de Panamá GRATIS, Número de Venezuela y E.E.U.U. GRATIS (en caso de ser requerido).
                                </p>
                                <a href="#" class="btn btn-white-outline btn-rounded">Ver Más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cta bg-faded pt50 pb50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Proveemos un gran servicio a nuestros clientes</h3>
                        
                            <p>Brindamos soluciones de Internet y de comunicación basadas en la   tecnología CLOUD. Hemos desarrollado soluciones y productos utilizando   la Nube como modelo de negocio.</p>
                            <p align="right" class="NotGeneric-CallToAction">Comunicación sin fronteras.</p>
                    </div>
                    <!--div class="col-lg-3">
                        <a href="#" class="btn btn-rounded btn-lg btn-dark">
                            Buy Now
                        </a>
                    </div!-->
                </div>
            </div>
        </div>
        <div class="container pt90 pb40">
            <div class="row">
                <div class="col-lg-6 mb60 text-center">
                    <div class="icon-box icon-box-center">
                        <!--i class="icon-hover-1 bg-dark icon-mobile icon-hover-default"></i!-->
                        <img src="images/residencial.png" width="100" height="100" alt=""/>
<h4>Residencial</h4>
                        <p>
                        Servicio telefónico - <a href="pin.php">Global Pin</a> </p>
                      <p>Permite que sus amigos lo llamen desde cualquier lugar de Venezuela y usted recibe la llamada en su celular, en cualquier parte del mundo. </p>
                    </div>
                </div><!--/col-->
                <div class="col-lg-6 mb60">
                    <div class="icon-box icon-box-center">
                        <img src="images/corporativo.png" width="100" height="100" alt=""/>
                        
<h4>Corporativo</h4>
                        <p>
                        Servicios de Internet - <a href="pbx.html">PBX</a> - SIP Trunking. </p>
                        <p>Las mejores soluciones para mantener su negocio en constante evolución.</p>
                    </div>
                </div><!--/col-->
                
            </div>
        </div>

        <div class="cbp-l-slider-testimonials-wrap mb90">
            <div style="max-width: 980px; margin: 0 auto;">
                <div id="js-grid-slider-testimonials" class="cbp cbp-slider-edge">
                    <div class="cbp-item graphic">
                        <div class="cbp-l-grid-slider-testimonials-body">
                            “ Conecte sus oficinas localmente, entre sucursales en diferentes ciudades o en todo el mundo. ”
                        </div>                       
                    </div>
                    <div class="cbp-item web-design logos">
                        <div class="cbp-l-grid-slider-testimonials-body">
                            “ Cuente con una red confiable, manejada por expertos, con redundancias incorporadas. ”
                        </div>                        
                    </div>
                    <div class="cbp-item graphic logos">
                        <div class="cbp-l-grid-slider-testimonials-body">
                            “ Ofrecemos las soluciones de red que le permiten responder con agilidad a las oportunidades, adaptarse a los cambios y conducir los resultados del negocio. ”
                        </div>                        
                    </div>
                </div>
            </div>
        </div>

        <div class=" pt100 pb70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb30">
                        <div class="video-icon-image">
                            <img src="images/perfil.jpg" alt="" class="img-fluid">
                            
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp mb30" data-wow-delay=".300ms">
                        <div class="mb40">
                            <h2 class="mb20">Diseñado para empresas, grandes, pequeñas y freelancers</h2>
                            <p class="lead mb10">
                                
Con soluciones enfocadas a las necesidades

de las empresas tanto pequeñas como grandes.
Con características superiores

a los sistemas tradicionales y extremadamente sencillo de utilizar
Portamos su número actual.



                            </p>
                            <p class="lead mb20">
                                Además te brindamos numeración internacional disponible en más de 120 países.
Asistente personal IVR

Sofisticado pero sencillo de usar.
La mejor solución celular

con encriptación a nivel militar.
                            </p>
                            <!--a href="#" class="btn btn-outline-primary">
                                Ver Portafolio
                            </a!-->
                        </div>                      
                    </div>

                </div>
            </div>
        </div>
                <footer class="footer footer-standard pt50 pb10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb40">
                        <h3>Nosotros</h3>
                         <p>
                   Somos una empresa de telecomunicaciones que ofrece un novedoso portafolio de servicios de telefonía e internet a toda la población del país.

Fundada en 2008 y autorizada por la "Autoridad Nacional de los Servicios Públicos (ASEP)" para prestar sus servicios. 
            </p>
                    </div>
                    <div class="col-lg-2 col-md-6 mb40">
                        <h3>Servicios</h3>
                        <ul class="list-unstyled footer-list-item">
                            <li>
                                <a href="pin.php">
                                   Global PIN
                                </a>
                            </li>
                            <li>
                                <a href="pbx.html">
                                   Cloud PBX
                                </a>
                            </li>
                             <li class="disabled">
                                <a href="#">
                                   Sip Trunking
                                </a>
                            </li>
                            <li class="disabled">
                                <a href="#">
                                   Internet
                                </a>
                            </li>                             
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb40">
                        <h3>Información</h3>
                       <ul class="list-unstyled footer-list-item">
                            <!--li>
                                <a href="#">
                                   Beneficios
                                </a>
                            </li!-->
                            <li>
                                <a href="about.html">
                                   Quienes somos
                                </a>
                            </li>
                            <li>
                                <a href="clientes.html">
                                   Clientes
                                </a>
                            </li>
                            <li>
                                <a href="terminos.html">
                                   Términos y condiciones
                                </a>
                            </li>
                            <li class="disabled">
                                <a href="#">
                                   FAQ
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb40">
                        <h3>Headquarter</h3>
                        <img src="images/bg08.jpg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </footer><!--/footer-->
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
        <!-- load cubeportfolio -->
        
        <script>
            //testimonials
            (function ($, window, document, undefined) {
                'use strict';
                // init cubeportfolio
                $('#js-grid-slider-testimonials').cubeportfolio({
                    layoutMode: 'slider',
                    drag: true,
                    auto: false,
                    autoTimeout: 5000,
                    autoPauseOnHover: true,
                    showNavigation: true,
                    showPagination: true,
                    rewindNav: true,
                    scrollByPage: false,
                    gridAdjustment: 'responsive',
                    mediaQueries: [{
                            width: 0,
                            cols: 1
                        }],
                    gapHorizontal: 0,
                    gapVertical: 0,
                    caption: '',
                    displayType: 'default'
                });
            })(jQuery, window, document);

            //projects
            (function ($, window, document, undefined) {
                'use strict';

                // init cubeportfolio
                $('#js-grid-lightbox-gallery').cubeportfolio({
                    filters: '#js-filters-lightbox-gallery1, #js-filters-lightbox-gallery2',
                    layoutMode: 'grid',
                    mediaQueries: [{
                            width: 1500,
                            cols: 4
                        }, {
                            width: 1100,
                            cols: 3
                        }, {
                            width: 800,
                            cols: 3
                        }, {
                            width: 480,
                            cols: 2,
                            options: {
                                caption: ''
                            }
                        }],
                    defaultFilter: '*',
                    animationType: 'flipOutDelay',
                    gapHorizontal: 0,
                    gapVertical: 0,
                    gridAdjustment: 'responsive',
                    caption: 'overlayBottomAlong',
                    displayType: 'sequentially',
                    displayTypeSpeed: 100,
                    // lightbox
                    lightboxDelegate: '.cbp-lightbox',
                    lightboxGallery: true,
                    lightboxTitleSrc: 'data-title',
                    lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>'
                });
            })(jQuery, window, document);
        </script>
    </body>
</html>
