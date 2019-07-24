<?php 
session_start();


require_once("../includes/conexion.php");

$conectar=conexion();



if(isset($_SESSION['type'])){



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
  </head>
<body>
<div class="container">
 <form action="../controls/auth.php" method="POST">
<div class="container">
      <div class="col-md-12">
<div class="mx-auto" width="800px">
<br><br>
<h4 class="display-4">Cuestionario</h4><br>

<div class="form-group">
<label for="enfermedades">Historial de Enfermedades(enfermedades crónicas, algo que pueda impedir tu perdida de peso, etc):</label>
<textarea class="form-control" rows="5" id="enfermedades" name="enfermedades" required>
  </textarea>
</div>

<div class="form-group">
<label for="exppeso">Experiencia con tu peso/dietas/ejercicio (ej. He sido flaco toda mi vida, a los 20 comencé a subir, hice dieta de batidos, he hecho pesas y boxeo, etc, etc).</label>
<textarea class="form-control" rows="5" id="exppeso" name="exppeso">
  </textarea>
</div>

<div class="form-group">
<label for="estvida">Estilo de Vida: Describi un día de semana y un día de fin de semana, que tan activo o sedentario sos?</label>
<textarea class="form-control" rows="5" id="estvida" name="estvida">
  </textarea>
</div>

<div class="form-group">
<label for="comidaayer">Decime exactamente lo que comiste y tomaste ayer en todo el día. Así comes normalmente, o como?</label>
<textarea class="form-control" rows="5" id="comidaayer" name="comidaayer">
  </textarea>
</div>

<div class="form-group">
<label for="suplementos">Menciona los suplementos o medicamentos que tomas actualmente:</label>
<textarea class="form-control" rows="5" id="suplementos" name="suplementos">
  </textarea>
</div>



<div class="form-group">
<label for="findecomida">Los fines de semana como cambia tu alimentación? Describi un día de comida de fin se semana.</label>
<textarea class="form-control" rows="5" id="findecomida" name="findecomida">
  </textarea>
</div>

<div class="form-group">
<label for="metaslargo">Metas a largo plazo generales (las que toman 1 año o MAS en cumplirse):</label>
<textarea class="form-control" rows="5" id="metaslargo" name="metaslargo">
  </textarea>
</div>

<div class="form-group">
<label for="metascorto">Metas a corto plazo generales (las que toman 1 día, 1 semana, 1 mes, etc): </label>
<textarea class="form-control" rows="5" id="metascorto" name="metascorto">
  </textarea>
</div>

<h4>Meta Concreta</h4>
<div class="radio">
  <label><input type="radio" name="metaconcreta" value="Aprender"> Aprender</label><br>
  <label><input type="radio" name="metaconcreta" value="Bajar de Peso"> Bajar de Peso</label><br>
  <label><input type="radio" name="metaconcreta" value="Mantener mi Peso"> Mantener mi Peso</label><br>
  <label><input type="radio" name="metaconcreta" value="Subir Masa Muscular"> Subir Masa Muscular</label><br>
  <label><input type="radio" name="metaconcreta" value="otro"> Otro</label>
  <label><input type="textarea" name="metaconcreta">Explique otro</label>
  <br>
</div><br>

<h4>En cuanto a ejercicio te considerarías.. </h4>
<div class="radio">
  <label><input type="radio" name="ejercresis" value="Intermedio"> Intermedio (llevo tres meses consistente)</label><br>
  <label><input type="radio" name="ejercresis" value="Avanzado"> Avanzado (llevo raaato en esto)</label><br>
  <label><input type="radio" name="ejercresis" value="Principiante"> Principiante (Nunca he hecho ejercicio consistentemente por mas de 3 meses)</label><br>
  
  </div><br>

<h4>En los últimos 3 meses que tipo de ejercicio has hecho consistentemente:</h4>
  <div class="checkbox">
    <label><input type="checkbox" name="ejertresmes" value="Cardio LISS"> Cardio LISS</label><br>
    <label><input type="checkbox" name="ejertresmes" value="Cardio HIIT"> Cardio HIIT</label><br>
    <label><input type="checkbox" name="ejertresmes" value="Pesas"> Pesas</label><br>
    <label><input type="checkbox" name="ejertresmes" value="Deporte"> Deporte</label><br>
    <label><input type="checkbox" name="ejertresmes" value="Videos de Youtube"> Videos de Youtube</label><br>
    <label><input type="checkbox" name="ejertresmes" value="Zumba"> Zumba</label><br>
    <label><input type="checkbox" value="Otro">Otro<input type="textarea" name="ejertresmes"></label><br>
  </div><br>

<div class="form-group">
<label for="gymfreq">Cuantas veces a la semana y cuanto tiempo por sesión haces de ejercicio? </label>
<textarea class="form-control" rows="5" id="gymfreq" name="gymfreq">
  </textarea>
</div><br>

<div class="form-group">
<label for="impedimento">Posees alguna lesión o enfermedad que te impida hacer algún tipo de ejercicio? </label>
<textarea class="form-control" rows="5" id="impedimento" name="impedimento">
  </textarea>
</div><br>

<div class="form-group">
<label for="comprejer">Cuantos días a la semana estas dispuesto a hacer ejercicio y por cuanto tiempo por sesión (se realista)?</label>
<textarea class="form-control" rows="5" id="comprejer" name="comprejer">
  </textarea>
</div><br>

<h4>Vas a hacer ejercicio en el gimnasio o en tu casa? (especifica ahorita, no se harán cambios mas adelante)</h4>
<div class="radio">
  <label><input type="radio" name="gymocasa" value="gym">Gym</label><br>
  <label><input type="radio" name="gymocasa" value="casa">Casa</label><br>
  </div><br>

<div class="form-group">
<label for="respcasa">Si su respuesta fue en casa, ¿posee algún tipo de equipo?</label>
<textarea class="form-control" rows="5" id="respcasa" name="respcasa">
  </textarea>
</div>

<div class="form-group">
<label for="equipcasa">Si su respuesta fue si, detalla que equipos posees (no importa si no tenes nada)</label>
<textarea class="form-control" rows="5" id="equipcasa" name="equipcasa">
  </textarea>
</div><br>

<h4>En los últimos 3 meses, has estado manteniéndote, subiendo o bajando de peso?</h4>
  <div class="checkbox">
    <label><input type="radio" name="estadopeso" value="Bajando"> Bajando</label><br>
    <label><input type="radio" name="estadopeso" value="Manteniendome"> Manteniendome</label><br>
    <label><input type="radio" name="estadopeso" value="Subiendo"> Subiendo</label><br>
    <label><input type="radio" name="estadopeso" value="Subiendo y Bajando"> Subiendo y Bajando</label><br>
  </div><br>

<div class="form-group">
<label for="dietatres">En los últimos 3 meses has hecho dieta o algún esfuerzo por cumplir tu meta? (especifica que has hecho exactamente) </label>
<textarea class="form-control" rows="5" id="dietatres" name="dietatres">
  </textarea>
</div>

<div class="form-group">
<label for="dietayejer">Que te ha funcionado en el pasado en cuanto a dieta y ejercicio? </label>
<textarea class="form-control" rows="5" id="dietayejer" name="dietayejer">
  </textarea>
</div>

<h4>Que tan dispuesto estas a cambiar tu estilo de vida?</h4><br>

  
  <table class="table table-sm">
    <thead>
    <tr>
      <th></th>
  <th><label>1</label></th>
  <th><label>2</label></th>
  <th><label>3</label></th>
  <th><label>4</label></th>
  <th><label>5</label></th>
  <th><label>6</label></th>
  <th><label>7</label></th>
  <th><label>8</label></th>
  <th><label>9</label></th>
  <th><label>10</label></th>
  <th></th>
  </tr>
</thead>
</span>
<tbody>
  <tr>
    <div class="radio">
      <td>Nada</td>
  <td><input type="radio" name="disp" value="1"></td>
  <td><input type="radio" name="disp" value="2"></td>
  <td><input type="radio" name="disp" value="3"></td>
  <td><input type="radio" name="disp" value="4"></td>
  <td><input type="radio" name="disp" value="5"></td>
  <td><input type="radio" name="disp" value="6"></td>
  <td><input type="radio" name="disp" value="7"></td>
  <td><input type="radio" name="disp" value="8"></td>
  <td><input type="radio" name="disp" value="9"></td>
  <td><input type="radio" name="disp" value="10"></td>
  <td>Demasiado</td>
</div>
</tr>
</tbody>
</table>


  
  <br><br>

  <h4>Que tanta prisa tenes para cumplir tu meta?</h4><br>

<table class="table table-sm">
    <thead>
    <tr>
      <th></th>
  <th><label>1</label></th>
  <th><label>2</label></th>
  <th><label>3</label></th>
  <th><label>4</label></th>
  <th><label>5</label></th>
  <th><label>6</label></th>
  <th><label>7</label></th>
  <th><label>8</label></th>
  <th><label>9</label></th>
  <th><label>10</label></th>
  <th></th>
  </tr>
</thead>
</span>
<tbody>
  <tr>
    <div class="radio">
      <td><pre>Quiero ver<br>cambios YA!</pre></td>
  <td><input type="radio" name="prisa" value="1"></td>
  <td><input type="radio" name="prisa" value="2"></td>
  <td><input type="radio" name="prisa" value="3"></td>
  <td><input type="radio" name="prisa" value="4"></td>
  <td><input type="radio" name="prisa" value="5"></td>
  <td><input type="radio" name="prisa" value="6"></td>
  <td><input type="radio" name="prisa" value="7"></td>
  <td><input type="radio" name="prisa" value="8"></td>
  <td><input type="radio" name="prisa" value="9"></td>
  <td><input type="radio" name="prisa" value="10"></td>
  <td><pre>El tiempo es<br>lo de menos</pre></td>
</div>
</tr>
</tbody>
</table>
  
  <br><br>

  <h4>Tu meta es mas salud o estética?</h4><br>

<table class="table table-sm">
    <thead>
    <tr>
      <th></th>
  <th><label>1</label></th>
  <th><label>2</label></th>
  <th><label>3</label></th>
  <th><label>4</label></th>
  <th><label>5</label></th>
  <th><label>6</label></th>
  <th><label>7</label></th>
  <th><label>8</label></th>
  <th><label>9</label></th>
  <th><label>10</label></th>
  <th></th>
  </tr>
</thead>
</span>
<tbody>
  <tr>
    <div class="radio">
      <td>Salud</td>
  <td><input type="radio" name="saloest" value="1"></td>
  <td><input type="radio" name="saloest" value="2"></td>
  <td><input type="radio" name="saloest" value="3"></td>
  <td><input type="radio" name="saloest" value="4"></td>
  <td><input type="radio" name="saloest" value="5"></td>
  <td><input type="radio" name="saloest" value="6"></td>
  <td><input type="radio" name="saloest" value="7"></td>
  <td><input type="radio" name="saloest" value="8"></td>
  <td><input type="radio" name="saloest" value="9"></td>
  <td><input type="radio" name="saloest" value="10"></td>
  <td>Estetica</td>
</div>
</tr>
</tbody>
</table>
  
  <br><br>



<h4>Tenes acceso a una computadora/celular todo el tiempo?</h4>
<div class="radio">
  <label><input type="radio" name="celcom" value="Si"> Si</label><br>
  <label><input type="radio" name="celcom" value="No"> No</label><br>
</div><br>

<h4>Sabes cuales son los 3 macronutrientes?</h4>
<div class="radio">
  <label><input type="radio" name="macro" value="Si"> Si</label><br>
  <label><input type="radio" name="macro" value="No"> No</label><br>
</div><br>

  <h4>Se te complica el uso de aplicaciones moviles?</h4><br>

<table class="table table-sm">
    <thead>
    <tr>
      <th></th>
  <th><label>1</label></th>
  <th><label>2</label></th>
  <th><label>3</label></th>
  <th><label>4</label></th>
  <th><label>5</label></th>
  <th><label>6</label></th>
  <th><label>7</label></th>
  <th><label>8</label></th>
  <th><label>9</label></th>
  <th><label>10</label></th>
  <th></th>
  </tr>
</thead>
</span>
<tbody>
  <tr>
    <div class="radio">
      <td><pre>Demasiado, <br>soy anti-<br>tecnologia</pre></td>
  <td><input type="radio" name="appmov" value="1"></td>
  <td><input type="radio" name="appmov" value="2"></td>
  <td><input type="radio" name="appmov" value="3"></td>
  <td><input type="radio" name="appmov" value="4"></td>
  <td><input type="radio" name="appmov" value="5"></td>
  <td><input type="radio" name="appmov" value="6"></td>
  <td><input type="radio" name="appmov" value="7"></td>
  <td><input type="radio" name="appmov" value="8"></td>
  <td><input type="radio" name="appmov" value="9"></td>
  <td><input type="radio" name="appmov" value="10"></td>
  <td><pre>Para nada, <br>me encanta</pre></td>
</div>
</tr>
</tbody>
</table>

<br><br>

<h4>Alguna vez has contado macronutrientes?(Macros)</h4>
<div class="radio">
  <label><input type="radio" name="contmacro" value="Si"> Si</label><br>
  <label><input type="radio" name="contmacro" value="No"> No</label><br>
</div><br>

<h4>Alguna vez has usado una aplicacion para contar calorias?</h4>
<div class="radio">
  <label><input type="radio" name="contcal" value="Si"> Si</label><br>
  <label><input type="radio" name="contcal" value="No"> No</label><br>
</div><br>
</div>
</div>

<input class="btn btn-primary" type="submit" name="cuestionario" value="Enviar">
</div> 
<br><br>
<?php
}
else {
  echo "<script type='text/javascript'>
    alert('Para accesar a esta pagina tenes que estar registrado e iniciar sesion');
    window.location='../login.php';
  </script>";
}
include ("../includes/footer.php");

?>