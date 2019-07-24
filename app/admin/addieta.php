<?php 


include('../includes/header.php');

$conectar=conexion();

$sql ="SELECT id, alimento FROM alimentos ORDER BY alimento";

$sql=$conectar->prepare($sql);
$sql->execute();
$resultado=$sql->fetchAll();


if(isset($_POST['submit'])){
$add = $_POST['macro'];


	if($add = 1){
		$sql= "INSERT INTO `proteinas` (`macro`,`alimento`)
		VALUES (?, ?) ";

		$sql=$conectar->prepare($sql);
		$sql->bindValue(1, $add);
		$sql->bindValue(2, $_POST['alimento']);
		$sql->execute();
	}

}


?>

<div class="container">
<h1 class="display-3">Agregar Dieta</h1><br><br>

<form action="addieta.php" method="POST" name="add">


	<div class="row">
		<div class="col">
    		
    		<select class="form-control" name="macro">
    		<option value="0">Seleccionar Macronutriente</option>
	      <option value="1">Proteina</option>
	      <option value="2">Carbohidratos</option>
	      <option value="3">Grasas</option>
	      <option value="4">Vegetales - Libre</option>
	      <option value="5">Libres Moderadas</option>
	    </select>
  </div>

  <div class="col">
  	
  	<select class="form-control" name="alimento">
  		<option value="0">Seleccionar Alimento</option>
  			<?php for($i=0; $i<count($resultado);$i++) { ?>
  		<option value="<?php echo $resultado[$i]['alimento']; ?>"><?php echo $resultado[$i]['alimento']; ?></option>
  	<?php } ?>
  	</select>

</div>
<div class="col">
	<div></div>
	<input class="btn btn-primary" type="submit" value="Agregar" name="submit">


</div>
</div>
  <?php

include('../includes/header.php');

    ?>