var viewtype = 'list'; //posibles valores list - gallery

function getHtml(response) {
    var btnpdf = $('#pdf');
    var html = '';

    if (response != ''){
        switch (viewtype) {
            case 'gallery':
                var contactos = JSON.parse(response);

                if (contactos==0){      // Mostrar BtnPdf
                    btnpdf.css('visibility',' hidden');
                    html+=`<tr class="text-center"><td colspan="11" class="mt-4">No hay Coincidencias</td></tr>`;
                }else{
                    btnpdf.css('visibility',' visible');
                }

                html += '<div class="row">';
                contactos.forEach(contacto => {

                    html += `<div class="col-xs-12 col-sm-6  col-lg-3 ">
                                <div class="card m-2 my-0 py-0 border-left-primary">
                                    <div class="card-header d-inline-flex justify-content-between">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 font-weight-bold fs-2 d-inline-block">${contacto.empresa.nombre}</div>
                                        <label class="radiobutton" id="radiobuttonGallery">
                                            <input type="radio" name="radio" value="${contacto.id}" class="float-right d-inline-block m-1 radiobutton">
                                            <span class="checkmarkGallery"></span>
                                        </label>
                                    </div>
                                    
                                    <div class="card-body ">
                                        <!--<p class=""><i class="fas fa-briefcase"></i> ${contacto.empresa.nombre}</p>-->                                    
                                        <p class=""><i class="fas fa-user"></i> ${contacto.contacto}</p>       
                                        <i class="fas fa-map-marker-alt"></i> ${contacto.localidad}</p>
                                        <p class=""><i class="fas fa-envelope"></i> ${contacto.email}</p>
                                        <p class=""><i class="fas fa-phone"></i> ${contacto.telefono1}</p>
                                    </div>

                                </div>
                            </div>`;
                });
                html += '</div>';
                break;
            case 'list':
            default:
                html = '<table id="tContactos" class=\'table table-striped table-rwd contenido  display AllDataTables col-sm-table-sm \'><thead>\n' +
                            '<tr class="text-center respon ">\n' +
                                '<th class="" scope="col"></th>\n' +
                                //'<th class="" scope="col">#</th>\n' +
                                '<th class="" scope="col">Nombre Empresa</th>\n' +
                                '<th class="" scope="col">Contacto</th>\n' +
                                '<th class="" scope="col">Localizacion</th>\n' +
                                '<th class="" scope="col">Localidad</th>\n' +
                                '<th class="" scope="col">Codigo Postal</th>\n' +
                                '<th class="" scope="col">Telefono1</th>\n' +
                                '<th class="" scope="col">Telefono2</th>\n' +
                                '<th class="" scope="col">Email</th>\n' +
                                '<th class="" scope="col">Observaciones</th>\n' +
                                '<th class="" scope="col">Fecha</th>\n' +
                            '</tr>\n' +
                        '</thead><tbody>';

                var contactos = JSON.parse(response);

                if (contactos==0){
                    btnpdf.css('visibility',' hidden');
                    html+=`<tr class="text-center"><td colspan="11" class="mt-4">No hay Coincidencias</td></tr>`;
                }else{
                    btnpdf.css('visibility',' visible');
                }

                contactos.forEach(contacto => {
                    html += `<tr class="text-center respon contenido">
                            <td class="">
                            <label class="radiobutton">
                                <input type="radio" name="radio" value="${contacto.id}" class="">
                                <span class="checkmark"></span>
                            </label>
                            </td>
                            <!--<td class="">${contacto.id}</td>-->
                            <td class="titulo">${contacto.empresa.nombre}</td>
                            <td class="titulo">${contacto.contacto}</td>
                            <td class="titulo">${contacto.localizacion}</td>
                            <td class="titulo">${contacto.localidad}</td>
                            <td class="titulo">${contacto.cp}</td>
                            <td class="titulo">${contacto.telefono1}</td>
                            <td class="titulo ">${contacto.telefono2}</td>
                            <td class="titulo">${contacto.email}</td>
                            <td class="titulo ">${contacto.observaciones}</td>
                            <td class="titulo ">${contacto.fecha}</td>      
                            <!--<td class=""><a href=" <?="borrarContactos.php?id=" . $contacto->getId()?> "><i class="fas fa-trash-alt"></i></a></td>
                            <td class=""><a href=" <?="editarContactos.php?id=" . $contacto->getId()?> "><i class="fas fa-edit"></i></a></td>-->              
                        </tr> `;
                });
                html+= `</tbody></table>`;
                break;
        }
        console.log(html);

        return html;
    }
}

function funcionBusqueda () {

    var search = $('#search').val() == '' ? $('#searchDropdownInput').val() : $('#search').val();
    console.log(search);

    var btnpdf = $('#pdf');
    btnpdf.attr('href','pdf-contactos.php?search='+search);     //document.getElementById('pdf').href='pdf-contactos.php?search='+search;

    $.ajax({
        url: 'php/contact-search.process.php',
        type: 'POST',
        data: {search},
        success: function (response) {
            console.log(response);

            var html = getHtml(response);

            $('#listaContactos').html(html);

                $('#tContactos').DataTable({
                    language: {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }

                });

            $('#tContactos_filter').remove();
            //$('.pagination').addClass('justify-content-end');
        }
    })
};



function funcionEditar(){
    var id =$('input[name="radio"]:checked').val();
    window.location.href='edit-contacto.php?id='+id;

}

function funcionBorrar(){
    var id =$('input[name="radio"]:checked').val();
    $.post('php/delete-contacto.process.php',{id}, function (response){
        console.log(response);
        funcionBusqueda();
    });
    var msgDelete = `<div class="alert alert-success alert-dismissible fade show alert-bottom float-xl-right" role="alert">
                      <strong>Contacto Borrado con exito!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>`;
    console.log(id);

    $('#msg-alert').html(msgDelete);
    // setTimeout(function () {
    //     $('#msg-alert').animate({right: '-350px'})
    // },3000);
}


// Tipo de Vista
$(function () { //igual que window.onload
    $('#list').addClass('active');

    $('#list').on('click',function(){
        viewtype = 'list';
        $(this).addClass('active');
        $('#gallery').removeClass('active');
        funcionBusqueda();
    });
    $('#gallery').on('click',function(){
        viewtype = 'gallery';
        $(this).addClass('active');
        $('#list').removeClass('active');
        funcionBusqueda();
    });


//  Start Script

    $('#btnSearch').on('click',funcionBusqueda);
    $('#search').on('change keyup paste click input',funcionBusqueda);

    $('#btnSearchDropdownInput').on('click',funcionBusqueda);
    $('#searchDropdownInput').on('change keyup paste click input',funcionBusqueda);

    // $('#search').on('change keyup paste click input',funcionBusqueda);


    $('#btnEdit').on('click',funcionEditar);
    $('#btnDelete').on('click',funcionBorrar);

    funcionBusqueda();



});