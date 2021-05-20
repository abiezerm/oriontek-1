<?php

require_once "conexion.php";

class mdlEmpresa{

	static public function mdlCrearEmpresa($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES(:nombre)");

		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);

		try {

			$stmt -> execute();

			return "ok";
			
		} catch (Exception $e) {
			
			return $e;
		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarEmpresa($tabla, $campo, $valor){

		if($campo != null ){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = :$campo");

			$stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);

			$stmt ->execute();

			return $stmt->fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt ->fetchAll();

		}


		$stmt -> close();

		$stmt = null;

		
	}

	static public function mdlEditarEmpresa(){

	}

	static public function mdlEliminarEmpresa(){

	}
}