<?php
    function selectAnunciosDelUsuario($baseDatos)
    {
        $query = $baseDatos->prepare("SELECT * FROM anuncios WHERE comerciante = (SELECT id FROM usuarios WHERE nomUsuario = :nombre);");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = ["nombre" => $_SESSION["usuario"]];
        $query->execute($data); // $_SESSION["usuario"]

        $ret = array();
        while ($reg = $query->fetch()) {
            array_push($ret,$reg);
        }
        
        return $ret;
    }

    function selectContacto($baseDatos) {
        $query = $baseDatos->prepare("SELECT nomEmpresa, telefono FROM comerciantes WHERE id = (SELECT id FROM usuarios WHERE nomUsuario = :nombre);");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = ["nombre" => $_SESSION["usuario"]];
        $query->execute($data); // $_SESSION["usuario"]
        
        $res = $query->fetch();
        $nombre = $res["nomEmpresa"];
        $telefono = $res["telefono"];
        return $res;
    }
?>