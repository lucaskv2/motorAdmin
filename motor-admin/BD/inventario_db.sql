-- 1. Crear la base de datos
CREATE DATABASE IF NOT EXISTS inventario_db;

-- 2. Seleccionar la base de datos
USE inventario_db;

-- 3. Crear la tabla 'productos'
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Clave primaria autoincremental
    producto VARCHAR(255) NOT NULL,
    descripcion TEXT,
    marca VARCHAR(100),
    cantidad INT NOT NULL DEFAULT 0,
    precio_unitario DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    total DECIMAL(10, 2) -- Columna para almacenar el total. Considera si lo necesitas.
);

-- BASE DE DATOS Y 
CREATE DATABASE taller_mecanico;
USE taller_mecanico;

CREATE TABLE usuario (
    `ID_USUARIO` INT(5) AUTO_INCREMENT PRIMARY KEY,
    `NOMBRE` VARCHAR(40) NOT NULL,
    `APELLIDO` VARCHAR(40) NOT NULL,
    `EMAIL` VARCHAR(11) UNIQUE NOT NULL,
    `DNI` VARCHAR(8) UNIQUE NOT NULL, 
    `CONTRASENIA` VARCHAR(250) NOT NULL
);
-- TABLA PARA RECIBIR LOS MENSAJES DE L0S USUSARIOS
CREATE TABLE mensajes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),
  email VARCHAR(100),
  telefono VARCHAR(15),
  asunto VARCHAR(150),
  mensaje TEXT,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Insertar algunos datos de ejemplo (opcional, para probar)
INSERT INTO productos (producto, descripcion, marca, cantidad, precio_unitario, total) VALUES
('Laptop', 'Portátil de alto rendimiento', 'MotorAdmin', 2, 1200.00, 2400.00),
('Teclado', 'Teclado mecánico retroiluminado', 'MotorAdmin', 5, 75.00, 375.00),
('Mouse', 'Mouse ergonómico inalámbrico', 'MotorAdmin', 10, 25.00, 250.00),
('Monitor', 'Monitor curvo 27 pulgadas', 'MotorAdmin', 1, 300.00, 300.00);