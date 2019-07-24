<?php 
include('../includes/header.php');

 $conectar = conexion();

if(isset($_SESSION['type'])){

 $sql = sprintf("SELECT * FROM alimentos");

 $sql = $conectar->prepare($sql);
 $sql->execute();

 $categorias=array();

 while ($res = $sql->fetch(PDO::FETCH_ASSOC)) {
   $cate[$res['tipo']][$res['id_alimento']]= $res['alimento'];
 }


?>

 
  
  
    <div id="accordion">
      <?php 
          
          foreach($cate as $a=>$b){
            ?>
  <div class="card">
    <div class="card-header" id="heading<?php echo $a; ?>">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $a; ?>" aria-expanded="false" aria-controls="collapse<?php echo $a; ?>">
          <?php

          
            switch ($a){
              case 'proteina':
                  echo 'Proteina';
                break;
              case 'carbs':
                  echo 'Carbohidratos';
                break;
              case 'grasas':
                  echo 'Grasas';
                break;
              case 'proteinaygrasa':
                  echo 'Proteina y Grasa';
                break;
              case 'proteinaycarbs':
                  echo 'Proteina y Carbohidratos';
                break;
              case 'carbsygrasa':
                  echo 'Carbohidratos y Grasa';
                break;
              case 'proteinagrasaycarb':
                  echo 'Proteina, Grasa y Carbohidratos';
                break;
              case 'libre':
                  echo 'Libre';
                break;
              }

            ?>
            
        </button>
      </h5>
    </div>

    <div id="collapse<?php echo $a; ?>" class="collapse" aria-labelledby="heading<?php echo $a; ?>" data-parent="#accordion">
      <div class="card-body">
        <table class="table table-striped">
  
  <tbody>
    <?php

        foreach($b as $c=>$d){
          ?>
    <tr>
      
      <td>
       <?php
              echo $d."<br>";

          ?></td>
    </tr>
    <?php
              }
           ?>
         
  </tbody>

</table>
      </div>
    </div>
  </div>
  <?php  }
          ?>
  
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


