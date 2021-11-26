<?php require"parts/header.php"?>
<script type="text/javascript" src="./javascript/sweetalert2.all.js"></script>
<link rel="stylesheet" href="./css/sweetalert2.css">
<script src="./javascript/jquery-3.6.0.min.js"></script>
<script src="./javascript/controlador.js"></script>
    <main>
        <div id="bDecor">
            <button id="anun" onclick="mostrarAdminAnuncios()">Consultar</button>
            <button id="form" onclick="mostrarFormAnuncio()">A&ntilde;adir</button>
        </div>
        <div id="div_anuncios" style="<?php  /* aqui hay que añadir la propiedad grid-template-rows, 
        el contenido es '2em repeat(cantidadDeAnuncios/(2,), 1fr)' */?>">
            <h3>Tus anuncios:</h3>
            <div class="container_anuncio">
                <section class="div_anuncio">
                    <h3>Titulo del anuncio</h3>
                    <div class="imagen"><img src="" alt="imagen"></div>
                    <div class="datos">
                        <ul>
                            <li>Precio:</li>
                            <li>REF: </li>
                            <li>Localizacion:</li>
                            <li>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate suscipit earum repudiandae 
                            rem facere reprehenderit alias dolor repellendus autem, ex animi, expedita ipsam velit nulla fuga obcaecati perferendis numquam.</li>
                        </ul>
                    </div>
                </section>
                <div class="div_boton">
                    <button onclick="verAnuncio('asd')">Ver en la web</button>
                    <button onclick="borrarAnuncio('asd')">Eliminar</button>
                </div>
            </div>
            <div class="container_anuncio">
                <section class="div_anuncio">
                    <h3>Titulo del anuncio</h3>
                    <div class="imagen"><img src="" alt="imagen"></div>
                    <div class="datos">
                        <ul>
                            <li>Precio:</li>
                            <li>REF: </li>
                            <li>Localizacion:</li>
                            <li>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate suscipit earum repudiandae 
                            rem facere reprehenderit alias dolor repellendus autem, ex animi, expedita ipsam velit nulla fuga obcaecati perferendis numquam.</li>
                        </ul>
                    </div>
                </section>
                <div class="div_boton">
                    <button onclick="">Ver en la web</button>
                    <button onclick="">Eliminar</button>
                </div>
            </div>
            <div class="container_anuncio">
                <section class="div_anuncio" >
                    <h3>Titulo del anuncio</h3>
                    <div class="imagen"><img src="" alt="imagen"></div>
                    <div class="datos">
                        <ul>
                            <li>Precio:</li>
                            <li>REF: </li>
                            <li>Localizacion:</li>
                            <li>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            Sed voluptate suscipit earum repudiandae rem facere reprehenderit alias dolor repellendus autem, ex animi, expedita ipsam velit nulla fuga obcaecati perferendis numquam.</li>
                        </ul>
                    </div>
                </section>
                <div class="div_boton">
                    <button onclick="">Ver en la web</button>
                    <button onclick="">Eliminar</button>
                </div>
            </div>
        </div>
        <div id="div_formulario">
            <h2>Nuevo anuncio</h2>
            <form id="formulario" method="POST" enctype="multipart/form-data">
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
                <label for="cat">Categoria:</label>
                <select id="categorias">
                    <script>
                        $.ajax({    
                            type: "POST",
                            url: "./basedatos/selectCategorias.php",             
                            dataType: "json",         
                            statusCode: {500:() => serverError()},
                            success: function(respuesta){
                                for(var p in respuesta){
                                    //console.log("Cat: " + respuesta[p][0] +"  ||  supercat:" +respuesta[p][1]);                               
                                    var nuevoOption=document.createElement("option");
                                    var texto=document.createTextNode(respuesta[p][0]);
                                    nuevoOption.appendChild(texto);
                                    var padre=document.getElementById("categorias");
                                    padre.appendChild(nuevoOption);
                                }
                            },
                            error: (jqXHR, textStatus, errorThrown) => console.log("error")
                        });
                    </script>
                </select>
                <label for="desc">Descripcion:</label>
                <textarea name="descripcion" id="desc" cols="30" rows="10"></textarea>
                <div>
                    <input type="reset" value="Borrar">
                    <input id="enviar" type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </main>
    <script>
        $("#formulario").submit((e) => e.preventDefault());
        $("#formulario").submit(function(){
            var formData = new FormData($(this)[0]);
            const titulo = $("#tit").val();
            const localizacion = $("#loc").val();
            const precio = $("#pre").val();
            const categoria = $("#categorias").val();
            const descripcion = $("#desc").val();
            const imagen = $("#img").val();
            const extensionImagen=  imagen.split('.')[1];
            const urlImagen = imagen.substr(imagen.lastIndexOf('\\') + 1).split('.')[0] + "." + extensionImagen;
            if(!titulo || !localizacion || !precio || !categoria || !descripcion){
                Swal.fire({
                    icon: 'error',
                    text: 'Rellena todos los campos',
                }); 
            }else{
                $.ajax({    
                    type: "POST",
                    dataType: "text",
                    data: formData,
                    url: "./basedatos/uploadImagen.php",             
                    success: function (respuesta){
                        if(respuesta=="La imagen ya existe. Lo sentimos, la imagen no ha sido subida." || respuesta=="Lo sentimos, ha habido un error al subir el archivo"){
                            Swal.fire({
                                icon: 'error',
                                title:"Error",
                                text: respuesta,
                            });
                        }else{
                            $.ajax({    
                                type: "POST",
                                url: "./basedatos/insertAnuncio.php",             
                                dataType: "text", 
                                data: {titulo:titulo,localizacion:localizacion,precio:precio,categoria:categoria,descripcion:descripcion,imagen:urlImagen},        
                                statusCode: {500:() => serverError()},
                                success: function(respuesta){
                                    if(respuesta.length>0){
                                        Swal.fire(
                                            'Publicacion Correcta',
                                            respuesta,
                                            'success'
                                        ); 
                                    }else{
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Publicacion Fallida',
                                            text: 'El anuncio no ha podido publicarse correctamente',
                                        });
                                    }
                                },
                                error: (jqXHR, textStatus, errorThrown) => ajaxError(textStatus,errorThrown)
                            });                                                                                                  
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false  
                });
            }
        });
    </script>
    <?php require "parts/footer.php";?>
</body>
</html>