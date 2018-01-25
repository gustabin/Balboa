<?php
	date_default_timezone_set("America/La_Paz");	
	session_start();  
	error_reporting(0);
	// conector de BD 
	require_once('tools/mypathdb.php');

	$username = $_POST ['username'];	
	$clave = $_POST ['clave'];
	$clave2 = $_POST ['clave2'];
	$nombre = utf8_decode($_POST ['Nombres']);
	$apellido = utf8_decode($_POST ['Apellidos']);
	$email = $_POST ['Email'];
	$phone = $_POST ['phone'];
	$address = utf8_decode($_POST ['Address']);
	$city = utf8_decode($_POST ['City']);
	$state = utf8_decode($_POST ['State']);
	$country = utf8_decode($_POST ['Country']);	
	
	$_SESSION['correo'] = $email;
	$_SESSION['nombre'] = $nombre;
	$_SESSION['apellido'] = $apellido;	

// ********* 1=operador; 2=administrador; 3=manager; 4=homeowners **************
if ($_SESSION['pagina']=='homeowners'){
	$_SESSION['usuario'] = 4;
}else{
	$_SESSION['usuario'] = 1;
}
	 
	
	//$replaced = str_replace("'", "", $text); //eliminar comillas
	//$curriculum = str_replace('"', "", $replaced);
	
		//=====================validar que las claves sean iguales========================================		
		if ($clave<>$clave2){			
			$data = array("error" => '2');
			die(json_encode($data));
		}
		//======================validar que el password tenga mas de 6 caracteres=======================================
		if (strlen($clave)<6) {
			$data=array("error" => '3');
			die(json_encode($data)); 
			} 
		//======================validar que los email sean iguales ================================================
		if (strlen($country)<2) {		
			$data = array("error" => '4');
			die(json_encode($data));
		}	
	
			// ====================== Insertar los datos en la tabla ===============================
			//$fecha_actual = date("Y-m-d");
			$fecha_actual= date("Y-m-d H:i:s"); 
			$usuario = 1; // ********* 1=cliente; 2=administrador; 3=manager **************


			$query_insertarUsuario = mysql_query("INSERT INTO staff (name, lastname, username, email, phone, address, city, state, country, clave, usuario, fecha) VALUES ('$nombre', '$apellido', '$username', '$email', '$phone', '$address', '$city', '$state', '$country', '$clave', '$usuario', '".$fecha_actual."')");	


			$user_id = mysql_insert_id();
			//desconectar();
			//mysql_close();	//cerrar la conexion a la bd
			//$_SESSION['us_id']=$user_id;	
			if($query_insertarUsuario == true) {
			    //Los datos se han insertado correctamente.';	
					$data = array("exito" => '1');
					$_SESSION['email']=$email;
					die(json_encode($data));	
			} else {
			   		$data=array("error" => '6');
					die(json_encode($data));
			}  
		
?>