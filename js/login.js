$(function () {

    var msgError = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Login Fail!</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>`;
    //document.getElementById("myForm").submit();

    $("#form-login").submit(function(e){
        e.preventDefault();

        var user = $('#email').val();
        var password = $('#password').val();

        if (user != '' && password !=''){
            $.ajax({                        //peticion al servidor
                url: 'php/login.process.php',
                type: 'POST',
                data: {email:user,password:password},
                success: function (response) {
                    console.log(response);

                    if ( response != '[]'){

                        var users = JSON.parse(response);

                        if (users.length==1) {
                             window.location.href='index.php';
                        }

                    }else{
                        $('#errores').html(msgError);
                    }
                }
            })

        } else{
            $('#errores').html(msgError);

            //window.opener.getElementById("errores").innerHTML=msgError;
        }
    });


})