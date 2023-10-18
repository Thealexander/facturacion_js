<?php
include('./cn/cn.php');

$idCliente = isset($_POST["codigoCliente"]) ? intval($_POST["codigoCliente"]) : 0;
$subTotal = isset($_POST['subTotal']) ? floatval($_POST['subTotal']) : 0;
$iva = isset($_POST['iva']) ? floatval($_POST['iva']) : 0;
$totalFactura = isset($_POST['totalFactura']) ? floatval($_POST['totalFactura']) : 0;
$numeroFilas = isset($_POST['numeroFilas']) ? intval($_POST['numeroFilas']) : 0;

if ($idCliente > 0 && $subTotal > 0 && $iva > 0 && $totalFactura > 0 && $numeroFilas > 0) {
    $campoIdProducto = '';
    $campoCantidad = '';
    $campoSubTotalLinea = '';
    $campoPvp = '';
    $i = 0;

    $strSQL = "INSERT INTO factura_cabecera VALUES (0, $idCliente, NOW(), $subTotal, $iva, $totalFactura)";

    if ($conexion->query($strSQL) === TRUE) {
        $idFactura = $conexion->insert_id;

        for ($i = 1; $i <= $numeroFilas; $i++) {
            $campoIdProducto = "idProducto_" . $i;
            $campoPvp = "pvp_" . $i;
            $campoSubTotalLinea = "subtotal_" . $i;
            $campoCantidad = "cant_" . $i;
            
            $datoIdProducto = isset($_POST[$campoIdProducto]) ? intval($_POST[$campoIdProducto]) : 0;
            $datoPvp = isset($_POST[$campoPvp]) ? floatval($_POST[$campoPvp]) : 0;
            $datoSubTotalLinea = isset($_POST[$campoSubTotalLinea]) ? floatval($_POST[$campoSubTotalLinea]) : 0;
            $datoCantidad = isset($_POST[$campoCantidad]) ? intval($_POST[$campoCantidad]) : 0;

            if ($datoIdProducto > 0 && $datoPvp > 0 && $datoSubTotalLinea > 0 && $datoCantidad > 0) {
                $strSQL = "INSERT INTO factura_detalle VALUES ($idFactura, $datoIdProducto, $datoCantidad, $datoPvp, $datoSubTotalLinea)";

                if ($conexion->query($strSQL) === FALSE) {
                    echo "ERROR AL GRABAR DETALLE DE LA FACTURA";
                    break;
                }
            } else {
                echo "Datos de línea de factura no válidos.";
                break;
            }
        }

        if ($i > $numeroFilas) {
            echo "FACTURA GRABADA EXITOSAMENTE";
        }
    } else {
        echo "ERROR AL GRABAR LA CABECERA DE LA FACTURA";
    }
} else {
    echo "Datos de factura no válidos.";
}
