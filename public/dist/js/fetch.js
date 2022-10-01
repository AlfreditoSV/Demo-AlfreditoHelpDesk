class Peticiones { 
  login = (form,ubi_alert) => { 
    fetch('./apis/login.php', {
      method: "POST",
      body: new FormData(form),
    }).then(result => result.text())
      .then(
        result => { 
          console.log(result);
          if (result == 'error_1') {
            ubi_alert.innerHTML =`
            <div class="alert alert-danger text-center">
            <p><i class="icon fas fa-ban">Ingresa tus datos para continuar</i></p></div>`
          
          } else if (result == 'error_2') {
            ubi_alert.innerHTML =`
            <div class="alert alert-danger text-center">
            <p><i class="icon fas fa-ban"> Usuario y/o Contraseña invalido</i></p></div>`
          } else { 
            window.location.href = result;
          }
        }
    );
  }
 getCookie=(name)=>{
    var match = document.cookie.match(new RegExp("(^| )" + name + "=([^;]+)"));
    if (match) {
      return match[2];
    }
    return false;
  }
}