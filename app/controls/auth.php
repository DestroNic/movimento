<?php 
session_start();

include('../includes/conexion.php');

$conectar = conexion();


//******************************************--Sign Up--****************************************************************

if(isset($_POST['add_user'])){
   
    $query = "SELECT * FROM usuarios WHERE correo = :correo";
    $statement = $conectar->prepare($query);
    $statement->execute(
    array(
            ':correo'   =>  $_POST['correo']
        )
    );
    $no_of_row = $statement->rowCount();
    if($no_of_row > 0)
    {
        echo "<script type='text/javascript'>
        alert('El correo ".$_POST["correo"]." ya existe en la tabla usuarios de la base de datos');
        window.location='../adduser.php';
         </script>";
    }

   else{

        $nombreimg=$_FILES['comprobante']['name'];
        $archivo=$_FILES['comprobante']['tmp_name'];
        $ruta="images";

        $ruta=$ruta."/".$nombreimg;

        move_uploaded_file($archivo, $ruta);

        $activation = md5(rand());
        $sql="INSERT INTO `usuarios` (`Nombre`,`Apellido`,`correo`,`numero`,`nacimiento`,`altura`,`peso`,`servicio`,`consultapre`,`comprobante`,`password`,`activation`,`actstat`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$_POST["Nombre"]);
        $sql->bindValue(2,$_POST["Apellido"]);
        $sql->bindValue(3,$_POST["correo"]);
        $sql->bindValue(4,$_POST["numero"]);
        $sql->bindValue(5,$_POST["nacimiento"]);
        $sql->bindValue(6,$_POST["altura"]);
        $sql->bindValue(7,$_POST["peso"]);
        $sql->bindValue(8,$_POST["servicio"]);
        $sql->bindValue(9,$_POST["consultapre"]);
        $sql->bindValue(10,$ruta);
        $sql->bindValue(11,password_hash($_POST["password"], PASSWORD_DEFAULT));
        $sql->bindValue(12,$activation);
        $sql->bindValue(13,'Sin Verificar');
        $sql->execute();



        $base_url = "http://localhost/sm360/app/controls/";  //change this baseurl value as per your file path
        $mail_body = "
                <p>Hola ".$_POST["Nombre"].",</p>
                <p>Gracias por registrarte. Por favor confirma tu correo electronico.</p>
                <p>Abre este enlace para verificar tu correo - ".$base_url."auth.php?activation_code=".$activation."
                <p>Saludos,<br />Movimento</p>
                ";

        $headers = 'From: Movimento rcmalonso@gmail.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion() . "\r\n" .
                    'Content-type: text/html; charset=iso-8859-1';
                    mail($_POST["correo"], 'Movimento - Confirmacion de Correo', $mail_body, $headers);
        
   
        header("Location:../confirmacion.php");

    }
}


//**********************************************--Main Login--**********************************************

if(isset($_POST['main_login'])){

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = $conectar->prepare('SELECT * FROM usuarios WHERE correo = :correo'); 
    $sql->execute(array(':correo' => $correo));
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);



if ($resultado) { 
    if (password_verify($password, $resultado['password'])) {
        if ($resultado['type'] == 'Admin') {
                $_SESSION['correo'] = $correo;
                $_SESSION['id'] = $resultado['id'];
                $_SESSION['type'] = $resultado['type'];
                header("Location: ../admin/dashboard.php");

            } else if($resultado['type'] == 'User'){

                $_SESSION['correo'] = $correo;
                $_SESSION['id'] = $resultado['id'];
                $_SESSION['type'] = $resultado['type'];
                header("Location: ../user/inicio.php?id=".$resultado['id']); 
            }

             } else {
            echo "<script type='text/javascript'>
                    alert('La contraseña no es correcta');
                    window.location='../login.php';
                    </script>";
            }

            } else {
    echo "<script type='text/javascript'>
            alert('El correo ".$_POST["correo"]." no existe en la tabla de la base de datos');
            window.location='../login.php';
            </script>";
}

}

//***********************************************--Password Reset Submission--**************************************************

if(isset($_POST['pw_reset'])){
    $token = md5(rand());
    $sql = "SELECT correo FROM usuarios WHERE correo=?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$_POST['correo']);
    $sql->execute();
    $resultado=$sql->fetchAll();

    if(is_array($resultado)==true and count($resultado) == 0){
        echo "<script type='text/javascript'>
        alert('El Correo No Existe en la base de datos');
        window.location='../pwreset.php';
        </script>;
        ";
    } else{
        $sql2 = "UPDATE usuarios SET pwreset=? WHERE correo=? ";
        $sql2 = $conectar->prepare($sql2);
        $sql2 -> execute([$token, $_POST['correo']]);

        $base_url = "http://localhost/sm360/app/";  //change this baseurl value as per your file path
        $mail_body = "
                    <p>Hola,</p>
                    <p>Dale click al enlace de abajo para cambiar tu contraseña.</p>
                    <p> - ".$base_url."password_reset.php?token=".$token."
                    <p>Saludos!,<br />Movimento</p>
                    ";

        $headers = 'From: Movimiento rcmalonso@gmail.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion() . "\r\n" .
                   'Content-type: text/html; charset=iso-8859-1';
        mail($_POST["correo"], 'Movimento - Confirmacion de Correo', $mail_body, $headers);

        echo "<script type='text/javascript'>
            alert('Se te ha enviado un correo para reinstaurar tu contraseña');
            window.location='../login.php';
            </script>;";
    }
    
}

//****************************************************--New Password--*******************************************************

if(isset($_POST['new_password'])){

$query = "SELECT * FROM usuarios WHERE pwreset = :token";

    $statement = $conectar->prepare($query);
    $statement->execute(array(':token'=>$_GET['token']));
    $no_of_row = $statement->rowCount();
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if($no_of_row > 0){
        $result = $statement->fetchAll();
        
            foreach($result as $row){
        
                if($row['pwreset'] == $_GET['token']){
                    $update = "UPDATE usuarios SET password =? WHERE pwreset=?";
                    $update = $conectar->prepare($update);
                    $update->execute([$password, $_GET['token']]);
            }
        }
    }
    header('location: ../login.php');
}

//******************************************************--eMail Verification--********************************************************

if(isset($_GET['activation_code']))
{
    $query = "
    SELECT * FROM usuarios WHERE activation = :activation";
    $statement = $conectar->prepare($query);
    $statement->execute(
        array(
            ':activation' => $_GET['activation_code']
        ));
    $no_of_row = $statement->rowCount();

    if($no_of_row > 0){
        $result = $statement->fetchAll();
        foreach($result as $row){
            if($row['actstat'] == 'Sin Verificar'){
                $update_query = "UPDATE usuarios SET actstat = 'Verificado' WHERE Nombre = '".$row['Nombre']."'";
                $statement = $conectar->prepare($update_query);
                $statement->execute();
                $sub_result = $statement;
                if(isset($sub_result)){
                    echo '
                    <script type="text/javascript">
                    alert("Tu direccion de Correo ha sido verificada con exito! 
                    Ya Podes iniciar sesion."); 
                    window.location="../primerlogin.php";</script> ';
                }
                
            }else{
                    echo '
                    <script type="text/javascript">
                    alert("Tu direccion de correo ya fue verificada");
                    window.location="../login.php"</script> 
                    ';
                }
        }
        
    }
    else{
            echo '
            <script type="text/javascript">alert("Codigo Invalido");
            window.location ="../login.php"</script>
            ';
        }
}


//********************************************--First Login--****************************************************************

if(isset($_POST['first_login'])){
$correo = $_POST['correo'];
$password = $_POST['password'];



$sql = $conectar->prepare('SELECT * FROM usuarios WHERE correo = :correo'); 
$sql->execute(array(':correo' => $correo));
$resultado = $sql->fetch(PDO::FETCH_ASSOC);



if ($resultado) { 
     if (password_verify($password, $resultado['password'])) {
            if ($resultado['type'] == 'Admin') {
                $_SESSION['correo'] = $correo;
                $_SESSION['id'] = $resultado['id'];
                header("Location: admin/dashboard.php");

            } else if($resultado['type'] == 'User'){

                $_SESSION['correo'] = $correo;
                $_SESSION['id'] = $resultado['id'];

                header("Location: ../user/acuestionario.php?id=".$resultado['id']); 
            }

            } else {
                echo "<script type='text/javascript'>
                alert('La contraseña no es correcta');
                window.location='../primerlogin.php';
                </script>";
            }

            } else {
                echo "<script type='text/javascript'>
                alert('El correo ".$_POST["correo"]." no existe en la tabla de la base de datos');
                window.location='../primerlogin.php';
                </script>";
            }
        }

//***************************************--Questionaire--*************************************************************

if(isset($_POST["cuestionario"]))
{



    $sql="INSERT INTO `cuestionario` (
    `enfermedades`,
    `exppeso`,
    `estvida`,
    `comidaayer`,
    `suplementos`,
    `findecomida`,
    `metaslargo`,
    `metascorto`,
    `metaconcreta`,
    `ejercresis`,
    `ejertresmes`,
    `gymfreq`,
    `impedimento`,
    `comprejer`,
    `gymocasa`,
    `respcasa`,
    `equipcasa`,
    `estadopeso`,
    `dietatres`,
    `dietayejer`,
    `disp`,
    `prisa`,
    `saloest`,
    `celcom`,
    `macro`,
    `appmov`,
    `contmacro`,
    `contcal`,
    `id`

     )
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";

    $sql=$conectar->prepare($sql);

    $sql->bindValue(1,$_POST["enfermedades"]);
    $sql->bindValue(2,$_POST["exppeso"]);
    $sql->bindValue(3,$_POST["estvida"]);
    $sql->bindValue(4,$_POST["comidaayer"]);
    $sql->bindValue(5,$_POST["suplementos"]);
    $sql->bindValue(6,$_POST["findecomida"]);
    $sql->bindValue(7,$_POST["metaslargo"]);
    $sql->bindValue(8,$_POST["metascorto"]);
    $sql->bindValue(9,$_POST["metaconcreta"]);
    $sql->bindValue(10,$_POST["ejercresis"]);
    $sql->bindValue(11,$_POST["ejertresmes"]);
    $sql->bindValue(12,$_POST["gymfreq"]);
    $sql->bindValue(13,$_POST["impedimento"]);
    $sql->bindValue(14,$_POST["comprejer"]);
    $sql->bindValue(15,$_POST["gymocasa"]);
    $sql->bindValue(16,$_POST["respcasa"]);
    $sql->bindValue(17,$_POST["equipcasa"]);
    $sql->bindValue(18,$_POST["estadopeso"]);
    $sql->bindValue(19,$_POST["dietatres"]);
    $sql->bindValue(20,$_POST["dietayejer"]);
    $sql->bindValue(21,$_POST["disp"]);
    $sql->bindValue(22,$_POST["prisa"]);
    $sql->bindValue(23,$_POST["saloest"]);
    $sql->bindValue(24,$_POST["celcom"]);
    $sql->bindValue(25,$_POST["macro"]);
    $sql->bindValue(26,$_POST["appmov"]);
    $sql->bindValue(27,$_POST["contmacro"]);
    $sql->bindValue(28,$_POST["contcal"]);
    $sql->bindValue(29,$_SESSION["id"]);
    $sql->execute();


    header("Location: ../user/inicio.php?id=".$_SESSION["id"]);
}

?>