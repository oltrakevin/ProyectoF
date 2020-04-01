$(function () {
    var btn = $('#btn-image');
    btn.mouseover(function() {
        btn.css('opacity', '1');
    })
    .mouseout(function() {
        btn.css('opacity', '0');
    })
    .on('click', function () {
        $("#file-upload").click();
    });

    $('#showpass').on('click', function () {
        $('#arrow-pass').toggleClass("fa-sort-down fa-sort-up");

        $('#changepass').toggleClass("d-none d-flex")
    })
    //btn.mouseover(toggleOpacity());
    //btn.off('hover', toggleOpacity());
    $("#file-upload").change(function (e){
        //e.preventDefault();
        $("#upload").submit();
    });

    $("#profile").submit(function(e) {
        e.preventDefault();

        var id= $('#id').val();
        var name= $('#name').val();
        var lastname= $('#lastname').val();
        var email= $('#email').val();
        var date= $('#date').val();
        var oldpass= $('#oldpass').val();
        var newpass= $('#newpass').val();
        console.log(name);

        $.post('php/update-profile.php',{id,name,lastname,email,date,oldpass,newpass}, function (response){
            console.log(response);
            if (response.includes('success')){
                $('#profileName').html(name);
            }
        });
    });


});