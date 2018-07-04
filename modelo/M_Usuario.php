<?php

//Incluimos inicialmente la conexion a la base de datos
require "../config/Conexion.php";

Class M_Usuario{
	//Implementamos nuestro constructor
	public function __construct(){

	}

	//Implementamos un metodo para insertar registros
	public function insertar($DNI, $password, $perfil){
		$sql = "INSERT INTO Usuario VALUES ('$DNI', '$password', '$perfil')";

		return ejecutarConsulta($sql);
	}

	public function buscarHash($DNI){
		$sql = "SELECT * FROM Hash WHERE DNI = '$DNI'";

		return ejecutarConsultaSimpleFila($sql);
	}

	public function verificar($DNI, $password){
		$sql = "SELECT * FROM Usuario WHERE DNI = '$DNI' AND password = '$password'";

		return ejecutarConsultaSimpleFila($sql);
	}
}

?>