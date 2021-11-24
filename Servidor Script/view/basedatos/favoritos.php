<?php require"conexionBD.php"?>
<?php
    session_start();

    $usuarioNombre =$_SESSION['usuario'];
    $nombreAnuncio = $_POST['nombreAnuncio'];
    $cargar = $_POST['cargar'];
    
    function idAnuncio($baseDatos,$nombreAnuncio){
    $statement = $baseDatos->query("SELECT id FROM anuncios WHERE nombre = '$nombreAnuncio'");
    while($row = $statement->fetch()){
        $idAnuncio= $row["id"];
        return $idAnuncio;
        } 
    }

    function idUsuario($baseDatos,$usuarioNombre){
        $statement = $baseDatos->query("SELECT id FROM usuarios WHERE nomUsuario = '$usuarioNombre'");
        while($row = $statement->fetch()){
            $idUsuario= $row["id"];
            return $idUsuario;
        } 
    }

    function insertFavorito($baseDatos,$idUsuario,$idAnuncio){
        if(esComprador($baseDatos,$idUsuario)){
            if(selectDestacados($baseDatos,$idUsuario,$idAnuncio)){
                $statement = $baseDatos->query("DELETE FROM destacados WHERE idcli = \"$idUsuario\" and idAnun = \"$idAnuncio\"");
                $mensaje = 1;
                return $mensaje;
            }
            else{
                $statement = $baseDatos->query("INSERT INTO destacados VALUES('$idUsuario','$idAnuncio')");
                $mensaje = 0;
                return $mensaje;
            }
        }
    }

    
    $idAnuncio= idAnuncio($baseDatos,$nombreAnuncio);
    $idUsuario= idUsuario($baseDatos,$usuarioNombre);

    if($cargar == "true")
        if(selectDestacados($baseDatos,$idUsuario,$idAnuncio)){
            $mensaje = 0;
        }
        else{
            $mensaje = 1;
        }   
    else{
        $mensaje = insertFavorito($baseDatos,$idUsuario,$idAnuncio);
    }
    
    echo $mensaje;
?>