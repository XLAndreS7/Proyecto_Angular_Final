<?php
  require_once ('../../includes/config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/data/Persona.php');
  
  if(!empty($_POST['name'])){
    
    $persona = new Persona();
    $persona->update( $_POST['id'], $_POST['name'], $_POST['lastname'], $_POST['document_type'], $_POST['document_number'], $_POST['address'], $_POST['phone'], $_POST['email'], $_POST['birthday']);
  }

  //echo '<pre>';
  //print_r($_POST);
  //echo '</pre>';

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;