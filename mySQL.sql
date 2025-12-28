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

INSERT INTO categories (name) VALUES ('Phones'), ('Laptops'), ('Accessories');

INSERT INTO products (name, description, price, category_id) VALUES
('Phone', 'A smartphone', 500, 1),
('Laptop', 'A personal computer', 1200, 2);
('iPhone 15', 'Latest Apple smartphone', 1200, 1),
('Samsung Galaxy S23', 'High-end Android phone', 999, 1),
('MacBook Air', 'Apple laptop with M2 chip', 1500, 2),
('Dell XPS 13', 'Compact powerful laptop', 1300, 2),
('Wireless Mouse', 'Ergonomic Bluetooth mouse', 50, 3),
('USB-C Hub', 'Multi-port adapter', 30, 3);
