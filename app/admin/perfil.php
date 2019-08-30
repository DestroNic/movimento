<?php
include('../includes/header.php');

$conectar=conexion();

$sql="SELECT * FROM usuarios WHERE id=?";

$sql=$conectar->prepare($sql);
$sql->bindValue(1, $_GET["id"]);
$sql->execute();

?>

<?php
if($resultado=$sql->fetchAll())
{
?>  
<script language="javascript" type="text/javascript">
  function eliminar(id)
  {
    if (confirm("Realmente desea eliminar el registro?"))
    {
      window.location="eliuser.php?id="+id;
    }
  }

</script>
    <div class="container">
    <div><br>
      <div class="row">
      <div class="col-md-4">
      <p><strong>Nombre:</strong> <?php echo $resultado[0]["Nombre"];?>
      <?php echo $resultado[0]["Apellido"];?></p>
      </div>
      <div class="col-md-4">
        <p><strong>Fecha de Nacimiento: </strong><?php echo $resultado[0]["nacimiento"];?></p>
          </div>
    <div class="col-md-4">
     <p><strong>Numero Whatsapp: </strong><?php echo $resultado[0]["numero"];?></p></div>
   </div><br>
      <div class="row">
      <div class="col-md-4">
      <p><strong>Correo Electronico: </strong><?php echo $resultado[0]["correo"];?></p>
    </div>
      <div class="col-md-4">
      <p><strong>Altura: </strong><?php echo $resultado[0]["altura"];?> Mts</p>
    </div>
    <div class="col-md-4">
      <p><strong>Peso: </strong><?php echo $resultado[0]["peso"];?> Lbs</p>
    </div>
  </div><br>
    <div class="row">
      <div class="col-md-4">
      <p><strong>Servicio: </strong><?php echo $resultado[0]["servicio"];?></p>  
      <?php $file=$resultado[0]["comprobante"] ?>
    </div>
    <div class="col-md-4">
      <p><strong>Seguimiento: </strong><?php echo $resultado[0]["consultapre"];?></p>
    </div>
      <div class="col-md-4">
      <p><strong>Comprobante de Pago: <a href="../<?php echo $file;?>" target="_blank">Comprobante De Pago</a></strong></p>
      </div>
  </div>
    </div><br>
    <div class="row">
      <div class="col-md-2">
        <label><strong>Fotos</strong></label>
    <a class="nav-link" href="../user/afotos.php?id=<?php echo $_GET["id"];?>"><i class="fas fa-camera fa-4x"></i></a>
  </div>
  <div class="col-md-2">
    <label><strong> Check-in</strong></label>
    <a class="nav-link" href="acheckin.php?id=<?php echo $_GET["id"];?>"><i class="fas fa-user-check fa-4x"></i></a>
    </div>
  <div class="col-md-2">
    <label><strong>Food Journal</strong></label>
    <a class="nav-link" href="../user/ajournal.php?id=<?php echo $_GET["id"];?>"><i class="fas fa-utensils fa-4x"></i></a>
  </div>   
  <div class="col-md-2">
    <label><strong>Cuestionario</strong></label>
      <a class="btn btn-primary" data-toggle="collapse" href="#collapseCuestionario" role="button" aria-expanded="false" aria-controls="collapseCuestionario">
    <i class="fas fa-tasks fa-4x"></i>
  </a>
  </div> 
  <div class="col-md-2">
    <label><strong>Eliminar Perfil</strong></label>
    <a class="nav-link" href="javascript:void(0)" title="Eliminar" onClick="eliminar('<?php echo $_GET["id"];?>')"><i class="fas fa-user-slash fa-4x"></i></a>
  </div>
    </div>
  <div>
    <div class="collapse" id="collapseCuestionario">
  <div class="card card-body">
   <?php 
    $sql="SELECT * FROM cuestionario WHERE id=".$_GET['id'];
    $sql=$conectar->prepare($sql);
    $sql->execute();

    $resultado = $sql->fetchAll();

    for($i=0;$i<count($resultado);$i++){

   ?>
    <strong>Historial de Enfermedades</strong><br>
    <p class="lead"><?php echo $resultado[$i]['enfermedades']; ?></p><br><br>
    <strong>Experiencia con tu peso/dietas/ejercicio</strong><br>
    <p class="lead"><?php echo $resultado[$i]['exppeso']; ?></p><br><br>
    <strong>Estilo de vida</strong><br>
    <p class="lead"><?php echo $resultado[$i]['estvida']; ?></p><br><br>
    <strong>Decime exactamente lo que comiste y tomaste ayer</strong><br>
    <p class="lead"><?php echo $resultado[$i]['comidaayer']; ?></p><br><br>
    <strong>Suplementos o medicamentos que tomas actualmente</strong><br>
    <p class="lead"><?php echo $resultado[$i]['suplementos']; ?></p><br><br>
    <strong>Los fines de semana como cambia tu alimentacion</strong><br>
    <p class="lead"><?php echo $resultado[$i]['findecomida']; ?></p><br><br>
    <strong>Metas a largo plazo</strong><br>
    <p class="lead"><?php echo $resultado[$i]['metaslargo']; ?></p><br><br>
    <strong>Metas a corto plazo</strong><br>
    <p class="lead"><?php echo $resultado[$i]['metascorto']; ?></p><br><br>
    <strong>Meta Concreta</strong><br>
    <p class="lead"><?php echo $resultado[$i]['metaconcreta']; ?></p><br><br>
    <strong>En cuanto a ejercicio te consideras..</strong><br>
    <p class="lead"><?php echo $resultado[$i]['ejercresis']; ?></p><br><br>
    <strong>En los ultimos 3 meses que tipo de ejercicio has hecho</strong><br>
    <p class="lead"><?php echo $resultado[$i]['ejertresmes']; ?></p><br><br>
    <strong>Cuantas veces a la semana y cuanto tiempo por sesion haces ejercicios</strong><br>
    <p class="lead"><?php echo $resultado[$i]['gymfreq']; ?></p><br><br>
    <strong>Posees alguna lesion o enfermedad que te impida hacer ejercicios</strong><br>
    <p class="lead"><?php echo $resultado[$i]['impedimento']; ?></p><br><br>
    <strong>Cuantos dias a la semana estas dispuesto a hacer ejercicio y cuanto por sesion</strong><br>
    <p class="lead"><?php echo $resultado[$i]['comprejer']; ?></p><br><br>
    <strong>Vas hacer ejercicio en el gimnasio o en tu casa</strong><br>
    <p class="lead"><?php echo $resultado[$i]['gymocasa']; ?></p><br><br>
    <strong>si tu respuesta fue casa, posee algun equipo</strong><br>
    <p class="lead"><?php echo $resultado[$i]['respcasa']; ?></p><br><br>
    <strong>Detalla que equipos tenes en tu casa</strong><br>
    <p class="lead"><?php echo $resultado[$i]['equipcasa']; ?></p><br><br>
    <strong>En los ultimos tres meses has estado manteniendote, subiendo o bajado</strong><br>
    <p class="lead"><?php echo $resultado[$i]['estadopeso']; ?></p><br><br>
    <strong>En los ultimos 3 meses has hecho dieta o algun esfuerzo por cumplir to meta</strong><br>
    <p class="lead"><?php echo $resultado[$i]['dietatres']; ?></p><br><br>
    <strong>Que te ha funcionado en el pasado en cuanto a dieta y ejercicio</strong><br>
    <p class="lead"><?php echo $resultado[$i]['dietayejer']; ?></p><br><br>
    <strong>Que tan dispuesto estas a cambiar tu estilo de vida</strong><br>
    <p class="lead"><?php echo $resultado[$i]['disp']; ?></p><br><br>
    <strong>Que tanta prisa tenes para cumplir tu meta</strong><br>
    <p class="lead"><?php echo $resultado[$i]['prisa']; ?></p><br><br>
    <strong>Tu meta es mas salud o estetica</strong><br>
    <p class="lead"><?php echo $resultado[$i]['saloest']; ?></p><br><br>
    <strong>Tenes acceso a una computadora/celular todo el tiempo</strong><br>
    <p class="lead"><?php echo $resultado[$i]['celcom']; ?></p><br><br>
    <strong>Sabes cuales son los 3 macronutrientes</strong><br>
    <p class="lead"><?php echo $resultado[$i]['macro']; ?></p><br><br>
    <strong>Se te complica el uso de aplicaciones moviles</strong><br>
    <p class="lead"><?php echo $resultado[$i]['appmov']; ?></p><br><br>
    <strong>Alguna vez has contado macronutrientes</strong><br>
    <p class="lead"><?php echo $resultado[$i]['contmacro']; ?></p><br><br>
    <strong>Alguna vez has usado una aplicacion para contar calorias</strong><br>
    <p class="lead"><?php echo $resultado[$i]['contcal']; ?></p><br><br>




   <?php 
    }
   ?>

  </div>
</div>

  </div>
</div>
    
    
 
   
  <?php
}

include ('../includes/footer.php');
?>

