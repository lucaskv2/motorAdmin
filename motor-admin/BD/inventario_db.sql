-- BASE DE DATOS  
CREATE DATABASE taller_mecanico;
USE taller_mecanico;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    dni VARCHAR(20) NOT NULL UNIQUE,
    patente VARCHAR(20),
    modelo VARCHAR(50),
    contrasenia VARCHAR(255) NOT NULL,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    rol VARCHAR(20) DEFAULT 'Cliente'
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
    precio_unitario DECIMAL(10, 2),
    imagen VARCHAR(255)
);

CREATE TABLE empleado (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    dni VARCHAR(20) NOT NULL UNIQUE,
    telefono VARCHAR(20) NOT NULL,
    direccion VARCHAR(40) NOT NULL,
    especialidad VARCHAR(20) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE trabajos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_empleado INT NOT NULL,
    descripcion TEXT NOT NULL,
    estado ENUM('Pendiente', 'En progreso', 'Finalizado') NOT NULL DEFAULT 'Pendiente',
    informe TEXT,
    fecha_asignacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_empleado) REFERENCES empleado(id)
);

CREATE TABLE consultas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    servicio VARCHAR(100) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
