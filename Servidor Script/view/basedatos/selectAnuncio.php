<?php
    require "./conexionBD.php";

    function selectAnuncio($baseDatos, $tabla="anuncios",$col1="nombre",$col2="imagen",$col3="descripcion",$col4="precio",$nombre){
        $datos = array();
        $statement = $baseDatos->query("SELECT $col1,$col2,$col3,$col4 FROM $tabla WHERE nombre=$nombre");//cambiar nombre=futbol1
        while($row = $statement->fetch()){
            array_push($datos, [$row["$col1"],$row["$col2"],$row[$col3],$row[$col4]]);//Array Bidimensional
        }
        return $datos;
    }
    $datos=selectAnuncio($baseDatos,"anuncios","nombre","imagen","descripcion","precio",$_POST["nombreProducto"]);

    echo json_encode($datos);
    

?>