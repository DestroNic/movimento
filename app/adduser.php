
<!doctype html>
<html lang="en">
  <head>

    <title>Registro de Usuario</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="global.css"
    >
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
   <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>

</head>
<body>
<div class="bg">

  
  
    <br><br>


    <div class="container">
      <div class="col-md-12">
        <h4 class="display-4">Registro de Usuario</h4>
    <form action="controls/auth.php" method="POST" enctype="multipart/form-data"><br>


 
    <div class="col">
      <label>Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre" name="Nombre" required><br>
    </div>
    <div class="col">
      <label>Apellido</label>
      <input type="text" class="form-control" placeholder="Apellido" name="Apellido" required><br>
    </div>
  


  
    <div class="col">
      <label>Correo Electronico</label>
      <input type="email" class="form-control" placeholder="Correo Electronico" name="correo" required><br>
    </div>
    <div class="col">
      <label>Password</label>
      <input type="password" class="form-control" placeholder="Password" id="password" name="password"  required><br>
    </div>
     <div class="col">
      <label>Confirmar Password</label>
      <input type="password" class="form-control" placeholder="Confirmar Password" id="password2" name="password2"  required><br>
       <span id='message'></span>
    </div><br>
    <div class="col">
      <label>Numero de Whatsapp (Codigo de Area + Numero)</label>
      <input type="tel" class="form-control" placeholder="Numero de Whatsapp" name="numero" required><br>
    </div>
  

  
    <div class="col">
      <label>Fecha de Nacimiento</label>
      <input type="date" class="form-control" placeholder="dia/mes/año" name="nacimiento" required><br>
    </div>
  
    
    <label>Altura</label><br>
    <div class="col">
      <input type="text" class="form-control" placeholder="Metros" name="altura" required>
    </div>
    <label>Peso</label><br>
    <div class="col">
      <input type="text" class="form-control" placeholder="Libras" name="peso" required>
    </div><br>

    <h4>En que tipo de servicio estas interesado?</h4><br>

    <div class="radio">
      <label><input type="radio" name="servicio" value="Coaching Completo" required> Coaching Completo (nutrición + ejercicio, seguimiento semanal) $70/4 Semanas
        <ul>
       <li>Guía nutricional personalizada</li>
       <li>Rutina de ejercicios personalizada en base a su disponibilidad y preferencias, puede ser (en casa o en un gimnasio)</li>
       <li>Guía de Hábitos</li>
       <li>Recetario</li>
       <li>Base de Datos de Alimentos con 300+ alimentos para agregar a su plan</li>
       <li>Grupo de Apoyo en Facebook</li>
       <li>Seguimiento semanal por correo electrónico</li>
       <li>Consultas ilimitadas por correo electrónico</li>
       <li>Ajustes semanales en base a progreso</li>
        </ul></label><br>
      <label><input type="radio" name="servicio" value="Coaching Nutricional"> Coaching Nutricional (nutrición, seguimiento semanal) $60/4 Semanas
       <ul>
        <li>Guía nutricional personalizada</li>
        <li>Guía de Hábitos</li>
        <li>Recetario</li>
        <li>Base de Datos de Alimentos con 300+ alimentos para agregar a su plan</li>
        <li>Grupo de Apoyo en Facebook</li>
        <li>Seguimiento semanal por correo electrónico</li>
        <li>Consultas ilimitadas por correo electrónico</li>
        <li>Ajustes semanales en base a progreso</li></ul><br></label><br>
      </div><br><br><br>

      <div class="radio">
        <h4>Consultas y Seguimientos Presenciales /Por Telefono/Videollamada</h4>
      <label><input type="radio" name="consultapre" value="Ninguno"> Ninguno</label>
      <label><input type="radio" name="consultapre" value="Presencial"> Costo de consulta y seguimiento presencial $15/sesión (35 minutos)<br>*Incluye lectura de peso, índice de masa corporal (IMC), edad metabólica, porcentaje de grasa, indicación de localización de grasa y masa, porcentaje de retención de líquidos, etc.</label>
      <label><input type="radio" name="consultapre" value="Videollamada"> Costo de consulta y seguimiento por videollamada $10/sesión (25 minutos)</label>
      <label><input type="radio" name="consultapre" value="Telefono"> Costo de consulta y seguimiento por teléfono $8/sesión (25 minutos)</label>
      </div><br><br>



<label>
<p class="lead">
  Foto Comprobante de Pago<br>
    Cuenta BAC: Ana Marcela Morales (Dolares) 363691494<br>
    VENMO: @ANAMORALES2401<br>
    PayPal: anamoralescpt@gmail.com</p></label>
</div><br>

<input type="file" name="comprobante" required>




  
  <br><br>
<input class="btn btn-primary" type="submit" name="add_user" id="submit" value="Submit">
</form>
</div></div></div>


 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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

