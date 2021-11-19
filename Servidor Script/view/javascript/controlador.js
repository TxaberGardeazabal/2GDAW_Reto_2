/*function setLinksAside() {
    $(".menu .opcion").each(function (id,val) {
        //console.log(val);
        $(val).attr("onclick","algo");
    });
}

function link() {
    $(".menu").each(function (id,val) {
        $(val).html('<a class="opcion">Opcion1</a>');
    })
}

//setLinksAside();
//link();
*/

function mostrarMenu() {
    $("aside").css("display","block");
    $("#botonCerrarMenu").css("display","block");
    $("#contenedor").css("display","none");
    //console.log("todo va");
}

function ocultarMenu() {
    $("aside").css("display","");
    $("#botonCerrarMenu").css("display","");
    $("#contenedor").css("display","");
    //console.log("todo va");
}

function mostrarAdminAnuncios() {
    // por web responsive
    if (window.innerWidth < 700) {
        $("#div_anuncios").css("display","flex");
    }
    else {
        $("#div_anuncios").css("display","grid");
    }
    $("#div_formulario").css("display","none");

    // el boton se muestra seleccionado y no hace nada mas
    $("#bDecor :first-child").css("background-color","#7ccc00");
    $("#bDecor :first-child").css("z-index","2");

    $("#bDecor :last-child").css("background-color","lawngreen");
    $("#bDecor :last-child").css("z-index","1");
}

function mostrarFormAnuncio() {
    $("#div_anuncios").css("display","none");
    $("#div_formulario").css("display","block");

    // el boton se muestra seleccionado y no hace nada mas
    $("#bDecor :first-child").css("background-color","lawngreen");
    $("#bDecor :first-child").css("z-index","1");

    $("#bDecor :last-child").css("background-color","#7ccc00");
    $("#bDecor :last-child").css("z-index","2");
}

function verAnuncio(asd) {
    // aqui el link al anuncio
    window.open("index.php");
}

function borrarAnuncio(asd) {
    // aqui el id del anuncio
    var opt = confirm("estas seguro de querer borrar el anuncio de forma permanente?");
    if (opt) {
        // borrar
    }
        // no borrar
}
