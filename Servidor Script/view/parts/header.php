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
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./javascript/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="./javascript/login.js"></script>
    <title>Reto_2</title>
    <script src="javascript/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <div id="logo"><a href="index.php"><img src="imagenes/iconos/comerciados.png"></a></div>
        <h1><a href="index.php">ComerciaDos</a></h1>
        <nav>
            
            <form id="busqueda" action="busqueda.php" method="GET">
                <div class="input-group">
                    <input  type="search" class="form-control rounded" placeholder="Buscar producto" aria-label="Search"
                    aria-describedby="search-addon" name="buscador"/>
                    <button id="botonbuscar" type="submit" class="btn btn-outline-darks">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    </button>
                </div>
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
                    echo "<button id=\"sesion\" type=\"button\" style=\"width:9em;margin:0\"class=\"btn btn-outline-dark\">$usuarioNombre
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"22\" height=\"22\" fill=\"currentColor\" class=\"bi bi-person-x\" viewBox=\"0 0 16 16\">
  <path d=\"M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z\"/>
  <path fill-rule=\"evenodd\" d=\"M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z\"/>
</svg>
            </button>";
                }
            ?>   
            
            <button id="perfil" type="button" style="width:9em;margin:0 2%"class="btn btn-outline-dark">Perfil
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
            </button>
            
            <button id="carrito" type="button" style="width:9em"class="btn btn-outline-dark">Carrito
            <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 2%;" width="22" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            </button>
            
            <script>
                $("#carrito").click(function(){
                    window.location.replace("compra.html");
                });
                $('#perfil').click(function(){
                    window.location.replace("login.html");
                });
                $('#sesion').click(function(){
                    window.location.replace("logout.php");
});
            </script>
            </div>
        </nav>

    </header>
    <div id="todo">
        
