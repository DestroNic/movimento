<?php
include('../includes/header.php');

$conexion = conexion();

if(isset($_SESSION['type'])){

if(isset($_POST['agregar'])){
  $semana = $_POST['semana'];
  $fecha = $_POST['fecha'];
  $peso = $_POST['peso'];
  $cintura1 = $_POST['cintura1'];
  $cintura2 = $_POST['cintura2'];
  $cintura3 = $_POST['cintura3'];
  $promedioCintura = ($cintura1 + $cintura2 + $cintura3) / 3;
  $cadera1 = $_POST['cadera1'];
  $cadera2 = $_POST['cadera2'];
  $cadera3 = $_POST['cadera3'];
  $promedioCadera = ($cadera1 + $cadera2 + $cadera3) / 3;
  $id = $_SESSION['id'];


  $sql="INSERT INTO checkin (semana, fecha, peso, cintura1, cintura2, cintura3, promedioCintura, cadera1, cadera2, cadera3, promedioCadera, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $sql=$conexion->prepare($sql);
  $sql->bindValue(1,$semana);
  $sql->bindValue(2,$fecha);
  $sql->bindValue(3,$peso);
  $sql->bindValue(4,$cintura1);
  $sql->bindValue(5,$cintura2);
  $sql->bindValue(6,$cintura3);
  $sql->bindValue(7,$promedioCintura);
  $sql->bindValue(8,$cadera1);
  $sql->bindValue(9,$cadera2);
  $sql->bindValue(10,$cadera3);
  $sql->bindValue(11,$promedioCadera);
  $sql->bindValue(12,$id);

  $sql->execute();
}

  ?>

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Agregar Entrada
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <form action="checkin.php" method="POST" >
    <div class="row">      
    <div class="col-md-1">
      <label>Semana</label>
     <select class="form-control" name="semana">
        <option value="semana 0">Inicial</option>
        <option value="semana 1">1</option>
        <option value="semana 2">2</option>
        <option value="semana 3">3</option>
        <option value="semana 4">4</option>
        <option value="semana 5">5</option>
        <option value="semana 6">6</option>
        <option value="semana 7">7</option>
        <option value="semana 8">8</option>
        <option value="semana 9">9</option>
        <option value="semana 10">10</option>
        <option value="semana 11">11</option>
        <option value="semana 12">12</option>

      </select>
    </div>
    <div class="col-md-1">
      <label>Fecha</label>
      <input class="input-group" type="date" name="fecha">
    </div>
    <div class="col-md-1">

      <label>Peso (Kg)</label>
      <input class="input-group" type="number" step="0.01" name="peso">
    </div>
    <div class="col-md-1">

      <label>Cintura 1</label>
      <input class="input-group" type="number" step="0.01" name="cintura1">
    </div>
    <div class="col-md-1">

      <label>Cintura 2</label>
      <input class="input-group" type="number" step="0.01" name="cintura2">
    </div>
    <div class="col-md-1">

      <label>Cintura 3</label>
      <input class="input-group" type="number" step="0.01" name="cintura3">
    </div>
    
    <div class="col-md-1">
    <label>Cadera 1</label>
      <input class="input-group" type="number" step="0.01" name="cadera1">
    </div>
    <div class="col-md-1">

      <label>Cadera 2</label>
      <input class="input-group" type="number" step="0.01" name="cadera2">
    </div>
    <div class="col-md-1">

      <label>Cadera 3</label>
      <input class="input-group" type="number" step="0.01" name="cadera3">
    </div>
    
    
    <div class="col-md-1">
         <input class="btn btn-primary" type="submit" name="agregar" value="Agregar">
    </div>

      </div>
      </div>
    </div>
  </div>


<?php 
  
  $stmt = "SELECT * FROM checkin WHERE id=".$_SESSION['id'];

  $stmt = $conexion->prepare($stmt);
  $stmt->execute();
  $resultado = $stmt->fetchAll();

  for($i=0;$i<count($resultado);$i++){


?>
<div class="table-responsive">
  <table class="table table-hover">
  <thead>
    <tr>
      
      <th scope="col">Semana</th>
      <th scope="col">Fecha</th>
      <th scope="col">Porciones</th>
      <th scope="col">Ajustes</th>
      <th scope="col">Peso</th>
      <th scope="col">Cintura</th>
      <th scope="col">Cadera</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $resultado[$i]["semana"];?></td>
      <td><?php echo $resultado[$i]["fecha"];?></td>
      <td></td>
      <td></td>
      <td><?php echo $resultado[$i]["peso"];?> Kg</td>
      <td><?php echo $resultado[$i]["promedioCintura"];?> cm</td>
      <td><?php echo $resultado[$i]["promedioCadera"];?> cm</td>
    </tr>
    <?php
  }
    ?>
    
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
include('../includes/footer.php');
 ?>