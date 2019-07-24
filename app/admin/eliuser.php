<?php
require_once("../includes/conexion.php");

$conectar=conexion();

$sql="delete from usuarios
where
id=?";

$sql=$conectar->prepare($sql);
$sql->bindValue(1, $_GET["id"]);
$sql->execute();

echo "<script type=''>
	alert('Los datos del usuario fueron eliminados correctamente');
	window.location='dashboard.php';
</script>";
?>