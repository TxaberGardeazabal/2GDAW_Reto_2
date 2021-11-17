<?php require"parts/header.php"?>
<?php require"basedatos/conexionBD.php"?>
<?php require"parts/aside.php"?>

    <div id="contenedor">
        <?php 
            $cat =$_GET["cat"];
            $anun =$_GET["anun"];
        ?>
        <section class="anuncio">
            <?php 
                echo "<h2>$anun</h2>";
                $datos = selectCompleja2($baseDatos,"anuncios","*","nombre",$anun);
                $datos2 = selectCompleja3($baseDatos,"comerciantes","*","id",$datos['comerciante']);
            ?>

            <div id="imagen"><img src="<?=$datos['imagen']?>" alt="imagen"></div>
            <div class="datos">
                <button>favorito</button>
              
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
            <h3 class="titulo">1</h3>
            <div class="anuncio primero" >2</div>
            <div class="anuncio segundo">3</div>
            <div class="anuncio tercero">3.5</div>
            <div class="anuncio cuarto">3.75</div>
            <div class="anuncio quinto">3.875</div>
        </section>
    </div>

<?php require"parts/footer.php"?>