<?php
/*var_dump($_REQUEST); //ver las variables
die();*/
	session_start(); 
	date_default_timezone_set('America/Caracas');
	// conector de BD 

	require_once('tools/mypathdb.php');
	$con = $_SESSION['conexion'];

	$fullName = $_POST ['fullName'];
	$phone = strtolower ($_POST ['phone']);
	$email = $_POST ['inputEmail'];	
	$anythingelse = $_POST ['anythingelse'];	
	$tipo = $_POST ['tipo'];
	$fecha= date("Y-m-d H:i:s"); 

	//======================validar que el phone tenga mas de 6 caracteres=======================================
	if ((strlen($phone)<6) and (!empty($_POST ['phone'])))
	{
		//===================================================Redirigir a otra pagina============================================
		$data=array("error" => '1');
		die(json_encode($data));
	} 
	// ======================================Grabar los datos =====================================
	// ===================================Introducir los datos en la tabla tbl_lead ========================
	$query = "INSERT INTO tbl_lead (fullName, phone, email, anythingelse, fecha, tipo) VALUES ('".$fullName."','".$phone."',  '".$email."', '".$anythingelse."', '".$fecha."', '".$tipo."')";

	$insertar = mysqli_query($con,$query);	
	
	$Id = mysqli_insert_id(); //obtener id

	if($insertar == false) 
	{
		$data=array("error" => '1');
		die(json_encode($data));
	}
	
	else
	{
		//Los datos se han insertado correctamente.
		//========asignar valor a variable de session ==============
		$_SESSION['fullName']=$fullName;
		$_SESSION['phone']=$phone;
		$_SESSION['email']=$email;
		$_SESSION['anythingelse']=$anythingelse;
		$_SESSION['Id']=$Id;			
		mysqli_close(); //desconectar();		
		// =================envio de correo notificandome que alguien completo el formulario ===================
		
		$destino ="info@bt.net.pa";
		$asunto = "Contact Web Balboa Telecom";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Hola, un usuario se ha registrado en www.bt.net.pa website!</h2>
		La información recibida es la siguiente:<br>		
		<b>Nombre: </b>$fullName<br>
		<b>Teléfono: </b>$phone<br>
		<b>Email: </b>$email<br>
		<b>Mensaje: </b>$anythingelse<br>
		<br><br>
  	    El equipo de Balboa Telecom<br>
		<img src=http://www.bt.net.pa/images/logoColor.png />
		<p>		
		
		<p></p>Designed by <br>
		© Copyright 2017 © Balboa Telecom - All rights reserved<br></h5>
		</p>";
		
		$yourWebsite = "bt.net.pa";
		$yourEmail   = "info@bt.net.pa";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);	
		
		
		// ========================================envio de correo al customer ===================
		$destino = $email;
		$asunto = "Bienvenido a BALBOA TELECOM";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Estimado cliente:</h2><br>
        Gracias por contactárnos. <br>
		Le informamos que hemos recibido correctamente su correo y, de ser necesario, <br>
		en el menor tiempo posible será contactado por nuestros ejecutivos. De lo contrario, <br>
		si requiere mayor información o asistencia lo invitamos a contactar a nuestro <br>
		departamento de atención al cliente, donde gustosamente lo atenderemos.<br><br>

		En Balboa Telecom, estamos para servirle y ponemos a su disposición nuestras redes <br>
		sociales y si es de su agrado le agradecemos darle en me gusta.<br><br>
		
		<a href=https://www.facebook.com/><img src=http://www.bt.net.pa/images/facebook.jpg width=155 height=43 /></a>  		
		<br><br>
		
		Dpto. Servicio al Cliente.<br><br>
		<a href=http://www.bt.net.pa><img src=http://www.bt.net.pa/images/logoColor.png /></a> 
		<br> 
		<p></p>Designed by <br>
		© Copyright 2017 © Balboa Telecom - All rights reserved<br></h5>
		</p>";
		$yourWebsite = "bt.net.pa";
		$yourEmail   = "info@bt.net.pa";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);
		//var_dump("aqui");
		//die();	
		$data=array("exito" => '1');
		die(json_encode($data));
		//===================================================Redirigir a otra pagina===========================				
		//header("Location: contact.php");	
	}	
?>
