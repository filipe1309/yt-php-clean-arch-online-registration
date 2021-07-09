USE development;
CREATE TABLE registration (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(250) NOT NULL,
    registration_number VARCHAR(11) NOT NULL,
    birth_date DATE NOT NULL,
    created_at DATETIME NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
