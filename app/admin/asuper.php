<?php 
include ('../includes/header.php');

$conectar = conexion();

$sql = "SELECT * FROM super";
$sql = $conectar->prepare($sql);
$sql->execute();

$resultado = $sql->fetchAll();

if(isset($_POST['guardar'])){

	$sql="INSERT INTO super (`super`, `producto`) VALUES (?, ?)";

	$sql = $conectar->prepare($sql);
	$sql -> bindValue(1,$_POST['super']);
	$sql -> bindValue(2,$_POST['producto']);
	$sql -> execute();
}

?>

<br><br>
<div class="container">
	<form action="asuper.php" method="POST">
	<div class="row">
		<div class="col-md-4">
			<select class="form-control" name="super">
				<option value="0">Escoge la tienda</option>
				<option value="1">PriceSmart</option>
				<option value="2">La Colonia</option>
				<option value="3">La Union</option>
				<option value="4">Mecardo/Super</option>
			</select>
		</div>
		<div class="col-md-4">
			<input class="form-control" type="text" name="producto" placeholder="Producto">
		</div>
		<div class="col-md-4">
			<input class="btn btn-primary" type="submit" name="guardar" value="Guardar">
		</div>
	</div>
</form><br><br>
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

include ('../includes/footer.php');

?>
