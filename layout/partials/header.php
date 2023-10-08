<?php
$module = isset($_SESSION['module_name']) ? $_SESSION['module_name'] . '/' : '';
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
  <title>
    <?php echo isset($_SESSION['module_title']) ? $_SESSION['module_title'] : 'Home'; ?>
  </title>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH . 'assets/'; ?>css/bootstrap.min.css">
  <script src="<?php echo $BASE_ROOT_URL_PATH . 'assets/'; ?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH . "assets/css/{$module}style.css" ?>" ; />
  <style>
    .active {
      color: #FF0000;
      font-weight: bolder;
    }
  </style>

  <script>
    let module_name = 'home--';
    <?php if (isset($_SESSION['module_name'])) { ?>
      module_name = '<?php echo $_SESSION['module_name']; ?>';
    <?php } ?>

    <?php if (isset($BASE_ROOT_URL_PATH)) { ?>
      let BASE_ROOT_URL_PATH = '<?php echo $BASE_ROOT_URL_PATH; ?>';
    <?php } ?>
  </script>

  <script src="<?php echo $BASE_ROOT_URL_PATH . "assets/js/{$module}script.js" ?>"></script>
  <script src="<?php echo $BASE_ROOT_URL_PATH . "assets/js/{$module}actions.js" ?>"></script>
</head>

<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand fs-2" href="<?php echo $BASE_ROOT_URL_PATH . 'routes/controller.php?active_module=home' ?>">ShopClothes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link<?php echo $menu['active_home'] ? ' active' : '' ?>" aria-current="page"
              href="<?php echo $BASE_ROOT_URL_PATH . 'routes/controller.php?active_module=home' ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?php echo $menu['active_cliente'] ? ' active' : '' ?>" aria-current="page"
              href="<?php echo $BASE_ROOT_URL_PATH . 'routes/controller.php?active_module=cliente' ?>">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?php echo $menu['active_producto'] ? ' active' : '' ?>" aria-current="page"
              href="<?php echo $BASE_ROOT_URL_PATH . 'routes/controller.php?active_module=producto' ?>">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?php echo $menu['active_carrito'] ? ' active' : '' ?>" aria-current="page"
              href="<?php echo $BASE_ROOT_URL_PATH . 'routes/controller.php?active_module=carrito' ?>"><svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag"
                viewBox="0 0 16 16">
                <path
                  d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
              </svg></a>
          </li>
        </ul>
      </div>
    </nav>
  </div>