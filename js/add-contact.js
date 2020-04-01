

$(function () { //igual que window.onload

    var msgSuccess = `<div class="alert alert-success" role="alert">
                           This is a success alert—check it out!
                      </div>`;

    $('#add-contact').submit(function (e){
        e.preventDefault();

        var id = $('#id').val();
        var nombre = $('#nombre').val();
        var contacto = $('#contacto').val();
        var localizacion = $('#localizacion').val();
        var telefono1 = $('#telefono1').val();
        var telefono2 = $('#telefono2').val();
        var email = $('#email').val();
        var observaciones = $('#observaciones').val();
        var fecha = $('#fecha').val();

        $.post('php/add-contact.process.php',{id,nombre,contacto,localizacion,telefono1,telefono2,email,observaciones,fecha}, function (response){
            console.log(response);
            // if (response.includes('success')){
            //     $('#profileName').html(name);
            // }
            $('#add-success').html(msgSuccess);

            window.location.href='index.php';
        });

    });

});