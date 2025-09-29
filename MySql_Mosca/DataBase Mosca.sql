USE mosca;

CREATE TABLE USERS(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(25),
    pass VARCHAR(200),
    mail VARCHAR(200) NOT NULL,
    CONSTRAINT chk_mail_format CHECK (mail LIKE '_%@_%._%')
);

CREATE TABLE ROLES(
    id INT PRIMARY KEY,
    clase VARCHAR(20)
);

CREATE TABLE ROL_USER(
    id_user INT,
    id_rol INT,
    PRIMARY KEY (id_user, id_rol),
    FOREIGN KEY (id_user) REFERENCES USERS(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_rol) REFERENCES ROLES(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE PARTIDA(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    intentos INT,
    tablero JSON,
    FOREIGN KEY (id_usuario) REFERENCES USERS(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Insertar roles
INSERT INTO ROLES (id, clase) VALUES (1, 'admin');
INSERT INTO ROLES (id, clase) VALUES (2, 'jugador');

-- Insertar usuarios
INSERT INTO USERS (nombre, pass, mail) VALUES ('juan',   'hash1',  'juan@mail.com');     -- admin
INSERT INTO USERS (nombre, pass, mail) VALUES ('lucia',  'hash2',  'lucia@mail.com');    -- jugador
INSERT INTO USERS (nombre, pass, mail) VALUES ('carlos', 'hash3',  'carlos@mail.com');   -- admin
INSERT INTO USERS (nombre, pass, mail) VALUES ('andres', 'hash4',  'andres@mail.com');   -- jugador
INSERT INTO USERS (nombre, pass, mail) VALUES ('marta',  'hash5',  'marta@mail.com');    -- admin
INSERT INTO USERS (nombre, pass, mail) VALUES ('elena',  'hash6',  'elena@mail.com');    -- jugador
INSERT INTO USERS (nombre, pass, mail) VALUES ('pedro',  'hash7',  'pedro@mail.com');    -- admin
INSERT INTO USERS (nombre, pass, mail) VALUES ('raul',   'hash8',  'raul@mail.com');     -- jugador
INSERT INTO USERS (nombre, pass, mail) VALUES ('sara',   'hash9',  'sara@mail.com');     -- admin
INSERT INTO USERS (nombre, pass, mail) VALUES ('david',  'hash10', 'david@mail.com');    -- jugador

-- Relacionar usuarios con roles
-- (IDs suponiendo que se asignan en orden de inserción: 1 a 10)
INSERT INTO ROL_USER (id_user, id_rol) VALUES (1, 1);  -- juan → admin
INSERT INTO ROL_USER (id_user, id_rol) VALUES (2, 2);  -- lucia → jugador
INSERT INTO ROL_USER (id_user, id_rol) VALUES (3, 1);  -- carlos → admin
INSERT INTO ROL_USER (id_user, id_rol) VALUES (4, 2);  -- andres → jugador
INSERT INTO ROL_USER (id_user, id_rol) VALUES (5, 1);  -- marta → admin
INSERT INTO ROL_USER (id_user, id_rol) VALUES (6, 2);  -- elena → jugador
INSERT INTO ROL_USER (id_user, id_rol) VALUES (7, 1);  -- pedro → admin
INSERT INTO ROL_USER (id_user, id_rol) VALUES (8, 2);  -- raul → jugador
INSERT INTO ROL_USER (id_user, id_rol) VALUES (9, 1);  -- sara → admin
INSERT INTO ROL_USER (id_user, id_rol) VALUES (10, 2); -- david → jugador

SELECT * FROM USERS;
SELECT * FROM ROLES;
SELECT * FROM ROL_USER;

ALTER TABLE USERS AUTO_INCREMENT = 1;




SELECT 
    u.id AS id_usuario,
    u.nombre,
    u.mail,
    u.pass,
    r.clase AS rol
FROM USERS u
JOIN ROL_USER ru ON u.id = ru.id_user
JOIN ROLES r ON ru.id_rol = r.id;

SET SQL_SAFE_UPDATES = 0;
DELETE FROM USERS;
DELETE FROM ROLES;
DELETE FROM ROL_USER;
DELETE FROM PARTIDA;
SET SQL_SAFE_UPDATES = 1;


DELETE u
FROM USERS u
JOIN ROL_USER ru ON u.id = ru.id_user
JOIN ROLES r ON ru.id_rol = r.id
WHERE r.clase = 'admin';

