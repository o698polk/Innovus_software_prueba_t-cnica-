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
    <form id="login_form_user">
       
    <legend>Crear Producto</legend>
    <div class="mb-3">
     
      <input type="text" id="username_login" name="username_login"class="form-control" placeholder="Email">
    </div>
    <div class="mb-3">
     
     <input type="text" id="password_login" name="password_login" class="form-control" placeholder="Password">
   </div>
    
    <button type="submit" class="btn btn-primary">Crear</button> <button type="buttom" onclick="romoveSesion();" class="btn btn-primary">SALIR</button>
  </fieldset>
</form>
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