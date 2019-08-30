<?php 

include('../includes/adminhead.php');

   $conectar = conexion();


if(isset($_SESSION['type'])){

$sql = "SELECT ali.id_alimento, ali.porcion, ali.alimento, ali.proteina, ali.carbs, ali.grasa, ali.libre, jour.dia, jour.comida, jour.id, jour.porcion1 FROM alimentos ali INNER JOIN journal jour ON ali.id_alimento = jour.alimento WHERE id=".$_GET['id'];

 $sql = $conectar->prepare($sql);
 $sql->execute();

$resultado = $sql->fetchAll();



?>



<br>
      


<div class="container">
  <br>
<input class="btn btn-danger" value="Atras" onclick="window.history.back()"></input>
   <br>



         <table class="table" id="table">
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
    <?php  
    $total_tp = 0;
    $total_tc = 0;
    $total_tg = 0;

    for($i=0;$i<count($resultado);$i++){
    $porcion = $resultado[$i]['porcion1'];
    $proteina = $resultado[$i]['proteina'];
    $carbs = $resultado[$i]['carbs'];
    $grasa = $resultado[$i]['grasa'];

    $tp = (float)$porcion * (float)$proteina;
    $tc = (float)$porcion * (float)$carbs;
    $tg = (float)$porcion * (float)$grasa;

    $total_tp += $tp;
    $total_tc += $tc;
    $total_tg += $tg;

 ?>
                <tr>
                   <td><?php 
                  $orgDate = $resultado[$i]['dia'];
                  $newDate = date("d-m-y", strtotime($orgDate));
                  echo $newDate ?></td>
                
                
                  <td><?php echo $resultado[$i]['alimento']; ?></td>
                  <td class="total1"><?php echo $tp; ?></td>
                  <td class="total2"><?php echo $tc; ?></td>
                  <td class="total3"><?php echo $tg; ?></td>
                </tr>

                
         <?php } ?>
              </tbody>
            </table>
       
              <table class="table">

                <thead>
                  <th class="col-md-8">Total</th>
                  <td id="totals1"><?php echo $total_tp ?></td>
                  <td id="totals2"><?php echo $total_tc ?></td>
                  <td id="totals3"><?php echo $total_tg ?></td>
                </thead>
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