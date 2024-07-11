<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
    <div class="container">
    <button type="buttom" id="login_remove" class="btn btn-danger">SALIR</button>
    <form id="product_form">
       
    <legend>Crear Producto</legend>
    <div class="mb-3">
     
      <input type="text" id="nombre" name="nombre_product"class="form-control" placeholder="Nombre producto">
    </div>
    <div class="mb-3">
     
     <input type="text" id="precio" name="precio" class="form-control" placeholder="Precio producto">
   </div>
   <div class="mb-3">
     
     <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Decripcion producto">
   </div>
   <div class="mb-3">
     
     <input type="text" id="stock" name="stock" class="form-control" placeholder="Stock Porductos">
   </div>
    
    <button type="submit" class="btn btn-primary">Crear</button>
  </fieldset>
</form>
</div>

<div class="container">

<!-- Modal -->

<div class="modal" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         X
        </button>
      </div>
      <div class="modal-body">
   
      <form id="editForm_produt">
          <div class="form-group">
            <label for="editId">ID:</label>
            <input type="text" class="form-control" id="editId" name="id" readonly>
          </div>
          <div class="form-group">
            <label for="editNombre">Nombre:</label>
            <input type="text" class="form-control" id="editNombre" name="edit_nombre">
          </div>
          <div class="form-group">
            <label for="editPrecio">Precio:</label>
            <input type="text" class="form-control" id="editPrecio" name="precio">
          </div>
          <div class="form-group">
            <label for="editStock">Stock:</label>
            <input type="text" class="form-control" id="editStock" name="stock">
          </div>
          <div class="form-group">
            <label for="editStock">Descripcion:</label>
            <input type="text" class="form-control" id="editDescripcion" name="descripcion">
          </div>
          <button type="submit" class="btn btn-primary">Editar</button>
       </form>
      </div>
      
    </div>
  </div>
</div>

</div>


<div class="container">
<div id="tabla_productos"> 

</div>


</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/product.js"></script>
    </body>
</html>