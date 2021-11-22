<?php require"parts/header.php"?>
<?php require"basedatos/conexionBD.php"?>
<?php require"basedatos/selectAnuncios.php"?>
<script>
    document.cookie = "anchuraPantalla="+window.innerWidth+";";
</script>
    <main>
        <div id="bDecor">
            <button id="anun" onclick="mostrarAdminAnuncios()">Consultar</button>
            <button id="form" onclick="mostrarFormAnuncio()">A&ntilde;adir</button>
        </div>
        <div id="div_anuncios" style="<?php  /* aqui hay que añadir la propiedad grid-template-rows, 
        el contenido es '2em repeat(cantidadDeAnuncios/(2,4), 1fr)' */
        define("LIMITE",20); // limite de cantidad de anuncios

        $refs = selectContacto($baseDatos);
        $listaAnun = selectAnunciosDelUsuario($baseDatos);

        if ($_COOKIE["anchuraPantalla"] > 1500) {
            if (count($listaAnun) > LIMITE) {
                echo "grid-template-rows: 2em repeat(".(LIMITE/4).", 1fr)";
            }
            else {
                echo "grid-template-rows: 2em repeat(".round(count($listaAnun)/4).", 1fr)";
            }
        }
        elseif ($_COOKIE["anchuraPantalla"] > 700) {
            if (count($listaAnun) > LIMITE) {
                echo "grid-template-rows: 2em repeat(".(LIMITE/2).", 1fr)";
            }
            else {
                echo "grid-template-rows: 2em repeat(".round(count($listaAnun)/2).", 1fr)";
            }
        }
        else {
            // nada
        }

        ?>">

            <h3>Tus anuncios:</h3>
            <?php 
            //echo $listaAnun[0]["nombre"];
            if (count($listaAnun) === 0) {
                echo "aun no hay anuncios";
            }
            else {

                foreach ($listaAnun as $cont => $anun) {
                    if ($cont > 19) {
                        break;
                    }
                    $html = '<div class="container_anuncio"><section class="div_anuncio">'.
                    '<h3>'.$anun["nombre"].'</h3>'.
                    '<div class="imagen"><img src="url('.$anun["imagen"].')" alt="imagen"></div>'.
                    '<div class="datos">'.
                    '<ul><li>Precio: '.$anun["precio"].'&euro;</li><li>REF: '.$refs["nomEmpresa"].'</li><li>Localizacion: '.$anun["localizacion"].'</li><li>Descripcion: '.$anun["descripcion"].'</li></ul>'.
                    '</div></section><div class="div_boton"><button onclick="verAnuncio(\''.$anun["id"].'\')">Ver en la web</button><button onclick="borrarAnuncio(\''.$anun["id"].'\')">Eliminar</button></div></div>';
                    echo $html;
                }
            }
            ?>
            <!-- ejemplo de anuncio

            <div class="container_anuncio">
                <section class="div_anuncio">
                    <h3>Titulo del anuncio</h3>
                    <div class="imagen"><img src="" alt="imagen"></div>
                    <div class="datos">
                        <ul>
                            <li>
                                Precio:
                            </li>
                            <li>
                                REF: 
                            </li>
                            <li>
                                Localizacion:
                            </li>
                            <li>
                                Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate suscipit earum repudiandae rem facere reprehenderit alias dolor repellendus autem, ex animi, expedita ipsam velit nulla fuga obcaecati perferendis numquam.
                            </li>
                        </ul>
                    </div>
                </section>
                <div class="div_boton">
                    <button onclick="verAnuncio('asd')">Ver en la web</button>
                    <button onclick="borrarAnuncio('asd')">Eliminar</button>
                </div>
            </div>-->
        </div>
        <div id="div_formulario">
            <h2>Nuevo anuncio</h2>
            <form method="POST" action="basedatos/conexionBD.php" enctype="multipart/form-data">
                <label for="tit">Titulo:</label>
                <input type="text" name="nombre" id="tit" maxlength="20">
                <label for="ref">Ref:</label>
                <input type="text" name="ref" id="ref" maxlength="20" disabled>
                <label for="emp">Empresa:</label>
                <input type="text" name="empresa" id="emp" maxlength="20" disabled>
                <label for="loc">Localizacion:</label>
                <input type="text" name="loc" id="loc" maxlength="20">
                <label for="pre">Precio:</label>
                <input type="text" name="precio" id="pre" placeholder="&euro;" maxlength="9">
                <label for="img">Imagen:</label>
                <input type="file" name="imagen" id="img">
                <label for="desc">Descripcion:</label>
                <textarea name="descripcion" id="desc" cols="30" rows="10"></textarea>
                <div>
                    <input type="reset" value="Borrar">
                    <input type="submit" name="asd" value="Enviar">
                </div>
            </form>
        </div>
    </main>
    <?php require "parts/footer.php";?>
</body>
</html>