

$(function () { //igual que window.onload

    var msgSuccess = `<div class="alert alert-success" role="alert">
                           Contacto añadido con exito!
                      </div>`;

    // $.ajax({
    //     url: 'php/get-empresas.process.php',
    //     type: 'POST',
    //     data: {},
    //     success: function (response) {
    //         console.log(response);
    //         var html='';
    //         var empresas = JSON.parse(response);
    //
    //         empresas.forEach(empresa => {
    //             html+='<option value="'+empresa.nombre+'">'+empresa.nombre+'</option>';
    //
    //         });
    //
    //         $('#nombre').html(html);
    //
    //
    //     }
    // });

    $('#nombre').on('change',function (e) {
        var empresa = $(this).find(":selected").data('empresa');

        $('#localizacion').val(empresa.localizacion);
        $('#localidad').val(empresa.localidad);
        $('#cp').val(empresa.cp);
        $('#telefono1').val(empresa.telefono1);
        $('#email').val(empresa.email);
        $('#observaciones').val(empresa.observaciones);

    });



    $('#add-contact').submit(function (e){
        e.preventDefault();

        var id = $('#id').val();
        var nombre = $('#nombre').val();
        var contacto = $('#contacto').val();
        var localizacion = $('#localizacion').val();
        var localidad = $('#localidad').val();
        var cp = $('#cp').val();
        var telefono1 = $('#telefono1').val();
        var telefono2 = $('#telefono2').val();
        var email = $('#email').val();
        var observaciones = $('#observaciones').val();
        var fecha = $('#datepicker').val();



        $.post('php/add-contacto.process.php',{id,nombre,contacto,localizacion,localidad,cp,telefono1,telefono2,email,observaciones,fecha}, function (response){
            console.log(response);
            // if (response.includes('success')){
            //     $('#profileName').html(name);
            // }
            $('#add-success').html(msgSuccess);

            window.location.href='contactos.php';
        });

    });

    $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy"

    });

});