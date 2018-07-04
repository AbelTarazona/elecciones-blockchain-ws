<?php

//Incluimos inicialmente la conexion a la base de datos
require "../config/Conexion.php";

Class M_Persona{
	//Implementamos nuestro constructor
	public function __construct(){

	}

	//Implementamos un metodo para insertar registros
	public function insertar($DNI, $nombre, $apellidos, $correo){
		$sql = "INSERT INTO Persona VALUES ('$DNI', '$nombre', '$apellidos', '$correo')";

		return ejecutarConsulta($sql);
	}
}

?>