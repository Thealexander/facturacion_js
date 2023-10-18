<?php
include('./cn/cn.php');

// Validación y saneamiento de la entrada del usuario
$nombre = isset($_POST["nombreProducto"]) ? trim($_POST["nombreProducto"]) : "";
$nombre = mysqli_real_escape_string($conexion, $nombre);

// Verificar que $nombre no esté vacío
if (!empty($nombre)) {
    $html = "";

    $sql = "SELECT idProducto, descripcionProducto, precioProducto " .
           "FROM productos " .
           "WHERE descripcionProducto LIKE '%$nombre'";

    $rs = mysqli_query($conexion, $sql);

    while ($row = mysqli_fetch_array($rs)) {
        $idProducto = $row['idProducto'];
        $descripcionProducto = $row['descripcionProducto'];
        $precioProducto = $row['precioProducto'];

        // Sanear las variables antes de usarlas en el HTML
        $descripcionProducto = htmlspecialchars($descripcionProducto, ENT_QUOTES, 'UTF-8');

        $html .= "<a href='#' class='list-group-item' idProducto='$idProducto' value='$descripcionProducto' pvp='$precioProducto' onclick=\"retornaDatosProducto($idProducto, '$descripcionProducto', $precioProducto)\">$descripcionProducto</a>";
    }

    echo $html;
} else {
    // Manejo de error si $nombre está vacío
    echo "No se proporcionó un nombre válido.";
}
