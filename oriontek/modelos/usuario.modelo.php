<?php

require_once "conexion.php";

class mdlUsuario{

	static public function mdlCrearUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, empresaID, direccion) VALUES(:nombre, :apellido, :empresaID, :direccion)");

		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos['apellido'], PDO::PARAM_STR);
		$stmt->bindParam(":empresaID", $datos['empresaID'], PDO::PARAM_INT);
		$stmt->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);

		try {
			
			$stmt ->execute();
			return "ok";

		} catch (Exception $e) {
			
			return $e;
		}

		$stmt->close();

		$stmt = null;
	}

	static public function mdlMostrarUsuario($tabla, $campo, $valor){

		if ($campo != null) {
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM WHERE $campo = :$campo");

			$stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt ->fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			
			$stmt -> execute();

			return $stmt ->fetchAll();

		}


		$stmt -> close();

		$stmt = null;

	}

	
}