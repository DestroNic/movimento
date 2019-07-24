<?php 
require_once('../conexion.php');



$conectar = conexion();

function AdminShowPhoto(){
   global $conectar; 

    $sql = sprintf("SELECT * FROM fotos WHERE id=").$_GET['id'];

 $sql = $conectar->prepare($sql);
 $sql->execute();

 $cate=array();



 while ($res = $sql->fetch(PDO::FETCH_ASSOC)) {
   $cate[$res['semana']][$res['id_foto']]= $res['img_path'];
 }
}






?>