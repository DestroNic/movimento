<?php 
include('../includes/header.php');

$conectar = conexion();

if(isset($_SESSION['type'])){


?>

<br><br>
<?php
$sql = sprintf("SELECT * FROM super");

 $sql = $conectar->prepare($sql);
 $sql->execute();

 $categorias=array();

$id = $_SESSION['id'];

 while ($res = $sql->fetch(PDO::FETCH_ASSOC)) {
   $cate[$res['super']][$res['id_super']]= $res['producto'];
 }
 ?>  
<div class="container">
<div id="accordion">
  <?php 
  foreach ($cate as $a => $b) {
    
  
  ?>
  <div class="card">
    <div class="card-header" id="heading<?php echo $a; ?>">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $a; ?>" aria-expanded="false" aria-controls="collapse<?php echo $a; ?>">
          <?php
            switch ($a){
              
              case '1':
                  echo 'PriceSmart';
                break;
              case '2':
                  echo 'La Colonia';
                break;
              case '3':
                  echo 'La Union';
                break;
              case '4':
                  echo 'Mercado/Super';
                break;
              
              }
            ?>
            
        </button>
      </h5>
    </div>

    <div id="collapse<?php echo $a; ?>" class="collapse" aria-labelledby="heading<?php echo $a; ?>" data-parent="#accordion">
      <div class="card-body">
        
        <?php 
          foreach($b as $c=>$d){
        ?>

        <tr><?php echo $d; ?></tr><br>
        <?php } ?>

        


      </div>
    </div>
  </div>
<?php } ?>
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