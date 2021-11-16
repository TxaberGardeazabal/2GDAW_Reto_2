<?php require"parts/header.php"?>
<?php require"php/conexionBD.php"?>
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
                    generarDatos($baseDatos,$arrayCat,$i); 
                
                    echo "<a href=\"paginas/categorias.php?cat=$arrayCat[$i]\" class=\"titulo\"> $arrayCat[$i]</a>";
                    ?> 
                        <button class="siete"><img src="imagenes/iconos/triangulo.png" alt="imagen"></button>
                    <?php
                         
                
                    
                    $i++;
                }
                else{
                    
                    echo "<section>"  ; 
                    generarDatos($baseDatos,$arrayCat,$i); 
                   
            
               echo "<a href=\"paginas/categorias.php?cat=$arrayCat[$i]\" class=\"titulo\"> $arrayCat[$i]</a>";
               ?>   
                
                   

           
            <?php
                }
                echo "</section>";
            }
            ?>  

        </div>

<?php require"paginas/parts/footer.php"?>