CREATE TABLE IF NOT EXISTS clientes (
    curp VARCHAR(18) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    domicilio TEXT NOT NULL,
    correo VARCHAR(255) NOT NULL
);


CREATE TABLE IF NOT EXISTS usuarios (
    email VARCHAR(150) PRIMARY KEY,
    contra VARCHAR(255) NOT NULL,
    tipo TEXT NOT NULL CHECK (
        tipo IN (
            'admin',
            'empleado',
            'cliente'
        )
    ),
    activo BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS flores (
    clv VARCHAR(10) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT NOT NULL,
    f_entrada DATE NOT NULL,
    estado VARCHAR(50) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    n_paquete INT NOT NULL,
    f_compra DATE NOT NULL,
    n_factura VARCHAR(30) NOT NULL,
    existencia INT NOT NULL,
    proveedor VARCHAR(50) NOT NULL,
    imagen BLOB DEFAULT NULL
);