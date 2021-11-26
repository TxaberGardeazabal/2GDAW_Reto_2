<?php require"parts/header.php"?>
<?php require"basedatos/conexionBD.php"?>
<?php require"basedatos/recientes.php"?>

<?php require"parts/aside.php"?>
    
        <div id="contenedor">

            <?php
                session_start();
                if(isset($_SESSION['recientes'])){
                    echo "<section>";
                    echo "<a class=\"titulo\"> Recientes</a>";
                    $arrayRecientes= explode(",",$_SESSION['recientes']);
                    for($i= 0; $i<count($arrayRecientes)&& $i<5; $i++){
                        $posicion = fswitch($i);
                        echo"<a href=\"anuncios.php?anun=$arrayRecientes[$i]\"class=\"anuncio $posicion\">$arrayRecientes[$i]</a>";
                  }
                    echo "</section>";
                    
                }
                

                
                if(isset($_SESSION['usuario'])){
                    $user = $_SESSION['usuario'];
                    seccionFavoritos($baseDatos,$user);
                }

                seccionPopular($baseDatos);

                $arrayCat = select($baseDatos,"categorias","clase");
                $publicidad = array('anuncio');
                array_splice($arrayCat,1, 0, $publicidad);
                array_splice($arrayCat,4, 0, $publicidad);
                array_splice($arrayCat,7, 0, $publicidad);
                array_splice($arrayCat,10, 0, $publicidad);
                array_splice($arrayCat,13, 0, $publicidad);
                for($i= 0; $i<count($arrayCat) ; $i++){
                    
                if($arrayCat[$i+1]=="anuncio"){
                    echo "<section class=\"plus\">";
                    generarDatos($baseDatos,$arrayCat,$i); 
                
                    echo "<a href=\"categorias.php?cat=$arrayCat[$i]\" class=\"titulo\"> $arrayCat[$i]</a>";
                    
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
