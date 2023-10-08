<?php
    require_once ('../../includes/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/data/Producto.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/data/TipoCategoria.php');
    $id = $_GET['id'];

    $producto = new Producto();
    $datos = $producto->getById($id);

    $tiposCategoria = new TipoCategoria();
    $listadoTipo = $tiposCategoria->getAll();

    //$dateStr = strlen($datos['birthday'])>=10?explode('-',substr($datos['birthday'],0,10)):['0000','00','00'];
    //$date = $dateStr[2].'/'.$dateStr[1].'/'.$dateStr[0];
    //$dateStr = strlen($datos['birthday'])>=10?substr($datos['birthday'],0,10):'';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <title>Edición y guardado de datos de forma dinámica con Javascript y PHP</title>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/bootstrap.min.css">
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/style.css" />
</head>
<body>
  <br>
  <div class="container">
    <div class="row align-items-center">people
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3">Edición y guardado de datos de forma dinámica con Javascript y PHP</span>
      </div>
    </div>
    
    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-4">Datos del producto.</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <form class="row g-3 align-items-center" action="<?php echo $BASE_ROOT_URL_PATH;?>includes/producto/update.php" method="post">
      <input type="hidden" name="id" value="<?php echo $datos['id'];?>">
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Nombre</label>
        <div class="col-6">
          <input type="text" class="form-control" name="name" value="<?php echo $datos['name'];?>" placeholder="Ingrese nombre" required>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Tipo</label>
        <div class="col-6">
        <select name="tipo" id="tipo" class="form-control">
          <?php foreach($listadoTipo as $tipos) {?>
            <option value="<?php echo $tipos['id']?>" <?php echo  $tipos['id'] == $datos['categoria_name']?'selected':''?>><?php echo $tipos['name']?></option>
          <?php }?>          
          </select>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Precio</label>
        <div class="col-6">
          <input type="text" class="form-control" name="precio" value="<?php echo $datos['precio'];?>" placeholder="Ingrese el precio">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Cantidad</label>
        <div class="col-6">
          <input type="text" class="form-control" name="cantidad" value="<?php echo $datos['cantidad'];?>" placeholder="Ingrese cantidad">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Foto</label>
        <div class="col-6">
          <input type="text" class="form-control" name="foto" value="<?php echo $datos['foto'];?>" placeholder="Ingrese foto">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Detalles</label>
        <div class="col-6">
          <input type="text" class="form-control" name="detalles" value="<?php echo $datos['detalles'];?>" placeholder="Ingrese detalles">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <div class="col-3">&nbsp;</div>
        <div class="col-6">
          <input type="submit" class="form-control btn btn-primary" name="submit" value="Actualizar" require>
        </div>
        <div class="col-3">&nbsp;</div>
      </div>
    </form>

    <br><br>
  </div>
</body>
</html>

<?php
    //header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
    //exit;