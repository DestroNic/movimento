<?php 
include('../includes/header.php');

$conectar = conexion();

/*if(isset($_SESSION['User'])){*/

?>

<style type="text/css">
	.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
/*input[value] {
	visibility: hidden;
}*/
</style>

<div class="container">
<h1 class="display-4">Agregar fotografias</h1><br><br>


<form action="addfoto.php" method="POST" enctype="multipart/form-data">

	<select class="form-control" name="semana">
			<option value="semana0">Inicial</option>
			<option value="semana1">1</option>
			<option value="semana2">2</option>
			<option value="semana3">3</option>
			<option value="semana4">4</option>
			<option value="semana5">5</option>
			<option value="semana6">6</option>
			<option value="semana7">7</option>
			<option value="semana8">8</option>
			<option value="semana9">9</option>
			<option value="semana10">10</option>
			<option value="semana11">11</option>
			<option value="semana12">12</option>

		</select>
		<br><br>


  <input type="file" name="file_img[]" multiple/>
	
<br><br>

		<input class="button btn-primary" type="submit" name="btn_upload" value="Agregar">
	</div>
</form>

<?php 


if(isset($_POST['btn_upload'])){

$semana = $_POST['semana'];

$id = $_SESSION['id'];

	for($i = 0; $i < count($_FILES['file_img']['name']); $i++)
    {
        $filetmp = $_FILES["file_img"]["tmp_name"][$i];
        $filename = $_FILES["file_img"]["name"][$i];
        $filetype = $_FILES["file_img"]["type"][$i];
        $filepath = "photo/".$filename;
    
    move_uploaded_file($filetmp,$filepath);


		$sql = "INSERT INTO fotos (semana, img_name,img_path,img_type, id) VALUES (?,?,?,?,?)";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$semana);
    $sql->bindValue(2,$filename);
    $sql->bindValue(3,$filepath);
    $sql->bindValue(4,$filetype);
    $sql->bindValue(5,$id);

    $sql->execute();

    header("Location:fotos.php");

			}

}

/*}

else {
  echo "<script type='text/javascript'>
    alert('Para accesar a esta pagina tenes que estar registrado e iniciar sesion');
    window.location='../login.php';
  </script>";
}*/




?>