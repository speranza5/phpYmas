<?php
$user = 'carlos';
$pass = 'asd123';
$host = 'localhost';
$database = 'calculadoraPro';

try{  //intenta ejecutar esto
    $conn = new PDO("mysql:host=".$host.";dbname=".$database, $user, $pass);
}
catch (PDOException $e){ //si falla ejecuta esto
    exit("Error: " . $e->getMessage());
}

?>
