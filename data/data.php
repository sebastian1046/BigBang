<?php
if (isset($_POST) && sizeof($_POST) > 0) {
	
	$email = "bigbangdotaciones@gmail.com, felipefontal@gmail.com, andresxaw@gmail.com";
	
	if (isset($_POST['formtype'])) {
		unset($_POST['formtype']);
	}
	
	$primer = array_values($_POST);
	$asunto = "Contacto [BigBang]: " . $primer[0];
	$mensaje    = "Hemos recibido un nuevo contacto<br/><br/>".
						 "Datos de contacto: <br/><br/>";
						 
	foreach ($_POST as $campo => $valor) {
		if($campo == 'Convertion'){
			
		} else if ($valor != "") {
			$mensaje .= "<strong>" . $campo . ": </strong> " . $valor . "<br/>";
		} else {
			echo "No se pudo enviar";
			exit;
		}
	}	

	$headers = "From:cliente@bingbangdotaciones.com\n";
	$headers.= "Content-Type:text/html; charset=UTF-8";

	if($email != "") {
		$envio = mail($email,$asunto,$mensaje,$headers);
		if($envio){
			header('location: ../gracias.html');
		}
	}else{
		echo "No se pudo enviar";
	}
}
?>