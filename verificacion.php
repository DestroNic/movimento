<?php

include('conexion.php');

$connect = conexion();

$message = '';

if(isset($_GET['activation_code']))
{
	$query = "
	SELECT * FROM usuarios WHERE activation = :activation";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':activation' => $_GET['activation_code']
		));
	$no_of_row = $statement->rowCount();

	if($no_of_row > 0){
		$result = $statement->fetchAll();
		foreach($result as $row){
			if($row['actstat'] == 'Sin Verificar'){
				$update_query = "UPDATE usuarios SET actstat = 'Verificado'	WHERE Nombre = '".$row['Nombre']."'";
				$statement = $connect->prepare($update_query);
				$statement->execute();
				$sub_result = $statement;
				if(isset($sub_result)){
					$message = '
					<label class="text-success">
					Tu direccion de Correo ha sido verificada con exito!<br>
					Podes iniciar sesion <a href="primerlogin.php">Login</a></label>					';
				}
				
			}else{
					$message = '
					<label class="text-info">
					Tu direccion de correo ya fue verificada</label>
					';
				}
		}
		
	}
	else{
			$message = '
			<label class="text-danger">Codigo Invalido</label>
			';
		}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Verificacion de Email</title>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		<div class="container">
			<h1 align="center">Verificacion de Email</h1>
		
			<h3><?php echo $message; ?></h3>
			
		</div>
	
	</body>
	
</html>