<!-- MODAL -->
<div class="modal fade" id="modal_garante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Garantes del préstamo tipo: <b id="t_garante"></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped" style="width:100%">
          <thead>
            <tr align="center">
              <th>Nombre</th>
              <th>Apellidos</th>
            </tr>
          </thead>
          <tbody id="t_body_gar"></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>