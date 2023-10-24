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

async function listarPrestamos(){
  remove();
  document.getElementById("nav_prestamos").className += " active";
  document.getElementById("carpeta-activa").value = "prestamos";
  try {
    const res = await $.ajax({
      url: '../prestamos/headerPrestamos.php',
      type: 'GET',
      dataType: 'html'
    })
    $("#all-body").html(res);

    // const tables = await $.ajax({
    //   url: '../../api/prestamo/all',
    //   type: 'GET',
    //   dataType: 'json'
    // });
    // if (tables.status == 'success') {
    //   const contenido = generaFilasSoli(tables.prestamos);
    //   $("#t_body_prest").html(contenido);
    //   $('#t_prestamos_sol').DataTable({
    //     language: lenguaje,
    //     columnDefs: [
    //       { orderable: false, targets: [1,4,5,7] }
    //     ],
    //     "info": false,
    //     "scrollX": true,
    //   });
    //   // console.log(tables);
    // }
  } catch (error) {
    console.log(error);
  }
}

async function revisarPrestamo(idPrestamo){
  try {
    const htmlDatos = await $.ajax({
      url: `../../api/prestamo/detalleHtml/${idPrestamo}`,
      dataType: 'html',
      type: 'GET'
    })
    const htmlArchivos = await $.ajax({
      url: `../../api/socio/socioArchivosHtml/${id}`,
      dataType: 'html',
      type: 'GET'
    })
    $("#prestamos").html(`<div class="row">
    ${htmlDatos} ${htmlArchivos}</div>
    <div class="d-flex justify-content-center mt-3">
      <button class="btn btn-secondary ml-2" onclick="listarAfiliadosEspera()">Volver</button>
      <button class="btn btn-danger ml-2" data-id="${id}" data-toggle="modal" data-target="#modal_rechazar">Rechazar</button>
      <button id="aceptar_btn" class="btn btn-success ml-2" data-id="${id}" data-toggle="modal" data-target="#modal_aceptar" disabled>Aceptar</button>
    </div>`);
  } catch (error) {
    console.log(error)
  }
}