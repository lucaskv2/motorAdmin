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

CREATE TABLE stock (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(100) NOT NULL,
    marca VARCHAR(50),
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10, 2)
);

/*
DELIMITER //

CREATE PROCEDURE disminuir_stock(
    IN p_id INT,
    IN p_cantidad INT
)
BEGIN
    DECLARE stock_actual INT;

    -- Validar que la cantidad a disminuir sea positiva
    IF p_cantidad <= 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'La cantidad a disminuir debe ser mayor que cero';
    END IF;

    -- Obtener el stock actual del producto
    SELECT cantidad INTO stock_actual
    FROM stock
    WHERE id = p_id;

    -- Validar que el producto exista
    IF stock_actual IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Producto no encontrado';
    END IF;

    -- Validar que el stock no quede negativo
    IF stock_actual < p_cantidad THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Stock insuficiente para disminuir la cantidad solicitada';
    END IF;

    -- Actualizar el stock restando la cantidad
    UPDATE stock
    SET cantidad = cantidad - p_cantidad
    WHERE id = p_id;
END;
//

DELIMITER ;


Y SU  LLAMADA CON PHP
// Parámetros para el procedimiento
$id_producto = 3;
$cantidad_a_disminuir = 5;

// Preparar y ejecutar la llamada al procedimiento almacenado
$sql = "CALL disminuir_stock(?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ii", $id_producto, $cantidad_a_disminuir);

if ($stmt->execute()) {
    echo "Stock disminuido correctamente.";
} else {
    echo "Error al disminuir stock: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
*/

-- 4. Insertar algunos datos de ejemplo (opcional, para probar)
INSERT INTO productos (producto, descripcion, marca, cantidad, precio_unitario, total) VALUES
('Laptop', 'Portátil de alto rendimiento', 'MotorAdmin', 2, 1200.00, 2400.00),
('Teclado', 'Teclado mecánico retroiluminado', 'MotorAdmin', 5, 75.00, 375.00),
('Mouse', 'Mouse ergonómico inalámbrico', 'MotorAdmin', 10, 25.00, 250.00),
('Monitor', 'Monitor curvo 27 pulgadas', 'MotorAdmin', 1, 300.00, 300.00);