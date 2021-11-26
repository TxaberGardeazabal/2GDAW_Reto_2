<?php require"parts/header.php"?>
<?php require"basedatos/conexionBD.php"?>
<?php require"parts/aside.php"?>

    <div id="contenedor" class="categorias">
    <?php 
    $titulo =$_GET["cat"];
    
    echo "<div class=\"anuncios\">"; 
    echo "<div class=\"titulocat\"><h2 style=\"color: wheat; text-align:center\" >$titulo</h2></div>";
    generarDatos2($baseDatos,$titulo);
    echo "</div>"; 
    ?>
    <?php 
    

?>

</div>
<?php require"parts/footer.php"?>