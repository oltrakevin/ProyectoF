
var type = 'solicitud';

$(function () { //igual que window.onload
    var id = $('#id').val();
    console.log(id);


    $('#nombre').on('change',function (e) {
        var empresa = $(this).find(":selected").data('empresa');

        $('#localizacion').val(empresa.localizacion);
        $('#localidad').val(empresa.localidad);
        $('#cp').val(empresa.cp);
        $('#telefono1').val(empresa.telefono1);
        $('#email').val(empresa.email);
        $('#observaciones').val(empresa.observaciones);

    });

    // $.ajax({                        //peticion al servidor
    //     url: 'php/edit-contacto.process.php',
    //     type: 'POST',
    //     data: {id,type},
    //     success: function (response) {
    //         console.log(response);
    //
    //         if ( response != '[]'){
    //
    //             var contacto = JSON.parse(response)[0];
    //             console.log(contacto);
    //             $('#id').val(contacto.id);
    //             $('#nombre').val(contacto.nombre);
    //             $('#contacto').val(contacto.contacto);
    //             $('#localizacion').val(contacto.localizacion);
    //             $('#telefono1').val(contacto.telefono1);
    //             $('#telefono2').val(contacto.telefono2);
    //             $('#email').val(contacto.email);
    //             $('#observaciones').val(contacto.observaciones);
    //             $('#fecha').val(contacto.fecha);
    //         }else{
    //             $('#errores').html(msgError);
    //         }
    //     }
    // });

    $('#edit-contact').submit(function (e){
        e.preventDefault();
        type = 'Actualizar';

        var id = $('#id').val();
        var nombre = $('#nombre').val();
        var contacto = $('#contacto').val();
        var localizacion = $('#localizacion').val();
        var telefono1 = $('#telefono1').val();
        var telefono2 = $('#telefono2').val();
        var email = $('#email').val();
        var observaciones = $('#observaciones').val();
        var fecha = $('#fecha').val();

        $.post('php/edit-contacto.process.php',{id,nombre,contacto,localizacion,telefono1,telefono2,email,observaciones,fecha,type}, function (response){
            console.log(response);
            // if (response.includes('success')){
            //     $('#profileName').html(name);
            // }

            window.location.href='contactos.php';


        });

    });

});