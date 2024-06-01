CREATE DATABASE id_tracker;
use id_tracker;

CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255),
    id_no VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    file VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (full_name, id_no, email, password) 
VALUES 
('John Doe', '123456789', 'john@example.com', 'password123');
