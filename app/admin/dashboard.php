<?php
include ("../includes/header.php");

$conectar=conexion();


$sql="SELECT * FROM usuarios order by id desc";



$sql=$conectar->prepare($sql);
$sql->execute();
$resultado=$sql->fetchAll();
?>


<div class="container">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

    <?php

  for($i=0;$i<count($resultado);$i++)
    
    {
?>
    <tr>
      <td><?php echo $resultado[$i]["Nombre"];?></td>
      <td><?php echo $resultado[$i]["Apellido"];?></td>
      <td><?php echo $resultado[$i]["correo"];?></td>
      <td><a href="perfil.php?id=<?php echo $resultado[$i]["id"];?>">Perfil</a></td>
    </tr>
    <?php
      }
      ?>
  </tbody>
</table>
</div>

<?php 

include ("../includes/footer.php");

?>