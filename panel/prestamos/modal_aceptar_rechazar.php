<!-- modal aviso rechazar -->
<div class="modal fade" id="modal_rechazar_pres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Rechazar la solicitud de Préstamo del usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_prestamo_rechazar">
        ¿Está seguro de rechazar la solicitud de préstamo?<br>
        <label for="observacion">Motivo de rechazo</label>
        <input type="text" class="form-control" id="observacion_pres_rechazar"  placeholder="Motivos">
        <small class="form-text text-muted">Motivo de rechazo. (No es obligatorio)</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar</button>
        <button type="button" class="btn btn-danger" onclick="rechazarPres()" data-dismiss="modal">Rechazar</button>
      </div>
    </div>
  </div>
</div>

<!-- modal aviso aceptar -->
<div class="modal fade" id="modal_aceptar_pres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Aceptar la solicitud de préstamo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" id="id_prestamo_aceptar">
          <label for="observacion">¿Existe alguna observación para el prestamo?</label>
          <input type="text" class="form-control" id="observacion_pres_aceptar"  placeholder="Observación">
          <small class="form-text text-muted">Observaciones sobre la solicitud, datos personales, etc. (No es obligatorio)</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar</button>
        <button type="button" class="btn btn-success" onclick="aceptarPres()" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>