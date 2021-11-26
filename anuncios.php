<?php require"parts/header.php"?>
<?php require"basedatos/conexionBD.php"?>
<?php require"parts/aside.php"?>
<link rel="stylesheet" href="./css/anuncio.css">
<link rel="stylesheet" href="./css/bootstrap.min.css">
<script src="./javascript/bootstrap.bundle.min.js"></script>

    <div id="contenedor">
        <?php 
            $cat =$_GET["cat"];
            $anun =$_GET["anun"];
        ?>
        <section class="anuncio">
            <?php 
                function idUsuario($baseDatos,$usuarioNombre){
                    $statement = $baseDatos->query("SELECT id FROM usuarios WHERE nomUsuario = '$usuarioNombre'");
                    while($row = $statement->fetch()){
                        $idUsuario= $row["id"];
                        return $idUsuario;
                    } 
                }
                session_start();
                $nombreUsuario =$_SESSION["usuario"];
                $idUsuario = idUsuario($baseDatos,$nombreUsuario);
                echo "<h2 id=\"nombreAnun\">$anun</h2>";
                $datos = selectCompleja2($baseDatos,"anuncios","*","nombre",$anun);
                $datos2 = selectCompleja3($baseDatos,"comerciantes","*","id",$datos['comerciante']);
                $usuarioNombre =$_SESSION['usuario'];
            ?>

            <div id="imagen"><img src='<?=$datos['imagen']?>' alt="imagen"></div>
            <div class="datos">
                <button id="comprar" class="btn btn-outline-dark" style="width: 13em;">Añadir a carrito <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                </svg></button>
                 <?php
                 if (isset($usuarioNombre)&& esComprador($baseDatos,$idUsuario)){
                    echo "<button id=\"anadirFav\">favorito</button>" ;
                }
                
                ?>
                
                <script>
                    $(document).ready(function(){
                        $.ajax({    
                            type: "POST",
                            url: "basedatos/favoritos.php",             
                            dataType: "text", 
                            data: {nombreAnuncio:$("#nombreAnun").text(), cargar:true},         
                            statusCode: {500:() => favError()},
                            success: respuesta => respuesta.length > 0 ? favSuccess(respuesta) : alert("error"),
                            error: (jqXHR, textStatus, errorThrown) =>alert("errorR")
                        });
                    });
                    function favSuccess(respuesta){
                        console.log(respuesta);

                        if(respuesta ==0)
                            document.getElementById("anadirFav").style.backgroundColor="#85c98f";
                        else
                            document.getElementById("anadirFav").style.backgroundColor="red";
                    }
                    
                    function favError(){
                        alert("faverror");
                    }
                 
                    $('#anadirFav').click(function(){
                      
                        $.ajax({    
                            type: "POST",
                            url: "basedatos/favoritos.php",             
                            dataType: "text", 
                            data: {nombreAnuncio:$("#nombreAnun").text(), cargar:false},         
                            statusCode: {500:() => favError()},
                            success: respuesta => respuesta.length > 0 ? favSuccess(respuesta) : alert("error"),
                            error: (jqXHR, textStatus, errorThrown) =>alert("errorR")
                        });
                    });
                
                </script>
              
                <p><b>Precio:</b><?=$datos['precio']?></p>
                
                <div class="datosanun" id="producto">
                    <ul>
                        <li>Categoria: <?=$datos['categoria']?></li>
                        <li>Comerciante: <?=$datos['comerciante']?></li>
                        <li>Localizacion: <?=$datos['localizacion']?></li> 
                    </ul>
                </div>
                <div class="datosanun" id="proveedor">
                    <ul>
                        <li>Empresa: <?=$datos2['nomEmpresa']?></li>
                        <li>Telefono: <?=$datos2['telefono']?></li>
                        <li>Cod Postal: <?=$datos2['codPostal']?></li> 
                        <li>Email: <?=$datos2['email']?></li> 
                    </ul>
                </div>
                <div id="descripcion">
                    <p><?=$datos['descripcion']?></p>
                </div>
            </div>
        </section>
        <section>
            <h3 class="titulo">Relacionados</h3>
            <?php 
            $cat = selectCat($baseDatos,$anun);
            
            generarDatos3($baseDatos,$cat[0]);
            ?>
        </section>
    </div>

    <script>
        $(document).ready(function(){
            $("#comprar").click(function(){
                document.cookie="producto='<?=$_GET["anun"]."'-" . $_COOKIE["producto"] ?>";
                console.log(getCookies());
                Swal.fire(
                    'Añadido',
                    "Producto añadido correctamente al carrito",
                    'success'
                )
            });
        })

        function getCookies() {
            var cookies = document.cookie.split(';');
            var ret = '';
            for (var i = 1; i <= cookies.length; i++) {
                ret += cookies[i - 1].slice(9,cookies[i-1].length) + " ";
            }
            return ret;
        }
    </script>

<?php require"parts/footer.php"?>
