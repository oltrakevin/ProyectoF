

$(function () { //igual que window.onload

    var msgSuccess = `<div class="alert alert-success" role="alert">
                           Empresa añadida con exito!
                      </div>`;

    // $('#ciclos').on('change',function (e) {
    //     var ciclo = $(this).find(":selected").data('ciclo');
    //
    //     $('#localizacion').val(empresa.localizacion);
    //     $('#localidad').val(empresa.localidad);
    //     $('#cp').val(empresa.cp);
    //     $('#telefono1').val(empresa.telefono1);
    //     $('#email').val(empresa.email);
    //     $('#observaciones').val(empresa.observaciones);
    //
    // });

    $('#add-contact').submit(function (e){
        e.preventDefault();

        var cif = $('#cif').val();
        var nombre = $('#nombre').val();
        var localizacion = $('#localizacion').val();
        var localidad = $('#localidad').val();
        var cp = $('#cp').val();
        var telefono1 = $('#telefono1').val();
        var email = $('#email').val();
        var observaciones = $('#observaciones').val();
        var fecha = $('#datepicker').val();
        var ciclos = $('#ciclos').val();

        $.post('php/add-empresa.process.php',{cif,nombre,localizacion,localidad,cp,telefono1,email,observaciones,fecha,ciclos}, function (response){
            console.log(response);
            // if (response.includes('success')){
            //     $('#profileName').html(name);
            // }
            $('#add-success').html(msgSuccess);

            window.location.href='empresas.php';
        });
    });

    $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy"
    });
});