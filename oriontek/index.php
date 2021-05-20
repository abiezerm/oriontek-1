<?php

//Aquí estoy requiriendo los controladores, ubicados en la carpeta de controladores.
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuario.controlador.php";
require_once "controladores/empresa.controlador.php";

//Aquí estoy requiriendo los modelos, ubicados en la carpeta de modelos.
require_once "modelos/conexion.php";
require_once "modelos/usuario.modelo.php";
require_once "modelos/empresa.modelo.php";
/* Creo una instancia de la clase ctrPlantilla. 
Y ejecuto su método ctrEjecutarPlantilla */

$Plantilla = new ctrPlantilla();
$Plantilla -> ctrEjecutarPlantilla();
