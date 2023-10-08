<?php
  require_once ('../../includes/config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/data/Producto.php');
  
  if(!empty($_POST['name'])){
    
    $producto = new Producto();
    $producto->update( $_POST['id'], $_POST['name'], $_POST['precio'], $_POST['tipo'], $_POST['cantidad'], $_POST['foto'], $_POST['detalles']);
  }

  //echo '<pre>';
  //print_r($_POST);
  //echo '</pre>';prueba

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;