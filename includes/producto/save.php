<?php
  require_once ('../../includes/config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/data/Producto.php');
  $respuesta = '';
  if(!empty($_POST['nombre'])){
    $producto = new Producto();

    $num_rows = count($_POST['nombre']);

    for($i = 0; $i < $num_rows; $i++){   
                  
      $id =  $_POST['identificador'][$i];
      $name =  $_POST['nombre'][$i];
      $precio =  $_POST['precio'][$i];
      $tipo =  $_POST['tipo'][$i];
      $cantidad =  $_POST['cantidad'][$i];
      $foto =  $_POST['foto'][$i];
      $detalles =  $_POST['detalles'][$i];

      $respuesta = $producto->save( $id, $name, $precio, $tipo, $cantidad, $foto, $detalles);
      error_log($respuesta);
      
    }
  }

  header('Location: '.$BASE_ROOT_URL_PATH.'?error=1'); // Forma de redireccionar hacia la pagina principal (index.php)
  
  exit;
    