<?php
    require "./conexionBD.php";

    function insertAnuncio($baseDatos){
       
        $nombre=$_POST["titulo"];
        $precio=$_POST["precio"];
        $imagenURL= "imagenes/subidas/" . $_POST["imagen"];
        $descripcion=$_POST["descripcion"];
        $localizacion=$_POST["localizacion"];

        $categoria=$_POST["categoria"];

        $comerciante = IdUsuario($baseDatos,$_SESSION["usuario"]);

        $statement = $baseDatos->query("INSERT INTO anuncios(nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES('$nombre','$precio','$imagenURL','$descripcion','$localizacion','$categoria','$comerciante')");
        return $statement;
    }

    function idUsuario($baseDatos,$usuarioNombre){
        $statement = $baseDatos->query("SELECT id FROM usuarios WHERE nomUsuario = '$usuarioNombre'");
        while($row = $statement->fetch()){
            $idUsuario= $row["id"];
            return $idUsuario;
        } 
    }

    $anuncioInsertado=insertAnuncio($baseDatos);
    if($anuncioInsertado){
        echo "Insertado"; 
    }

?>