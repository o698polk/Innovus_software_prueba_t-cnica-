document.addEventListener('DOMContentLoaded', function () {

  CreateProduct();
  EditProduct();
  DeleteProduct();
  showProduct();
  romoveSesion();
  verify();
     /****************************************************************************************** */

     function verify() {
            var token=  localStorage.getItem('authToken');
              if(token==null){
                console.log(token);
                window.location.href = "login"; 
              }
     }


     function showProduct() {

      console.log(localStorage.getItem('authToken'));
      let Datos = {
        showproduct: "product",
        token: localStorage.getItem('authToken')
      }
     
      $.post("../backend/route/routerApiProduct.php", Datos, function (data) {
        console.log(data);
        var response = JSON.parse(data);
        if (response.status === "200") {
          console.log(response.data);
          // Redirigir al dashboard
          generarTabla(response.data);
      
       
      } else {
          alert("Error: No Datos");
      }

      });
     
  }
  function romoveSesion() {
    $(document).on('click', "#login_remove", function (e) {
      e.preventDefault();
      if (confirm('Salir')) {
      localStorage.removeItem('email');
      localStorage.removeItem('authToken');
      window.location.href = "login"; 
      }
    
});
}
  function generarTabla(data) {
      var tabla = '<table class="table">';
      tabla += '<thead>';
      tabla += '<tr>';
      tabla += '<th>ID</th>';
      tabla += '<th>Nombre</th>';
      tabla += '<th>Precio</th>';
      tabla += '<th>Editar</th>';
      tabla += '<th>Eliminar</th>';
      tabla += '</tr>';
      tabla += '</thead>';
      tabla += '<tbody>';
  
      // Recorre los datos y genera las filas de la tabla
      data.forEach(function (producto) {
          tabla += '<tr>';
          tabla += '<td>' + producto.id + '</td>';
          tabla += '<td>' + producto.nombre + '</td>';
          tabla += '<td>' + producto.precio + '</td>';
          tabla += '<td> <a type="button" href="editproduct.php?id="'+ producto.id + 'class="btn btn-primary">Editar </td>';
          tabla += '<td> <a type="button" href="editproduct.php?id="'+ producto.id + 'class="btn btn-primary">Eliminar </td>';
          tabla += '</tr>';
      });
  
      tabla += '</tbody>';
      tabla += '</table>';
  
      // Inserta la tabla generada en el contenedor deseado
      $('#tabla_productos').html(tabla);
  }
  


  function CreateProduct() {
    $(document).on('submit', "#product_form", function (e) {
      e.preventDefault();
      // let id_user=$("#descript_nw").attr('id_user');

      var formData = new FormData(document.getElementById("product_form"));
       formData.append('token',localStorage.getItem('authToken'));
      if (confirm('Crear productol')) {
        $.ajax({
          url: "../backend/route/routerApiProduct.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function (response) {

          }
        })

          .done(function (r) {
            var response = JSON.parse(r);
            console.log(response);

            if (response.data == 1) {
             location.reload();
            
            } else {
              alert("Error");
            }


          });


      }

    });

  }


  function EditProduct() {
    $(document).on('submit', "#form_product", function (e) {

    

    });

  }
  function DeleteProduct() {
    $(document).on('click', ".id_delete_product", function (e) {
     
    });
  }











});


