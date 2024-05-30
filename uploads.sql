CREATE TABLE uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    file VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);