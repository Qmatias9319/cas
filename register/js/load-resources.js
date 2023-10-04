const cargarDepartamentos = () => {
    const ACCION = "CARGAR DEPARTAMENTOS";
    $.ajax({
        url: '../api/departamento/getAllDepartamentos',
        type: 'GET',
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(response) {
          if(response.status == 'success'){
            var select = document.getElementById('departamento');
            response.departamentos.forEach((departamento) => {
                const option = document.createElement('option');
                option.value = departamento.idDepartamento;
                option.textContent = departamento.detalle;

                select.appendChild(option);
            });

          }else{
            console.log(ACCION, 'Ocurrió un error en el registro');
          }
        },
        error: function(response) {
            console.log(ACCION, 'Ocurrió un error en el registro');
        }
    });
};

const cargarExpediciones = () => {
    const ACCION = "CARGAR EXPEDICIONES";
    $.ajax({
        url: '../api/expedicion/getAllExpediciones',
        type: 'GET',
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(response) {
          if(response.status == 'success'){
            var select = document.getElementById('extension_ci');
            response.expediciones.forEach((expedicion) => {
                const option = document.createElement('option');
                option.value = expedicion.idExpedicion;
                option.textContent = expedicion.detalle;

                select.appendChild(option);
            });

          }else{
            console.log(ACCION, 'Ocurrió un error en el registro');
          }
        },
        error: function(response) {
            console.log(ACCION, 'Ocurrió un error en el registro');
        }
    });
};

const cargarProvincias = (id) => {
    const ACCION = "CARGAR PROVINCIAS";
    $.ajax({
        url: `../api/provincia/getAllProvincias/${id}`,
        type: 'GET',
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(response) {
          if(response.status == 'success'){
            var select = document.getElementById('provincia');
            response.provincias.forEach((provincia) => {
                const option = document.createElement('option');
                option.value = provincia.idProvincia;
                option.textContent = provincia.detalle;

                select.appendChild(option);
            });

          }else{
            console.log(ACCION, 'Ocurrió un error en el registro');
          }
        },
        error: function(response) {
            console.log(ACCION, 'Ocurrió un error en el registro');
        }
    });
};

const cargarMunicipios = (id) => {
    const ACCION = "CARGAR MUNICIPIOS";
    $.ajax({
        url: `../api/municipio/getAllMunicipios/${id}`,
        type: 'GET',
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(response) {
          if(response.status == 'success'){
            var select = document.getElementById('municipio');
            response.municipios.forEach((municipio) => {
                const option = document.createElement('option');
                option.value = municipio.idMunicipio;
                option.textContent = municipio.detalle;

                select.appendChild(option);
            });

          }else{
            console.log(ACCION, 'Ocurrió un error en el registro');
          }
        },
        error: function(response) {
            console.log(ACCION, 'Ocurrió un error en el registro');
        }
    });
};

const cargarLocalidades = (id) => {
    const ACCION = "CARGAR LOCALIDADES";
    $.ajax({
        url: `../api/localidad/getAllLocalidades/${id}`,
        type: 'GET',
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(response) {
          if(response.status == 'success'){
            var select = document.getElementById('localidad');
            response.localidades.forEach((localidad) => {
                const option = document.createElement('option');
                option.value = localidad.idLocalidad;
                option.textContent = localidad.detalle;

                select.appendChild(option);
            });

          }else{
            console.log(ACCION, 'Ocurrió un error en el registro');
          }
        },
        error: function(response) {
            console.log(ACCION, 'Ocurrió un error en el registro');
        }
    });
};

const cargarEstadoCiviles = () => {
    const ACCION = "CARGAR ESTADOS CIVILES";
    $.ajax({
        url: `../api/estadoCivil/getAllEstadosCiviles`,
        type: 'GET',
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(response) {
          if(response.status == 'success'){
            var select = document.getElementById('estado_civil');
            response.estadosCiviles.forEach((estado) => {
                const option = document.createElement('option');
                option.value = estado.idEstadoCivil;
                option.textContent = estado.detalle;

                select.appendChild(option);
            });

          }else{
            console.log(ACCION, 'Ocurrió un error en el registro');
          }
        },
        error: function(response) {
            console.log(ACCION, 'Ocurrió un error en el registro');
        }
    });
};

const cargarFuerzas = () => {
    const ACCION = "CARGAR FUERZAS";
    $.ajax({
        url: `../api/fuerza/getAllFuerzas`,
        type: 'GET',
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(response) {
          if(response.status == 'success'){
            var select = document.getElementById('fuerza');
            response.fuerzas.forEach((fuerza) => {
                const option = document.createElement('option');
                option.value = fuerza.idFuerza;
                option.textContent = fuerza.detalle;

                select.appendChild(option);
            });

          }else{
            console.log(ACCION, 'Ocurrió un error en el registro');
          }
        },
        error: function(response) {
            console.log(ACCION, 'Ocurrió un error en el registro');
        }
    });
};

const cargarGrados = (id) => {
    const ACCION = "CARGAR GRADOS";
    $.ajax({
        url: `../api/grado/getAllGrados/${id}`,
        type: 'GET',
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(response) {
          if(response.status == 'success'){
            var select = document.getElementById('grado');
            response.grados.forEach((grado) => {
                const option = document.createElement('option');
                option.value = grado.idGrado;
                option.textContent = grado.detalle;

                select.appendChild(option);
            });

          }else{
            console.log(ACCION, 'Ocurrió un error en el registro');
          }
        },
        error: function(response) {
            console.log(ACCION, 'Ocurrió un error en el registro');
        }
    });
};

cargarExpediciones();
cargarDepartamentos();
cargarEstadoCiviles();
cargarFuerzas();