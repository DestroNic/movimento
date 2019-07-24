<?php
include('../includes/header.php');

$conexion = conexion();

if(isset($_POST['agregar'])){
	$sql = "INSERT INTO productos (prod, lc, lu, p, ps, eh) VALUES (?, ?, ?, ?, ?, ?)";

	$sql = $conexion->prepare($sql);
	$sql -> bindValue(1, $_POST['prod']);
	$sql -> bindValue(2, $_POST['lc']);
	$sql -> bindValue(3, $_POST['lu']);
	$sql -> bindValue(4, $_POST['p']);
	$sql -> bindValue(5, $_POST['ps']);
	$sql -> bindValue(6, $_POST['eh']);
	$sql -> execute();
}

  ?>
  <br><br>
<div class="container">
<table class="table">
		<tr>
			<th scope="col">Producto</th>
			<th scope="col">La Colonia</th>
			<th scope="col">La Union</th>
			<th scope="col">Pali</th>
			<th scope="col">Pricesmart</th>
			<th scope="col">El Huerto</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$sql = "SELECT * FROM productos";

$sql = $conexion->prepare($sql);
$sql -> execute();

$resultado = $sql->fetchAll();

for($i=0;$i<count($resultado);$i++)
{
?>
		<tr>
			<td><?php echo $resultado[$i]['prod']; ?></td>
			<td class="text-center"><?php echo $resultado[$i]['lc']; ?></td>
			<td class="text-center"><?php echo $resultado[$i]['lu']; ?></td>
			<td class="text-center"><?php echo $resultado[$i]['p']; ?></td>
			<td class="text-center"><?php echo $resultado[$i]['ps']; ?></td>
			<td class="text-center"><?php echo $resultado[$i]['eh']; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>


<?php
include ('../includes/footer.php');

  ?>