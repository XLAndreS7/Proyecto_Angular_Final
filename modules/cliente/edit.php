<?php
    require_once ('../../includes/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/data/Persona.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/data/TipoDocumento.php');
    $id = $_GET['id'];

    $persona = new Persona();
    $datos = $persona->getById($id);

    //$dateStr = strlen($datos['birthday'])>=10?explode('-',substr($datos['birthday'],0,10)):['0000','00','00'];
    //$date = $dateStr[2].'/'.$dateStr[1].'/'.$dateStr[0];
    $dateStr = strlen($datos['birthday'])>=10?substr($datos['birthday'],0,10):'';

    $tiposDocumento = new TipoDocumento();
    $listadoTipoDocumentos = $tiposDocumento->getAll();

    require_once($BASE_ROOT_FOLDER_PATH.'layout/partials/header.php');
    //require_once($BASE_ROOT_FOLDER_PATH."layout/templates/{$_SESSION['module_name']}/main-content.php");
?>
    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3">Edición Persona</span>
      </div>
    </div>
    
    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-4">Datos de la persona.</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <form class="row g-3 align-items-center" action="<?php echo $BASE_ROOT_URL_PATH;?>modules/cliente/update.php" method="post">
      <input type="hidden" name="id" value="<?php echo $datos['id'];?>">
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Nombre</label>
        <div class="col-6">
          <input type="text" class="form-control" name="name" value="<?php echo $datos['name'];?>" placeholder="Ingrese nombre" required>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Apellido</label>
        <div class="col-6">
          <input type="text" class="form-control" name="lastname" value="<?php echo $datos['lastname'];?>" placeholder="Ingrese apellido">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Tipo de Documento de Identidad</label>
        <div class="col-6">
          <select name="document_type" id="document_type" class="form-control">
          <?php foreach($listadoTipoDocumentos as $tipoDocumento) {?>
            <option value="<?php echo $tipoDocumento['id']?>" <?php echo  $tipoDocumento['id'] == $datos['document_type_id']?'selected':''?>><?php echo $tipoDocumento['name']?></option>
          <?php }?>          
          </select>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Número de documento</label>
        <div class="col-6">
          <input type="text" class="form-control" name="document_number" value="<?php echo $datos['document_number'];?>" placeholder="Ingrese número de identificación">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Dirección</label>
        <div class="col-6">
          <input type="text" class="form-control" name="address" value="<?php echo $datos['address'];?>" placeholder="Ingrese dirección">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Teléfono</label>
        <div class="col-6">
          <input type="text" class="form-control" name="phone" value="<?php echo $datos['phone'];?>" placeholder="Ingrese teléfono">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Correo electrónico</label>
        <div class="col-6">
          <input type="email" class="form-control" name="email" value="<?php echo $datos['email'];?>" placeholder="Ingrese correo electrónico">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Fecha de nacimiento</label>
        <div class="col-6">
          <input type="date" class="form-control" name="birthday" value="<?php echo $dateStr;?>" placeholder="Ingrese fecha de nacimiento">
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
<?php
    require_once($BASE_ROOT_FOLDER_PATH.'layout/partials/footer.php');