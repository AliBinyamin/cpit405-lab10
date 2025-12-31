-- Create the database
CREATE DATABASE IF NOT EXISTS lab10_shop
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE lab10_shop;

-- Products table
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  stock INT NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data
INSERT INTO products (name, price, stock) VALUES
('Spaghetti', 10.50, 20),
('Olive Oil', 30.00, 10),
('Parmesan Cheese', 18.75, 15);