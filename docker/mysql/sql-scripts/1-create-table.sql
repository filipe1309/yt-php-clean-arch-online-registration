USE development;
CREATE TABLE registration (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(250),
    registration_number VARCHAR(11),
    birth_date DATE,
    created_at DATETIME
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
