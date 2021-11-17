<?php require"parts/header.php"?>
<?php require"basedatos/conexionBD.php"?>
<?php require"parts/aside.php"?>
    
        <div id="contenedor">

            <?php
                
                $arrayCat = select($baseDatos,"categorias","clase");
                $publicidad = array('anuncio');
                array_splice($arrayCat,2, 0, $publicidad);
                array_splice($arrayCat,5, 0, $publicidad);
                array_splice($arrayCat,8, 0, $publicidad);
                array_splice($arrayCat,11, 0, $publicidad);
                array_splice($arrayCat,14, 0, $publicidad);
                for($i= 0; $i<count($arrayCat) ; $i++){
                    
                if($arrayCat[$i+1]=="anuncio"){
                    echo "<section class=\"plus\">";
                    echo "<a href=\"categorias.php?cat=$arrayCat[$i]\" class=\"titulo\"> $arrayCat[$i]</a>";
                    generarDatos($baseDatos,$arrayCat,$i); 
                    ?> 
                        <button class="siete"><img src="imagenes/iconos/triangulo.png" alt="imagen"></button>
                    <?php
                         
                
                    
                    $i++;
                }
                else{
                    
                    echo "<section>"  ; 
                    generarDatos($baseDatos,$arrayCat,$i); 
                   
            
               echo "<a href=\"categorias.php?cat=$arrayCat[$i]\" class=\"titulo\"> $arrayCat[$i]</a>";
               ?>   
                
                   

           
            <?php
                }
                echo "</section>";
            }
            ?>  

        </div>

<?php require"parts/footer.php"?>