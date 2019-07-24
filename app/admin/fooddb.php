<?php 

include('../includes/header.php');

$conectar = conexion();


if(isset($_POST['submit'])){
$sql="INSERT INTO `alimentos` (`porcion`,`unidad`,`alimento`,`proteina`,`carbs`,`grasa`, tipo) VALUES (?, ?, ?, ?, ?, ?, ?)";

$sql=$conectar->prepare($sql);

	$sql->bindValue(1,$_POST["porcion"]);
	$sql->bindValue(2,$_POST["unidad"]);
	$sql->bindValue(3,$_POST["alimento"]);
	$sql->bindValue(4,$_POST["proteina"]);
	$sql->bindValue(5,$_POST["carbs"]);
	$sql->bindValue(6,$_POST["grasa"]);
	$sql->bindValue(7,$_POST["tipo"]);
	$sql->execute();
}


?>

<script language="javascript" type="text/javascript">
	function eliminar(id)
	{
		if (confirm("Realmente desea eliminar el registro?"))
		{
			window.location="elimcom.php?id_alimento="+id;
		}
	}
</script>
<title>Base de Datos de Alimentos</title>
<div class="container">
<h1 class="display-3"> Base de datos de alimentos</h1><br><br>

<h3>Agregar un alimento</h3>

<form action="fooddb.php" method="POST">
	<div class="row">
		<div class="col-md-1">
			<input type="text" class="form-control" placeholder="Porcion" name="porcion">
		</div>
		<div class="col-md-1">
			<input type="text" class="form-control" placeholder="Unidad" name="unidad">
		</div>
		<div class="col-md-3">
			<input type="text" class="form-control" placeholder="Alimento" name="alimento">
		</div>
		<div class="col-md-1">
			<input type="text" class="form-control" placeholder="Proteina" name="proteina">
		</div>
		<div class="col-md-1">
			<input type="text" class="form-control" placeholder="Carbs" name="carbs">
		</div>
		<div class="col-md-1">
			<input type="text" class="form-control" placeholder="Grasa" name="grasa">
		</div>
		
		<div class="col-md-2">
		<select class="form-control" name="tipo">
			<option value="proteina">Proteina</option>
			<option value="carbs">Carbohidratos</option>
			<option value="grasas">Grasas</option>
			<option value="proteina y grasa">Proteina y Grasa</option>
			<option value="proteina y carbs">Proteina y Carbohidratos</option>
			<option value="carbs y grasa">Carbohidratos y Grasa</option>
			<option value="proteina, grasa y carbs">Proteina, Grasa y Carbohidratos</option>
			<option value="libre">Libres</option>
		</select>
	</div>
		<div class="col">
			<input class="btn btn-primary" type="submit" value="Agregar" name="submit">
	</div>




</form>
</div>

<br><br>

<div class="container">


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Porcion</th>
      <th scope="col"></th>
      <th scope="col">Alimento</th>
      <th scope="col">Proteina</th>
      <th scope="col">Carbs</th>
      <th scope="col">Grasa</th>
      <th scope="col">Libre</th>

    </tr>

  </thead>

  <tbody>

    <tr>
    	<?php
$sql="select * from alimentos order by alimento asc";

$sql=$conectar->prepare($sql);
$sql->execute();
$resultado=$sql->fetchAll();

for($i=0;$i<count($resultado);$i++)

{

?>
      <th><?php echo $resultado[$i]["porcion"];?></th>
      <th><?php echo $resultado[$i]["unidad"];?></th>
      <td><?php echo $resultado[$i]["alimento"];?></td>
      <td><?php echo $resultado[$i]["proteina"];?></td>
      <td><?php echo $resultado[$i]["carbs"];?></td>
      <td><?php echo $resultado[$i]["grasa"];?></td>
      <td><?php echo $resultado[$i]["libre"];?></td>
      <td valign="top" align="center" width="25">
	<a href="javascript:void(0)" title="Eliminar" name="del_food" onClick="eliminar('<?php echo $resultado[$i]["id_alimento"];?>')"><i class="fa fa-times-circle"></i></a></td>
    </tr>
    <?php
}
?>
    
  </tbody>
</table>


</div>

<?php

include('../includes/footer.php');

  ?>
