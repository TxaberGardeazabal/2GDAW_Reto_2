CREATE DATABASE web_anuncios ;

USE web_anuncios;

CREATE TABLE categorias (
  clase VARCHAR(20) PRIMARY KEY
);

CREATE TABLE usuarios (
  id INT(4) AUTO_INCREMENT PRIMARY KEY,
  nomUsuario VARCHAR(20) UNIQUE,
  contrasena VARCHAR(20)
);

CREATE TABLE comerciantes (
  id INT(4) PRIMARY KEY,
  nomEmpresa VARCHAR(50),
  telefono VARCHAR(9),
  codPostal INT(5),
  email VARCHAR(35),
  CONSTRAINT COME_US_FK FOREIGN KEY (id) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE compradores (
  id INT(4) PRIMARY KEY,
  nombre VARCHAR(20),
  email VARCHAR(30),
  CONSTRAINT COMp_US_FK FOREIGN KEY (id) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE anuncios (
  id INT(4) AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(30),
  precio FLOAT,
  imagen BLOB,
  descripcion VARCHAR(100),
  localizacion VARCHAR(30),
  visitas INT,
  categoria varchar(20),
  comerciante INT,
  CONSTRAINT ANUN_CAT_FK FOREIGN KEY (categoria) REFERENCES categorias(clase),
  CONSTRAINT ANUN_COM_FK FOREIGN KEY (comerciante) REFERENCES comerciantes(id) ON DELETE CASCADE
);

CREATE TABLE destacados (
  idCli INT(4),
  idAnun INT(4),
  CONSTRAINT DES_PK PRIMARY KEY (idCli,idAnun),
  CONSTRAINT DES_COMP_FK FOREIGN KEY (idCli) REFERENCES compradores(id) ON DELETE CASCADE,
  CONSTRAINT DES_ANUN_FK FOREIGN KEY (idAnun) REFERENCES anuncios(id) ON DELETE CASCADE
);




INSERT INTO usuarios (nomUsuario,contrasena) VALUES ('admin','admin');
INSERT INTO comerciantes VALUES (LAST_INSERT_ID(),'error404','999999999','12345','admin@localhost');

INSERT INTO usuarios (nomUsuario,contrasena) VALUES ('developer','dev');
INSERT INTO comerciantes VALUES (LAST_INSERT_ID(),'error404','888888888','12346','developer@localhost');

INSERT INTO usuarios (nomUsuario,contrasena) VALUES ('cliente','cli');
INSERT INTO compradores VALUES (LAST_INSERT_ID(),'markel','markel@gmail.com');

INSERT INTO categorias VALUES ('coches');
INSERT INTO categorias VALUES ('ropa');
INSERT INTO categorias VALUES ('viajes');
INSERT INTO categorias VALUES ('electrodomesticos');

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('opel segunda mano',1430.50,null,'descripcion','quinto pino','coches',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('java powered lavadora',780,null,'descripcion','siemens','electrodomesticos',1);
 
INSERT INTO destacados VALUES (3,2);




CREATE USER '2gdaw'@'localhost' IDENTIFIED BY '12345Abcde';
GRANT CREATE,SELECT,DELETE,INSERT ON web_anuncios.* TO '2gdaw'@'localhost';
FLUSH PRIVILEGES;


