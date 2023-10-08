<?php
    require_once ('../../includes/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/data/Producto.php');
    $id = $_GET['id'];

    $producto = new Producto();

    $producto->delete($id);

    header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
    exit;