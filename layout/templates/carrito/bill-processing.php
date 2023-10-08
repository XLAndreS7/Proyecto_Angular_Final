<?php 

    $productos = array();
    $cantidades = [];
    $tieneIvas = [];
    $ivas = array();

    if (isset($_GET) && count($_GET) > 0) {
        echo "Llegó por GET: <br>";
        echo "<pre>";
        var_dump($_GET);
        echo "</pre>";
    } else if (isset($_POST) && count($_POST) > 0) {
        echo "Llegó por POST: <br>";
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $productos = $_POST['producto'];
        $cantidades = $_POST['cantidad'];
        $tieneIvas = $_POST['tiene_iva'];
        $ivas = $_POST['iva'];
    } else {
        echo "No variables";
    }

    $totalGeneral = 0;
    $numeroProductos = 0;
    $totalIva = 0;

    for($i = 0; $i <  count($productos); $i++){

        $totalLinea = 0;
        $valorIva = 0;
        $precioProdSel = 0;
        for($registros as $reg){
            if($reg['id'] == $productos[$i]){
                $precioProdSel = $reg['precio'];
            }
        }
error_log($precioProdSel."este es el valor");
//aquí productos es el id del producto seleccionado, entonces hay que buscar el precio y usarlo, ya miramos como 
        $totalLinea = $precioProdSel * $cantidades[$i];

        $numeroProductos += $cantidades[$i];

        $totalGeneral += $totalLinea;

        if($tieneIvas[$i] == "S"){
            $valorIva = $totalLinea * ($ivas[$i] / 100);
        }

        $totalIva += $valorIva;
    }

    echo "Total Factura: ".$totalGeneral.'<br>';

    echo "Total Iva: ".$totalIva.'<br>';

    $precioPromedio = $totalGeneral/$numeroProductos;
    echo "Precio Promedio Producto: ".$precioPromedio.'<br>';
