<?php require"parts/header.php"?>
<?php require"basedatos/conexionBD.php"?>
<?php require"parts/aside.php"?>
<div style="display: block !important;width:100%;background-color:white">

    <style>
    /*Animacion*/
    .loaderFullScr{
        width: 100%;
        height: 100vh;
        background: white;
        position: fixed;
        z-index: 1;
    }

    .loader {
        margin: 0 auto;
        width: 10em;
        height: 10em;
        text-align: center;
        font-size: 10px;
        position: absolute;
        top: 50%;
        left: 38%;
        transform: translateY(-50%) translateX(-50%);
    }
  
    .loader > div {
        height: 100%;
        width: 10%;
        display: inline-block;
        margin-left: 2px;
        -webkit-animation: delay 0.75s infinite ease-in-out;
        animation: delay 0.75s infinite ease-in-out;
     }
  
    .bar1{
        background-color: #2c4637 ;
    }
    .bar2{
        background-color: #29523a;
        -webkit-animation-delay: -0.7s;
        animation-delay: -0.7s;
    }
    .bar3{
        background-color: #39684d;
        -webkit-animation-delay: -0.6s;
        animation-delay: -0.6s;
    }
    .bar4{
        background-color: #488663;
        -webkit-animation-delay: -0.5s;
        animation-delay: -0.5s;
    }
    .bar5{
        background-color: #63a07d;
        -webkit-animation-delay: -0.4s;
        animation-delay: -0.4s;
    }
    .bar6{
        background-color: #7bbb97;;
        -webkit-animation-delay: -0.3s;
        animation-delay: -0.3s;
    }

    @-webkit-keyframes delay {
        0%, 40%, 100% { -webkit-transform: scaleY(0.05) }  
        20% { -webkit-transform: scaleY(1.0) }
    }

    @keyframes delay {
        0%, 40%, 100% { 
            transform: scaleY(0.05);
            -webkit-transform: scaleY(0.05);
        }  
        20% { 
            transform: scaleY(1.0);
            -webkit-transform: scaleY(1.0);
        }
    }
</style>

    <!--Animacion-->
    <div class="loaderFullScr">
        <div class="loader">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            <div class="bar4"></div>
            <div class="bar5"></div>
            <div class="bar6"></div>
        </div>
    </div>
    <script>
        $(window).on("load",function(){
            $('.loaderFullScr').fadeOut(10);
        });
    </script>

    <h2 id="titulo" style="padding: 2.5% 0;margin-left:2%"><b>Tu Carrito</b></h2>
    <table id="tablaResultado" style="width: 92%;">
        <thead>
          <tr style="color:gray">
            <td style="background-color: rgb(245, 245, 245);padding: 2% 0;width: 6%;"></td>
            <td style="background-color: rgb(245, 245, 245);padding: 2% 0;width: 10%;"></td>
            <td style="background-color: rgb(245, 245, 245);padding: 2% 0;width: 25%;"><b>PRODUCTO</b></td>
            <td style="padding: 2% 0;width: 6%;"></td>
            <td style="border-bottom: 0.7px solid rgb(211, 211, 211);margin: 2%;padding: 2% 0;width: 15%;"><b>PRECIO</b></td>
            <td style="border-bottom: 0.7px solid rgb(211, 211, 211);padding: 2% 0;width: 20%;"><b>CANTIDAD</b></td>
            <td style="border-bottom: 0.7px solid rgb(211, 211, 211);padding: 2% 0;width: 15%;"><b>TOTAL</b></td>
          </tr>
        </thead>
        <tbody id="tablaCompra">
            <script>
                $(document).ready(function(){
                    var allCookies=document.cookie
                    var comienzoCookieProductos=allCookies.search("producto=");
                    var finalcookieProductos=allCookies.indexOf(";");
                    if(finalcookieProductos==-1){
                        finalcookieProductos=document.cookie.length;
                    }
                    var carrito=[];
                    var productos=document.cookie.slice(comienzoCookieProductos+9,finalcookieProductos);
                    
                    productos=productos.substring(0,(productos.length-1));//Borro el ultimo "-" de la cookie producto
                    var productosSplit=productos.split("-");   
                    productosSplit.forEach(function(obj){//Obj es cada elemento seleccionado para la compra.
                        carrito.push(obj);
                    })
                   
                    console.log(carrito);
                    var precioFinal=0;
                    var precio;
                    var indice=0;
                    for(indice;indice<carrito.length;indice++){
                    
                        muestraElementosCarrito(indice)
                        function muestraElementosCarrito(indice){
                                $.ajax({    
                                type: "POST",
                                url: "./basedatos/selectAnuncio.php",             
                                dataType: "json", 
                                data:{nombreProducto:carrito[indice]},       
                                statusCode: {500:() => serverError()},
                                async:false,
                                success: function(respuesta){
                                    for(var p in respuesta){                      
                                        var nombre=respuesta[p][0];
                                        var imagen=respuesta[p][1];
                                        var descr=respuesta[p][2]
                                        precio=respuesta[p][3]
                                        precioFinal=precioFinal+parseFloat(precio);//Suma los precios de los elementos
                                        var fila = "<tr id='"+ (indice) +"'>" + "<td style='background-color: rgb(245, 245, 245);'></td><td style='background-color: rgb(245, 245, 245);padding: 2% 0;'><img class='img-fluid' style='width: 7rem'src='"+imagen+"'></td><td style='background-color: rgb(245, 245, 245);padding: 2% 0;'><b>" + nombre + "</b><br>" + descr + "</td>" + "<td></td>" +
                                        "<td style='padding: 2% 0;border-bottom: 0.7px solid rgb(211, 211, 211);'><b id='precio"+indice+"'>" + precio + " €</b></td>" + "<td style='padding: 2% 0;border-bottom: 0.7px solid rgb(211, 211, 211);'><input id='cantidad"+indice+"' class='cant' type='number' value='1' min='1' max='5'></td>" + "<td id='precioTotalProducto"+ indice+"' style='padding: 2% 0;border-bottom: 0.7px solid rgb(211, 211, 211);'><b> €</b>  <button id='delete" + indice + "' type='button' class='btn btn-outline-danger'>Eliminar</button>" + "</td>" + "</tr>"
                                        $(fila).appendTo("#tablaCompra");
                                        var precioFinalProduc=document.getElementById("cantidad"+indice).value*precio;
                                        $(`<b id="valorFinal${indice}">${precioFinalProduc}</b>`).prependTo(`#precioTotalProducto${indice}`)
                                        }
                                },
                                error: (jqXHR, textStatus, errorThrown) => console.log("error")
                            });
                        }
                        carrito[0]=="" ? $('#titulo').html("Tu Carrito está vacio"): $('#titulo').html("Tu Carrito tiene " + (indice +1) + " producto/s"); 
                    }

                    var precioFinal=`<table style='width:100%'><thead><tr><td style='padding: 0% 5% 0 0'>SUBTOTAL</td><td style='text-align:right;'><b id="subtotalVal">${precioFinal} €</b></td></tr></thead></table>`;
                    $(precioFinal).appendTo("#subtotal");
                       
                    $(".btn-outline-danger").click(function(){
                        var id=this.id;
                        var valor=id.length;
                        var borrarId=id.slice(6,valor);
                        console.log("Eliminar " + borrarId);
                        Swal.fire({
                            title: '¿Borrar el producto?',
                            text: "Se borrará el producto del carrito de la compra",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Borrar Producto',
                            cancelButtonText: 'Cancelar',
                            }).then((result) => {
                            if (result.isConfirmed) {
                                //Borrado de tabla pero no de cookies $("#" + (borrarId)).remove();
                                var nuevosElementos=[];
                                var carrito=document.cookie.slice(9,document.cookie.length);
                                console.log(carrito);
                                var nuevoCarrito=carrito.split("-");
                                for(prod in nuevoCarrito){
                                    if(prod!=borrarId){
                                        nuevosElementos.push(nuevoCarrito[prod]);
                                    }
                                }
                                console.log(nuevosElementos);
                                var newCarrito;
                                for(let i=0;i<nuevosElementos.length;i++){
                                    if(i==0){
                                        newCarrito=nuevosElementos[i];
                                    }else{
                                        newCarrito=newCarrito + "-" + nuevosElementos[i];
                                    }
                                    
                                }
                                //Sobreescribir la cookie
                                document.cookie=`producto=${newCarrito};`;
            
                                //Recargar la pagina para actualizar o llamar a las funciones para que cambie el total de pago y numero de productos
                                Swal.fire(
                                'Producto Borrado',
                                'El producto ha sido borrado del carrito de la compra',
                                'success'
                                ).then(function(){
                                    window.location.reload('./');//Recarga Pagina
                                })
                            }
                        });
                    });

                    //Recalcular precios al cambiar cantidad
                    $(".cant").on("change",function(){
                        var id=this.id.substring(8,this.id.length)
                        console.log("id a borrar: " + id);
                        
                            var cantidad=document.getElementById("cantidad"+id).value;
                            var precio=document.getElementById("precio"+id).innerHTML;
                            precio=precio.substring(0,precio.indexOf(" "));

                            var precioFinalProduc=cantidad*precio;
                            $("#valorFinal"+id).remove();
                            $(`<b id="valorFinal${id}">${precioFinalProduc}</b>`).prependTo(`#precioTotalProducto${id}`);
                            //Recalcular subtotal
                            var precioTotalActual=0;
                            for(let i=0;i<carrito.length;i++){
                                let precio=document.getElementById("valorFinal"+i).innerHTML;
                                precioTotalActual=precioTotalActual+ parseInt(precio);
                                console.log("Precio Final : " +precioTotalActual)
                            } 
                            //Incluir el nuevo b con el valor final
                            $('#subtotalVal').text("");
                            $('#subtotalVal').text(precioTotalActual + " €");
                       
                    });

                    //Confirmar compra
                    $('#comprar').click(function(){
                        Swal.fire({
                        title: '¿Confirmar Compra?',
                        text: "Se procederá a el pago de los productos seleccionados",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Comprar',
                        cancelButtonText: 'Cancelar',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                //Se confirma la compra del producto.
                                alert("Completar el proceso de la compra de prodictos");
                            }
                        });
                    });                
                });
            </script>
        </tbody>
    </table>
    <!--Div con Subtotal-->
    <div style="width: 100%;height: 25vh;background-color: rgb(63, 63, 63);bottom: 0%;">
        <table style="width: 92%;">
            <thead>
                <tr style="color:gray">
                  <td style="padding: 2% 0;width: 6%;"></td>
                  <td style="padding: 2% 0;width: 4%;"></td>
                  <td style="width: 0%;"><b></b></td>
                  <td style="padding: 2% 0;width: 0%;"></td>
                  <td style="margin: 2%;padding: 2% 0;width: 0%;"><b></b></td>
                  <td id="subtotal" style="border-bottom: 2px solid rgb(211, 211, 211);padding: 2% 0 0 0;width: 2%;color: white;font-size: 150%;padding-bottom: 1%;"></td>
                </tr>
              </thead>
        </table>
        <button id="comprar" type="button" class="btn btn-outline-light" style="margin-left: 2.5%;margin-right:8.2%;margin-top:1%;float: right;width: 20%;">Comprar</button><br><br><br>
        <button id="seguirComprando" type="button" class="btn btn-outline-primary" style="margin-left: 2.5%;margin-right:8.2%;float: right;width: 20%;" onclick="window.location.replace('../../view/index.php')">Seguir Comprando</button>
    </div>
</div>

<?php require "parts/footer.php"?>