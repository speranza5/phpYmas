<?php
    include('config.php');
    session_start();
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    
    $suma = $numero1 + $numero2;

    $consulta = $conn->prepare("INSERT INTO calculos(numero1, numero2, fecha, resultado, IdUsuario) VALUES (:num1 , :num2, CURDATE(),:resultado, :user)"); 
    $consulta->bindParam("num1", $numero1, PDO::PARAM_STR);
    $consulta->bindParam("num2", $numero2, PDO::PARAM_STR);
    $consulta->bindParam("resultado", $suma, PDO::PARAM_STR);
    $consulta->bindParam("user", $_SESSION['IdUsuario'], PDO::PARAM_STR);

    $resultado = $consulta->execute();
    if(!$resultado){
        echo'<script type="text/javascript">
        alert("Hubo un error guardando el calculo. No se mostrara en el historial");
        window.location.href="calculadora.php";
        </script>';
    }
    
?>

<html>
    <h1>Calculadora</h1>
    <p>
        El resultado de la suma es: <?php echo $suma; ?>

    </p>
    <a href="calculadora.php">volver al home</a>
</html>