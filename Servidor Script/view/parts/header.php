<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/iconos/favicon.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/anuncio.css">
    <link rel="stylesheet" href="css/busqueda.css">
    <link rel="stylesheet" href="css/categorias.css">
    <link rel="stylesheet" href="css/anunciantes.css">
    <script type="text/javascript" src="./javascript/login.js"></script>
    <title>Reto_2</title>
    <script src="javascript/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>

        <h1><a href="index.php">Titulo</a></h1>
        <nav>
            
            <form id="busqueda" action="busqueda.php" method="GET">
                <input type="text" id="buscador" name="buscador">
                <input type="submit" id="botonbuscar" value="B" disabled>
            </form>
            <script>
                $("#buscador").blur(function (){
                    
                    if ($("#buscador").val() != "") {
                        $("#botonbuscar").removeAttr("disabled");
                        
                    }
                    else {
                        $("#botonbuscar").attr("disabled","");
                    }
                });
            </script>

            <?php
                session_start();
                $usuarioNombre =$_SESSION['usuario'];
                if(isset($usuarioNombre)){
                    echo "<a href=\"logout.php\">$usuarioNombre</a>";
                }
            ?>
            
                </script>
            <a href="login.html"><button id="inicioSesion"></button></a>

        </nav>
    </header>
    <div id="todo">
        