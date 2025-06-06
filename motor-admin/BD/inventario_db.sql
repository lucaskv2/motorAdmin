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

-- 4. Insertar algunos datos de ejemplo (opcional, para probar)
INSERT INTO productos (producto, descripcion, marca, cantidad, precio_unitario, total) VALUES
('Laptop', 'Portátil de alto rendimiento', 'MotorAdmin', 2, 1200.00, 2400.00),
('Teclado', 'Teclado mecánico retroiluminado', 'MotorAdmin', 5, 75.00, 375.00),
('Mouse', 'Mouse ergonómico inalámbrico', 'MotorAdmin', 10, 25.00, 250.00),
('Monitor', 'Monitor curvo 27 pulgadas', 'MotorAdmin', 1, 300.00, 300.00);