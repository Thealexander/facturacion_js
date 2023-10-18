<?php
include('./cn/cn.php');
$nombre = $_POST["nombre"];
//$nombre = "SALTOS";

$sql = "SELECT idCliente, CONCAT(nombresCliente, ' ', apellidosCliente) AS cliente 
        FROM clientes 
        WHERE nombresCliente LIKE '%$nombre%' 
        UNION 
        SELECT idCliente, CONCAT(nombresCliente, ' ', apellidosCliente) AS cliente 
        FROM clientes 
        WHERE apellidosCliente LIKE '%$nombre%'";

$rs = mysqli_query($conexion, $sql);
$html = "";

while ($row = mysqli_fetch_array($rs)) {
    $clienteId = $row['idCliente'];
    $clienteNombre = $row['cliente'];
    $html .= "<a href='#' class='list-group-item' idCliente='$clienteId' value='$clienteNombre' onclick=\"retornaDatosCliente($clienteId, '$clienteNombre')\">$clienteNombre</a>";
}

echo $html;
