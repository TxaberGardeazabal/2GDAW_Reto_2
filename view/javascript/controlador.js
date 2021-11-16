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
