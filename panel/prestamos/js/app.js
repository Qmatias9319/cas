
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
        <td>${element.tipoPrestamo}</td>
        <td>${element.monto}</td>
        <td>${element.plazo} meses</td>
        <td>${fecha}</td>
        <td>--</td>
        <td>
          <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            Acciones </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_" data-id="${element.idPrestamo}"><i class="fas fa-eye text-info"></i> &nbsp;&nbsp;Revisar</a>
            </div>
        </td>
      </tr>
    `;
  }
  return filas;
}