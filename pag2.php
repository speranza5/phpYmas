<?php
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $resultado = $numero1 + $numero2;
    
?>

<html>
    <h1>Calculadora</h1>
    <p>
        El resultado de la suma es: <?php echo $resultado; ?>

    </p>
    <a href="index.html">volver al home</a>
</html>