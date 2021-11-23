<?php
    require "./conexionBD.php";
    
    function insertUsuario($baseDatos, $tabla="usuarios",$val1,$val2){
        $statement = $baseDatos->query("INSERT INTO $tabla(nomUsuario,contrasena) VALUES('$val1','$val2')");
        $tipoUsuario=$_POST["tipo"];

        if($tipoUsuario=="Comerciante"){
            $empresa=$_POST["empresa"];
            $telf=$_POST["telf"];
            $email=$_POST["email"];
            $codPostal=$_POST["cpostal"];
            $statement2 = $baseDatos->query("INSERT INTO comerciantes VALUES(LAST_INSERT_ID(),'$empresa','$telf','$codPostal','$email')");
        }else{
            $nom = $_POST["nombre"];
            $email=$_POST["email"];
            $statement2 = $baseDatos->query("INSERT INTO compradores VALUES(LAST_INSERT_ID(),'$nom','$email')");
        }
        return $statement;
    }

    $usuarios=insertUsuario($baseDatos,"usuarios",$_POST["usuario1"],$_POST["passwd"]);

    if($usuarios){
        $_SESSION["firstname"] = "Peter";
        echo "Insertado"; 
    }
?>