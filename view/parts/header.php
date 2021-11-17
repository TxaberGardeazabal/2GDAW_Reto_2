<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/anuncio.css">

    <link rel="stylesheet" href="css/busqueda.css">
    <link rel="stylesheet" href="css/categorias.css">

    <link rel="stylesheet" href="css/anunciantes.css">

    <title>Reto_2</title>
    <script src="javascript/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>

        <h1><a href="index.php">Titulo</a></h1>
        <nav>
            
            <form id="busqueda" action="busqueda.php" method="GET">
                <input type="text" id="buscador" name="buscador">
                <input type="submit" id="botonbuscar" value="B">
            </form>
            <button id="inicioSesion" onclick="mostrarLogin()">i</button>
            <div id="div_Binicio">
                <a href="login.html">Iniciar sesion</a>
                <a href="login.html">Crear cuenta</a>
            </div>
        </nav>
    </header>
    <div id="todo">
        