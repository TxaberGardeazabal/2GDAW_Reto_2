

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
    for($j= 0; $j<count($arrayAnun) && $j<4; $j++){
        $posicion = fswitch($j);
    
    echo"<a href=\"anuncios.php?anun=$arrayAnun[$j]\"class=\"anuncio $posicion\">$arrayAnun[$j]</a>";

    }
    if(count($arrayAnun)>4){
        $posicion = fswitch($j);
        echo"<a href=\"categorias.php?cat=$arrayCat[$i]\" class=\"anuncio $posicion\"><img src=\"imagenes/iconos/triangulo.png\" alt=\"imagen\"></a>";
    }
}
function generarDatos2($baseDatos,$dato){
    $arrayAnun = selectCompleja($baseDatos,"anuncios","nombre","categoria",$dato);
    for($j= 0; $j<count($arrayAnun); $j++){
        
    
    echo"<a href=\"anuncios.php?anun=$arrayAnun[$j] \"class=\"anuncio\">$arrayAnun[$j]</a>";
    }
}
function generarDatos3($baseDatos,$dato){
    $arrayAnun = selectCompleja($baseDatos,"anuncios","nombre","categoria",$dato);
    for($j= 0; $j<count($arrayAnun); $j++){
        $posicion = fswitch($j);
    
    echo"<a href=\"anuncios.php?anun=$arrayAnun[$j] \"class=\"anuncio $posicion\">$arrayAnun[$j]</a>";
    }
}

function generarBotonesDatos($baseDatos,$arraySupCat,$i){
    $arrayCat = selectCompleja($baseDatos,"categorias","clase","superclase",$arraySupCat[$i]);

    for($j= 0; $j<count($arrayCat); $j++){
    echo"<a href=\"categorias.php?cat=$arrayCat[$j]\" class=opcion id=\"$arrayCat[$j]\">$arrayCat[$j]</a>";
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
function selectSencilla($baseDatos,$tabla,$columna,$aComparar ,$dato){
    $categorias = array();
    $statement = $baseDatos->prepare("SELECT $columna FROM $tabla WHERE $aComparar = \"$dato\"");
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
function selectCompleja2($baseDatos, $tabla,$columna,$aComparar ,$dato){
    $datos = array();
    $statement = $baseDatos->prepare("SELECT $columna FROM $tabla WHERE $aComparar = \"$dato\"");
    $statement->execute();
    
    while($row = $statement->fetch()) {
        $datos = [
            "id" => $row["id"],
            "nombre" => $row["nombre"],
            "precio" => $row["precio"],
            "imagen" => $row["imagen"],
            "descripcion" => $row["descripcion"],
            "localizacion" => $row["localizacion"],
            "visitas" => $row["visitas"],
            "categoria" => $row["categoria"],
            "comerciante" => $row["comerciante"],

        ];
    }

    addVisitas($baseDatos,$datos["id"]);
    return $datos;
}
function selectCompleja3($baseDatos, $tabla,$columna,$aComparar ,$dato){
    $datos = array();
    $statement = $baseDatos->prepare("SELECT $columna FROM $tabla WHERE $aComparar = \"$dato\"");
    $statement->execute();
    
    while($row = $statement->fetch()) {
        $datos = [
            "id" => $row["id"],
            "nomEmpresa" => $row["nomEmpresa"],
            "telefono" => $row["telefono"],
            "codPostal" => $row["codPostal"],
            "email" => $row["email"],
        ];
    }
    return $datos;
}

function selectComplejisima($baseDatos, $tabla,$columna,$aComparar ,$dato){
    $categorias = array();
    $statement = $baseDatos->prepare("SELECT $columna FROM $tabla WHERE $aComparar like \"%$dato%\"");
    $statement->execute();
    
    while($row = $statement->fetch()) {
        array_push($categorias, $row["$columna"]);
    }
    return($categorias);
}

function selectDestacados($baseDatos,$usuario,$anuncio){
    $statement = $baseDatos->prepare("SELECT idAnun FROM destacados WHERE idCli = \"$usuario\""); // usar :
    $statement->execute();
    while($row = $statement->fetch()) {
        if($row["idAnun"]==$anuncio){
            return true;
        }
    }
    return false;
}

function selectPorPopularidad($baseDatos) {
    $statement = $baseDatos->prepare("SELECT * FROM anuncios ORDER BY visitas desc;");
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $statement->execute();

    $ret = [];
    $cont = 0;
    while ($row = $statement->fetch()) {
        if ($cont < 5) {
            //echo $row["nombre"];
            array_push($ret,$row["nombre"]);
            $cont ++;
        }
        else {
            break;
        }
    }

    //echo count($ret);
    return $ret;
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
function esComprador($baseDatos,$idUsuario){
    $statement = $baseDatos->prepare("SELECT id FROM compradores"); // usar :
    $statement->execute();
    while($row = $statement->fetch()) {
        if($row["id"]==$idUsuario){
            return true;
        }
    }
    return false;
}


function addVisitas($baseDatos,$idAnuncio) {
    //echo $idAnuncio;
    $data = ["id" => $idAnuncio];
    $statement = $baseDatos->prepare("UPDATE anuncios SET visitas = (visitas + 1) WHERE id = :id ");
    $statement->execute($data);
}

function seccionPopular($baseDatos) {
    echo "<section>";
        $arrayAnun = selectPorPopularidad($baseDatos);
        for($j= 0; $j<count($arrayAnun); $j++){
            $posicion = fswitch($j);
        
            echo"<a href=\"anuncios.php?anun=$arrayAnun[$j]\"class=\"anuncio $posicion\">$arrayAnun[$j]</a>";
    
        }
    echo "<a class=\"titulo\">Productos populares</a></section>";
}