<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="anunciantes.css">
    <title>Reto_2</title>
</head>
<body>
    <header>
        <h1>Usuario</h1>
        
    </header>
    <main>
        <button>Consultar</button>
        <button>A&ntilde;adir</button>
        <div id="div_anuncios">
            <h3>Tus anuncios:</h3>

            <div class="container_anuncio">
                <section class="div_anuncio">
                    <h3>Titulo del anuncio</h3>
                    <div class="imagen"><img src="" alt="imagen"></div>
                    <div class="datos">
                        <ul>
                            <li>
                                Precio:
                            </li>
                            <li>
                                REF: 
                            </li>
                            <li>
                                Localizacion:
                            </li>
                            <li>
                                Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate suscipit earum repudiandae rem facere reprehenderit alias dolor repellendus autem, ex animi, expedita ipsam velit nulla fuga obcaecati perferendis numquam.
                            </li>
                        </ul>
                    </div>
                </section>
                <div class="div_boton">
                    <button>Ver en la web</button>
                    <button>Eliminar</button>
                </div>
            </div>

            <div class="container_anuncio">
                <section class="div_anuncio">
                    <h3>Titulo del anuncio</h3>
                    <div class="imagen"><img src="" alt="imagen"></div>
                    <div class="datos">
                        <ul>
                            <li>
                                Precio:
                            </li>
                            <li>
                                REF: 
                            </li>
                            <li>
                                Localizacion:
                            </li>
                            <li>
                                Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate suscipit earum repudiandae rem facere reprehenderit alias dolor repellendus autem, ex animi, expedita ipsam velit nulla fuga obcaecati perferendis numquam.
                            </li>
                        </ul>
                    </div>
                </section>
                <div class="div_boton">
                    <button>Ver en la web</button>
                    <button>Eliminar</button>
                </div>
            </div>
        </div>
        <div id="div_formulario">
            <h2>Nuevo anuncio</h2>
            <form action="">
                <label for="tit">Titulo:</label>
                <input type="text" name="nombre" id="tit">
                <label for="ref">Ref:</label>
                <input type="text" name="ref" id="ref">
                <label for="emp">Empresa:</label>
                <input type="text" name="empresa" id="emp">
                <label for="loc">Localizacion:</label>
                <input type="text" name="loc" id="loc">
                <label for="pre">Precio:</label>
                <input type="text" name="precio" id="pre" placeholder="&euro;">
                <label for="img">Imagen:</label>
                <input type="file" name="imagen" id="img">
                <label for="desc">Descripcion:</label>
                <textarea name="descripcion" id="desc" cols="30" rows="10"></textarea>
                <input type="reset" value="Borrar">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </main>
    <?php require "parts/footer.php";?>
</body>
</html>