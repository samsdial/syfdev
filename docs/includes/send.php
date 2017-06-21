<?php
	//require_once("../../../../wp-blog-header.php");
	//require_once('../../../../wp-load.php');
	
	$response = array();
	$name = (isset($_REQUEST['name'])) ? filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING) : null ;
	$email = (isset($_REQUEST['email'])) ? filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL) : null ;
	$phone =  (isset($_REQUEST['phone'])) ? filter_var($_REQUEST['phone'], FILTER_SANITIZE_STRING) : null ;
	$message = (isset($_REQUEST['message'])) ? filter_var($_REQUEST['message'], FILTER_SANITIZE_STRING) : null ;

if ($name!=null && $phone!=null && $email!=null && $message!=null) {


	$msg="<p><strong>Un nuevo mensaje ha sido enviado desde el portal web:</strong></p>

	<p><strong>Nombre: </strong>".$name."</p>
	<p><strong>E-Mail: </strong>".$email."</p>
	<p><strong>Tel&eacute;fono: </strong>".$phone."</p>
	<p><strong>Mensaje: </strong>".$message."</p>
	";
	$title = "Nuevo mensaje de contacto en Asesorías EMG";
	//$to = 'cgonzalez@lequar.com';
	$to = 'servicioalcliente@asesoriasemg.net.co';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$headers .= 'To: '.$to.'' . "\r\n";
	$headers .= 'From: Servicio Al Cliente <info@asesoríasemg.net.co>' . "\r\n";

	if(mail( $to, $title, $msg, $headers)){
		$response['message'] = "exito";
		$response['success'] = true;
	}
	else{
		$response['message'] = "error";
		$response['success'] = false;
	}
	
}

echo json_encode($response);
