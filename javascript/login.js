
function loginSuccess(){
    Swal.fire(
        'Login Correcto',
        "Sesion iniciada correctamente",
        'success'
    ).then(function() {
        window.location.replace("index.php");
    });
}

function loginError(){ //USUARIO O CONTRASEÑA INCORRECTO
    Swal.fire({
        icon: 'error',
        title: 'Login Incorrecto',
        text: 'El usuario o contraseña no son correctos',
    });
}

function serverError(){ //ERROR 500
    Swal.fire({
        icon: 'error',
        title: 'Internal Server Error',
        text: 'El servidor ha devuelto un codigo de error 500',
    });
}

function ajaxError(jqXHR, textStatus, errorThrown){ //RESTO DE ERRORES
    Swal.fire({
        icon: 'error',
        title: textStatus,
        text: errorThrown,
    });
}

function registroSuccess(){
    Swal.fire(
        'Registro Correcto',
        "El usuario ha sido registrado de forma correcta",
        'success'
    ); 
}

function registroError(){
    Swal.fire({
        icon: 'error',
        title: 'Registro Fallido',
        text: 'No ha podido registrarse el nuevo usuario',
    }); 
}

