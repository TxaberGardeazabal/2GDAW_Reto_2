function anuncioRegSuccess(){
    Swal.fire(
        'Publicacion Correcta',
        "El anuncio ha sido publicado de forma satisfactoria",
        'success'
    ); 
}

function registroError(){
    Swal.fire({
        icon: 'error',
        title: 'Publicacion Fallida',
        text: 'El anuncio no ha podido publicarse correctamente',
    }); 
}