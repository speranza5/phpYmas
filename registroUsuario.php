<?php
include('config.php');
if(isset($_POST['registro'])){
    $usuario = $_POST['username'];
    $pass = $_POST['pass'];
    $passCifrada = password_hash($pass,PASSWORD_DEFAULT);
    
    /*consultar si el usuario ya existe*/
    $consultaUser = $conn -> prepare("SELECT * FROM usuarios WHERE username= :user");
    $consultaUser -> bindParam("user",$usuario,PDO::PARAM_STR);
    $consultaUser -> execute();

    $resultadoUser = $consultaUser->fetch(PDO::FETCH_ASSOC);
    if($resultadoUser){ //si hay algo en esa matriz (o sea que el user existe)
        echo'<script type="text/javascript">
        alert("El usuario ya existe");
        window.location.href="registroUsuario.html";
        </script>';
    }
    else{
        $consultaRegistro = $conn -> prepare("INSERT INTO usuarios(username, pass) VALUES (:usuario , :pass)");
        $consultaRegistro -> bindParam("usuario",$usuario,PDO::PARAM_STR);
        $consultaRegistro -> bindParam("pass",$passCifrada,PDO::PARAM_STR);
        $resultadoRegistro = $consultaRegistro -> execute();
        if(!$resultadoRegistro){ //si devuelve false es porque fallo la insersion
            echo'<script type="text/javascript">
            alert("No se pudo registrar el usuario");
            window.location.href="registroUsuario.html";
            </script>';
        }
        else{
            echo'<script type="text/javascript">
            alert("Usuario registrado!");
            window.location.href="index.html";
            </script>';
        }
        
    }
}
?>
