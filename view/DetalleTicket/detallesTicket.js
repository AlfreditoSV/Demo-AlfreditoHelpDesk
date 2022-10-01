const btn_EnviarTicket = document.getElementById('btn_EnviarTicket');  
const btn_CerrarTicket = document.getElementById('btn_CerrarTicket');
const user_id = document.getElementById('user_idSession').value;
let id =new URLSearchParams(window.location.search).get('id'); 

function init() { 
  $('#dticket_descripcion').summernote('disable');
  get_ChatTicket(id);
  datosInfoTicket(id);
}

$(function () {
  $('#tkdetalle_descripcion').summernote({
    height: 150,
    lang: "es-ES",
    callbacks: {
        onImageUpload: function(image) {
            console.log("Image detect...");
            myimagetreat(image[0]);
        },
        onPaste: function (e) {
            console.log("Text detect...");
        }
    }
});
});

function get_ChatTicket(id) {
  const cont_detalles = document.getElementById('cont_timeline');
  const parametros = new FormData();
  parametros.append('ticket_id', id);
  parametros.append('opcion', 'listaDetalle');
  fetch('../../controller/tickets.php', {
    method: "POST",
    body: parametros
  }).then(response => response.text())
    .then(response => {
      cont_detalles.innerHTML=response;
    });
  }


function datosInfoTicket(id) { 
  const cont_ChatTicket = document.getElementById('cont_ChatTicket');
  const parametrosheader = new FormData();
  parametrosheader.append('ticket_id', id);
  parametrosheader.append('opcion', 'mostrarInfoTicket');
  fetch('../../controller/tickets.php', {
    method: "POST",
    body: parametrosheader
  }).then(response => response.json())
    .then(response => {
      if (response.estado_ticket != 'abierto') { 
        lb_EstatusTicket.className = 'badge badge-danger';
        lb_EstatusTicket.innerHTML = response.estado_ticket;
        cont_ChatTicket.style.display = "none";
      }
      else { 
        lb_EstatusTicket.innerHTML = response.estado_ticket;
        cont_ChatTicket.style.display = "block";
      }
      lb_NombUsuario.innerHTML=response.user_name + response.user_surname;
      lb_FechaCreate.innerHTML = response.fecha_creacion;
      dticket_titulo.value = response.titulo_ticket;
      dticket_categoria.value = response.nombre_categoria;
      $('#dticket_descripcion').summernote('code', response.descripcion_ticket);
      h1_IdTicket.innerHTML = "Detalles de Ticket #" + response.ticket_id;
    });
}



function set_ChatTicket() { 
  const form_ChatTicket = document.getElementById('form_ChatTicket');
  
  const form_Chat = new FormData(form_ChatTicket);
  form_Chat.append('ticket_id', id);
  form_Chat.append('user_id', user_id);
  form_Chat.append('opcion', 'chatTicket');
  fetch('../../controller/tickets.php', {
    method: "POST",
    body: form_Chat,
  }).then(response => response.text())
    .then(response => {
      get_ChatTicket(id);
      $('#tkdetalle_descripcion').summernote('reset');
      console.log(response)
      Swal.fire({
        icon: 'success',
        title: "Envio Exitoso",
        showConfirmButton: false,
        timer: 1500
      });
   
    });

}
function cerrarTicket() {
  const form_Cierre = new FormData(form_ChatTicket);
  form_Cierre.append('user_id', user_id);
  form_Cierre.append('ticket_id', id);
  form_Cierre.append('opcion', 'cerrarTicket');
  fetch('../../controller/tickets.php', {
    method: "POST",
    body: form_Cierre,
  });    
  }

btn_CerrarTicket.addEventListener('click', () => { 

  Swal.fire({
    title: '¿Esta seguro de cerrar el ticket?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si,cerrar ticket'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Ticket Cerrado',
        'Se cerro el ticket de forma correcta',
        'success'
      )
      cerrarTicket();      
      window.location.reload();
    }
  })
})

btn_EnviarTicket.addEventListener('click', () => { 
  if ($('#tkdetalle_descripcion').summernote('isEmpty')) {
    Swal.fire({
      icon: 'warning',
      title: "Mensaje vacío",
      showConfirmButton: false,
      timer: 1500
    });
  } else {
    set_ChatTicket();
  }

});

init(); 