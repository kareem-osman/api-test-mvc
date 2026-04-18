Use:
GET /api/index.php?url=v1/users

Auth:
GET /api/index.php?url=v1/auth

Header:
Authorization: Bearer secret123

SQL:
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100)
);
