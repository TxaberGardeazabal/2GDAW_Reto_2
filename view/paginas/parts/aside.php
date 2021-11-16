<button id="botonmenu" onclick="mostrarMenu()">M</button>
<aside>

    <button id="botonCerrarMenu" onclick="ocultarMenu()">x</button>
    <?php
                $arraySupCat = select($baseDatos,"supercategorias","superclase");
                for($i= 0; $i<count($arraySupCat) ; $i++){
                    ?>
                     <div class="menu">
                    <h2 class="tituloMenu"><?= $arraySupCat[$i] ?></h2>   
                    <?php
                        generarBotonesDatos($baseDatos,$arraySupCat,$i);
                        ?>
                            </div>
                        <?php
                }   
            ?>  
</aside>