<?php
include ('conexion.php');

$conexion = conexion();





if(isset($_POST['submit'])){
	$token = md5(rand());

	$sql = "SELECT correo FROM usuarios WHERE correo=?";
	$sql=$conexion->prepare($sql);
	$sql->bindValue(1,$_POST['correo']);
	$sql->execute();
	$resultado=$sql->fetchAll();

	if(is_array($resultado)==true and count($resultado) == 0){
		echo "<script type='text/javascript'>
		document.getElementById('mensaje').innerHTML = 'El Correo no Existe en la base de datos';
		</script>;
		";
	} else{
		$sql2 = "UPDATE usuarios SET pwreset=? WHERE correo=? ";
		$sql2 = $conexion->prepare($sql2);
		$sql2 -> execute([$token, $_POST['correo']]);

		$base_url = "http://localhost/sm360/";  //change this baseurl value as per your file path
			$mail_body = "
					<p>Hola,</p>
					<p>Dale click al enlace de abajo para cambiar tu contraseña.</p>
					<p> - ".$base_url."password_reset.php?token=".$token."
					<p>Saludos!,<br />Movimento</p>
					";

			$headers = 'From: Movimiento rcmalonso@gmail.com' . "\r\n" .
						'X-Mailer: PHP/' . phpversion() . "\r\n" .
						'Content-type: text/html; charset=iso-8859-1';
			mail($_POST["correo"], 'Movimento - Confirmacion de Correo', $mail_body, $headers);

			echo "<script></script>";
	}

	
}


?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Resetear Password</title>
  </head>
  <body>
  	<br><br>
	<div class="container text-center">
		<h4 class="Display-4">Resetear Password</h4><br><br>
		<div class="row">
		<div class="offset-lg-4 col-lg-4">
		<p class="lead">Ingresa tu correo electronico.</p>
		<form action="pwreset.php" method="POST">
			<input type="email" name="correo" class="form-control" required>
			<input class="btn btn-primary" type="submit" name="submit" id="submit" value="Enviar">
			<p id="mensaje"></p>
		</form>
	</div>
	</div>
</div>



  	   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>