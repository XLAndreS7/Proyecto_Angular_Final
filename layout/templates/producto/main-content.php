<?php
    require_once ('includes/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/data/Producto.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/data/TipoCategoria.php');
    $producto = new Producto(); //Persona persona = new Persona();
    if (isset($_GET['error'])) {
      echo '<script>alert("Hubo un error para realizar la transacción, revise los valores ingresados");</script>';
    }
    if($_SESSION['categoria'] != ''){
      error_log("entra al get");
      $registros = $producto->getFiltro($_SESSION['categoria']);
    } else {
      $registros = $producto->getAll(); //obtenemos todos los registros de la tabla
    }
    $tipos = new TipoCategoria();
    $listadoTipo = $tipos->getAll();
?>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&display=swap");

  * {
    box-sizing: border-box;
    font-family: "Sora", sans-serif;
    padding: 0px;
    margin: 0px;
  }

  .navbar-items {
    z-index: 99;
    position: relative;
    max-width: 900px;
    margin: 0 auto;
    font-size: 15px;
    margin-top: 50px;
  }

  .menu-horizontal {
    z-index: 999;
    list-style: none;
    display: flex;
    justify-content: space-around;
  }

  .menu-horizontal a {
    z-index: 999;
    list-style: none;
    text-decoration: none;
    color: #333;
  }

  .menu-horizontal>li>a {
    padding: 15px 20px;
    display: block;
    color: #333;
    text-decoration: none;
  }

  .menu-horizontal>li a:hover {
    color: red;
    z-index: 999;
  }

  .menu-vertical {
    padding-top: 30px;
    font-size: 12px;
    position: absolute;
    display: none;
    background-color: white;
    color: #333;
    list-style: none;
    width: 100%;
  }

  .menu-horizontal>li:hover .menu-vertical {
    display: block;
  }

  .menu-vertical li a {
    display: block;
    color: #333;
    padding: 15px 15px 15px 20px;
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <title>Creacion de tu producto</title>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/bootstrap.min.css">
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/style.css" />
  <script>
  let tipos = <?php echo json_encode($listadoTipo);?>;
  </script>
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>js/script.js"></script>
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>js/actions.js"></script>
</head>
<body>
  <br>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3">Crear producto</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center">
      <div class="col-3">
        <label class="control-label fw-bold" for="rows">Cantidad de productos que deseas agregar:</label>
      </div>
      <div class="col-6">
        <input class="form-control" type="number" name="rows" id="rows" min="1" max="20" placeholder="Ingrese numero entre 1 y 20">
      </div>
      <div class="col-3">
        <div class="col-3">&nbsp;</div>
        <div class="col-6"><input class="form-control btn btn-primary" type="button" name="btn-create" id="btn-create" value="Crear Tabla"></div>
        <div class="col-3">&nbsp;</div>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center">
      <form action="<?php echo $BASE_ROOT_URL_PATH;?>includes/producto/save.php" method="post">
        <div class="row align-items-center mx-4" id="edit-content">
          <div class="col-12 text-center"><span class="fs-4">Datos de los productos a registrar</span></div>
        </div>
        
        <div class="row align-items-center" id="edit-content">
          <div class="table-responsive col-12 text-center">
            <table class="table table-bordered align-middle" id="edit-table">
              <thead class="table-light">
                <th>Id</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Foto</th>
                <th>Detalles</th>
              </thead>
              <tbody>
                  <tr>
                    <td colspan="6"> </td>
                  </tr>
              </tbody>
            </table>
          </div>
          <div class="col-12 text-center" id="action-button-container">
            <input type="submit" value="Guardar Datos">
          </div>
        </div>
      </form>
    </div>
    

  <div class="row">
    <div class="span12">&nbsp;</div>
  </div>

    <div class="row align-items-center" id="show-content">
      <div class="col-12 text-center">
          <span class="fs-4">Tabla de presentación de productos</span>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered align-middle" id="edit-table">
          <thead class="table-light">
                <th>Id</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Foto</th>
                <th>Detalles</th>
                <th>Acción</th>
          </thead>
          <tbody>
            <?php
              if(count($registros) < 1){
            ?>
              <tr>
                <td colspan="7">No hay productos</td>
              </tr>
            <?php
              } else {

                foreach($registros as $fila) {
            ?>
                <tr>
                  <td><?php echo $fila['id']?></td>
                  <td><?php echo $fila['name']?></td>
                  <td><?php echo $fila['categoria_name']?></td>
                  <td><?php echo $fila['precio']?></td>
                  <td><?php echo $fila['cantidad']?></td>
                  <td><?php echo $fila['foto']?></td>
                  <td><?php echo $fila['detalles']?></td>
                  <td>
                      <input type="button" value="Borrar" onClick="borrar_registro(<?php echo $fila['id']; ?>);">
                      <input type="button" value="Editar" onClick="editar_registro(<?php echo $fila['id']; ?>);">
                  </td>
                </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>    
    </div>
  </div>
</body>
</html>
