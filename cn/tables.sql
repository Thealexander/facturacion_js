-- Crear la tabla de clientes
CREATE TABLE clientes (
    idCliente INT AUTO_INCREMENT PRIMARY KEY,
    nombresCliente VARCHAR(255) NOT NULL,
    apellidosCliente VARCHAR(255) NOT NULL
);

-- Crear la tabla de productos
CREATE TABLE productos (
    idProducto INT AUTO_INCREMENT PRIMARY KEY,
    descripcionProducto VARCHAR(255) NOT NULL,
    precioProducto DECIMAL(10, 2) NOT NULL
);

-- Crear la tabla de factura_cabecera
CREATE TABLE factura_cabecera (
    idFactura INT AUTO_INCREMENT PRIMARY KEY,
    idCliente INT NOT NULL,
    fechaFactura DATE NOT NULL,
    subTotal DECIMAL(10, 2) NOT NULL,
    iva DECIMAL(10, 2) NOT NULL,
    totalFactura DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (idCliente) REFERENCES clientes(idCliente)
);

-- Crear la tabla de factura_detalle
CREATE TABLE factura_detalle (
    idFactura INT NOT NULL,
    idProducto INT NOT NULL,
    cantidad INT NOT NULL,
    precioProducto DECIMAL(10, 2) NOT NULL,
    subTotalLinea DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (idFactura, idProducto),
    FOREIGN KEY (idFactura) REFERENCES factura_cabecera(idFactura),
    FOREIGN KEY (idProducto) REFERENCES productos(idProducto)
);
