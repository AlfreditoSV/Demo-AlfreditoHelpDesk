<div class="modal fade" id="moda-NuevoRegistro">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modal-title">Nuevo Registro</h4>
              
              </button>
            </div>
            <div class="modal-body">
            <form id="form_NuevoRegistro">
                <input type="hidden" name="usu_id" id="usu_id" value="">
                <div class="form-group">
                    <label for="user_name">Nombre</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label for="user_surname">Apellido</label>
                    <input type="text" class="form-control" name="user_surname" id="user_surname" placeholder="Surname" required>
                  </div>
                  <div class="form-group">
                    <label for="user_email">Correo Electrónico</label>
                    <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email adress" required>
                  </div>
                  <div class="form-group">
                    <label for="user_pass">Contraseña</label>
                    <input type="text" class="form-control" name="user_pass" id="user_pass" placeholder="Password" required>
                  </div>    
                  <div class="form-group">
                  <label for="user_rol">Rol del usuario</label>
                  <select class="form-control" style="width: 100%;" name="user_rol" id="user_rol">
                    <option selected="selected">Tipo de Rol</option>
                    <option value="2">Usuario</option>
                    <option value="1">Soporte</option>
                    </select>              
                  </div>          
  
                <div class="card-footer">
                  
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" id="btn_CerrarRegistro" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btn_GuardarRegistro" data-dismiss="modal">Guardar Registro</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->