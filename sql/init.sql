CREATE DATABASE IF NOT EXISTS demo;
USE demo;
-- Creamos la tabla users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Clave primaria
    username VARCHAR (100) NOT NULL, -- Columna de texto que registra el nombre de usuario. Máximo de caracteres: 100
    password VARCHAR (100) NOT NULL, -- Columna de texto que registra la contraseña del usuario. Máximo de caracteres: 100
    role VARCHAR (50) DEFAULT 'user' -- Columna de texto que registra el rol de usuario. Máximo de caracteres: 50. USER POR DEFECTO
);
INSERT INTO users (username, password, role) VALUES
    ('admin', 'contraseniasecreta123', 'admin'),
    ('Pedro', 'pedro123', 'user'),
    ('Claudia', 'claudia123', 'user'),
    ('Patrik', 'patrik123', 'user');

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    imagen VARCHAR(255)
);

INSERT INTO productos (nombre, descripcion, precio, stock, imagen) VALUES
    ('Valentino Born in Roma', 'Perfume multiestacion para hombre. Floral', 69.99, 100, 'img/valentino.webp'),
    ('Xerjoff Erba Pura', 'Perfume multiestacion para hombre. Cítrico', 199.99, 50, 'img/xerjoff.png'),
    ('Dior Sauvage Elixir', 'Perfume invernal para hombre. Amaderado', 120.00, 30, 'img/sauvage.webp'),
    ('Chanel Bleu de Chanel', 'Perfume multiestacion para hombre. Amaderado', 99.99, 80, 'img/chanel.webp');