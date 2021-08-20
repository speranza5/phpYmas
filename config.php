<?php
$user = 'carlos';
$pass = 'asd123';
$host = 'localhost';
$database = 'calculadoraPro';

try{
    $conn = new PDO("mysql:host=".$host.";dbname=".$database, $user, $pass);
}
catch (PDOException $e){
    exit("Error: " . $e->getMessage());
}

?>
