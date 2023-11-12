const lenguaje = {
  processing: "Procesando...",
  search: "Buscar en la tabla",
  lengthMenu: "Mostrar  _MENU_ filas ",
  paginate: {
    first: "Primero",
    previous: "Ant.",
    next: "Sig.",
    last: "Último",
  },
  emptyTable: "No hay registros...",
  infoEmpty: "No hay resultados",
  zeroRecords: "No hay registros...",
};
async function listarAfiliadosEspera() {
  remove();
  document.getElementById("nav_afiliado_espera").className += " active";
  document.getElementById("carpeta-activa").value = "afiliados";
  try {
    const res = await $.ajax({
      url: "../afiliados/headerAfiliadosEspera.php",
      type: "GET",
      dataType: "html",
    });
    $("#all-body").html(res);
    const tables = await $.ajax({
      url: "../../api/socio/pendientes",
      type: "GET",
      dataType: "json",
    });
    if (tables.status == "success") {
      const contenido = generaFilasEspera(tables.socios);
      $("#afiliados_espera_body").html(contenido);
      $("#t_afiliados_espera").DataTable({
        language: lenguaje,
        columnDefs: [{ orderable: false, targets: [4, 7] }],
        info: false,
        scrollX: true,
        scrollY: "50vh",
      });
      // console.log(tables);
    }
  } catch (error) {
    console.log(error);
  }
}

async function listarAfiliados() {
  remove();
  document.getElementById("nav_afiliados").className += " active";
  document.getElementById("carpeta-activa").value = "afiliados";
  try {
    const res = await $.ajax({
      url: "../afiliados/headerAfiliados.php",
      type: "GET",
      dataType: "html",
    });
    $("#all-body").html(res);
    const tables = await $.ajax({
      url: "../../api/socio/getAll",
      type: "GET",
      dataType: "json",
    });
    if (tables.status == "success") {
      const contenido = generaFilas(tables.socios);
      $("#t_body_afiliados").html(contenido);
      $("#t_afiliados").DataTable({
        language: lenguaje,
        columnDefs: [{ orderable: false, targets: [3, 7, 8] }],
        info: false,
        scrollX: true,
        scrollY: "50vh",
      });
    }
  } catch (error) {
    console.log(error);
  }
}

function generaFilasEspera(data) {
  let filas = "";
  for (let index = 0; index < data.length; index++) {
    const element = data[index];
    let fecha = new Date(element.fechaNacimiento);
    fecha = fecha.toLocaleDateString();
    filas += `
      <tr>
        <td class="text-bold text-center">${element.idSocio}</td>
        <td>${element.paterno} ${element.materno}</td>
        <td>${element.nombre}</td>
        <td>${element.ci}</td>
        <td>${fecha}</td>
        <td>${element.celular}</td>
        <td>${element.detalleFuerza}</td>
        <td>
          <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            Acciones </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_detalle" data-id="${element.idSocio}"><i class="fas fa-eye text-info"></i> &nbsp;&nbsp;Más detalles</a>
              <a class="dropdown-item" href="#" onclick="revisarSocio(${element.idSocio})"><i class="fas fa-check-square text-success"></i> &nbsp;&nbsp;Revisar</a>
            </div>
          </div>
        </td>
      </tr>
    `;
  }
  return filas;
}
function generaFilas(data) {
  let filas = "";
  for (let index = 0; index < data.length; index++) {
    const element = data[index];
    let fecha = new Date(element.fechaNacimiento);
    let fecha2 = new Date(element.fechaAceptacion);
    fecha2 = fecha2.toLocaleDateString();
    fecha = fecha.toLocaleDateString();
    filas += `
      <tr>
        <td>${element.paterno} ${element.materno}</td>
        <td>${element.nombre}</td>
        <td>${element.ci}</td>
        <td>${fecha}</td>
        <td>${element.celular}</td>
        <td>${element.detalleFuerza}</td>
        <td>${element.observacion}</td>
        <td>${fecha2}</td>
        <td>
          <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            Acciones </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_detalle" data-id="${element.idSocio}"><i class="fas fa-eye text-info"></i> &nbsp;&nbsp; Detalles</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_edit_user" data-id="${element.idSocio}"><i class="fas fa-edit text-primary"></i> &nbsp;&nbsp;Editar</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_delete_user" data-id="${element.idSocio}" data-name="${element.paterno} ${element.materno} ${element.nombre}"><i class="fas fa-trash text-danger"></i> &nbsp;&nbsp;Eliminar</a>
            </div>
          </div>
        </td>
      </tr>
    `;
  }
  return filas;
}

$("#modal_detalle").on("show.bs.modal", async function (event) {
  const id = event.relatedTarget.dataset.id;
  try {
    const res = await $.ajax({
      url: `../../api/socio/socioEsperaDetalle/${id}`,
      dataType: "json",
      type: "GET",
    });
    if (res.status == "success") {
      $("#tituloDetalle").html(
        `<b>Usuario:</b> ${res.socio.nombre} ${res.socio.paterno} ${res.socio.materno}`
      );
      let cadena = "";
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
      <tr><td style="font-weight:bolder">Fecha Incorporación</td>
      <td>${res.socio.fechaIncorporacion}</td></tr>
      <tr><td style="font-weight:bolder">Carnet Militar</td>
      <td>${res.socio.carnetMilitar}</td></tr>
      <tr><td style="font-weight:bolder">Carnet Cossmil</td>
      <td>${res.socio.carnetCossmil}</td></tr>
      <tr><td style="font-weight:bolder">Grado</td>
      <td>${res.socio.grado}</td></tr>
      <tr><td style="font-weight:bolder">Arma</td><td>${res.socio.detalleArma}</td></tr>
      <tr><td colspan="2" style="text-align:center;"><a href="../../api/documents/${res.socio.idSocio}/papeletapago.pdf" target="_blank" class="btn btn-info">Ver Boleta pago</a></td></tr>
      `;
      $("#tableDetail").html(cadena);
    } else {
      $("#tituloDetalle").html("Upps, ocurrió un error");
    }
  } catch (error) {
    console.log(error);
  }
});

$("#modal_delete_user").on("show.bs.modal", (e) => {
  const id = e.relatedTarget.dataset.id;
  const nombre = e.relatedTarget.dataset.name;
  $("#id_socio_delete").val(id);
  $("#nombre_delete").html(nombre);
});

async function revisarSocio(id) {
  try {
    const htmlDatos = await $.ajax({
      url: `../../api/socio/socioDetalleHtml/${id}`,
      dataType: "html",
      type: "GET",
    });
    const htmlArchivos = await $.ajax({
      url: `../../api/socio/socioArchivosHtml/${id}`,
      dataType: "html",
      type: "GET",
    });
    $("#afiliadosEspera")
      .html(`<div class="row">${htmlDatos} ${htmlArchivos}</div>
    <div class="d-flex justify-content-center mt-3">
      <button class="btn btn-secondary ml-2" onclick="listarAfiliadosEspera()">Volver</button>
      <button class="btn btn-danger ml-2" data-id="${id}" data-toggle="modal" data-target="#modal_rechazar">Rechazar</button>
      <button id="aceptar_btn" class="btn btn-success ml-2" data-id="${id}" data-toggle="modal" data-target="#modal_aceptar" disabled>Aceptar</button>
    </div>`);
  } catch (error) {
    console.log(error);
  }
}

$("#modal_edit_user").on("show.bs.modal", async function (event) {
  const id = event.relatedTarget.dataset.id;
  $("#id_socio_edit").val(id);
  $("#body_edit").html(`<div class="spinner-border text-info" role="status">
    <span class="sr-only">Loading...</span></div>`);
  try {
    const res = await $.ajax({
      url: `../../api/socio/dataEdit/${id}`,
      type: "GET",
      dataType: "json",
    });
    if (res.status == "success") {
      $("#body_edit").html("");
      const data = JSON.parse(res.data);
      $("#nombre_edit").val(`${data.nombre}`);
      $("#paterno_edit").val(data.paterno);
      $("#materno_edit").val(data.materno);
      $("#fuerza_edit").html(res.htmlFuerza);
      $("#arma_edit").html(res.htmlArmas);
      $("#correo_edit").val(data.correo);
      $("#celular_edit").val(data.celular);
      $("#calle_edit").val(data.calle);
      $("#zona_edit").val(data.zona);
      $("#codCossmil_edit").val(data.carnetCossmil);
      $("#codMilitar_edit").val(data.carnetMilitar);
      $("#boleta_edit").val(data.codigoBoleta);
      $("#nro_edit").val(data.numero);
      $("#ci_edit").val(data.ci);
      $("#localidad_edit").val(data.localidad);
      $("#extendido").html(res.htmlExp);
      $("#grado_edit").html(res.htmlGrados);
      $("#ciudad_edit").html(res.htmlDptos);
      $("#estado_civil_edit").html(res.htmlEstadoCivil);
    } else {
      $("#modal_edit_user").modal("hide");
      alertify.error("Ocurrio un error al obtener los datos del usuario");
    }
  } catch (error) {
    console.warn(error);
  } finally {
    $("#body_edit").html("");
  }
});
$("#modal_aceptar").on("show.bs.modal", function (e) {
  $("#id_usuario_aceptar").val(e.relatedTarget.dataset.id);
});

$("#modal_rechazar").on("show.bs.modal", function (e) {
  console.log(e.relatedTarget);
  $("#id_usuario_rechazar").val(e.relatedTarget.dataset.id);
});
$("#modal_aceptar").on("hidden.bs.modal", function () {
  $("#id_usuario_aceptar").val("");
});
$("#modal_rechazar").on("hidden.bs.modal", function () {
  $("#id_usuario_rechazar").val("");
});

async function aceptarSocio() {
  const id = $("#id_usuario_aceptar").val();
  const obs = $("#observacion").val();
  if (id != "") {
    try {
      const res = await $.ajax({
        url: `../../api/socio/aceptarSocio`,
        type: "PUT",
        data: { idSocio: id, observacion: obs },
        dataType: "json",
      });
      if (res.status == "success") {
        alertify.success("El usuario fue aceptado con éxito");
        setTimeout(() => {
          window.location.reload();
        }, 3000);
      } else {
        alertify.error("Ocurrio un error al aceptar el usuario");
      }
    } catch (error) {
      console.log(error);
    }
  } else {
    alertify.error("Ocurrio un error con el usuario");
  }
}
async function rechazarSocio() {
  const id = $("#id_usuario_rechazar").val();
  if (id != "") {
    try {
      const res = await $.ajax({
        url: `../../api/socio/rechazarSocio`,
        type: "DELETE",
        data: { idSocio: id },
        dataType: "json",
      });
      if (res.status == "success") {
        alertify.success("El usuario fue rechazado y eliminado de la cola");
        setTimeout(() => {
          window.location.reload();
        }, 3000);
      } else {
        alertify.error("Ocurrio un error al eliminar al usuario");
      }
    } catch (error) {
      console.log(error);
    }
  } else {
    alertify.error("Ocurrio un error con el usuario");
  }
}
async function guardarEdit() {
  const data = $("#form_edit_user").serialize();
  try {
    const res = await $.ajax({
      url: "../../api/socio/saveEdit",
      type: "PUT",
      data: data,
      dataType: "json",
    });
    if (res.status == "success") {
      alertify.success("Los datos del usuario fueron actualizados con éxito");
      setTimeout(() => {
        listarAfiliados();
      }, 1800);
    } else {
      alertify.error("Ocurrio un error al actualizar los datos del usuario");
    }
  } catch (error) {
    console.log(error);
  }
}
async function deleteSocio() {
  const id = $("#id_socio_delete").val();
  try {
    const res = await $.ajax({
      url: "../../api/socio/delete",
      type: "DELETE",
      data: { idSocio: id },
      dataType: "json",
    });
    if (res.status == "success") {
      alertify.success("El socio fue eliminado");
      setTimeout(() => {
        listarAfiliados();
      }, 1500);
    } else {
      alertify.error("Ocurrio un error al al eliminar socio");
    }
  } catch (error) {
    console.log(error);
  }
}
const cargarGrados = (id) => {
  const ACCION = "CARGAR GRADOS";
  $.ajax({
    url: `../../api/grado/getAllGrados/${id}`,
    type: "GET",
    processData: false,
    contentType: false,
    dataType: "JSON",
    success: function (response) {
      if (response.status == "success") {
        var select = document.getElementById("grado_edit_s");
        select.innerHTML = '';
        response.grados.forEach((grado) => {
          const option = document.createElement("option");
          option.value = grado.idGrado;
          option.textContent = grado.detalle;

          select.appendChild(option);
        });
      } else {
        console.log(ACCION, "Ocurrió un error en el registro");
      }
    },
    error: function (response) {
      console.log(ACCION, "Ocurrió un error en el registro");
    },
  });
};
const cargarArmas = (id) => {
  const ACCION = "CARGAR ARMAS";
  $.ajax({
    url: `../../api/arma/getAllArmas/${id}`,
    type: "GET",
    processData: false,
    contentType: false,
    dataType: "JSON",
    success: function (response) {
      if (response.status == "success") {
        var select = document.getElementById("armas_edit_s");
        select.innerHTML = '';
        response.armas.forEach((arma) => {
          const option = document.createElement("option");
          option.value = arma.idArma;
          option.textContent = arma.detalle;

          select.appendChild(option);
        });
      } else {
        console.log(ACCION, "Ocurrió un error en el registro");
      }
    },
    error: function (response) {
      console.log(ACCION, "Ocurrió un error en el registro");
    },
  });
};

$(document).on("change", "#fuerza_select",  async (e) => {
  cargarGrados(e.target.value);
  cargarArmas(e.target.value);
});
