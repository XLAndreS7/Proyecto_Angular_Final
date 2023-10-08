<?php
  require_once('../includes/config.php');

  if(!empty($_GET['active_module'])){
    session_start();
    $_SESSION['module_name'] = $_GET['active_module'];
    $_SESSION['module_title'] = $module_title[$_SESSION['module_name']];
    $_SESSION['categoria'] = $_GET['categoria'] == '' ? '' : $_GET['categoria'];
  }

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;