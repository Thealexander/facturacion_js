<?php
include("./cn/cn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/boostrap/css/bootstrap.css">
    <title>Modulo: Facturacion</title>
</head>

<body onload="fecha()">
<div class="container">
        <form action="./grabarFactura.php" method="post">
            <h1>
                <center>FACTURACION</center>
            </h1>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">Cliente:</label>
                    <input type="text" name="codigoCliente" id="codigoCliente" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Nombre</label>
                    <input type="text" name="nombreCliente" id="nombreCliente" class="form-control" onkeyup="buscaClienteNombre()">
                    <div id="sugerencias" class="list-group"></div>
                </div>
                <input type="hidden" name="numeroFilas" id="numeroFilas">
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">Fecha:</label>
                    <input type="text" name="fecha" id="fecha" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="">SubTotal</label>
                    <input type="text" name="subTotal" id="subTotal" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Iva:</label>
                    <input type="text" name "iva" id="iva" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Total:</label>
                    <input type="text" name="totalFactura" id="totalFactura" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <label for="">IdProd</label>
                    <input type="text" name="idProducto" id="idProducto" class="form-control">
                </div>
                <div class="form-group col-md-5">
                    <label for="">Descripcion Producto</label>
                    <input type="text" name="nombreProducto" id="nombreProducto" class="form-control" onkeyup="buscarProductoNombre()">
                    <div id="filtrarProductos" class="list-group"></div>
                </div>
                <div class="form-group col-md-2">
                    <label for="">PVP</label>
                    <input type="text" name="pvp" id="pvp" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Cant</label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control">
                </div>
                <div class="form-group col-md-1">
                    <label for="">Registrar</label>
                    <input type="button" value="Add" class="form-control" onclick="agregarFilas()">
                </div>
            </div>

            <table id="detalle" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>IdProducto</th>
                        <th>Descripción Producto</th>
                        <th>PVP</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
            </table>
            <input type="submit" value="Grabar Factura">
        </form>
    </div>
    <script src="../js/facturacion/facturacion.js"></script>
    <script src="../js/funciones/funciones.js"></script>
</body>
</html>
