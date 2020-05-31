$(function () {

    function getError(msg){
        return `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>`+msg+`</strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>`;
    }

    $("#form-register").submit(function(e){
        e.preventDefault();
        $('#errores').html('');

        var nombre = $('#nombre').val().trim();
        var apellidos = $('#apellidos').val().trim();
        var email = $('#email').val().trim();
        var password1 = $('#password1').val().trim();
        var password2 = $('#password2').val().trim();

        if (nombre == '' ) {
            $('#errores').html(getError('Nombre requerido'));
            return;
        }
        if (email =='' ) {
            $('#errores').html(getError('Email requerido'));
            return;
        }
        if (password1 == '') {
            $('#errores').html(getError('Password son requeridas'));
            return;
        }
        if (password1 != password2 ) {
            $('#errores').html(getError('Password no coniciden'));
            return;
        }

        $.ajax({                        //peticion al servidor
            url: 'php/registro.process.php',
            type: 'POST',
            data: {nombre,apellidos,email,password1},
            success: function (response) {
                console.log(response);

                var users = JSON.parse(response);

                if (users.length>0) {
                    $('#errores').html(getError('El usuario ya existe'));
                }else{
                    window.location.href='login.php';
                }
            }
        })
    });
})