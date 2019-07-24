<?php 
include('../includes/header.php');

$conectar=conexion();

$sql="SELECT * FROM checkin WHERE id_checkin=?";
$sql=$conectar->prepare($sql);
$sql->bindValue(1,$_GET["id_checkin"]);
$sql->execute();


if(isset($_POST["enviar"])){

$sql="UPDATE checkin SET semana=?, fecha=?, porcion=?, ajuste=?";

$sql=$conectar->prepare($sql);
$sql->bindValue(1,$_POST['semana']);
$sql->bindValue(2,$_POST['fecha']);
$sql->bindValue(3,$_POST['porcion']);
$sql->bindValue(4,$_POST['ajuste']);
$sql->execute();

	header("Location:acheckin.php?id=".$_SESSION['id']);
}

?>

<script language="javascript" type="text/javascript" src="js/funciones.js"></script>
<?php 


if($resultado=$sql->fetchAll())
{
?>
<div class="container"><br><br>
<form method="POST" name="form">
	<div class="row">
		<div class="col-md-3">
			<label><p class="lead">Semana</p></label>
			<input class="form-control" type="text" name="semana" value="<?php echo $resultado[0]['semana']; ?>" />
		</div>
		<div class="col-md-3">
			<label><p class="lead">Fecha</p></label>
			<input class="form-control" type="text" name="fecha" value="<?php echo $resultado[0]['fecha']; ?>" />
		</div>
		<div class="col-md-3">
			<label><p class="lead">Porcion</p></label>
			<input class="form-control" type="text" name="porcion" value="<?php echo $resultado[0]['porcion']; ?>" />
		</div>
		<div class="col-md-3">
			<label><p class="lead">Ajuste</p></label>
			<input class="form-control" type="text" name="ajuste" value="<?php echo $resultado[0]['ajuste']; ?>" /><br>
		</div>
		
		<div class="col-md-4 center-block">
			<input class="btn btn-danger" type="button" value="Volver" title="Volver" onClick="history.back();" />
		</div>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<div class="col-md-4 center-block">
		<input class="btn btn-primary" type="submit" name="enviar" value="Guardar" />
	</div>
	</div>
</form>
</div>





<?php 
}
include('../includes/header.php');

?>