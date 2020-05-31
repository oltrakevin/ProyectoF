
var type = 'solicitud';

$(function () { //igual que window.onload
    var cif = $('#cif').val();
    // console.log(cif);
    $.ajax({                        //peticion al servidor
        url: 'php/edit-empresa.process.php',
        type: 'POST',
        data: {cif,type},
        success: function (response) {
            console.log(response);

            if ( response != '[]'){

                var empresa = JSON.parse(response)[0];
                console.log(empresa);
                $('#cif').val(empresa.cif);
                $('#nombre').val(empresa.nombre);
                $('#localizacion').val(empresa.localizacion);
                $('#localidad').val(empresa.localidad);
                $('#cp').val(empresa.cp);
                $('#telefono1').val(empresa.telefono1);
                $('#email').val(empresa.email);
                $('#observaciones').val(empresa.observaciones);
                $('#fecha').val(empresa.fecha);
            }else{
                $('#errores').html(msgError);
            }
        }
    });

    $('#edit-empresa').submit(function (e){
        e.preventDefault();
        type = 'Actualizar';

        var cif = $('#cif').val();
        var nombre = $('#nombre').val();
        var localizacion = $('#localizacion').val();
        var localidad = $('#localidad').val();
        var cp = $('#cp').val();
        var telefono1 = $('#telefono1').val();
        var email = $('#email').val();
        var observaciones = $('#observaciones').val();
        var fecha = $('#fecha').val();
        var ciclos = $('#ciclos').val();

        $.post('php/edit-empresa.process.php',{cif,nombre,localizacion,localidad,cp,telefono1,email,observaciones,fecha,ciclos,type}, function (response){
            console.log(response);
            // if (response.includes('success')){
            //     $('#profileName').html(name);
            // }

            window.location.href='empresas.php';

        });
    });
});