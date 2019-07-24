<?php


function conexion(){

	try{

		$conectar = new PDO("mysql:local=localhost;dbname=sm360","root","");
		$conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conectar;

	} catch (Exception $e){

		print "Error!: " . $e->getMessage() . "<br/>";
		die();

	}
}








?>