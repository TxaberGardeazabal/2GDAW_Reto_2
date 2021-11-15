<?php require"parts/header.php"?>
<?php require"conexionBD.php"?>
<?php require"parts/aside.php"?>
    
        <div id="contenedor">

            <?php
                
                $arrayCat = select($baseDatos,"categorias","clase");
                $publicidad = array('anuncio');
                array_splice($arrayCat,2, 0, $publicidad);
                array_splice($arrayCat,5, 0, $publicidad);
                for($i= 0; $i<count($arrayCat) ; $i++){
                    
                if($arrayCat[$i+1]=="anuncio"){
                    echo "<section class=\"plus\">"; 
                    ?> 
                    <h3 class="titulo"><?= $arrayCat[$i] ?></h3>
                    
                    <?php
                        generarDatos($baseDatos,$arrayCat,$i);
                        
                    ?>
                        <button class="siete"><img src="imagenes/triangulo.png" alt="imagen"></button>
                    <?php
                        
                
                    echo "</section>";
                    $i++;
                }
                else{
                    echo "<section>"  ; 
                   
            ?>  
                <h3 class="titulo"><?= $arrayCat[$i] ?></h3>
                    
                    <?php
                       generarDatos($baseDatos,$arrayCat,$i);
                    ?>

                </section>
            <?php
                }
            }
            ?>  

        </div>

<?php require"parts/footer.php"?>