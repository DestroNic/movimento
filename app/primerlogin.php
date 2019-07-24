<?php 

 
session_start();



require_once('conexion.php');

$conectar = conexion();



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    


    
  </head>
  <body><br><br><br><br>
<div class="container">
	<form action="controls/auth.php?id=<?php echo $_SESSION["id"];?>" method="POST">
		<div class="form-group">
		<div class="panel panel-default">
    <div class="panel-body">
			
<div class="d-flex justify-content-center">

				<img src="../movimg/logotrans.png" width="100" height="100">
				</div>
				<div class="mx-auto text-center">
                    <div class="offset-lg-4 col-lg-4">
				<input class="form-control" type="text" name="correo" placeholder="Correo"><br><br>
			
				<input class="form-control" type="password" name="password" placeholder="Password"><br><br>
				</div>
				<input class="btn btn-primary" type="submit" name="first_login" value="Ingresar">
				</div>	
		</div>
	</div>
</div>
	</form>
</div>




  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>