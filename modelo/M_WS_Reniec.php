<?php

//Incluimos inicialmente la conexion a la base de datos
require "../config/Conexion.php";

Class M_WS_Reniec{
	//Implementamos nuestro constructor
	public function __construct(){

	}

	//Implementamos un metodo para insertar registros
	public function mostrar($DNI){
		$sql = "SELECT * FROM WS_Reniec WHERE DNI = '$DNI'";

		return ejecutarConsultaSimpleFila($sql);
	}
}

?>