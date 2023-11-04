<!-- modal aviso rechazar -->
<div class="modal fade" id="modal_rechazar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Rechazar la solicitud de afiliación al usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_usuario_rechazar">
        ¿Está seguro de rechazar la solicitud del usuario?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar</button>
        <button type="button" class="btn btn-danger" onclick="rechazarSocio()" data-dismiss="modal">Rechazar</button>
      </div>
    </div>
  </div>
</div>

<!-- modal aviso aceptar -->
<div class="modal fade" id="modal_aceptar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Aceptar la solicitud de afiliación al usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" id="id_usuario_aceptar">
          <label for="observacion">¿Existe alguna observación para el usuario?</label>
          <input type="text" class="form-control" id="observacion"  placeholder="Observación">
          <small class="form-text text-muted">Observaciones sobre los documentos presentados, datos personales, etc. (No es obligatorio)</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar</button>
        <button type="button" class="btn btn-success" onclick="aceptarSocio()" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- modal editar usuario -->
<div class="modal fade" id="modal_edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Modificar Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-center" id="body_edit"></div>
        <div class="form-group">
          <label>Nombre y fuerza</label>
          <!-- <small class="form-text text-info">Observaciones sobre los documentos presentados, datos personales, etc. (No es obligatorio)</small> -->
          <input type="text" id="nombre_edit" class="form-control" readonly>
          <input type="text" id="fuerza_edit" class="form-control mt-2" readonly>
        </div>
        <form onsubmit="return false;" id="form_edit_user">
        <input type="hidden" name="idSocio" id="id_socio_edit">
          <div class="form-group" id="grado_edit"></div>
          <div class="form-group" id="ciudad_edit"></div>
          <div class="form-group">
            <label for="localidad_edit">Localidad</label>
            <input type="text" class="form-control" name="localidad" id="localidad_edit">
          </div>
          <div class="form-group">
            <label for="calle_edit">Calle/Avenida y Número</label><br>
            <div class="input-group">
              <input class="form-control" type="text" name="calle" id="calle_edit">
              <input class="form-control" type="text" name="numero" id="nro_edit">
            </div>
          </div>
          <div class="form-group" id="estado_civil_edit"></div>
          <div class="form-group">
            <label for="correo_edit">Correo electrónico</label>
            <input type="email" class="form-control" name="correo" id="correo_edit">
          </div>
          <div class="form-group">
            <label for="celular_edit">Número de celular</label>
            <input type="text" class="form-control" name="celular" id="celular_edit">
          </div>
        </form>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar</button>
        <button type="button" class="btn btn-success" onclick="guardarEdit()" data-dismiss="modal">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<!-- modal eliminar -->
<div class="modal fade" id="modal_delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Eliminar al usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Usuario: <span id="nombre_delete"></span></h3>
        <hr>
        <input type="hidden" id="id_socio_delete">
        ¿Está seguro de desea eliminar al socio?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar</button>
        <button type="button" class="btn btn-danger" onclick="deleteSocio()" data-dismiss="modal">Eliminar</button>
      </div>
    </div>
  </div>
</div>