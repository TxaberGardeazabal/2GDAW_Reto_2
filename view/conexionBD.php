<?php
$host="127.0.0.1";
$dbname="web_anuncios";
$user="2gdaw";
$pass="12345Abcde";

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
function generarDatos($baseDatos,$arrayCat,$i){
    $arrayAnun = selectCompleja($baseDatos,"anuncios","nombre","categoria",$arrayCat[$i]);
    print_r($arrayAnun);
    for($j= 0; $j<count($arrayAnun) && $j<4; $j++){
        $posicion = fswitch($j);
    
    echo"<div class=\"anuncio $posicion\">$arrayAnun[$j]</div>";

    }
    if(count($arrayAnun)>4){
        $posicion = fswitch($j);
        echo"<button class=\"anuncio $posicion\"><img src=\"imagenes/triangulo.png\" alt=\"imagen\"></button>";
    }

   
}
function select($baseDatos, $tabla,$columna){
    $categorias = array();
    $statement = $baseDatos->prepare("SELECT $columna FROM $tabla");
    $statement->execute();
    
    while($row = $statement->fetch()) {
        array_push($categorias, $row["$columna"]);
    }
    return($categorias);
}

function selectCompleja($baseDatos, $tabla,$columna,$aComparar ,$dato){
    $categorias = array();
    $statement = $baseDatos->prepare("SELECT $columna FROM $tabla WHERE $aComparar = \"$dato\"");
    $statement->execute();
    
    while($row = $statement->fetch()) {
        array_push($categorias, $row["$columna"]);
    }
    return($categorias);
}

function fswitch($i){
    switch($i){
        case 0:
            $posicion= "primero";
            break;
        case 1:
            $posicion= "segundo";
            break;
        case 2:
            $posicion= "tercero";
            break;
        case 3:
            $posicion= "cuarto";
            break;
        case 4:
            $posicion= "quinto";
            break;    
    }
    return $posicion;
}

////////////// prubeba de imagen
function cosoImagen() {
    $archivo = $_FILES['imagen']['name'];

    if (isset($archivo) && $archivo != "") {
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];
        $temp = $_FILES['imagen']['tmp_name'];

        echo $archivo;
        // validar

        if(move_uploaded_file($temp, "imagenes/".$archivo)) {
            echo "fue bien?";
            chmod('imagenes/'.$archivo, 0777);
            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            echo '<p><img src="imagenes/'.$archivo.'"></p>';
        }
        else {
            echo "problemas al subir imagen";
        }
    }
    else {
        echo "a";
    }
}

if (isset($_POST["imagen"])) {
    echo "a";
    cosoImagen();
}