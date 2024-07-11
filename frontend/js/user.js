document.addEventListener('DOMContentLoaded', function () {

    login();
    romoveSesion();





/***********************************LOGIN INICIO DE SESION */
function login() {
    $(document).on('submit', "#login_form_user", function (e) {
      e.preventDefault();

      let email = $("#username_login").val();
      let pass = $("#password_login").val();
      let Datos = {
        login_api_rute:"loginrouter",
        userlogin: email,
        passlogin: pass

      }

      if (email.trim().length > 0 && pass.trim().length > 0) {


        if (confirm('Iniciar Sesión')) {

          $.post("../backend/route/routerApiUser.php", Datos, function (data) {
            console.log(data);
            var response = JSON.parse(data);
            if (response.status === "200") {
              // Asignar valores a las variables desde el token decodificado
              var email = response.email;
              var token = response.token;
              localStorage.setItem('email', email);
              localStorage.setItem('authToken', token);
              // Redirigir al dashboard
               window.location.href = "dashboard";
               console.log(data);
               console.log(localStorage.getItem('authToken', token));
          } else {
              alert("Error: Credenciales incorrectas");
          }

          });


        }
      }

    });

  }
  function romoveSesion() {
    $(document).on('submit', "#login_remove", function (e) {
      e.preventDefault();
      localStorage.removeItem('email');
      localStorage.removeItem('authToken');
      window.location.href = "login"; 
    
});
}


});


