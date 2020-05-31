

$(function () { //igual que window.onload

    var msgSuccess = `<div class="alert alert-success" role="alert">
                           Plantilla Añadida con exito!
                      </div>`;

    $('#add-plantilla').submit(function (e){
        e.preventDefault();

        var id = $('#id').val();
        var nombre = $('#nombre').val();
        var contenido = $('#contenido').val();

        $.post('php/add-plantilla.process.php',{id,nombre,contenido}, function (response){
            console.log(response);
            // if (response.includes('success')){
            //     $('#profileName').html(name);
            // }
            $('#add-success').html(msgSuccess);

            window.location.href='plantillas.php';
        });
    });
});