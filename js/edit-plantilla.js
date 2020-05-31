
var type = 'solicitud';

$(function () { //igual que window.onload
    var id = $('#id').val();
    // console.log(id);


    $.ajax({                        //peticion al servidor
        url: 'php/edit-plantilla.process.php',
        type: 'POST',
        data: {id,type},
        success: function (response) {
            console.log(response);

            if ( response != '[]'){

                var plantilla = JSON.parse(response)[0];
                console.log(plantilla);
                // $('#id').val(plantilla.id);
                $('#nombre').val(plantilla.nombre);
                $('#contenido').val(plantilla.contenido);

            }else{
                $('#errores').html(msgError);
            }
        }
    });

    $('#edit-plantilla').submit(function (e){
        e.preventDefault();
        type = 'Actualizar';

        var id = $('#id').val();
        var nombre = $('#nombre').val();
        var contenido = $('#contenido').val();


        $.post('php/edit-plantilla.process.php',{id,nombre,contenido,type}, function (response){
            console.log(response);
            // if (response.includes('success')){
            //     $('#profileName').html(name);
            // }

            window.location.href='plantillas.php';


        });

    });

});