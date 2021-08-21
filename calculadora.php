<html>
    <head>
        <meta charset="utf-8">
        <title>Calculadora</title>


    </head>
   <body>
        <?php
            session_start();
            include('config.php');
            if(!isset($_SESSION['IdUsuario'])){
                echo'<script type="text/javascript">
                alert("Volver a iniciar sesion");
                window.location.href="index.html";
                </script>';
            
                //header("Location: index.html");
            }
            else{
                
            }
            $usuario = $_SESSION['username'];
        ?>
        <h1>Ultra calculadora</h1>
        <h2>
        <?php
          echo "Hola ".$usuario." que cuenta vas a hacer hoy?";  
        ?>
        </h2>
        <br>
        <form action="pag2.php" method="POST" id="formOperaciones">
            <label for="numero1">Numero 1:</label>
            <input type="text" id="numero1" name="numero1" required>
            <br>
            <label for="numero2">Numero 2:</label>
            <input type="text" id="numero2" name="numero2" required>
            <br>
        </form>
        <button type="submit" form="formOperaciones">Calcular!</button>
        <hr>
        <h2>
            Tu Historial
        </h2>
        <?php
            $consulta = $conn->prepare("SELECT * FROM calculos WHERE IdUsuario =:usuario");
            $consulta->bindParam("usuario", $_SESSION['IdUsuario'], PDO::PARAM_STR); 
            $consulta ->execute();
            $cont = 0;
            while($calculo=$consulta->fetch(PDO::FETCH_ASSOC)){
                echo "<p>
                        ".$calculo['fecha'].": ".$calculo['numero1']." + ".$calculo['numero2']." = ".$calculo['resultado']
                      ."</p>";
                $cont ++;
            }
            if($cont ==0){
                echo "<p>
                        todavia no tenes ninguna cuenta, que esperas para hacer una?
                        </p>";
            }
        ?>
        <hr>
        <a href="cerrarSesion.php">cerrar sesion</a>
   </body>
</html> 