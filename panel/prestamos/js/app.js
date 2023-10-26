$("#modal_garante").on('show.bs.modal', async function(e){
  $("#t_body_gar").html('')
  const id = e.relatedTarget.dataset.id;
  const res = await $.ajax({
    url: `../../api/prestamo/garantes/${id}`,
    type: 'GET',
    dataType: 'json'
  });
  if (res.status == 'success') {
    $("#t_garante").html(res.tipo)

    if(res.tipo == 'REGULAR'){
      res.garantes.forEach(element => {
        $("#t_body_gar").append(`
        <tr>
          <td>${element.nombre}</td>
          <td>${element.apellidos}</td>
        </tr>
        `)
      });
    }else{
      $("#t_body_gar").append(`<tr align="center"><td colspan="2">Este préstamo no tiene grarantes</td></tr>`)
    }
    
  }
})
async function listarSolicitudes(){
  remove();
  document.getElementById("nav_solicitudes").className += " active";
  document.getElementById("carpeta-activa").value = "prestamos";
  try {
    const res = await $.ajax({
      url: '../prestamos/headerSolicitudes.php',
      type: 'GET',
      dataType: 'html'
    })
    $("#all-body").html(res);

    const tables = await $.ajax({
      url: '../../api/prestamo/solicitudes',
      type: 'GET',
      dataType: 'json'
    });
    if (tables.status == 'success') {
      const contenido = generaFilasSoli(tables.prestamos);
      $("#t_body_prest").html(contenido);
      $('#t_prestamos_sol').DataTable({
        language: lenguaje,
        columnDefs: [
          { orderable: false, targets: [1,4,5,7] }
        ],
        "info": false,
        "scrollX": true,
      });
      // console.log(tables);
    }
  } catch (error) {
    console.log(error);
  }

}

function generaFilasSoli(data) {
  let filas = '';
  for (let index = 0; index < data.length; index++) {
    const element = data[index];
    let fecha = new Date(element.fechaSolicitud);
    fecha = fecha.toLocaleDateString();
    filas += `
      <tr>
        <td>${element.usuario}</td>
        <td>${element.ci}</td>
        <td>${element.tipo}</td>
        <td>${element.monto}</td>
        <td>${element.plazo} meses</td>
        <td>${fecha}</td>
        <td>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_garante" data-id="${element.idPrestamo}" ${element.tipo != 'REGULAR' ? 'disabled' : ''}><i class="fas fa-eye"></i> Ver </button>
        </td>
        <td>
          <button type="button" class="btn btn-info" onclick="revisarPrestamo(${element.idPrestamo})"><i class="fas fa-clipboard-check"></i> Revisar </button>
        </td>
      </tr>
    `;
  }
  return filas;
}

async function listarPrestamos() {
  remove();
  document.getElementById("nav_prestamos").className += " active";
  document.getElementById("carpeta-activa").value = "prestamos";
  try {
    const res = await $.ajax({
      url: "../prestamos/headerPrestamos.php",
      type: "GET",
      dataType: "html",
    });
    $("#all-body").html(res);

    const tables = await $.ajax({
      url: "../../api/prestamo/aceptados",
      type: "GET",
      dataType: "json",
    });
    if (tables.status == "success") {
      const contenido = generaFilasAceptados(tables.prestamos);
      $("#t_body_prest").html(contenido);
      $("#t_prestamos_aceptados").DataTable({
        language: lenguaje,
        columnDefs: [{ orderable: false, targets: [1, 4, 5, 6] }],
        info: false,
        scrollX: true,
      });
      // console.log(tables);
    }
  } catch (error) {
    console.log(error);
  }
}

function generaFilasAceptados(data) {
  let filas = "";
  for (let index = 0; index < data.length; index++) {
    const element = data[index];
    let fecha = new Date(element.fechaSolicitud);
    let fecha2 = new Date(element.fechaAceptacion);
    fecha = fecha.toLocaleDateString();
    fecha2 = fecha2.toLocaleDateString();
    filas += `
      <tr>
        <td>${element.usuario}</td>
        <td>${element.ci}</td>
        <td>${element.tipo}</td>
        <td>${element.monto}</td>
        <td>${element.plazo} meses</td>
        <td>${fecha2}</td>
        <td>
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
          Acciones </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_aceptados" data-id="${element.idPrestamo}"><i class="fas fa-eye text-info"></i> &nbsp;&nbsp; Detalles</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_garante" data-id="${
              element.idPrestamo
            }" ${
        element.tipo != "REGULAR" ? "disabled" : ""
      }><i class="fas fa-user-friends text-primary"></i> &nbsp;&nbsp;Garantes</a>
          </div>
        </div>
        </td>
      </tr>
    `;
  }
  return filas;
}

async function revisarPrestamo(idPrestamo){
  try {
    const htmlDatos = await $.ajax({
      url: `../../api/prestamo/detalleHtml/${idPrestamo}`,
      dataType: 'html',
      type: 'GET'
    })
    $("#prestamos").html(`<div class="row">${htmlDatos}</div>
    <div class="d-flex justify-content-center mt-3">
      <button class="btn btn-secondary ml-2" onclick="listarSolicitudes()">Volver</button>
      <button class="btn btn-danger ml-2" data-id="${idPrestamo}" data-toggle="modal" data-target="#modal_rechazar_pres">Rechazar</button>
      <button id="btn_aceptar_pres" class="btn btn-success ml-2" data-id="${idPrestamo}" data-toggle="modal" data-target="#modal_aceptar_pres">Aceptar</button>
    </div>`);
  } catch (error) {
    console.log(error)
  }
}

$('#modal_rechazar_pres').on('show.bs.modal', (e) => {
  const id = e.relatedTarget.dataset.id;
  $('#id_prestamo_rechazar').val(id)
})
$('#modal_rechazar_pres').on('hide.bs.modal', () => {
  $("#observacion_pres_rechazar").val('')
})
$("#modal_aceptar_pres").on('show.bs.modal', (e) => {
  const id = e.relatedTarget.dataset.id;
  $("#id_prestamo_aceptar").val(id)
})
$("#modal_aceptar_pres").on('show.bs.modal', () => {
  $("#observacion_pres_aceptar").val('')
})

async function aceptarPres(){
  const res = await $.ajax({
    url: '../../api/prestamo/aceptar',
    type: 'PUT',
    data: {idPrestamo: $("#id_prestamo_aceptar").val(), observacion: $("#observacion_pres_aceptar").val()},
    dataType: 'json'
  });
  if(res.status == 'success'){
    alertify.success('Se aceptó la solicitud de préstamo');
  }else{
    alertify.error('Ocurrió un error al aceptar el préstamo');
  }

  setTimeout(() => {
    listarSolicitudes();
  }, 1700);
}

async function rechazarPres(){
  const res = await $.ajax({
    url: '../../api/prestamo/rechazar',
    type: 'PUT',
    data: {idPrestamo: $("#id_prestamo_rechazar").val(), observacion: $("#observacion_pres_rechazar").val()},
    dataType: 'json'
  });
  if(res.status == 'success'){
    alertify.success('Se rechazó la solicitud de préstamo');
  }else{
    alertify.error('Ocurrio un error al rechazar la solicitud de préstamo');
  }

  setTimeout(() => {
    listarSolicitudes();
  }, 1700);
}

$('#modal_aceptados').on('show.bs.modal', async function (event) {
  const id = event.relatedTarget.dataset.id;
  console.log('vemos lo que pasa en la modal', id)
  try {
    const res = await $.ajax({
      url: `../../api/prestamo/aceptadoDetalle/${id}`,
      dataType: 'json',
      type: 'GET'
    })
    if (res.status == 'success') {
      $("#tituloAceptados").html(`<b>Usuario:</b> ${res.socio.nombre} ${res.socio.paterno} ${res.socio.materno}`);
      console.log('vemos el resultado', res)
      let cadena = '';
      let fecha = new Date(res.socio.fechaIncorporacion);
      fecha = fecha.toLocaleDateString();
      cadena += `
      <tr><td style="font-weight:bolder">Estado Civil</td>
      <td>${res.socio.estadoCivil}</td></tr>
      <tr><td style="font-weight:bolder">Correo Electrónico</td>
      <td>${res.socio.correo}</td></tr>
      <tr><td style="font-weight:bolder">Ciudad</td>
      <td>${res.socio.departamento}</td></tr>
      <tr><td style="font-weight:bolder">Localidad</td>
      <td>${res.socio.localidad}</td></tr>
      <tr><td style="font-weight:bolder">Dirección</td>
      <td>${res.socio.zona} ${res.socio.calle} #${res.socio.numero}</td></tr>
      <tr><td style="font-weight:bolder">Fuerza</td>
      <td>${res.socio.detalleFuerza}</td></tr>
      <tr><td style="font-weight:bolder">Número de cuenta</td>
      <td>${res.socio.numeroCuenta}</td></tr>
      <tr><td style="font-weight:bolder">Boleta de pago</td>
      <td>${res.socio.codigoBoleta}</td></tr>
      <tr><td style="font-weight:bolder">Observación</td>
      <td>${res.socio.observacion}</td></tr>`;
      $("#tableModalAceptados").html(cadena);
    } else {
      $("#tituloAceptados").html('Upps, ocurrió un error')
    }
  } catch (error) {
    console.log(error);
  }
})