<?php 


include('../includes/header.php');


$conectar=conexion();

if(isset($_SESSION['type'])){

$_SESSION['id'] = $_GET['id'];


$sql="select * from usuarios where id=?";

$sql=$conectar->prepare($sql);
$sql->bindValue(1, $_SESSION["id"]);
$sql->execute();



?>

<?php
if($resultado=$sql->fetchAll());
{
?>



<h1 class="display-3">Hola <?php echo $resultado[0]['Nombre'];?></h1>


  

 
    <?php 
  }
} else {
  echo "<script type='text/javascript'>
    alert('Para accesar a esta pagina tenes que estar registrado e iniciar sesion');
    window.location='../login.php';
  </script>";
}
  include('../includes/footer.php');
  
    ?>



