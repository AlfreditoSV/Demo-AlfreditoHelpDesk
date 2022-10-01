const btn_GuardarTicket = document.getElementById('btn_GuardarTicket');
btn_GuardarTicket.addEventListener('click', () => {
  const form_AltaTicket = document.getElementById('form_AltaTicket');
  const titulo = document.getElementById('titulo');
  if ($('#ticket_descripcion').summernote('isEmpty') || titulo.value == "") {
      Swal.fire({
        icon: 'warning',
        title: "Es necesario llenar todos los campos",
        showConfirmButton: false,
        timer: 1500
      });
  } else { 
    altaTicket(form_AltaTicket);
  }
  
});
$(function () {
  $('#ticket_descripcion').summernote({
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
function getCategorias() { 
  const categoria = document.getElementById('categoria');
  const consulta = new FormData();
  consulta.append('opcion','combo');
  fetch('../../controller/categoria.php', {
    method: "POST",
    body: consulta
  }).then(response => response.text())
    .then(response => {
      categoria.innerHTML = response;
    })
}
function altaTicket(form) {

  fetch('../../controller/tickets.php', {
    method: "POST",
    body: new FormData(form)
  }).then(response => response.json())
    .then(response => { 
      console.log(response);
      Swal.fire({
        icon: 'success',
        title: "Alta Exitosa",
        showConfirmButton: false,
        timer: 1500
      });
      form.reset();
      $('#ticket_descripcion').summernote('reset');
    })
}

function init() { 
  getCategorias();
}

init();