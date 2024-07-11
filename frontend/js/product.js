document.addEventListener('DOMContentLoaded', function () {

  CreateProduct();
  EditProduct();
  DeleteProduct();
  showProduct();
  verify();
     /****************************************************************************************** */

     function verify() {
            var token=  localStorage.getItem('authToken');
              if(token==null){
                console.log(token);
             //   window.location.href = "login"; 
              }
     }




     function showProduct() {
       
        // formData.append('id_user_nt',id_user);
        if (confirm('Crear Canal')) {
          $.ajax({
            url: "../backend/route/routerApiProduct.php",
            type: "get",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function (response) {
              $('#load_canal').html('<p style="font-size:20px; color:blue; ">Cargando...</p>');
  
            }
          })
  
            .done(function (r) {
              console.log(r);
              if (r == 1) {
              location.reload();
              
              } else {
                alert("Error");
              }
  
  
            });
  
  
        }
  
  
  
    }



  function CreateProduct() {
    $(document).on('submit', "#form_public_tv", function (e) {
      e.preventDefault();
      // let id_user=$("#descript_nw").attr('id_user');

      var formData = new FormData(document.getElementById("form_public_tv"));
      // formData.append('id_user_nt',id_user);
      if (confirm('Crear Canal')) {
        $.ajax({
          url: "../backend/route/routerApiProduct.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function (response) {
            $('#load_canal').html('<p style="font-size:20px; color:blue; ">Cargando...</p>');

          }
        })

          .done(function (r) {
            console.log(r);
            if (r == 1) {
            location.reload();
            
            } else {
              alert("Error");
            }


          });


      }

    });

  }


  function EditProduct() {
    $(document).on('submit', "#form_public_tv_edit", function (e) {
      e.preventDefault();
      let id_edit_showtv= $("#name_tv_edit").attr('id_showtv');

      var formData = new FormData(document.getElementById("form_public_tv_edit"));
      formData.append('id_edit_showtv', id_edit_showtv);
      if (confirm('Editar Canales')) {
        $.ajax({
          url: "bk/datos/contro.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function (response) {
            $('#MostrarPorceso2').html('<p style="font-size:20px; color:blue; ">Cargando...</p>');

          }
        })

          .done(function (r) {
            console.log(r);
            if (r == 1) {
              location.reload();
             
            } else {
              alert("Error");
            }


          });


      }

    });

  }
  function DeleteProduct() {
    $(document).on('click', ".id_delete_show_tv", function (e) {
      e.preventDefault();
      id_showtv_delete_ = $(this).attr('id_showtv_delete');
      let Datos = {
        id_showtv_delete:id_showtv_delete_

      }
      if (confirm('Eliminar Canal/-' + id_showtv_delete_)) {
        $.post("bk/datos/contro.php", Datos, function (data) {
          console.log(data);

          if (data == 1) {
            location.reload();
          } else {
            alert("Error");
          }

        });

      }

    });
  }











});


