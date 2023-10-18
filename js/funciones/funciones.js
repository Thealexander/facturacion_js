function buscarProductoNombre() {
    var criterio = document.getElementById("nombreProducto").value;
    
    if (criterio.length <= 3) {
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var respuesta = xhr.responseText;
            var lista = document.getElementById("filtrarProductos");

            if (respuesta === "0") {
                alert("No hay coincidencias");
            } else {
                lista.innerHTML = respuesta;
            }
        }
    };

    xhr.open("POST", "../../php/retornaDatosProductos.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("nombreProducto=" + criterio);
}

function retornaDatosProducto(idProducto, nombreProducto, precioProducto) {
    document.getElementById('idProducto').value = idProducto;
    document.getElementById('nombreProducto').value = nombreProducto;
    document.getElementById('pvp').value = precioProducto;
    document.getElementById('filtrarProductos').innerHTML = "";
}

function agregarFilas() {
    var codigoProducto = document.getElementById("idProducto").value;
    var nombreProducto = document.getElementById("nombreProducto").value;
    var pvp = parseFloat(document.getElementById("pvp").value);
    var cant = parseFloat(document.getElementById("cantidad").value);
    var tabla = document.getElementById("detalle");
    var numeroFilas = tabla.rows.length;
    var subtotal = (pvp * cant).toFixed(2);

    var newRow = tabla.insertRow(numeroFilas);
    newRow.innerHTML = `
        <td><input type='text' id='idProducto_${numeroFilas}' name='idProducto_${numeroFilas}' value='${codigoProducto}' class='sinborde'></td>
        <td>${nombreProducto}</td>
        <td><input type='number' id='pvp_${numeroFilas}' name='pvp_${numeroFilas}' value='${pvp}' class='sinborde'></td>
        <td><input type='number' id='cant_${numeroFilas}' name='cant_${numeroFilas}' value='${cant}' class='sinborde'></td>
        <td><input type='number' id='subtotal_${numeroFilas}' name='subtotal_${numeroFilas}' value='${subtotal}' class='sinborde'></td>
    `;
    
    document.getElementById('numeroFilas').value = numeroFilas;
    calcularTotal(numeroFilas);
}

function calcularTotal(numeroFilas) {
    var iva = 0.12;
    var elementoSubTotal = 0;
    var valorIva = 0;

    for (var i = 1; i <= numeroFilas; i++) {
        var campoSubTotal = document.getElementById(`subtotal_${i}`);
        elementoSubTotal += parseFloat(campoSubTotal.value);
    }

    document.getElementById('subTotal').value = elementoSubTotal.toFixed(2);
    valorIva = elementoSubTotal * iva;
    document.getElementById('iva').value = valorIva.toFixed(2);
    document.getElementById('totalFactura').value = (elementoSubTotal + valorIva).toFixed(2);
}
