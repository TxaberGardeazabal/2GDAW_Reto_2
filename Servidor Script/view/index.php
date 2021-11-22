<?php require"parts/header.php"?>
<?php require"basedatos/conexionBD.php"?>
<?php require"basedatos/recientes.php"?>

<?php require"parts/aside.php"?>
    
        <div id="contenedor">

            <?php
                if(isset($_COOKIE['recientes'])){
                    echo "<section>";
                    echo "<a class=\"titulo\"> Recientes</a>";
                    $arrayRecientes= explode(",",$_COOKIE['recientes']);
                    for($i= 0; $i<count($arrayRecientes)&& $i<5; $i++){
                        $posicion = fswitch($i);
                        echo"<a href=\"anuncios.php?anun=$arrayRecientes[$i]\"class=\"anuncio $posicion\">$arrayRecientes[$i]</a>";
                    }
                    echo "</section>";
                    
                }



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