<?php
    include "./conexionBD.php";
     session_start();

    function selectUsuarios($baseDatos, $tabla="usuarios",$columna1="nomUsuario",$columna2="contrasena"){
        $usuarios = array();
        $statement = $baseDatos->query("SELECT $columna1,$columna2 FROM $tabla");
        
        while($row = $statement->fetch()){
            array_push($usuarios, [$row["$columna1"],$row["$columna2"]]);//Array Bidimensional
        }
        return $usuarios;
    }

    $usuarios=selectUsuarios($baseDatos,"usuarios","nomUsuario","contrasena");
    $correcto=false;
    for($i=0;$i<count($usuarios);$i++){
        if($_POST["usuario1"]==$usuarios[$i][0] && $_POST["passwd"]==$usuarios[$i][1]){
            $correcto=true;
            $nomUsuario=$_POST["usuario1"];
            $_SESSION["usuario"]=$nomUsuario;
            break;
        }
    }

    if($correcto==true){
        echo "LoginCorrecto";
    }

?>