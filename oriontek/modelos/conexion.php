<?php

class Conexion{


	static public function Conectar(){

		$link = new PDO("mysql:host=localhost;dbname=oriontek", "root", "");

		$link ->exec("set names utf8");

		return $link;
	}
}