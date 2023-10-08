<?php
    require_once ('includes/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/Persona.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/TipoDocumento.php');
    $persona = new Persona(); //Persona persona = new Persona();
    $registros = $persona->getAll(); //obtenemos todos los registros de la tabla

    $tiposDocumento = new TipoDocumento();
    $listadoTipoDocumentos = $tiposDocumento->getAll();
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
  <title>Creación, guardado y presentación de datos de forma dinámica con Javascript y PHP</title>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/bootstrap.min.css">
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/style.css" />
  <script>
    let tiposDocumentos = <?php echo json_encode($listadoTipoDocumentos);?>;
  </script>
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>js/script.js"></script>
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>js/actions.js"></script>
  
</head>
<body>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3">Creación y guardado de datos de forma dinámica con Javascript y PHP</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center">
      <div class="col-3">
        <label class="control-label fw-bold" for="rows">Número de filas de la tabla:</label>
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
      <form action="<?php echo $BASE_ROOT_URL_PATH;?>includes/save.php" method="post">
        <div class="row align-items-center mx-4" id="edit-content">
          <div class="col-12 text-center"><span class="fs-4">Tabla de registro de nuevos datos</span></div>
        </div>
        
        <div class="row align-items-center" id="edit-content">
          <div class="table-responsive col-12 text-center">
            <table class="table table-bordered align-middle" id="edit-table">
              <thead class="table-light">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo Documento</th>
                <th># Documento</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo electrónico</th>
                <th>Fecha de nacimiento</th>
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
          <span class="fs-4">Tabla de presentación de datos</span>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered align-middle" id="edit-table">
          <thead class="table-light">
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Tipo Documento</th>
            <th># Documento</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo electrónico</th>
            <th>Fecha de nacimiento</th>
            <th>Acción</th>
          </thead>
          <tbody>
            <?php
              if(count($registros) < 1){
            ?>
              <tr>
                <td colspan="7">No hay registros</td>
              </tr>
            <?php
              } else {

                foreach($registros as $index => $fila) {
            ?>
                <tr>
                  <td><?php echo ($index + 1)?></td>
                  <td><?php echo $fila['name']?></td>
                  <td><?php echo $fila['lastname']?></td>
                  <td><?php echo $fila['document_type_name']?></td>
                  <td><?php echo $fila['document_number']?></td>
                  <td><?php echo $fila['address']?></td>
                  <td><?php echo $fila['phone']?></td>
                  <td><?php echo $fila['email']?></td>
                  <td><?php echo strlen($fila['birthday'])>=10?substr($fila['birthday'],0,10):''?></td>
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
