<?php
/*
===================================================================
AutoRegistry 
by Madini Ladino madini@gmail.com 20161102
===================================================================
*/

session_start();
$_SESSION['is_logged_in']=1;
$_SESSION['clientlink']='-1';
$_SESSION['userlink']='-1';
$_SESSION['drowssap']='-1';
$_SESSION['profile']=1;
$_SESSION['tenantlink']='-1';
$_SESSION['tenantname']='-1';
$_SESSION['tenantcode']='-1';
$_SESSION['chatteelogin']='-1';
$_SESSION['chatteepasswd']='-1';
$_SESSION['Privilege']='-1';
$_SESSION['language']='English';


require_once(__DIR__.'/../controlador/ncrypt/NCrypt.php');
require_once(__DIR__.'/../modelo/conexion.php');
require_once(__DIR__.'/../modelo/invoice/package_Class.php');
require_once(__DIR__.'/../modelo/invoice/invoice_Class.php');
require_once(__DIR__.'/../modelo/myaccount/myaccount_Class.php');
require_once(__DIR__.'/../controlador/qrcodesoftphone/gswave-qr/qrgrandstream.php');
require_once(__DIR__.'/../modelo/general_functions/general_functions_Class.php');
require_once(__DIR__ . '/MerchantPays.php');



$posted=$_POST["deskposted"];



if ($posted!=1){

$_SESSION['is_logged_in']=1;
$_SESSION['clientlink']='-1';
$_SESSION['userlink']='-1';
$_SESSION['drowssap']='-1';
$_SESSION['profile']=1;
$_SESSION['tenantlink']='-1';
$_SESSION['tenantname']='-1';
$_SESSION['tenantcode']='-1';
$_SESSION['chatteelogin']='-1';
$_SESSION['chatteepasswd']='-1';
$_SESSION['Privilege']='-1';
$_SESSION['language']='English';


//========Get language========
$getlang=$_GET["lang"];

if (strcmp($getlang,"en")==0) {$getlang="English";}
elseif (strcmp($getlang,"es")==0) {$getlang="Spanish";}
else {$getlang="Spanish";}

$_SESSION['language']=$getlang;

//==============================


include_once(__DIR__.'/../assets/js/multilanguage/multiLanguage.php');
//Se incluye archivo que contiene las funciones multilenguaje
require_once(__DIR__.'/../controlador/multilanguage/multiLanguage_Controller.php');
//SE CARGAN LAS VARIABLES DE SESSION CON LAS ETIQUETAS DEL XML
$Language_general = $_SESSION['language'];
XML_SESSION_MULTILANGUAGE($Language_general);
}





















$_SESSION['userlink']=$_REQUEST['login'];
$_SESSION['tenantlink']=$_SESSION['userlink'];
$_SESSION['is_logged_in'] == "1";
$_SESSION["deskamt"]=$_REQUEST['cc-amt'];


require_once(__DIR__.'/../controlador/ncrypt/NCrypt.php');
require_once(__DIR__.'/../modelo/conexion.php');
require_once(__DIR__.'/../modelo/invoice/package_Class.php');
require_once(__DIR__.'/../modelo/invoice/invoice_Class.php');
require_once(__DIR__.'/../modelo/myaccount/myaccount_Class.php');
require_once(__DIR__.'/../controlador/qrcodesoftphone/gswave-qr/qrgrandstream.php');
require_once(__DIR__.'/../modelo/general_functions/general_functions_Class.php');
require_once(__DIR__ . '/MerchantPays.php');


if (isset($_SESSION["desktrxstat"])) {
if (strcmp($_SESSION["desktrxstat"],"1")==0) {

unset($_POST['deskposted']);
unset($_SESSION["desktrxid"]);
unset($_SESSION["desktrxstat"]);
//session_destroy();
}


}




if ($posted==1){

  $tenantpwd=randomString(10,TRUE,TRUE,FALSE);
  $_SESSION['userlink']=$_POST['login'];
  $_SESSION['userreseller']=$_POST['deskreseller'];
  $_SESSION['dwssap']=$tenantpwd;
  $_SESSION['email']=$_POST["email"];
  $_SESSION['fname']=$_POST["firstname"];
  $_SESSION['lname']=$_POST["lastname"];
  $_SESSION['dPIN']= $_REQUEST["dPIN"];

$tenant='GP-' . $_REQUEST["dPIN"];
$expdate=$_POST["ccexpm"] . $_POST["ccexpy"];
$tranx=new MerchantPays();


$promcode=$_REQUEST["promcode"];
$promcodevalid=-1; //$_REQUEST["promcodevalid"];
$postpaid = $_REQUEST["postpaid"];


//Number of extensions (come from plans session variable)
$extensionsqty=1;


if (strcmp($promcodevalid,'-1')==0) {
$promcode='-1';
}




$tranx->AMT=$_POST["cc-amt"];
$tranx->ACCT=$_POST["ccnumber"];
$tranx->CVV2=$_POST["cvv"];
$tranx->FIRSTNAME=$_POST["firstname"];
$tranx->LASTNAME=$_POST["lastname"];
$tranx->CC=$_POST["country"];
$tranx->EXPDATE=$expdate;

if ($tranx->AMT > 0) {
  if ($postpaid == 0) {
     $tranx->doCharge();
     }
}


if ($tranx->isTransactionSuccess() || ($tranx->AMT <= 0) || ($postpaid > 0) ) {

$_SESSION["desktrxstat"]="1";
if ($tranx->AMT > 0 && $postpaid==0) {
$_SESSION["desktrxid"]=$tranx->getTransactionID();
} else { $_SESSION["desktrxid"]=$promcode;}


$tranxdata=new NCrypt();

$deskacct=$tranx->ACCT; //$tranxdata->encrypt($tranx->ACCT);
$deskcvv=$tranx->CVV2;  //$tranxdata->encrypt($tranx->CVV2);
$deskexp=$tranx->EXPDATE;
$deskcc=$tranx->CC;
$deskfour=substr($tranx->ACCT,-4);
$deskamt=$tranx->AMT;

if ($tranx->AMT > 0 && $postpaid==0) {
$desktst=$tranx->getTransactionTimestamp();
$deskchargestat=$tranx->getChargeStatus();
$desktxid=$tranx->getTransactionID();
$deskcoid=$tranx->getCorrelationID();
} else {

$desktst=$promcode;
$deskchargestat='PROMCODE_SUCCESS';
$desktxid=$promcode;
$deskcoid=$promcode;
}

$tenant_custnum='';
$_SESSION["deskfirst"]=$tranx->FIRSTNAME;


$xxcon=mysqli_connect("ibldbinstancea.ctkdbzpsyorj.us-east-1.rds.amazonaws.com","ibldbuser37","12ibldb55clave","FreeMirta");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$errorcode='SUCCESS';

//$tenantpwd = randomString(10,TRUE,TRUE,FALSE);




$value="insert into si_signups(si_fname,si_lname,si_addr,si_email,si_country,si_city,si_phone,si_tenant,si_passwd,si_active,si_date,si_dwssap,si_reseller,si_zip,si_state,si_package,si_freesideagent,si_extensions,si_trunks,si_package1,si_package2,si_unlimited,si_promcode,si_card,si_cvv,si_cardexpire,si_cardfname,si_cardlname,si_cardco,si_four,si_amount,si_payment_status,si_payment_transactionid,si_payment_correlationid,si_payment_timestamp) values ('" . $_POST["firstname"] . "','" .$_POST["lastname"] . "','" . $_POST["street"] .  "','" . $_POST["email"] . "','" . $_POST["country"] . "','" . $_POST["city"] . "','" . $_POST["phone"] . "','GP-" . $_REQUEST["dPIN"] . "','" . hash('sha256',$tenantpwd) . "','0',NOW(),'" . $tenantpwd . "','" . $_POST["deskreseller"] . "','" . $_POST["zip"] . "','" . $_POST["state"] . "','" .  $_POST["deskcommit"] . "','2','1','1','" . $_REQUEST["deskpackage1"] . "','" . $_REQUEST["deskpackage2"] . "','-1','" . $_POST["deskpackagepromo"] . "','" . $tranxdata->encrypt($deskacct) . "','" . $tranxdata->encrypt($deskcvv) . "','" . $deskexp . "','" .  $tranx->FIRSTNAME . "','" . $tranx->LASTNAME . "','" . $deskcc . "','" . $deskfour . "','" . $deskamt . "','" . $deskchargestat . "','" . $desktxid . "','" . $deskcoid . "','" . $desktst . "')";

//echo "$value";
//exit;

$result = mysqli_query($xxcon,$value);
$resultsize = mysqli_affected_rows($xxcon);
mysqli_close($xxcon);





$xxcon=mysqli_connect("ibldbinstancea.ctkdbzpsyorj.us-east-1.rds.amazonaws.com","ibldbuser37","12ibldb55clave","FreeMirta");

//active en 1 cuando quiero crear cliente
//$value="update FreeMirta.si_signups set si_active=0,si_package='" . $_POST["deskpackage"] . "', si_freesideagent=2, si_extensions='unlimited', si_trunks='" . $_POST["desktrunks"] . "', si_package1='" . $_REQUEST["deskcommit"] . "', si_package2='" . $_REQUEST["deskpackage2"] . "', si_unlimited='-1', si_promcode='" . $_POST["deskpackagepromo"] . "', si_card='" . $tranxdata->encrypt($deskacct) . "', si_cvv='" . $tranxdata->encrypt($deskcvv) . "',si_cardexpire='" . $deskexp . "', si_cardfname='" . $tranx->FIRSTNAME . "',si_cardlname='" . $tranx->LASTNAME . "', si_cardco='" . $deskcc . "', si_four='" . $deskfour ."', si_amount='" . $deskamt . "', si_payment_status='" . $deskchargestat . "', si_payment_transactionid='" . $desktxid . "', si_payment_correlationid='" .  $deskcoid . "', si_payment_timestamp='" . $desktst . "', si_promcode='" . $promcode . "' where si_tenant='GP-" . $_REQUEST["dPIN"] . "'";


$value="update FreeMirta.si_signups set si_active=1 where si_tenant='GP-" . $_REQUEST["dPIN"] ."'";

$result = mysqli_query($xxcon,$value);
//$resultsize = mysqli_affected_rows($xxcon);

mysqli_close($xxcon);

//Generate Invoice


//echo "======================>PROCESS START=======\n";
$xxcon=mysqli_connect("ibldbinstancea.ctkdbzpsyorj.us-east-1.rds.amazonaws.com","ibldbuser37","12ibldb55clave","FreeMirta");
//$ssquery="select tp_code,tp_current_minutes,tp_custnum from tp_tenant_package where tp_id=$tenant and tp_status=1";

$ssquery="select p.tp_code,p.tp_current_minutes,p.tp_custnum,p.tp_id from FreeMirta.tp_tenant_package p, asterisk.te_tenants t where p.tp_id=t.te_id and t.te_code='GP-" . $_REQUEST['dPIN'] . "' and tp_status=1";


$xxresult = mysqli_query($xxcon,$ssquery);

        if ($xxresult){

	 while($xxrow = mysqli_fetch_row($xxresult)){

           $tenant_code=$xxrow[0];

	   $tenant_minutes=$xxrow[1];

	   $tenant_custnum=$xxrow[2];
		
	   $mytenantid = $xxrow[3];
           $_SESSION["tenantid"]=$mytenantid;
          

	   if (strcmp($tenant_custnum,'-1')==0) {continue;} 

      	 }

    	}

  	mysqli_close($xxcon);



//echo "====code=$tenant_code min=$tenant_minutes customer=$tenant_custnum\n";


///GENERAR FACTURA

//echo "=================>STARTING INVOICING custnum=$tenant_custnum==\n";

      $xcurly="/usr/bin/curl ";

      $xaction="\"http://billing.deskgreen.com/freemirta/fm-billing.php?custnum=" . $tenant_custnum . "\"";

      $xcmd=$xcurly . $xaction;

      system($xcmd,$retval);


//JOJO:
//$_SESSION['email']="madini@gmail.com";
//$postpaid=1;
//$tenant_custnum=116;

//Get Pacakges
$invoice_emailto='';
$tenant_invoices=array();
$tenant_invnum='';
$transactionid=$desktxid;
$transaction_four=$deskfour;
$custpackage='';
$custpackagelist=array();

$calculatedtaxes=0;

$link = new Conectarbd();

$xxcon= $link->Conectar('FreeMirta');





	$ssquery="call freemirta_get_invoices_customer('" . $tenant_custnum . "')";

	$xxresult = mysqli_query($xxcon,$ssquery);

        if ($xxresult){

	 while($xxrow = mysqli_fetch_row($xxresult)){



//echo "=================INVOICE=$xxrow[0] \n";

           array_push($tenant_invoices,$xxrow[0]);

      	 }

    	}

       $link->Close($xxcon);

 	
//Register PAY

foreach($tenant_invoices as $tenant_invnum) {

//Paso 1: BUSCAR MONTO, PAQUETE, PARA CADA FACTURA.....	



	$link = new Conectarbd();

        $xxcon= $link->Conectar('FreeMirta');

	$ssquery="call freemirta_get_payinfo('" . $tenant_invnum . "','" . $tenant_custnum . "');";

//echo "==>$ssquery \n";


/* 


+----------+--------------------+---------+---------+----------+------------+------------+------------------+------------------+---------+--------------+-----------+
| tpkgpart | tpkgname           | tpkgamt | tpkgnum | tpkgtype | tstartdate | tenddate   | temail           | tpkgdetail       | tinvamt | thasdiscount | tquantity |
+----------+--------------------+---------+---------+----------+------------+------------+------------------+------------------+---------+--------------+-----------+
|       52 | PBXPA_1M           | 5       |     295 |        3 | 2017-03-08 | 2017-04-08 | rgonda@bt.net.pa | <$1.00 Discount> |    4.00 |            1 |         1 |
|       99 | PBXPA_PANCITY_100  | 100     |     296 |        3 | 2017-03-08 | 2017-04-08 | rgonda@bt.net.pa |                  |   96.89 |           -1 |         1 |
|       79 | PBXPA_PORTABILIDAD | 0.03    |     297 |        3 | 2017-03-08 | 2017-04-08 | rgonda@bt.net.pa | <$0.01 Discount> |    0.02 |            1 |         1 |
|        0 | I.T.B.M.S (7%)     | 7.06    |       0 |        0 | NULL       | NULL       | NULL             | NULL             |    NULL |         NULL |      NULL |
|        0 | ASEP-911 (1%)      | 1.01    |       0 |        0 | NULL       | NULL       | NULL             | NULL             |    NULL |         NULL |      NULL |
+----------+--------------------+---------+---------+----------+------------+------------+------------------+------------------+---------+--------------+-----------+


*/

	$xxresult = mysqli_query($xxcon,$ssquery);

         if ($xxresult){

	    $totalamt=0;

	  while($xxrow = mysqli_fetch_row($xxresult)){
 	    $hasdiscount=$xxrow[10];
	    if (strcmp($hasdiscount,'1')==0) {
            // If discount=1 has a discount, check field 9
            $amt=number_format($xxrow[9],2,'.','');
            } else {
                if ($xxrow[0]!=79 && $xxrow[0]!=0) {
                $amt=number_format($xxrow[2],2,'.','') * $xxrow[11]; //multiplico por cantidad
                } else {
                        $amt=number_format($xxrow[2],2,'.',''); //El tax no tiene cantidad
                       }
            }



	    $totalamt=$totalamt + $amt;
            if ($xxrow[0]!=79 && $xxrow[0]!=0) {
            $calculatedtax=$calculatedtax + $amt;
            $invoice_emailto=$xxrow[7];
            $t_type=$xxrow[4];
            $package_part=$xxrow[0];
            $package_start=$xxrow[5];
            $package_end=$xxrow[6];
            }




	    $package_name=$xxrow[1];

	    //$t_type=$xxrow[4];

	    $package_num=$xxrow[3];

	    //$package_part=$xxrow[0];

	    //$package_start=$xxrow[5];

	    //$package_end=$xxrow[6];

	    //$invoice_emailto=$xxrow[7];
	    $pkgdesc=$xxrow[8];



	    //Build package

	   //if package_part is 0, it's a tax!
            if ($xxrow[0] == 0) {
                if (strcmp($package_name,"I.T.B.M.S (7%)") ==0) {
                $agent=2;
                $custpackage=new Package($package_name,$package_name,$xxrow[2],-1);
                } elseif (strcmp($package_name,"ASEP-911 (1%)") == 0) {
                $agent=2;
                $custpackage=new Package($package_name,$package_name,$xxrow[2],-1);
                }


            } else {
                 $custpackage=new Package($package_name,$pkgdesc,$amt/$xxrow[11],$xxrow[11]);
            }


	    $custpackagelist[]=$custpackage;



      	  }

    	 }

//JOJO
//print_r($custpackagelist);
//exit;

	$link->Close($xxcon);

//If promcode
/*
if (strcmp($promcode,'-1')!=0) {
$discounted=-1 * ($totalamt - $deskamt);
$custpackage=new Package('Promotion applied',$promcode,number_format($discounted,2),1);
$custpackagelist[]=$custpackage;

}
*/


//Register pay
if ($tranx->AMT > 0 && $postpaid==0) {
        $link = new Conectarbd();

        $xxcon= $link->Conectar('FreeMirta');

$ssquery= "call freemirta_register_package_pay('". $tenant_custnum . "','" . $tenant_invnum . "','" . $package_part . "','" . $transactionid . "','" . $transaction_four . "')";

//echo "====$ssquery\n";

	$xxresult = mysqli_query($xxcon,$ssquery);



	      	while($xxrow = mysqli_fetch_row($xxresult)){//invoicenumber,email

	        $invoice_emailto=$xxrow[1];

		}

	$link->Close($xxcon);

} else {

$invoice_emailto = $_SESSION['email'];

}



	

//echo "=================>FACTURAS==\n";


$myaccount=new MyAccount();


$pkgname=$package_name; //'Package Venezuela_DE';
$concept=$pkgname;
$pkgamount=$deskamt;
$invnum=$tenant_invnum;
$oconcept="-1";

     if (strcmp($oconcept,"-1") != 0) {

     $concept=$oconcept;

     }

     //$custpackage=new Package($pkgname,$concept,$pkgamount,1);

     //$custpackagelist[]=$custpackage; 

     $invdate=gmdate("Y\-m\-d");

     //$emailto="madini@gmail.com";
     $emailto=$invoice_emailto;

     $customer=$myaccount->get_personal_myaccount($mytenantid); //tp_fn,tp_ln,tp_addr,tp_phone,tp_cc

     $tax="0.00";

     if ($postpaid==0) {
            $totaldue="0.00";
     } else {
            $totaldue=$deskamt;
            }

     $invoice=new Invoice($invnum,$customer[0][0],$customer[0][1],$customer[0][2],$customer[0][4],$emailto,$invdate,'',$custpackagelist,$tax,$totaldue);

     //multicompany
     $invoice->setAgent('2','https://cloud.deskgreen.com/img/loginPBXPA.png');

     //$ctenantcode=new generalFunctions();

     $invoice->addTenant($tenant);

     $invoice->sendemail(1); //1 one time charge, 2 recurrent invoice 




} //foreach










$myQR = new QRGrandstream();
$myimage= $myQR->CreateQR('470-' . $_SESSION['userlink'], 'G1'.$_SESSION['dwssap'].'P0', 'sip2.bt.net.pa');
$_SESSION["qrcode"]=$myimage;




header("Location: https://cloud.deskgreen.com/registro_gp_pa/register_final.php");




} else { //transaction not succeeded

$_SESSION["desktrxstat"]="0";
$_SESSION["desktrxerror"]=$tranx->getErrorCode();
$deskmsg="La transaccion no pudo ser procesada. Por favor verifique su informacion (error:" .$_SESSION["desktrxerror"] . ")";

}






} //if posted=1




function randomString($length, $uc, $n, $sc) {
$rstr='';
$rstr1='';
$source = 'abcdefghijklmnopqrstuvwxyz';
      if ($uc)
          $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      if ($n)
          $source .= '1234567890';
      if ($sc)
          $source .= '|@#~$%()=^*+[]{}-_';
      if ($length > 0) {
          $rstr = "";
          $length1 = $length-1;
          $input = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
          $rand = array_rand($input, 1);
          $source = str_split($source, 1);
          for ($i = 1; $i <= $length1; $i++) {
              $num = mt_rand(1, count($source));
              $rstr1 .= $source[$num - 1];
              $rstr = "{$rand}{$rstr1}";
          }
      }
      return $rstr;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Global Pin | Balboa Telecom</title>	 
    	<meta name="description" content="">
    	<meta name="author" content="Gustavo y Madini">
        <!-- Plugins CSS -->
        <link href="css/plugins/plugins.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    
<head>


   
    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="./css/base.css?id=<?php echo  uniqid('', true);?>">
    <link rel="stylesheet" type="text/css" href="./css/cfoa-base.css?id=<?php echo  uniqid('', true);?>">
    <link rel="stylesheet" href="./css/skeleton.css?id=<?php echo  uniqid('', true);?>">
    <link rel="stylesheet" href="./css/layout.css?id=<?php echo  uniqid('', true);?>">
    <!--[if lt IE 9]>
		<script src="./js/html5.js"></script>
	<![endif]-->

    <!-- Favicons
	================================================== -->
        <link rel="shortcut icon" href="/images/favicon.ico">
        <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->

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



    <!-- start: header -->
    <div id="header" class="container">
            <!--div class="eight columns" id="logo">
                <img src="./images/loginLogoIVR.png" alt="PBX" style="height:60px">
            </div-->
        <!--div class="eight columns" id="utility-nav">
            <div id="mer-num">Llamenos: <span class="phone-number">+507 834-5000</span></div>
            <div id="un-links">
            ventas@bt.net.pa
            </div>
        </div-->

    </div>
    <!-- end: header -->


    


<!-- start: breadcrumb and title -->
<div class="container" id="breadcrumb" style="display:none;">
    <div class="four columns bc-arrow">1.<?php echo $_SESSION['class_personalinfo']; ?></div>
    <div class="three columns bc-arrow">2.<?php echo $_SESSION['class_plan']; ?></div>
    <div class="three columns bc-arrow"><a href="#">3.<?php echo $_SESSION['class_myaccount_paym']; ?></a></div>
    <div class="three columns bc-arrow">4.<?php echo $_SESSION['class_setup']; ?></div>
    <div class="three columns bc-last">5.<?php echo $_SESSION['class_end']; ?></div>

</div>

<div class="container">
    <div class="sixteen columns">
<br>
        <h1><?php echo "GLOBAL PIN";  ?></h1>
    </div>
    <!--
    -->
</div>
<!-- end: breadcrumb and title -->


<!-- start: personal form -->
<div class="container">
<div id="deskmsg" name="deskmsg" class="error msg"><?php echo $deskmsg; ?></div>
    <div id="main-form">
<form name="deskreg" id="deskreg" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT TYPE="hidden" NAME="deskposted" value=1>
<input type="hidden" name="deskreseller" value="268">
<INPUT TYPE="hidden" NAME="desktermsaccepted" id="desktermsaccepted" value="1">
<INPUT TYPE="hidden" NAME="promcodevalid" id="promcodevalid" value="-1">
<INPUT TYPE="hidden" NAME="postpaid" id="postpaid" value="0">
<INPUT TYPE="hidden" NAME="deskcommit" id="deskcommit" value="345">
<INPUT TYPE="hidden" NAME="login" id="login" value="-1">
<INPUT TYPE="hidden" NAME="deskpackage" id="deskpackage" value="174">
<INPUT TYPE="hidden" NAME="deskpackage1" id="deskpackage1" value="-1">
<INPUT TYPE="hidden" NAME="dPIN" id="dPIN" value="">
<INPUT TYPE="hidden" NAME="deskpackagepromo" id="deskpackagepromo" value="-1">

            <div id="pintdiv" class="two columns"><?php echo "PIN (5 digitos):";/*$_SESSION['class_promo'];*/ ?></div>
            <div id="pindiv" class="seven columns">
                <input id="pincode" name="pincode" maxlength=5 type="text" onchange="check_PIN(this);"/>
                <div class="input-msg error visible" id="pininfo" name="pininfo"></div> 
            </div>




<div class="seven columns">
<select class="valid"  style="width:100%;" id="deskpackage2" name="deskpackage2" onchange="CalCost()">
<option value="0"><?php echo $_SESSION['class_select'] . " " . $_SESSION['class_moneybucket'] ." (opcional)"; ?></option>
<option value="137">$10 A-Z</option>
<option value="138">$30 A-Z</option>
<option value="139">$50 A-Z</option>
<option value="140">$100 A-Z</option>
<option value="141">$200 A-Z</option>
<option value="142">$300 A-Z</option>
<option value="143">$400 A-Z</option>
<option value="144">$500 A-Z</option>
</select>
</div>



<!--hr-->

<div class="sixteen columns empty-label"></div>



           <!-- name info -->            
<div class="two columns"><?php echo $_SESSION['class_name']; ?>*</div>
            <div class="seven columns">
                <input id="firstname" maxlength="100" name="firstname" type="text" value="" />
                <div class="input-msg"></div>
            </div>
            <div class="seven columns">
                <input id="lastname" maxlength="100" name="lastname" type="text" value="" />
                <div class="input-msg"></div>
            </div>
<!-- pais -->


<div id="tagccinfo">
<!-- ssn info -->
            <div class="two columns"><?php echo $_SESSION['class_creditcard']; ?>*</div>
            <div class="seven columns">
                <input class="cc-number" id="ccnumber" maxlength="16" name="ccnumber" type="text" value="" placeholder="•••• •••• •••• ••••" />
                <div id="tenant" class="input-msg"></div>
            </div>
            <div class="seven columns">
                <input id="cvv" maxlength="100" name="cvv" type="text" value="" />
                <div class="input-msg"></div>
            </div>




<div class="two columns"><?php echo $_SESSION['class_expiry']; ?>*</div>
            <div class="seven columns">
                <select name="ccexpm" id="ccexpm">
<option value="01" selected="">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option>			<option value="11">11</option>			<option value="12">12</option>

 </select>
	    </div>
             <div class="seven columns">
                <select name="ccexpy" id="ccexpy"> 
		<option value="2015" >2015</option>			<option value="2016">2016</option>			<option value="2017" selected="">2017</option>			<option value="2018">2018</option>			<option value="2019">2019</option>			<option value="2020">2020</option>			<option value="2021">2021</option>			<option value="2022">2022</option>			<option value="2023">2023</option>			<option value="2024">2024</option>			<option value="2025">2025</option>

		</select>
                <div id="tenant" class="input-msg"></div>
            </div>



<div class="two columns"><?php echo $_SESSION['class_country']; ?>*</div>
<div class="seven columns" id="CityStateList">
<select name="country">
        <option value="AF">Afghanistan</option>
        <option value="AX">Åland Islands</option>
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
        <option value="BO">Bolivia, Plurinational State of</option>
        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
        <option value="BA">Bosnia and Herzegovina</option>
        <option value="BW">Botswana</option>
        <option value="BV">Bouvet Island</option>
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
         
        <option value="CX">Christmas Island</option>                                                                         
         
        <option value="CC">Cocos (Keeling) Islands</option>                                                                  
         
        <option value="CO">Colombia</option>                                                                                 
         
        <option value="KM">Comoros</option>                                                                                  
         
        <option value="CG">Congo</option>                                                                                    
         
        <option value="CD">Congo, the Democratic Republic of the</option>                                                    
         
        <option value="CK">Cook Islands</option>                                                                             
         
        <option value="CR">Costa Rica</option>                                                                               
         
        <option value="CI">Côte d'Ivoire</option>                                                                            
         
        <option value="HR">Croatia</option>                                                                                  
         
        <option value="CU">Cuba</option>                                                                                     
         
        <option value="CW">Curaçao</option>                                                                                  
         
        <option value="CY">Cyprus</option>                                                                                   
         
        <option value="CZ">Czech Republic</option>                                                                           
         
        <option value="DK">Denmark</option>                                                                                  
         
        <option value="DJ">Djibouti</option>                                                                                 
         
        <option value="DM">Dominica</option>                                                                                 
         
        <option value="DO">Dominican Republic</option>                                                                       
         
        <option value="EC">Ecuador</option>                                                                                  
         
        <option value="EG">Egypt</option>                                                                                    
         
        <option value="SV">El Salvador</option>                                                                              
         
        <option value="GQ">Equatorial Guinea</option>                                                                        
         
        <option value="ER">Eritrea</option>                                                                                  
         
        <option value="EE">Estonia</option>                                                                                  
         
        <option value="ET">Ethiopia</option>                                                                                 
         
        <option value="FK">Falkland Islands (Malvinas)</option>                                                              
         
        <option value="FO">Faroe Islands</option>                                                                            
         
        <option value="FJ">Fiji</option>                                                                                     
         
        <option value="FI">Finland</option>                                                                                  
         
        <option value="FR">France</option>                                                                                   
         
        <option value="GF">French Guiana</option>                                                                            
         
        <option value="PF">French Polynesia</option>                                                                         
         
        <option value="TF">French Southern Territories</option>                                                              
         
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
         
        <option value="GG">Guernsey</option>                                                                                 
         
        <option value="GN">Guinea</option>                                                                                   
         
        <option value="GW">Guinea-Bissau</option>                                                                            
         
        <option value="GY">Guyana</option>                                                                                   
         
        <option value="HT">Haiti</option>                                                                                    
         
        <option value="HM">Heard Island and McDonald Islands</option>                                                        
         
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
         
        <option value="IM">Isle of Man</option>                                                                              
         
        <option value="IL">Israel</option>                                                                                   
         
        <option value="IT">Italy</option>                                                                                    
         
        <option value="JM">Jamaica</option>                                                                                  
         
        <option value="JP">Japan</option>                                                                                    
         
        <option value="JE">Jersey</option>                                                                                   
         
        <option value="JO">Jordan</option>                                                                                   
         
        <option value="KZ">Kazakhstan</option>                                                                               
         
        <option value="KE">Kenya</option>                                                                                    
         
        <option value="KI">Kiribati</option>                                                                                 
         
        <option value="KP">Korea, Democratic People's Republic of</option>                                                   
         
        <option value="KR">Korea, Republic of</option>                                                                       
         
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
         
        <option value="MO">Macao</option>                                                                                    
         
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
         
        <option value="YT">Mayotte</option>                                                                                  
         
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
         
        <option value="NF">Norfolk Island</option>                                                                           
         
        <option value="MP">Northern Mariana Islands</option>                                                                 
         
        <option value="NO">Norway</option>                                                                                   
         
        <option value="OM">Oman</option>                                                                                     
         
        <option value="PK">Pakistan</option>                                                                                 
         
        <option value="PW">Palau</option>                                                                                    
         
        <option value="PS">Palestinian Territory, Occupied</option>                                                          
         
        <option value="PA" selected="true">Panama</option>                                                                                   
         
        <option value="PG">Papua New Guinea</option>                                                                         
         
        <option value="PY">Paraguay</option>                                                                                 
         
        <option value="PE">Peru</option>                                                                                     
         
        <option value="PH">Philippines</option>                                                                              
         
        <option value="PN">Pitcairn</option>                                                                                 
         
        <option value="PL">Poland</option>                                                                                   
         
        <option value="PT">Portugal</option>                                                                                 
         
        <option value="PR">Puerto Rico</option>                                                                              
         
        <option value="QA">Qatar</option>                                                                                    
         
        <option value="RE">Réunion</option>                                                                                  
         
        <option value="RO">Romania</option>                                                                                  
         
        <option value="RU">Russian Federation</option>                                                                       
         
        <option value="RW">Rwanda</option>                                                                                   
         
        <option value="BL">Saint Barthélemy</option>                                                                         
         
        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>                                             
         
        <option value="KN">Saint Kitts and Nevis</option>                                                                    
         
        <option value="LC">Saint Lucia</option>                                                                              
         
        <option value="MF">Saint Martin (French part)</option>                                                               
         
        <option value="PM">Saint Pierre and Miquelon</option>                                                                
         
        <option value="VC">Saint Vincent and the Grenadines</option>                                                         
         
        <option value="WS">Samoa</option>                                                                                    
         
        <option value="SM">San Marino</option>                                                                               
         
        <option value="ST">Sao Tome and Principe</option>                                                                    
         
        <option value="SA">Saudi Arabia</option>                                                                             
         
        <option value="SN">Senegal</option>                                                                                  
         
        <option value="RS">Serbia</option>                                                                                   
         
        <option value="SC">Seychelles</option>                                                                               
         
        <option value="SL">Sierra Leone</option>                                                                             
         
        <option value="SG">Singapore</option>                                                                                
         
        <option value="SX">Sint Maarten (Dutch part)</option>                                                                
         
        <option value="SK">Slovakia</option>                                                                                 
         
        <option value="SI">Slovenia</option>                                                                                 
         
        <option value="SB">Solomon Islands</option>                                                                          
         
        <option value="SO">Somalia</option>                                                                                  
         
        <option value="ZA">South Africa</option>                                                                             
         
        <option value="GS">South Georgia and the South Sandwich Islands</option>                                             
         
        <option value="SS">South Sudan</option>                                                                              
         
        <option value="ES">Spain</option>                                                                                    
         
        <option value="LK">Sri Lanka</option>                                                                                
         
        <option value="SD">Sudan</option>                                                                                    
         
        <option value="SR">Suriname</option>                                                                                 
         
        <option value="SJ">Svalbard and Jan Mayen</option>                                                                   
         
        <option value="SZ">Swaziland</option>                                                                                
         
        <option value="SE">Sweden</option>                                                                                   
         
        <option value="CH">Switzerland</option>                                                                              
         
        <option value="SY">Syrian Arab Republic</option>                                                                     
         
        <option value="TW">Taiwan, Province of China</option>                                                                
         
        <option value="TJ">Tajikistan</option>                                                                               
         
        <option value="TZ">Tanzania, United Republic of</option>                                                             
         
        <option value="TH">Thailand</option>                                                                                 
         
        <option value="TL">Timor-Leste</option>                                                                              
         
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
                         
        <option value="UM">United States Minor Islands</option>                                                              
         
        <option value="UY">Uruguay</option>                                                                                  
         
        <option value="UZ">Uzbekistan</option>                                                                               
         
        <option value="VU">Vanuatu</option>                                                                                  
         
        <option value="VE">Venezuela</option>                                                                                
         
        <option value="VN">Viet Nam</option>                                                                                 
         
        <option value="VG">Virgin Islands, British</option>                                                                  
         
        <option value="VI">Virgin Islands, U.S.</option>                                                                     
         
        <option value="WF">Wallis and Futuna</option>                                                                        
         
        <option value="EH">Western Sahara</option>                                                                           
         
        <option value="YE">Yemen</option>
        <option value="ZM">Zambia</option>
        <option value="ZW">Zimbabwe</option>
        </select>
<div class="input-msg"></div>
</div>


<!--address-->
<div class="seven columns">
                <input id="street" maxlength="100" name="street" type="text" value="" />
                <div class="input-msg"></div>
            </div>

<!--city and state -->
            <div class="two columns"><?php echo $_SESSION['class_city1']; ?>*</div>
            <div class="seven columns">
                <input id="city" maxlength="100" name="city" type="text" value="" />
                <div class="input-msg"></div>
            </div>
            <div class="seven columns">
                <input id="state" maxlength="100" name="state" type="text" value="" />
                <div class="input-msg"></div>
            </div>

<!-- zip code -->
            <div class="two columns"><?php echo $_SESSION['class_zipcode']; ?>*</div>
            <div class="seven columns">
                <input id="zip" maxlength="8" name="zip" type="text" value="" />
                <div class="input-msg"></div>
            </div>




            <!--div class="two columns empty-label">Email*</div-->
            <div class="seven columns">
                <input class="email" id="email" maxlength="100" name="email" type="text" value="" />
                <div class="input-msg"></div>
            </div>


            <!-- phone info -->
            <div class="sixteen columns empty-label"></div>
            <div class="two columns"><?php echo $_SESSION['class_phone']; ?>*</div>
            <div class="fourteen columns">
                <input id="phone" name="phone" type="text" value="" />
                <div class="input-msg"></div>
            </div>

</div> <!-- tagccinfo -->



            <!-- amount info -->
            <div class="sixteen columns empty-label"></div>
            <div class="two columns"><?php echo $_SESSION['class_amount']; ?></div>
            <div class="seven columns">
                <input id="cc-amt" name="cc-amt" type="text" value="0" readonly/>
                <div class="input-msg"></div>
            </div>
            <div class="seven columns">
                <div id="promapplyinfo" name="promapplyinfo" ></div>
            </div>

<!--compromiso de 1 ano -->

             <div class="fourteen columns">
            <label class="checkbox-inline">
            <input type="checkbox" name="committerms" id="committerms" ><?php echo $_SESSION['class_calls_commit']; ?>
            </label>
             <div class="input-msg" id="commiterror"></div>
           </div>


            <!-- terms of use info -->
             <!--div class="sixteen columns empty-label"></div> 
             <div class="fourteen columns">
            <label class="checkbox-inline">
            <input type="checkbox" name="deskterms" id="deskterms" ><?php echo $_SESSION['class_termsofuse']; ?>*
            </label>
             <div class="input-msg" id="desktermserror"></div>
           </div-->


            <!-- terms of use info -->
             <div class="sixteen columns empty-label" id="paywait" name="paywait"></div> 
             <div class="sixteen columns">
<!--=============================================================-->
<!--
<textarea rows="15" cols="350" id="desktermsofuse"  style="resize: none;" readonly>


Terms of Use

These Terms and Conditions for use constitute the agreement (“Agreement”) between DESKGREEN (“we,” “us” “The Company “or “DESKGREEN”) and the user (“you,” “user” or “Subscriber”) of DESKGREEN communications services and any related products, plans or services (“Service”). By Using, registering or activating the Service, you acknowledge that you have read and understood, and you agree, to the terms and conditions of this Agreement, and you represent that you are of legal age and possess the legal right and ability to enter this Agreement and become bound by its terms. This Agreement also governs our website, applications and software whether or not you are a registered member or not.

    PREVIOUS CONDITIONS

The User accepts the use of electronic communication in order to enter into this Agreement, orders and other documents and for electronic distribution of news, policies and records of transactions initiated or completed through our website. In addition, User waives any rights or requirements pursuant to laws or regulations in any jurisdiction which require one (non-electronic) original signature or delivery or retention of non-electronic records, to the extent permitted by applicable mandatory law.

 

Users will provide or have provided to DESKGREEN in connection with the registration for Service, true, accurate, current and complete name(s) (personal and/or business), address (physical and/or billing and/or shipping) and credit card/payment information. Users agree to provide DESKGREEN any additional and/or supportive detail (by way of example, valid photo ID, Credit Card authorization form or supplemental form(s), etc.) which DESKGREEN, in its sole discretion, determines may be required to activate, reactivate or continue service.

 

Users acknowledge and agree that the DESKGREEN infrastructure directly does not and does not intend to support or carry emergency calls, consequentially in case that this services be requested, Users represent and warrant that Users understand VoIP-based services – including the connection or establishment of VoIP calls to 911 – are subject to multiple issues of the Internet, and as such are inherently unreliable. To that end, Users represent and warrant that Users have and will maintain at all times a traditional Plain Old Telephone Service (POTS) telephone line, wireless or cellular service that will enable calls to 911 and any other applicable emergency service number.  DESKGREEN will offer Emergency 911 services on a best-effort basis as part of DESKGREEN’s VoIP phone Service and are made available to physical VoIP phones when located in the United States and registered with DESKGREEN Service (“E911-Available Device”).

    SERVICE

DESKGREEN provides a limited, revocable, non-exclusive, non-assignable, non-transferable, non-resellable license and right to use the DESKGREEN services in accordance within the terms set forth in this Agreement. All other rights not expressly granted under this Agreement are retained and reserved by DESKGREEN. 

Not all services are guaranteed to work with the same quality in all locations and through all interconnecting equipment. Notwithstanding the forgoing, Users represent and warrant that understand VoIP-based services are subject to multiples issues of the Internet, and as such are inherently unreliable. You affirm DESKGREENhas no duty under this Agreement to provide insurance to your benefit against any losses caused by interruption of Service, whether caused by disrupted access to the Internet, acts of God, scheduled maintenance windows or other reasons whether reasonably seen or unforeseen.

 

DESKGREENoffers several different plans. Some of the plans provide for a fixed or no number of monthly minutes. In any case If you exceed Your Monthly minutes during the course of a Service month or if you do not have enough minutes available, You may purchase minutes as needed. DESKGREEN offers several packages with minutes in order to cover this requirement.

 

DESKGREEN offers several monthly unlimited plans for some of its products and Services and particular countries. Each unlimited calling plan provides you with a local telephone number for a monthly fee, excluding taxes, surcharges, and fees. So when User has to call a different country no included in their plan and unless Users advise us otherwise in writing, we will automatically purchase the minimum package for additional minutes on Your behalf (and Your Account will be charged accordingly).

 

DESKGREENreserves the right to review usage of unlimited plans to ensure that You are not abusing such plans. You agree to use the unlimited plans for normal day-to-day typical business voice or fax calls and will not employ methods or devices to take advantage of unlimited plans by using the Services excessively or for means not intended by DESKGREEN. Unlimited services may not be used for monitoring services, data transmissions, transmission of broadcasts or transmission of recorded material. DESKGREEN may terminate, with or without notice, Your Service or change Your Service plan if, in its sole discretion, DESKGREEN determines You are abusing the unlimited plan.

All Unlimited Plans are subject to all of the Prohibited Use and Fair Use limitations set forth in this Fair Use Policy. In addition, all unlimited plans are subject to the following terms and conditions:

Unlimited Plans are for normal residential or business use.

Unlimited Plans are intended to facilitate communication between two persons at one time per line.

Unlimited Plans cannot, under any circumstances, be used for call-in lines, call centers, trunking (to a PBX or otherwise), continuous or extensive call forwarding, autodialing, fax blasting, telemarketing (including without limitation charitable or political solicitation and/or polling), junk faxing, fax spamming, or other high volume or multi-person calling or faxing purposes.

 

    TERM

DESKGREENservices Agreement begins on the date User or DESKGREEN activates the service. The month to month services will automatically renew each month according to the initial date and the annual agreements are renew automatically for the same period. In case of cancellation by User both services need to be cancelled before new term starts. User or Approved Persons may request cancellation of this Agreement at any time by making such request online, in writing or by email to billing@DESKGREEN.com. Accounts will be cancelled within a reasonable timeframe.

    PAYMENTS FOR SERVICES

DESKGREEN only accepts payments by credit card. At registration Service User authorizes DESKGREEN to charge the credit card account number and keep it on file with DESKGREEN, including any changed information given to DESKGREEN if the card expires or is replaced. This authorization will remain valid until 30 days after DESKGREEN receives your written notice terminating.

Users will not receive paper invoices or receipts. You can access printable invoices, billing reports and payments receipts via DESKGREEN website.

Users are responsible for any applicable federal, state, local, or other governmental, even foreign, and any other taxes.

Any applicable initiation charges, usage, monthly recurring charges, support charges, and other fees are billed in full in advance. Termination, international calling, equipment return fees and transfer charges, if any, are billed in arrears and debit to the user credit card on file.

No refund, transfer or proration shall be made of any unused Plan Credits, Additional Credits, Promotional Credits, or international calling credits or of any remaining periods/months on any Service plan.

DESKGREEN may terminate your Service at any time in its sole discretion, if any charge to your credit card on file with DESKGREEN is declined or reversed or in case of any other non-payment of account charges.

On some plans with annual payment, DESKGREEN will make available free or heavily discounted Equipment and Services. These discounts are provided with the understanding that User will stay with DESKGREEN for a minimum period of twelve (12) months. Should You receive free or specially discounted equipment as part of an eligible plan and then (a) cancel or cause to be terminated before the first twelve (12) month term is complete; or (b) within the initial twelve (12) month period change to a plan that does not offer or include free or discounted equipment or services, Users agree and hereby authorize the charge of 100% of the price displayed on the DESKGREEN website that is in place at the time of Service modification, for any and all free or discounted equipment (“Equipment Charge”) or service. The Equipment Charge is not eligible for, nor will be, prorated.

DESKGREEN may, in its sole discretion, agree to accept the return of equipment. Consequentially, Users agree to be responsible for all return shipping charges and assume any and all liability for any damage that may occur while shipping equipment to DESKGREEN.

 

    RESALE AND TRANFERS

    User’s right to use the Product is personal to you. You may be either an individual or a corporation or business entity, but you agree not to resell the use of the Product, other materials or any information obtained by you without the express written consent from DESKGREEN.  If DESKGREEN in its sole discretion believes that your account is being used by unauthorized user, this may be immediately suspended or canceled without prior notice.

 

    UNLAWFULL AND PROHIBITED USE

You shall not use the Services for any illegal, fraudulent, improper, or abusive purpose or in any way that interferes with DESKGREEN’s ability to provide high quality Services to other Users, prevents or restricts other Users from using the Services, or damages any DESKGREEN’s or other users’ property. If DESKGREEN finds that You are using the Services for anything other than the permitted uses in this Agreement or for any of the prohibited uses in this Agreement, DESKGREEN may at its sole discretion terminate Your Service and charge You any applicable fees for the Services used plus damages caused by Your improper use. Prohibited uses include, but are not limited to:

    Behavior that is illegal, obscene, threatening, harassing, defamatory, libelous, deceptive, fraudulent, malicious, infringing, tortious, or invasive of another’s privacy.
    Sending unsolicited messages or advertisements, including email, voicemail, SMS, or faxes (commercial or otherwise) (“spamming”), or otherwise sending bulk and/or junk email, voice mail, SMS, or faxes.
    Harvesting or otherwise collecting information about others, including email addresses, without their consent.
    Creating a false Caller ID identity (“ID spoofing”) or forged email/SMS address or header, or otherwise attempting to mislead others as to the identity of the sender or the origin of any communication made using the Services.
    Transmitting any material that may infringe, misappropriate, or otherwise violate the foreign or domestic intellectual property rights or other rights of third parties.
    Violating any U.S. or foreign law regarding the transmission of technical data or software exported through the Services.
    Utilizing the Services in excess of what, in DESKGREEN’s sole discretion, would be expected of normal business use, including without limitation allowing more than one user to use a single VoIP line or using a single VoIP line in excess of what would be expected of a single user.
    Using the Services in any way that interferes with other users’ and third parties’ use and enjoyment of the Services or use the Services in any manner which disrupts, prevents or restricts any other customer from using the Services.
    Using or employing methods and/or devices that are designed or likely to take advantage of, bypass, exploit, or otherwise avoid this Use Policy.

 

You further understand and agree that:

    You shall be solely liable for any transmissions sent and data stored through the Services under Your Account, including the content of any transmission sent and data stored through the Services under Your Account.
    You will abide by all applicable DESKGREEN policies, procedures, and agreements related to the Services.
    You shall not attempt to gain unauthorized access to the Services, other accounts, computer systems or networks connected to the Services, through password mining or any other means.
    Your use of the Services is subject to all applicable local, state, national, and international laws and regulations (including without limitation those governing account collection, export control, consumer protection, unfair competition, anti-discrimination, securities laws, and false advertising).

In addition, some of DESKGREEN’s plans and other Services are offered on an “unlimited” basis. All unlimited plans:

    May only be used for normal business use.
    Are provided only for dialog between two individuals at one time per line.
    Exclude international calling, which is available for an additional fee.
    Are issued on a “one (1) user per line basis”, meaning that only one registered user may be assigned to use the Services for any one line.

Unlimited plans also may not be used for any of the following prohibited uses (which are in addition to the other prohibited uses applicable to all Services):

    Trunking or forwarding Your DESKGREEN number to other phone number capable of handling multiple simultaneous calls, or to a private branch exchange (PBX) or a key system.
    Spamming or blasting (e.g., sending one hundred (100) or more bulk and/or junk voicemail or faxes simultaneously).
    Bulk call-in lines (e.g., customer support or sales call centers, “hotlines”, 900 numbers, sports-line numbers, etc.).
    Auto-dialing or “predictive” dialing (i.e., non-manual dialing or using a software program or other means to continuously dial or place out-bound calls).

In addition, unusually high usage of the Services may impair DESKGREEN’s ability to provide high quality Services to others and/or indicate unauthorized use of the Services, in which case DESKGREEN may suspend or terminate Your Account or, upon prior notice, convert Your Account to a metered calling plan that charges significantly higher usage rates.

DESKGREEN reserves the right to add to, modify or amend this Use Policy at any time for any reason at its sole discretion.

 

 

    COPYRIGHT, TRADE MARK AND UNAUTHORIZED USE

DESKGREEN, DESKGREEN logo, and other names, logos, icons and marks identifying DESKGREEN’s products and services are trademarks of DESKGREEN and may not be used without the prior written permission. The services and any software, API’s, download, information, documents, and materials on DESKGREEN’s website are also protected. All rights not expressly granted in these Terms are reserved to DESKGREEN. 

 

    ACCESS NUMBERS

 

User is advised and expressly agrees that, by obtaining the Service hereunder, it does not acquire any ownership interest, intellectual property right, right of control, right to port or other interest of any kind in any telephone number used to access the Service, including without limitation any toll free number. User further acknowledges that any access number, including without limitation a toll free number, assigned by DESKGREEN to User shall be utilized by User solely to access the Service and may be withdrawn or exchanged by DESKGREEN for another access number at The Company’s discretion upon notice to User. User’s right to use a telephone number provided by DESKGREEN, including without limitation any toll free number, shall end automatically and immediately upon the expiration or termination of the Agreement.

 

    PASSWORD AND SECURITY

Upon completion of all Registration Data and acceptance of this Agreement, DESKGREEN will provide You with, as applicable, a password(s), user ID(s), PIN(s), telephone number(s), and other account information. You may be required to provide a security question and answer that will be used to verify ownership or affiliation with the Account. You are solely responsible for maintaining the confidentiality of all passwords, PINs, and security questions and answers associated with the Account, and, at all times, You will be solely responsible for all transactions and activities that occur as a result of the disclosure (whether authorized or unauthorized) of any password(s), PIN(s), and/or security questions(s) and answer(s) associated with the Account, even if such transactions and/or activities were not authorized by You. You are solely liable for any transactions or activities by You or anyone else that occur on Your Account. You shall immediately notify DESKGREEN of any unauthorized use of Your Account or if any other breach of security has occurred. In no event shall DESKGREEN be liable for any unauthorized use of Your Account.

You represent and warrant that the information You provide is accurate, current, and complete, and agree to promptly update any of the information if it changes. If You provide Registration Data that is, or that DESKGREEN suspects to be, false, inaccurate, not current, incomplete, fraudulent, or otherwise unlawful, DESKGREEN has the right, in its sole discretion, to suspend or terminate the Service and refuse any and all current or future use of all Services by You, Your business(es), affiliates and all users of Your Account. At all times, You shall maintain and promptly update Registration Data.

    TERMINATION

 

Regarding the services DESKGREENmay immediately terminate your membership and right to use the Product if (a) You breach these Terms; or (b) DESKGREENdecides, in its sole discretion, to discontinue offering the Product. DESKGREENshall not be liable to you or any third party for termination of the Product. You may terminate this agreement with or without cause at any time, effective immediately upon written notice. Should you object to any terms and conditions of the Terms or any subsequent modifications thereto or become dissatisfied with the Product in any way, your sole recourse is to immediately: (a) discontinue use of the Product; (b) terminate your membership; and (c) notify of termination. Upon termination of membership, your right to use the Product immediately ceases. 

Account cancellation shall not impair or discharge any of User obligations or liabilities for use of Services subsequent to the initial request of cancellation yet prior to the effective date of said cancellation. You shall not be entitled to any refund of any portion of the accrued charges for the month in which cancellation notice was received, up until the date that the cancellation becomes effective.

 

    MODIFICATIONS

 

DESKGREEN may amend these Terms at any time by posting a revised Terms of Service document on its website. You are responsible for regularly reviewing it. You manifest intent to accept these amended terms if you continue to use the services after such amended terms have been posted. Otherwise, these Terms may not be amended except in writing signed by both parties. Further, DESKGREEN reserves the right to modify or discontinue the Product with or without notice to you and shall not be liable to you or any third party for exercising its right to modify or discontinue the Product. 

    PRIVACY

DESKGREEN’s use of any personal information you provide to it is set out in DESKGREEN’s current Privacy Policy. 

    INDEMNITY

 

You hereby agree, at your expense, to indemnify, defend and hold DESKGREEN harmless from and against any loss, cost, damages, liability or expense arising out of or relating to (a) a third-party claim, action or allegation of infringement based on information, data, files or other content submitted by You; (b) any fraud or manipulation, or other breach of these Terms by You; or (c) any third-party claim, action or allegation brought against The Company arising out of or relating to a dispute between you and/or your associated users, of any  products and services, over the terms and conditions of a contract or any other promise, agreement or attempted agreement for the purchase, sale or use of any product or service.

 

    DISCLAIMER OF WARRANTIES

YOU EXPRESSLY AGREE THAT USE OF THE SERVICE IS AT YOUR SOLE RISK. THE SERVICE IS PROVIDED ON AN “AS IS” BASIS. DESKGREENEXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. DESKGREEN MAKES NO WARRANTY THAT THE SERVICE WILL MEET YOUR REQUIREMENTS OR THAT THE SERVICE WILL BE UNINTERRUPTED, TIMELY OR ERROR FREE, NOR DOES MAKE ANY WARRANTY AS TO THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THE SERVICE OR THE ACCURACY OF ANY OTHER INFORMATION OBTAINED THROUGH THE SERVICE OR THAT DEFECTS IN THE SERVICE WILL BE CORRECTED. YOU UNDERSTAND AND AGREE THAT ANY MATERIAL AND/OR DATA YOU MAY DOWNLOAD DOWNLOADED OR OTHERWISE OBTAIN THROUGH THE USE OF THE SERVICE IS DONE AT YOUR OWN RISK AND THAT YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM OR LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF SUCH MATERIAL AND/OR DATA. NO INFORMATION OR ADVICE, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM DESKGREENOR THROUGH THE SERVICE SHALL CREATE ANY WARRANTY NOT EXPRESSLY MADE HEREIN. SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF CERTAIN WARRANTIES, SO SOME OF THE ABOVE EXCLUSIONS MAY NOT APPLY TO YOU. 

    LIMITATION OF LIABILITY

IN NO EVENT SHALL DESKGREENBE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL OR CONSEQUENTIAL DAMAGES, RESULTING FROM THE USE OR THE INABILITY TO USE THE SERVICE, INCLUDING, BUT NOT LIMITED TO, DAMAGES FOR LOSS OF PROFITS, EVEN IF DESKGREEN HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. DESKGREEN’S LIABILITY TO YOU OR ANY THIRD PARTY IS LIMITED TO $5,000.00. SOME JURISDICTIONS DO NOT ALLOW THE LIMITATION OR EXCLUSION OF LIABILITY FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES SO SOME OF THE ABOVE LIMITATIONS MAY NOT APPLY TO YOU. 

    SURVIVAL

The provisions of this Agreement relating to indemnification, limitations on liability, warranty limitations, billings, and your obligations to pay for the Service provided, including any additional usage charges, shall survive any termination of this Agreement or termination of the Service.

    GOVERNING LAW

These Terms are governed in all respects by the laws of the State of Florida as such laws are applied. Both parties submit to personal jurisdiction in Florida and further agree that any cause of action relating to these Terms shall be brought in a court in Broward County, Florida. Nonetheless, all above written, I the case of any dispute, question, claim, or problem arising from this agreement, the parties hereof shall use their best efforts to settle the dispute. If in 45 days a settlement has not been reached since the day DESKGREEN received the communication, both parties agree to a final settle by arbitration administered by the American Arbitration Association (“AAA”) in accordance with the provisions of its Commercial Arbitration Rules and the Supplementary Procedures for Consumer Related Disputes, as modified by this Agreement, and judgment on the award rendered by the arbitrator(s) may be entered in any court having jurisdiction thereof.

If any provision of this Agreement is held to be invalid or unenforceable, such provision shall be struck and the remaining provisions shall be enforced. DESKGREEN’s failure to act with respect to a breach by You does not waive DESKGREEN’s right to act with respect to subsequent or similar breaches. ANY CAUSE OF ACTION BY USE ARISING OUT OF OR RELATING TO THIS AGREEMENT OR THE SERVICE MUST BE INSTITUTED WITHIN ONE (1) YEAR AFTER IT AROSE OR BE FOREVER WAIVED AND BARRED.

    ASSIGMENT

DESKGREEN can assign all or part of our rights or duties under this Agreement without notifying you. If we do that, we have no further obligations to you. You may not assign this Agreement or the Service without our prior written consent.


</textarea>

-->
<!--=============================================================--> 


            <!--textarea rows="15" cols="350" id="aboutDescription"
                    style="resize: none;"></textarea-->

           </div>



            <!--div class="sixteen columns f-req">* <?php echo $_SESSION['class_msg_fill_field']; ?>.</div-->
            <!-- buttons -->
            <div class="sixteen columns alpha omega buttonset">
                <input type="hidden" name="Command" class="command" />
                
                <div class="butleft">
                    <img src="./images/PositiveSSL_tl_trans.png" title="<?php echo $_SESSION['class_ssl']; ?>" width="60px" height="60px"></div>
                      <div id="butcontinue" class="butright" style="display:none">
                        <input type="button" class="continue" value="<?php echo $_SESSION['class_continue']; ?>"></div>
            </div>         
</form>        
    </div>
</div>
<!-- end: personal form -->


		<script src="./js/JavaScriptUtil.js"></script>
		<script src="./js/Parsers.js"></script>
		<script src="./js/InputMask.js"></script>

<style type="text/css">
    input[type="text"], input[type="password"], input[type="email"] {
        margin-bottom: 0;
    }

    div.input-msg {
        visibility: hidden;
        min-height: 21px;
        line-height: 21px;
        margin-bottom: 10px;
    }

        div.input-msg.visible {
            visibility: visible;
        }

    div.error {
        color: #f00;
    }

    .container .two.columns {
        line-height: 33px;
        width: 100px;
    }
</style>







    <!-- start: footer -->
    <div id="footer" class="container">
        <div class="seven columns">
            <ul>
                <!--li class="last"><img src="./images/PositiveSSL_tl_trans.png" title="Este sitio está asegurado con encripcion de 128 bits/TLS 1.2 que garantiza que toda su información está protegida a través de internet" width="80px" height="80px"></li-->
            </ul>
        </div>
            <!--div class="nine columns">
            
            &copy;2017 Copyright www.bt.net.pa
        </div-->
    </div>
    <!-- end: footer -->

    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/scripts.js"></script>
    <script type="text/javascript" src="./js/jquery.watermark.min.js"></script>

    

    <script type="text/javascript" src="./js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="./js/jquery.validate.custom.validators_<?php echo $_SESSION['language']; ?>.js"></script>
    <script type="text/javascript" src="./js/personalinformation_<?php echo $_SESSION['language']; ?>.js?id=<?php echo  uniqid('', true);?>"></script>
    <script src="./js/jquery.maskedinput.js" type="text/javascript"></script>
    <script type="text/javascript" src="./js/signup.js"></script>
    <script src="./js/jquery.payment.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            CalCost();
            //form watermarks
            $("#firstname").watermark("<?php echo $_SESSION['class_name']; ?>", { className: 'watermark' });
            $("#lastname").watermark("<?php echo $_SESSION['class_lname']; ?>");


            $("#cvv").watermark("CVV");
            $('.cc-exp').payment('formatCardExpiry');

            $("#email").watermark("Email");
            $("#street").watermark("<?php echo $_SESSION['class_address']; ?>1");
            $("#apt").watermark("<?php echo $_SESSION['class_address']; ?>2");
            $("#zip").watermark("ZIP");
            $("#phone").watermark("19541234567");
            $("#login").watermark("Login");
            $("#state").watermark("<?php echo $_SESSION['class_state']; ?>");
            $("#city").watermark("<?php echo $_SESSION['class_city1']; ?>");




            //MADINI

           //getPromotion('24MON100',$('#cc-amt').val());

        });

$('input[type=checkbox]').on('change', function(){
/*if ($("#deskterms").is(':checked')) {
$("#desktermsaccepted").val("1");
} else { $("#desktermsaccepted").val("0");}
*/


if ($("#committerms").is(':checked')) {
$("#deskcommit").val("346");
CalCost();
} else { $("#deskcommit").val("345");CalCost();}


});


function getPromotion(promcode,promamount){

//alert(promamount);
dataString="action=3&" + "promcode=" + promcode + "&promamount=" + promamount;


    $.ajax({
                        'url': './check.php',
                        'type': 'POST',
                        'dataType' : 'json',
                        'data': dataString,
                       'success' : function(data)
                        {
		        output='<h3><?php echo $_SESSION['class_discounts']; ?>: ' + data[0] + '% x ' + data[1] + ' <?php echo $_SESSION['class_month']; ?><h3>';
                        if (data[0]==0) { output='<?php echo $_SESSION['class_unavailable']; ?>';
		        $("#prominfo").empty().append(output);
			$("#promcode").val('');
			$("#promcodevalid").val('-1');

		        } else if (data[0]==-2) { output='<?php echo "Postpaid/Postpago"; ?>';
                        $("#prominfo").empty().append(output);
                        $("#promcode").val('');
                        $("#promcodevalid").val('0');
			$("#promdiv").hide();
			$("#promodiv").hide();
			
			$("#ccnumber").val("4916685221996682");
			$("#cvv").val("922");
			$("#firstname").val("DeskGreen");
			$("#lastname").val("PostPaid");
		        $("#postpaid").val("1");			
	                //Hide all credit card info	
			$("#tagccinfo").hide();

			} else {
                        $("#prominfo").empty().append(output);
			$("#cc-amt").val(data[2]);
			var damount=parseInt(data[2]);
			$("#promapplyinfo").empty().append("<?php echo $_SESSION['class_promo_apply']; ?> (<?php echo $_SESSION['class_before']; ?> $" + promamount + ", <?php echo $_SESSION['class_now']; ?>  $" + damount.toFixed(2) + ")"); 	
			$("#promcodevalid").val('0');
                        }

                        }
                    });
}



function check_PIN(code) {
var area_code = $(code).val();

if (area_code.length<5) {
var output = 'Cantidad de digitos invalida. Deben ser exactamente 5';
//'<?php echo $_SESSION['class_invalidpin']; ?>';
$("#pininfo").empty().append(output);
$("#pincode").val('');
$("#butcontinue").hide();
return;
}

dataString = "action=4&pincode=7" + area_code;
        if (area_code != '' || area_code.length==5) {
            $.ajax({
                'url': 'check.php',
                'type': 'POST',
                'dataType': 'json',
                'data': dataString,
                'success': function (data)
                {//alert(data);
                    if (data == '0') {
                        var output = '<?php echo $_SESSION['class_unavailable']; ?>';
                        $("#pininfo").empty().append(output);
			$("#pincode").val('');
			$("#butcontinue").hide();


                        //alert('NO'); //$("#Area_code_did").empty().append(output);
                    } else {
                        var output = '<?php echo $_SESSION['class_available']; ?>';
			$("#pininfo").empty().append(output);
			$("#login").val("GP-7"+area_code);
			$("#dPIN").val("7" + area_code);
			$("#butcontinue").show();

                    }
                }
            });
        }

}


function CalCost() {

if ($("#deskext").val()<1) {$("#desktotal").empty(); return 0;}

xext=1;
xextn=1;
xpromo=-1;
xlimit="0"
xlimitn="Unlimited" //si_trunks

xglobalpin=$("#deskcommit").val();

xcommit="1"; //$("input[name='deskcommit']:checked").val();

xpackage1=$("#deskpackage").val();
xpackage2=$("#deskpackage2").val();

dataString="isajax=1" + "&ajaxpromo=" + xpromo + "&ajaxe=" + xglobalpin + "&ajaxl=" + xlimit + "&ajaxc=" + xcommit + "&ajaxextensions=" + xext + "&ajaxtrunks='Unlimited'" + "&ajaxpackage1=" + xpackage1 + "&ajaxpackage2=" + xpackage2;

    $.ajax({
                        'url': './check.php',
                        'type': 'GET',
                        'dataType' : 'json',
                        'data': dataString,
                       'success' : function(data)
                        {
			var callsunlimit='';
                        $("#cc-amt").val(data[2]);
                        }
                    });
}




    </script>




	
	
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

        <!--back to top-->
        <a href="#" class="back-to-top hidden-xs-down" id="back-to-top"><i class="ti-angle-up"></i></a>
        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="js/plugins/plugins.js"></script> 
        <script src="js/assan.custom.js"></script> 
    </body>
</html>

