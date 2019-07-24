<?php 

include('../includes/header.php');

   $conectar = conexion();

if(isset($_SESSION['type'])){

$sql = "SELECT ali.id_alimento, ali.porcion, ali.alimento, ali.proteina, ali.carbs, ali.grasa, ali.libre, jour.dia, jour.comida, jour.id, jour.porcion1 FROM alimentos ali INNER JOIN journal jour ON ali.id_alimento = jour.alimento WHERE id=".$_SESSION['id'];

 $sql = $conectar->prepare($sql);
 $sql->execute();

$resultado = $sql->fetchAll();


?>

<br>
      


<div class="container">
  <br>
<input class="btn btn-danger" value="Atras" onclick="window.history.back()"></input>
   <br>



         <table class="table">
          <br>
              <thead>
                <tr>
                  <th scope="col">Fecha</th>
                  <th scope="col">Alimento</th>
                  <th scope="col">P</th>
                  <th scope="col">C</th>
                  <th scope="col">G</th>
                </tr>
              </thead>
              <tbody>
<?php  for($i=0;$i<count($resultado);$i++){
    $porcion = $resultado[$i]['porcion1'];
    $proteina = $resultado[$i]['proteina'];
    $carbs = $resultado[$i]['carbs'];
    $grasa = $resultado[$i]['grasa'];

    $tp = (float)$porcion * (float)$proteina;
    $tc = (float)$porcion * (float)$carbs;
    $tg = (float)$porcion * (float)$grasa;

 ?>
                <tr>
                  <td><?php echo $resultado[$i]['dia']; ?></td>
                  <td><?php echo $resultado[$i]['alimento']; ?></td>
                  <td><?php echo $tp; ?></td>
                  <td><?php echo $tc; ?></td>
                  <td><?php echo $tg; ?></td>

                </tr>
         <?php } ?>
              </tbody>
            </table>
       
</div>

<?php
} else {
  echo "<script type='text/javascript'>
    alert('Para accesar a esta pagina tenes que estar registrado e iniciar sesion');
    window.location='../login.php';
  </script>";
}
include ('../includes/footer.php');


  ?>