CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hash VARCHAR(255) NOT NULL
);

CREATE TABLE texts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    text TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);