var email = "";
var celular = "";
function leerImagen() {
  const imagen = document.getElementById('perfil');
  var archivo = imagen.files[0];
  var xx = archivo.name;
  var ext = xx.split('.').pop();
  ext = ext.toLowerCase();
  // console.log(xx, ext);
  if (ext == "jpg" || ext == "png" || ext == "jpeg") {
    processfile(archivo);
  } else {
    $("#file-previ").val('');
    alertify.error('Formato de archivo no valido');
  }
}
function processfile(file) {
  const imagen = document.getElementById('imagen');
  const objectURL = URL.createObjectURL(file);
  imagen.src = objectURL;

  // Enviar el archivo al servidor

  var formData = new FormData();

  // Agregar el archivo de imagen al objeto FormData
  formData.append("imagen", file);

  // Hacer la solicitud AJAX con $.ajax
  $.ajax({
    url: "image.php",
    method: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      console.log(response);
    },
    error: function (xhr, status, error) {
      console.log(error, xhr, status);
    }
  });
}
const obtenerDatos = async () => {
  try {
    const response = await fetch('../session/session.php');
    if (!response.ok) {
      throw new Error('Error al obtener los datos de sesión.');
    }
    const datosSesion = await response.json();
    console.log(datosSesion);
    email = datosSesion['email'];
    celular = datosSesion['celular'];
  } catch (error) {
    console.log(error);
    return -1;
  }
  return 1;
}
const terminarSesion = async () => {
  try {
    const response = await fetch('../session/fin-session.php', {
      method: 'POST',
      body: JSON.stringify({ variable: 'nombre' }),
      headers: { 'Content-Type': 'application/json' }
    });

    if (!response.ok) {
      throw new Error('Error al destruir la sesión.');
    }

    const resultado = await response.json();
    console.log(resultado);
    window.location.href = "../auth/"
  } catch (error) {
    console.log(error);
  }
}

$(".btn-perfil").click(async () => {
  const res = await obtenerDatos();
  console.log(res)
  if (res == 1) {
    const { value: formValues } = await Swal.fire({
      title: 'Edita tu perfil',
      html:
        '<label>Correo Electrónico</label><input type="email" id="email" class="swal2-input" value="' + email + '">' +
        '<label>Teléfono - Celular</label><input id="celular" class="swal2-input" value="' + celular + '">' +
        '<textarea id="about" placeholder="Algo sobre tí" cols="30" rows="10"></textarea>',
      focusConfirm: false,
      preConfirm: () => { //antes de confirmar
        return [
          document.getElementById('celular').value,
          document.getElementById('email').value,
          document.getElementById('about').value
        ]
      }
    })

    if (formValues) {
      //Verificamos que haya cambiado los datos
      if (email != formValues[1] || celular != formValues[0] || formValues[2] != "") {
        // Actualizamos usuario
        let parametros = {
          "celular": formValues[0],
          "email": formValues[1],
          "sobremi": formValues[2]
        }
        $.ajax({
          type: "POST",
          url: "./updateUser.php",
          data: parametros,
          success: function (html) {
            console.log(html);
            setTimeout(() => {
              if (html == 1) {
                Swal.fire("Registro Correcto")
                setTimeout(() => {
                  location.reload();
                }, 1000);
              } else {
                console.log("OCURRIO ERROR");
                Swal.fire({
                  icon: 'error',
                  title: 'UPS!',
                  text: 'Ocurrió un error!'
                })
              }
            }, 1000);
          },
          beforeSend: function () {
          }
        });
      }
    }
  }

});

$("#exit").click(() => {
  terminarSesion();
});

$("#modal_misprestamos").on('show.bs.modal', async () => {
  try {
    const res = await $.ajax({
      url: `../api/prestamo/prestamoUsuario`,
      type: "GET",
      dataType: "json"
    })
    if(res.status === 'success'){
      const data = armarTablaPrestamos(res.prestamos)
      $("#t_body_prestamos").html(data)
    }
  } catch (error) {
    console.log(error)
  }
})


function armarTablaPrestamos(data){
  let cadena = data.length > 0 ? '':'<td colspan="8">NO hay registros de prestamos</td>';
  for(let i = 0; i < data.length; i++){
    let fecha = new Date(data[i].fechaSolicitud);
    fecha = fecha.toLocaleDateString();
    let fecha2 = data[i].fechaPrestamo != null ? new Date(data[i].fechaPrestamo):null;
    fecha2 = fecha2 != null ? fecha2.toLocaleDateString() : 'Sin pago realizado';
    // /formsPdf/form.php?nid=${data[i].idPrestamo}
    cadena += `
    <tr>
      <td><a href="../formsPdf/form.php?nid=${data[i].idPrestamo}" class="btn btn-secondary" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48v96zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z"/></svg></a></td>
      <td>${data[i].tipo}</td>
      <td>${data[i].monto}</td>
      <td>${data[i].plazo} meses</td>
      <td>${data[i].motivo}</td>
      <td>${fecha}</td>
      <td>${fecha2}</td>
      <td>${data[i].estado}</td>
    </tr>
    `
  }
  return cadena;
}