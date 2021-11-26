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
    $("#div_anuncios").css("display","flex");
    $("#div_formulario").css("display","none");

    // el boton se muestra seleccionado y no hace nada mas
    $("#bDecor :first-child").css("background-color","#cfe1d5");
    $("#bDecor :first-child").css("z-index","2");

    $("#bDecor :last-child").css("background-color","#bedec9");
    $("#bDecor :last-child").css("z-index","1");
}

function mostrarFormAnuncio() {
    $("#div_anuncios").css("display","none");
    $("#div_formulario").css("display","block");

    // el boton se muestra seleccionado y no hace nada mas
    $("#bDecor :first-child").css("background-color","#bedec9");
    $("#bDecor :first-child").css("z-index","1");

    $("#bDecor :last-child").css("background-color","#cfe1d5");
    $("#bDecor :last-child").css("z-index","2");
}

function verAnuncio(id) {
    // aqui el link al anuncio
    window.open("anuncios.php?anun="+id);
}

function borrarAnuncio(id) {
    // aqui el id del anuncio
    var opt = confirm("estas seguro de querer borrar el anuncio de forma permanente?");
    if (opt) {
        // borrar
        $.ajax({    
            type: "POST",
            url: "./basedatos/borrarAnuncio.php",             
            dataType: "text", 
            data: {id:id},        
            success: function() {
                alert("anuncio borrado");
                location.reload();
            },
            error: function() {alert("hubo un error a la hora de enviar datos")}
        });
    }
        // no borrar
}

function siACookies() {
    sessionStorage.cookieEnabled = true;
    $("#cookies").css("display","none");
}

if ($("#cookies") != "") {
    if (sessionStorage.cookieEnabled) {
        $("#cookies").css("display","none");
    }
}