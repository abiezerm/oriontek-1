<?php

class ctrEmpresa{

	static public function ctrCrearEmpresa(){

		$tabla = 'tblEmpresa';

		$datos = array ('nombre' => $_POST['nombre']);

		$respuesta = mdlEmpresa::mdlCrearEmpresa($tabla, $datos);

		if($respuesta == "ok"){

			echo 'Exitoso';

		}else{

			return $respuesta;

		}

	}

	static public function ctrMostrarEmpresa($campo, $valor){

			$tabla = 'tblEmpresa';

			$respuesta = mdlEmpresa::mdlMostrarEmpresa($tabla, $campo, $valor);

			return $respuesta;

	}

	static public function ctrEditarEmpresa(){

	}

	static public function ctrEliminarEmpresa(){

	}
}