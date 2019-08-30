<?php 

include('../includes/adminhead.php');

   $conectar = conexion();

   if(isset($_SESSION['type'])){

 $sql = sprintf("SELECT * FROM fotos WHERE id=").$_GET['id'];

 $sql = $conectar->prepare($sql);
 $sql->execute();

 $cate=array();



 while ($res = $sql->fetch(PDO::FETCH_ASSOC)) {
   $cate[$res['semana']][$res['id_foto']]= $res['img_path'];
 }
 ?>  


<div class="container">
  <br>
  
<input class="btn btn-danger" value="Atras" onclick="window.history.back()"></input>

<div id="accordion">
  <?php 
  foreach ($cate as $a => $b) {
    
  
  ?>
  <br>
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
<?php } ?>



  



      </div>
    

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