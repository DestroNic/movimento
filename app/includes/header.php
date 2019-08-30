<?php session_start();



require_once("conexion.php");



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="global.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script type="text/javascript" src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    


    
  </head>
  <body>
  <?php 
if($_SESSION['type']=='Admin'){

  ?>
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fooddb.php">Base de datos Alimentos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="asuper.php">Lista de Super</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aprod.php">Productos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../includes/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<?php 
} 
elseif($_SESSION['type']=='User'){

?> 
  
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="inicio.php?id=<?php echo $_SESSION["id"];?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rutina.php?id=<?php echo $_SESSION["id"];?>">Ejercicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dieta.php?id=<?php echo $_SESSION["id"];?>">Dieta</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fotos.php?id=<?php echo $_SESSION["id"];?>">Fotos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkin.php?id=<?php echo $_SESSION["id"];?>">Check-in</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="journal.php?id=<?php echo $_SESSION["id"];?>">Food Journal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="super.php">Lista de Super</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="productos.php">Productos Recomendadeos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="faq.php">FAQs</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../includes/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<?php }

?>
