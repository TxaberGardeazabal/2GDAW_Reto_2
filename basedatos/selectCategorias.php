<?php
    require "./conexionBD.php";

    function selectCategoriasSuperCategorias($baseDatos, $tabla="categorias",$col1="clase",$col2="superclase"){
        $datos = array();
        $statement = $baseDatos->query("SELECT $col1,$col2 FROM $tabla");
        while($row = $statement->fetch()){
            array_push($datos, [$row["$col1"],$row["$col2"]]);//Array Bidimensional
        }
        return $datos;
    }
    $datos=selectCategoriasSuperCategorias($baseDatos,"categorias","clase","superclase");

    echo json_encode($datos);
    

?>