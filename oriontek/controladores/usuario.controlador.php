<?php

class ctrUsuario{

	static public function ctrCrearUsuario(){


		if(isset($_POST['nombre'])){

			if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST['nombre']) 
			&& preg_match(	'/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST['apellido'])){

				$tabla = "tblUsuario";

				$datos = array('nombre' => $_POST['nombre'],
							   'apellido' => $_POST['apellido'],
							   'empresaID' => $_POST['empresaID'],
							   'direccion' => $_POST['direccion']
							   );

				$respuesta = mdlUsuario::mdlCrearUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo 'Usuario creado correctamente';
					header("Location: plantilla.php");

				}else{

					return $respuesta;
				}				

			}else{

				echo 'Algunos campos no cumplen con las validaciones';
			}

		}


	}


	static public function ctrMostrarUsuario($campo, $valor){


		$tabla = 'tblUsuario';

		$respuesta = mdlUsuario::mdlMostrarUsuario($tabla, $campo, $valor);

		return $respuesta;

	}

	
}