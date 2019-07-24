<style type="text/css">
  
  *{padding:0;margin:0;}

body{
  font-family:Verdana, Geneva, sans-serif;
  font-size:18px;
  background-color:#CCC;
}

.float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#0C9;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}

.my-float{
  margin-top:22px;
}

</style>

<?php 
include('../includes/header.php');

   $conectar = conexion();

   if(isset($_SESSION['type'])){

 $sql = sprintf("SELECT * FROM fotos WHERE id=").$_SESSION['id'];

 $sql = $conectar->prepare($sql);
 $sql->execute();

 $cate=array();





 while ($res = $sql->fetch(PDO::FETCH_ASSOC)) {
   $cate[$res['semana']][$res['id_foto']]= $res['img_path'];
 }
 ?>  
<div class="container">
<div id="accordion">
  <?php 
  
  foreach ($cate as $a => $b) {
    
  
  ?>
  <div class="card">
    <div class="card-header" id="heading<?php echo $a; ?>">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $a; ?>" aria-expanded="false" aria-controls="collapse<?php echo $a; ?>">
          <?php
            switch ($a){
              case 'semana0':
                  echo 'Semana Inicial';
                break;
              case 'semana1':
                  echo 'Semana 1';
                break;
              case 'semana2':
                  echo 'Semana 2';
                break;
              case 'semana3':
                  echo 'Semana 3';
                break;
              case 'semana4':
                  echo 'Semana 4';
                break;
              case 'semana5':
                  echo 'Semana 5';
                break;
              case 'semana6':
                  echo 'Semana 6';
                break;
              case 'semana7':
                  echo 'Semana 7';
                break;
              case 'semana8':
                  echo 'Semana 8';
                break;
              }
            ?>
            
        </button>
      </h5>
    </div>

    <div id="collapse<?php echo $a; ?>" class="collapse" aria-labelledby="heading<?php echo $a; ?>" data-parent="#accordion">
      <div class="card-body">
        
        <?php 
          foreach($b as $c=>$d){
        ?>

        <img src="<?php echo $d; ?>" width="300" height="300" class="img-fluid" class="rounded float-left" alt="...">
        <?php } ?>

        


      </div>
    </div>
  </div>
<?php 

}


?>



  



      </div>
    
<a href="addfoto.php?id=<?php echo $_SESSION["id"];?>" class="float">
<i class="fa fa-plus my-float"></i>
</a>

</div>



<?php
} else {
  echo "<script type='text/javascript'>
    alert('Para accesar a esta pagina tenes que estar registrado e iniciar sesion');
    window.location='../login.php';
  </script>";
}
include ('../includes/footer.php');

  ?>