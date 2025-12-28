CREATE DATABASE ecommerce_db; 
USE ecommerce_db;

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100)
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  description TEXT,
  price DECIMAL(10,2),
  category_id INT,
  FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO categories (name) VALUES ('Phones'), ('Laptops');

INSERT INTO products (name, description, price, category_id) VALUES
('Phone', 'A smartphone', 500, 1),
('Laptop', 'A personal computer', 1200, 2);
