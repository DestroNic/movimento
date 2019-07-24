<?php 
include('../conexion.php');
include('../header.php');

   $conectar = conexion();
$tm = time();
$date = date('l, d/m/y', $tm);


   

   if(isset($_POST['agregar'])){


    $agregar = "INSERT INTO journal (dia, comida, alimento, id, porcion1) VALUES (?, ?, ?, ?, ?)";
    $agregar = $conectar->prepare($agregar);
   
    $agregar->bindValue(1, date('l, d/m/y', $tm));
    $agregar->bindValue(2, $_POST['comida']);
    $agregar->bindValue(3, $_POST['alimento']);
    $agregar->bindValue(4, $_SESSION['id']);
    $agregar->bindValue(5, $_POST['porcion1']);
    $agregar->execute();

    header('Location:journal2.php');
   }

$sql = "SELECT ali.id_alimento, ali.porcion, ali.alimento, ali.proteina, ali.carbs, ali.grasa, ali.libre, jour.dia, jour.comida, jour.id, jour.porcion1 FROM alimentos ali INNER JOIN journal jour ON ali.id_alimento = jour.alimento WHERE id=".$_SESSION['id'];

 $sql = $conectar->prepare($sql);
 $sql->execute();

$resultado = $sql->fetchAll();


?>

<br><br>
      


<div class="container">
<div id="accordion1">

  <div class="card">
    <div class="card-header" id="headingAdd">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseAdd" aria-expanded="false" aria-controls="collapseAdd">
        Agregar Entrada

            
        </button>
      </h5>
    </div>
<form action="journal2.php" method="POST">
    <div id="collapseAdd" class="collapse" aria-labelledby="headingAdd" data-parent="#accordion1">
      <div class="card-body">
        <div class="row">
      <div class="col-md-4">
        <select class="form-control" name="comida">
          <option value="desayuno">Desayuno</option>
          <option value="almuerzo">Almuerzo</option>
          <option value="cena">Cena</option>
          <option value="snack1">Snack 1</option>
          <option value="snack2">Snack 2</option>          
        </select>
      </div>
    <br><br>
    
      <div class="col-md-4">
        <?php 
        $query = "SELECT * FROM alimentos ORDER BY alimento asc";
        $query = $conectar->prepare($query);
        $query->execute();
        $alimentos = $query->fetchAll();

        


        

        ?>
       
        <select class="form-control" name="alimento">
          <option value="0">Seleccionar Alimento</option>
          <?php for($i=0;$i<count($alimentos);$i++){ ?>
          <option value="<?php echo $alimentos[$i]['id_alimento']; ?>"><?php echo $alimentos[$i]['alimento']; ?>
          </option>
          <?php } ?>
        </select>
        </div>
        <div class="col-md-4">
        <select class="form-control" name="porcion1">
          <option value="0">Porcion</option>
          <option value="1">1</option>
          <option value="0.75">0.75</option>
          <option value="0.5">0.5</option>
          <option value="0.25">0.25</option>          
        </select>
      </div>
      </div>
    </div>
          
          <br>
      

     
      <div class="col-md-4">
      <input class="btn btn-primary" type="submit" name="agregar" value="Agregar"><br>
      </div><br>
    </div>
</form>

      
        
     </div>   
    </div>



         <table class="table">
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
include ('../footer.php');


  ?>