const btn_GuardarRegistro = document.getElementById("btn_GuardarRegistro");
const btn_CerrarRegistro = document.getElementById("btn_CerrarRegistro");
const form_NuevoRegistro = document.getElementById("form_NuevoRegistro");
const modal_title = document.getElementById('modal-title');
function init() {
  listaUsuarios();
}
function listaUsuarios() {
  $("#usuarios_Table")
    .dataTable({
      aProcessing: true,
      aServerSide: true,
      dom: "Bfrtip",
      searching: true,
      lengthChange: false,
      colReorder: true,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      ajax: {
        url: "../../controller/usuarios.php",
        type: "post",
        dataType: "json",
        data: { opcion: "listaUsuarios" },
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      responsive: true,
      bInfo: true,
      iDisplayLength: 10,
      autoWidth: false,
      language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
        oAria: {
          sSortAscending:
            ": Activar para ordenar la columna de manera ascendente",
          sSortDescending:
            ": Activar para ordenar la columna de manera descendente",
        },
      },
    })
    .DataTable()
    .buttons()
    .container()
    .appendTo("#ticket_table_wrapper .col-md-6:eq(0)");
}
function altaYActualizacionRegistro(user_id) {
  const form_Alta = new FormData(form_NuevoRegistro);
  form_Alta.append("opcion", "altayactualizar");
  fetch("../../controller/usuarios.php", {
    method: "POST",
    body: form_Alta,
  })
    .then((response) => response.text())
    .then((response) => {
      console.log(response);
      Swal.fire({
        icon: "success",
        title: "Alta Exitosa",
        showConfirmButton: false,
        timer: 1500,
      });
      limpiarCampos();
      $("#usuarios_Table").DataTable().ajax.reload();
    });
}
function get_Registro(user_id) {
  const form_Actualizar = new FormData();
  form_Actualizar.append("user_id", user_id);
  form_Actualizar.append("opcion", "mostrarUsuario");
  fetch("../../controller/usuarios.php", {
    method: "POST",
    body: form_Actualizar,
  })
    .then((response) => response.json())
    .then((response) => {
      console.log(response);
      response.forEach((data) => {
        user_name.value = data[0];
        user_surname.value = data[1];
        user_email.value = data[2];
        user_pass.value = data[3];
        user_rol.value = data[4];
        usu_id.value = data[5];
      });
      modal_title.textContent="Actualizar Registro"
      btn_GuardarRegistro.textContent="Actualizar Registro"
    });
}

function eliminarRegistro(user_id) {
  const form_Eliminar = new FormData();
  form_Eliminar.append("user_id", user_id);
  form_Eliminar.append("opcion", "eliminar");
  fetch("../../controller/usuarios.php", {
    method: "POST",
    body: form_Eliminar,
  });
}
function eliminar(user_id) {
  Swal.fire({
    title: "¿Esta seguro de eliminar el usuario?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Usuario Eliminado", "Se elimino de forma correcta", "success");
      eliminarRegistro(user_id);
      $("#usuarios_Table").DataTable().ajax.reload();
    }
  });
}
function limpiarCampos() { 
  modal_title.textContent = "Nuevo registro";
  btn_GuardarRegistro.textContent = "Guardar registro";
  usu_id.value = "";  
  form_NuevoRegistro.reset();
}
btn_GuardarRegistro.addEventListener("click", () => { 
  altaYActualizacionRegistro();
});
btn_CerrarRegistro.addEventListener("click",limpiarCampos);
init();
