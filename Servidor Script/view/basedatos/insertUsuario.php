<?php
    require "./conexionBD.php";
    
    function insertUsuario($baseDatos, $tabla="usuarios",$val1,$val2){
        $statement = $baseDatos->query("INSERT INTO $tabla(nomUsuario,contrasena) VALUES('$val1','$val2')");
        return $statement;
    }

    $usuarios=insertUsuario($baseDatos,"usuarios",$_POST["usuario1"],$_POST["passwd"]);
    if($usuarios){
        
        echo "Insertado"; 
    }
?>
