<?php
require_once($BASE_ROOT_FOLDER_PATH . 'includes/database.php');
require($BASE_ROOT_FOLDER_PATH . 'classes/data/Persona.php');
require($BASE_ROOT_FOLDER_PATH . 'classes/data/TipoDocumento.php');
$persona = new Persona(); //Persona persona = new Persona();
$registros = $persona->getAll(); //obtenemos todos los registros de la tabla

$tiposDocumento = new TipoDocumento();
$listadoTipoDocumentos = $tiposDocumento->getAll();
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

<script>
  let tiposDocumentos = <?php echo json_encode($listadoTipoDocumentos); ?>;
</script>
<div class="container">
  <div class="row align-items-center">
    <div class="col-12 text-center">
      <span class="fw-bolder fs-3">Crear cliente</span>
    </div>
  </div>

  <div class="row">
    <div class="span12">&nbsp;</div>
  </div>

  <div class="row align-items-center">
    <div class="col-3">
      <label class="control-label fw-bold" for="rows">Número de clientes a registrar:</label>
    </div>
    <div class="col-6">
      <input class="form-control" type="number" name="rows" id="rows" min="1" max="20"
        placeholder="Ingrese numero entre 1 y 20">
    </div>
    <div class="col-3">
      <div class="col-3">&nbsp;</div>
      <div class="col-6"><input class="form-control btn btn-primary" type="button" name="btn-create" id="btn-create"
          value="Crear Tabla"></div>
      <div class="col-3">&nbsp;</div>
    </div>
  </div>

  <div class="row">
    <div class="span12">&nbsp;</div>
  </div>

  <div class="row align-items-center">
    <form action="<?php echo $BASE_ROOT_URL_PATH; ?>modules/cliente/save.php" method="post">
      <div class="row align-items-center mx-4" id="edit-content">
        <div class="col-12 text-center"><span class="fs-4">Datos del cliente a registrar.</span></div>
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
          if (count($registros) < 1) {
            ?>
            <tr>
              <td colspan="7">No hay registros</td>
            </tr>
            <?php
          } else {

            foreach ($registros as $index => $fila) {
              ?>
              <tr>
                <td>
                  <?php echo ($index + 1) ?>
                </td>
                <td>
                  <?php echo $fila['name'] ?>
                </td>
                <td>
                  <?php echo $fila['lastname'] ?>
                </td>
                <td>
                  <?php echo $fila['document_type_name'] ?>
                </td>
                <td>
                  <?php echo $fila['document_number'] ?>
                </td>
                <td>
                  <?php echo $fila['address'] ?>
                </td>
                <td>
                  <?php echo $fila['phone'] ?>
                </td>
                <td>
                  <?php echo $fila['email'] ?>
                </td>
                <td>
                  <?php echo strlen($fila['birthday']) >= 10 ? substr($fila['birthday'], 0, 10) : '' ?>
                </td>
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