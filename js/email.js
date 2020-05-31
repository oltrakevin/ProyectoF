var listaPlantillas = [];

function getHtml(response) {
    var html = '';

    if (response != ''){

        var plantillas = JSON.parse(response);
        listaPlantillas = plantillas;
        html += `<option value="0">Selecciona una plantilla</option>`;
        //html += '<div class="row">';
        plantillas.forEach(plantilla => {

            html += `<option value="${plantilla.id}">${plantilla.nombre}</option>`;
        });

        console.log(html);
        return html;
    }
}

$(function () { //igual que window.onload
//  Start Script
    CKEDITOR.replace('mensaje');

    $("#plantilla").change(function(){
        var id = $(this).val();
        $('#mensaje').html('');

        listaPlantillas.forEach(plantilla => {

            if (plantilla.id == id) {
                // $('#mensaje').html(plantilla.contenido);
                // document.getElementById('mensaje').innerText=plantilla.contenido;
                CKEDITOR.instances.mensaje.setData(plantilla.contenido);
            }
        });
    });

    $.ajax({
        url: 'php/email.process.php',
        type: 'POST',
        data: {data:''},
        success: function (response) {
            console.log(response);

            var html = getHtml(response);

            $('#plantilla').html(html);
        }
    })
});