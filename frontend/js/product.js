document.addEventListener('DOMContentLoaded', function () {

  createProduct();
  editProduct();
  deleteProduct();
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
      tabla += '<th>Stock</th>';
      tabla += '<th>Descripcion</th>';
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
          tabla += '<td>' + producto.stock + '</td>';
          tabla += '<td>' + producto.descripcion + '</td>';
          tabla += '<td><a href="#" class="editButton" data-id="' + producto.id + '">Editar</a></td>';
          tabla += '<td> <a type="button"  href="#" class=" id_delete_product" id_produtc="'+ producto.id +'">Eliminar </td>';
          tabla += '</tr>';
      });
  
      tabla += '</tbody>';
      tabla += '</table>';
  
      // Inserta la tabla generada en el contenedor deseado
      $('#tabla_productos').html(tabla);

      // Añadir eventos a los botones de edición
  $('.editButton').on('click', function () {
    var id = $(this).data('id');
    abrirModalEdicion(id);
  });
  }
  
  function abrirModalEdicion(id) {
    let Datos = {
      editproductdata: id,
      token: localStorage.getItem('authToken')
    };
  
    // Obtener los datos del producto según el ID
    $.post("../backend/route/routerApiProduct.php", Datos, function (data) {
      var response = JSON.parse(data);
      if (response.status === "200") {
        var producto = response.data;
        console.log(producto[0].id);
        // Rellenar el formulario con los datos del producto
        $('#editId').val(producto[0].id);
        $('#editNombre').val(producto[0].nombre);
        $('#editPrecio').val(producto[0].precio);
        $('#editDescripcion').val(producto[0].descripcion);
        $('#editStock').val(producto[0].stock);
  
        // Mostrar el modal
        $('#editModal').css('display', 'block');
      } else {
        alert("Error: No Datos");
      }
    });
  }
  
  // Función para cerrar el modal
  $('.close').on('click', function () {
    $('#editModal').css('display', 'none');
  });
  
  
 

  


  function createProduct() {
    $(document).on('submit', "#product_form", function (e) {
      e.preventDefault();
      // let id_user=$("#descript_nw").attr('id_user');

      var formData = new FormData(document.getElementById("product_form"));
       formData.append('token',localStorage.getItem('authToken'));
       formData.append('id_product_create', "Nuevo producto");
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
              showProduct();
            
            } else {
              alert("Error");
            }


          });


      }

    });

  }


  function editProduct() {
    $(document).on('submit', "#editForm_produt", function (e) {
      e.preventDefault();
    let id=  $('#editId').val();
      var formData = new FormData(document.getElementById("editForm_produt"));
      formData.append('id_product_edit', id);
      formData.append('token', localStorage.getItem('authToken'));
      if (confirm('Editar Producto nuevo/'+id)) {
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
              showProduct();
              $('#editModal').css('display', 'none');
            } else {
              alert("Error");
            }
  
  
          });
        }  
    

    });

  }
  function deleteProduct() {
    $(document).on('click', ".id_delete_product", function (e) {
      e.preventDefault();
    id_ch_delete_ = $(this).attr('id_produtc');
    let Datos = {
      id_product_delete: id_ch_delete_,
      token: localStorage.getItem('authToken')
    }
    if (confirm('Eliminar Producto /-' + id_ch_delete_)) {
      $.post("../backend/route/routerApiProduct.php", Datos, function (data) {
        console.log(data);
        var response = JSON.parse(data);
        console.log(response);
        if (response.status == "200") {
          showProduct();
        } else {
          alert("Error");
        }

      });

    }
    });
  }











});


