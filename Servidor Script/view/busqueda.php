<?php require"parts/header.php"?>
<?php require"basedatos/conexionBD.php"?>
<?php require"parts/aside.php"?>

<div id="contenedor">
    <h2 style="color: wheat;">Categorias</h2>
    <div id=categoriasbusqueda>
        <?php
            
            $arrayBusqueda = selectComplejisima($baseDatos,"categorias","clase","clase",$_GET["buscador"]);
            
            for($i= 0; $i<count($arrayBusqueda) ; $i++){
            
             echo "<a href=\"categorias.php?cat=$arrayBusqueda[$i]\" class=\"busqueda categoria\">$arrayBusqueda[$i]</a>";
      
            }
        ?>
    </div>  
    <h2 style="color: wheat;">Anuncios</h2>
    <div id="anunciosbusqueda" >
        <?php
            
            $arrayBusqueda = selectComplejisima($baseDatos,"anuncios","nombre","nombre",$_GET["buscador"]);
            for($i= 0; $i<count($arrayBusqueda) ; $i++){
                echo "<a href=\"anuncios.php?anun=$arrayBusqueda[$i]\" class=\"busqueda anuncio anunciob\">$arrayBusqueda[$i]</a>";
            }
        ?>  
    </div>
    <h2 style="color: wheat;">Relacionados</h2>
    <div id="anunciosbusqueda" >
        <?php
            $arrayBusqueda= selectComplejisima($baseDatos,"anuncios","nombre","categoria",$_GET["buscador"]);
            for($i= 0; $i<count($arrayBusqueda) ; $i++){
            echo "<a href=\"anuncios.php?anun=$arrayBusqueda[$i]\" class=\"busqueda anuncio relacionadob\">$arrayBusqueda[$i]</a>";
        } 
        ?>
    </div>

</div> 
<?php require"parts/footer.php"?>