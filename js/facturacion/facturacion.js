document.addEventListener("DOMContentLoaded", function () {
    // Función para buscar clientes por nombre
    function buscaClienteNombre() {
        var criterio = document.getElementById("nombreCliente").value;
        var lista = document.getElementById("sugerencias");

        if (criterio.length > 3) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var respuesta = xhr.responseText;
                    if (respuesta === "0") {
                        alert("No existen coincidencias");
                    } else {
                        lista.innerHTML = respuesta;
                    }
                }
            };
            xhr.open("POST", "../../php/retornaDatos.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("nombre=" + criterio);
        }
    }

    // Función para seleccionar un cliente de la lista de sugerencias
    function retornaDatosCliente(idcliente, nombreCliente) {
        document.getElementById("codigoCliente").value = idcliente;
        document.getElementById("nombreCliente").value = nombreCliente;
        document.getElementById("sugerencias").innerHTML = "";
    }

    // Función para obtener la fecha actual
    function fecha() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, "0");
        var mm = String(today.getMonth() + 1).padStart(2, "0");
        var yyyy = today.getFullYear();
        today = mm + "/" + dd + "/" + yyyy;
        document.getElementById("fecha").value = today;
    }

    // Event listeners
    document.getElementById("nombreCliente").addEventListener("keyup", buscaClienteNombre);
    fecha(); // Llama a la función fecha() al cargar la página
});
