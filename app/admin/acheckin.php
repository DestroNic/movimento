<?php
include('../includes/adminhead.php');

$conexion = conexion();



  
  $stmt = "SELECT * FROM checkin WHERE id=".$_GET['id'];

  $stmt = $conexion->prepare($stmt);
  $stmt->execute();
  $resultado = $stmt->fetchAll();



?>

<div class="container">
  <br>
<input class="btn btn-danger" value="Atras" onclick="window.history.back()"></input>
   <br>
<div class="table-responsive">
  <table class="table table-hover">
  <br>
  <thead>
    <tr>
      
      <th scope="col">Semana</th>
      <th scope="col">Fecha</th>
      <th scope="col">Porciones</th>
      <th scope="col">Ajustes</th>
      <th scope="col">Peso</th>
      <th scope="col">Promedio</th>
      <th scope="col">Promedio</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php 
      for($i=0;$i<count($resultado);$i++){
$id = $resultado[$i]['id_checkin'];
    ?>
    <tr>
      <td><?php echo $resultado[$i]["semana"];?></td>
      <td><?php echo $resultado[$i]["fecha"];?></td>
      <td><?php echo $resultado[$i]["porcion"];?></td>
      <td><?php echo $resultado[$i]["ajuste"];?></td>
      <td><?php echo $resultado[$i]["peso"];?> Kg</td>
      <td><?php echo $resultado[$i]["promedioCintura"];?> cm</td>
      <td><?php echo $resultado[$i]["promedioCadera"];?> cm</td>
      <td><a href="editar.php?id_checkin=<?php echo $resultado[$i]["id_checkin"];?>" ><i class="fas fa-pen"></i></a></td>

    </tr>
    <?php
  }
    ?>
    
   </tbody>
  </table>
 </div>     
</div>

<?php 
include('../includes/footer.php');
 ?>