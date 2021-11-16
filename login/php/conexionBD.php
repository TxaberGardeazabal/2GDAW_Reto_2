<?php
$host="127.0.0.1";
$dbname="web_anuncios";
$user="root";
$pass="";

$baseDatos = conectar($host,$dbname,$user,$pass);

function conectar($host,$dbname,$user,$pass){
    try {
        $baseDatos= new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        return $baseDatos;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>