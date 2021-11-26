<?php 
    require "conexionBD.php";
    $id = $_POST["id"];
    $statement = $baseDatos->prepare("DELETE FROM anuncios WHERE id = $id");
    $statement->execute();
    
?>