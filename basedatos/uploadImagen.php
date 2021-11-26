<?php
/*$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
if (!(strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png"))) {
    return "solo se admiten imagenes en formato .png o .jpg";
}else {*/

    $target_dir = "imagenes/subidas/";

    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $mensaje="";

    if (file_exists($target_file)) {
    $mensaje =  "La imagen ya existe. ";
    $uploadOk = 0;
    }

    $uploadOk == 0 ? $mensaje = $mensaje . "Lo sentimos, la imagen no ha sido subida." : $mensaje = subirFichero($target_file,$mensaje);

    function subirFichero($target_file,$mensaje){
        if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)){
            $mensaje = "El fichero '". htmlspecialchars( basename( $_FILES["imagen"]["name"])). "' ha sido subido."; 
        }else{
            $mensaje = "Lo sentimos, ha habido un error al subir el archivo";
        }
        return $mensaje;
    }

    echo $mensaje;
//}
?>


