<?php require"parts/header.php"?>
<?php require"basedatos/conexionBD.php"?>
<?php require"basedatos/recientes.php"?>
<?php require"parts/aside.php"?>
<script src="./javascript/sweetalert2.all.js"  ></script>
    <div id="contenedor">
        <?php
            $anun =$_GET["anun"];
            anadirReciente($anun);
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

            <div id="imagen"><img src="<?=$datos['imagen']?>" alt="imagen"></div>
            <div class="datos">
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
                            document.getElementById("anadirFav").style.backgroundColor="blue";
                        else
                            document.getElementById("anadirFav").style.backgroundColor="red";
                    }
                    
                    function favError(){
                        alert("faverror");
                    }
                 
                    $('#anadirFav').click(function(){
                        alert($("#nombreAnun").text());
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
                        <li>
                            Categoria: <?=$datos['categoria']?>
                        </li>
                        <li>
                            Comerciante: <?=$datos['comerciante']?>
                        </li>
                        <li>
                            Localizacion: <?=$datos['localizacion']?>
                        </li> 
                    </ul>
                </div>
                <div class="datosanun" id="proveedor">
                    <ul>
                        <li>
                            Empresa: <?=$datos2['nomEmpresa']?>
                        </li>
                        <li>
                            Telefono: <?=$datos2['telefono']?>
                        </li>
                        <li>
                            Cod Postal: <?=$datos2['codPostal']?>
                        </li> 
                        <li>
                            Email: <?=$datos2['email']?>
                        </li> 
                    </ul>
                </div>
                <div id="descripcion">
                    <p>
                    <?=$datos['descripcion']?>        
                </p>
                </div>
            </div>
        </section>
        
        <section>
            <a href="categorias.php?cat=<?=$datos['categoria']?>" class="titulo"> <?=$datos['categoria']?></a>
            <?php
                generarDatos3($baseDatos,$datos['categoria']);                 
            ?>
        </section>
    </div>

<?php require"parts/footer.php"?>