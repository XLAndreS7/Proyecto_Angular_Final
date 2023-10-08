<?php
require_once('includes/config.php');
require_once($BASE_ROOT_FOLDER_PATH . 'includes/database.php');
require($BASE_ROOT_FOLDER_PATH . 'classes/data/Producto.php');
require($BASE_ROOT_FOLDER_PATH . 'classes/data/TipoCategoria.php');
$producto = new Producto(); //Persona persona = new Persona();
$registros = $producto->getAll(); //obtenemos todos los registros de la tabla

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script>
  let registros = <?php echo json_encode($registros);?>;
  </script>
  <link rel="stylesheet" href="style/bills.css">
  <title>PHP Application</title>
  <script src="assets/js/carrito/bills.js"></script>
</head>

<body>


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
          if (count($registros) < 1) {
            ?>
            <tr>
              <td colspan="7">No hay productos</td>
            </tr>
            <?php
          } else {

            foreach ($registros as $fila) {
              ?>
              <tr>
                <td>
                  <?php echo $fila['id'] ?>
                </td>
                <td>
                  <?php echo $fila['name'] ?>
                </td>
                <td>
                  <?php echo $fila['categoria_name'] ?>
                </td>
                <td>
                  <?php echo $fila['precio'] ?>
                </td>
                <td>
                  <?php echo $fila['cantidad'] ?>
                </td>
                <td>
                  <?php echo $fila['foto'] ?>
                </td>
                <td>
                  <?php echo $fila['detalles'] ?>
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




  <div id="container" class="fs-3">
    <form action="bill-processing.php" method="post">
      <div class="row g-3 p-3 m-2">
        <div class="col-3 odd">
          <div class="col-12">
            <label class="form-label">Producto</label>
          </div>
          <div class="col-12">

          <select id="producto_0" name="producto[]" class="form-control">
          <?php
          foreach($registros as $prod) {
          ?>
                      <option value="<?php echo $prod['id'] ?>"><?php echo $prod['name'] ?></option>
                      
          <?php
          }
          ?>
                      </select> 
          </div>
        </div>
        <div class="col-3 odd">
          <div class="col-12">
            <label class="form-label">Cantidad</label>
          </div>
          <div class="col-12">
            <input type="number" class="form-control" id="cantidad_0" name="cantidad[]">
          </div>
        </div>
        <div class="col-3 odd">
          <div class="col-12">
            <label class="form-label">Tiene IVA?</label>
          </div>
          <div class="col-12">
            <select id="tiene_iva_0" name="tiene_iva[]" class="form-control" onchange="enableTaxValue(0)">
              <option value="S">Si</option>
              <option value="N" selected>No</option>
            </select>
          </div>
        </div>
        <div class="col-3 odd">
          <div class="col-12">
            <label class="form-label">% IVA</label>
          </div>
          <div class="col-12">
            <input type="number" class="form-control" id="iva_0" name="iva[]" value="0" readonly>
          </div>
        </div>
      </div>
      <div id="container-new" class="row g-3 p-3 m-2"></div>
      <div class="row g-3 p-3 my-2 mx-2">
        <div class="col-4">
          <input type="button" value="Adicionar Producto" id="addLineBtn" onclick="addLine2();">
        </div>
        <!--<div class="col-4">
          <input type="button" value="Calcular Total" id="addLineBtn" onclick="totalCalculation2();">
        </div>-->
      </div>
    </form>

    <div class="table-responsive">
      <table class="table table-bordered align-middle" id="edit-table">
        <thead class="table-light">
          <th>Producto</th>
          <th>Cantidad</th>
          <th>iva?</th>
          <th>Valor Iva</th>
        </thead>
        <tbody id="carro">
        </tbody>
      </table>
    </div>


    <div class="row g-3 p-3 my-2 mx-5">
      <div class="col-12">
        <label for="total_factura" class="fs-3 fw-bold">Subtotal: </label>
        <span id="total_factura" class="fs-3 fw-bolder">0.0</span>
      </div>

      <div class="col-12">
        <label for="total_iva_factura" class="fs-3 fw-bold">Total IVA Factura: </label>
        <span id="total_iva_factura" class="fs-3 fw-bolder">0.0</span>
      </div>

      <div class="col-12">
        <label for="promedio_producto" class="fs-3 fw-bold">Total:</label>
        <span id="promedio_producto" class="fs-3 fw-bolder">0.0</span>
      </div>
    </div>
  </div>
</body>
<footer>

<?php
// Cerrar la conexión
//$conn->close();
?>
</footer>

</html>