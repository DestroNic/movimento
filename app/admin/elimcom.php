<?php
require_once("../includes/conexion.php");

$conectar=conexion();

$sql="delete from alimentos
where
id_alimento=?";

$sql=$conectar->prepare($sql);
$sql->bindValue(1, $_GET["id_alimento"]);
$sql->execute();

header("Location: fooddb.php")
?>