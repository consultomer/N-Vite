
--@block
SELECT * FROM admins;


--@block
SELECT * FROM Testing;

--@block
CREATE TABLE Testing(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (50) NOT NULL,
    email VARCHAR (50) NOT NULL

);

--@block
INSERT INTO Testing(name,email)
VALUES
(
    'OMER',
    'L@gmail.com'
),
(
    'OMER',
    'LI@gmail.com'
),
(
    'OMER',
    'LIB@gmail.com'
),
(
    'OMER',
    'LIBY@gmail.com'
)
--@BLOCK
DROP TABLE Testing;