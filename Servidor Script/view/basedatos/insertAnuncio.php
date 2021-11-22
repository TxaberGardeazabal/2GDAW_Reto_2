<?php
    require "./conexionBD.php";

    function insertAnuncio($baseDatos){
       
        $nombre=$_POST["titulo"];
        $precio=$_POST["precio"];
        $imagenURL= "../imagenes/" . $_POST["imagen"];
        $descripcion=$_POST["descripcion"];
        $localizacion=$_POST["localizacion"];
        $visitas=null;//Cambiar
        $categoria=$_POST["categoria"];
        $comerciante=2; //IdComerciante en Sesion o Cookies

        $statement = $baseDatos->query("INSERT INTO anuncios(nombre,precio,imagen,descripcion,localizacion,visitas,categoria,comerciante) VALUES('$nombre','$precio','$imagenURL','$descripcion','$localizacion',null,'$categoria','$comerciante')");
        return $statement;
    }

    $anuncioInsertado=insertAnuncio($baseDatos);
    if($anuncioInsertado){
        echo "Insertado"; 
    }

?>