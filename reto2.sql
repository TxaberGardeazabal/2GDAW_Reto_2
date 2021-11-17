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
  CONSTRAINT COMP_US_FK FOREIGN KEY (id) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE anuncios (
  id INT(4) AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(30),
  precio FLOAT,
  imagen VARCHAR(30),
  descripcion VARCHAR(100),
  localizacion VARCHAR(30),
  visitas INT DEFAULT 0,
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
