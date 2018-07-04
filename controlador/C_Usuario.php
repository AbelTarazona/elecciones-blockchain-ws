<?php
require_once "../modelo/M_Usuario.php";
$m_usuario = new M_Usuario();

require_once "../modelo/M_Persona.php";
$m_persona = new M_Persona();

require_once "../modelo/M_WS_Reniec.php";
$m_ws_reniec = new M_WS_Reniec();

$DNI = isset($_POST["DNI"])? limpiarCadena($_POST["DNI"]):"";
$password = isset($_POST["password"])? limpiarCadena($_POST["password"]):"";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$apellidos = isset($_POST["apellidos"])? limpiarCadena($_POST["apellidos"]):"";
$correo = isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";

switch ($_GET["op"]) {
	case 'guardar':

	$rspta3 = $m_ws_reniec->mostrar($DNI);

	if($rspta3["nombre"] == $nombre){
		if($rspta3["apellidos"] == $apellidos){
			if($rspta3["correo"] == $correo){
				
				$rspta2 = $m_usuario->insertar($DNI, $password, "Votante");

				$rspta1 = $m_persona->insertar($DNI, $nombre, $apellidos, $correo);

				$hash = $m_usuario->buscarHash($DNI);

				$subject = "Eleccion Presidencial 2020";
				$headers = 'From: parkingurp@gmail.com' . "\r\n" .
					'Reply-To: parkingurp@gmail.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
				
				$message = "Su key para registrarse y poder votar es:" . "\r\n" . 
					"Identificador: " . $hash["hash"];

				if(mail($correo, $subject, $message,$headers)){
					echo 'Se envio el identificador a su correo';
				}else{
					echo 'Verifique su conexion';
				}

			}else{
				echo "El correo ingresado no coincide con el correo del DNI ingresado: ";
			}
		}else{
			echo "El apellido ingresado no coincide con el apellido del DNI ingresado: ";
		}
	}else{
		echo "El nombre ingresado no coincide con el nombre del DNI ingresado: ";
	}

		break;

	case 'verificar':
		$rspta = $m_usuario->verificar($DNI, $password);
		if($rspta){
			if($rspta["perfil"] == "Votante"){
				header("Location: http://172.20.3.30:3000/index1.html");
			}else{
				header("Location: http://172.20.3.30:3000/index2.html");
			}
		}else{
			header("Location: http://172.20.3.30:3000/formulario.html");
		}
		break;
}
?>