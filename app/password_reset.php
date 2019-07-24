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
		<p class="lead">Escribe tu nuevo password.</p>
		<form action="controls/auth.php?token=<?php echo $_GET['token']; ?>" method="POST">
			<input type="password" name="password" id="password" class="form-control" required>
			<input type="password" name="password2" id="password2" class="form-control" required>
			<input class="btn btn-primary" type="submit" name="new_password" id="submit" value="Guardar">
			<div id="message"></div>
		</form>
	</div>
	</div>
</div>



  	   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
<script type="text/javascript">
  $('#password, #password2').on('keyup', function () {
  if ($('#password').val() == $('#password2').val()) {
    $('#message').html('Concuerda').css('color', 'green');
  } else 
    $('#message').html('No concuerda').css('color', 'red');
});

</script>