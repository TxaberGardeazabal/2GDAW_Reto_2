CREATE DATABASE web_anuncios ;

CREATE TABLE categorias (
  clase VARCHAR(20) PRIMARY KEY
);

CREATE TABLE comerciantes (
  id INT(4) PRIMARY KEY,
  nomUsuario VARCHAR(20) UNIQUE,
  contrasena VARCHAR(20),
  nomEmpresa VARCHAR(50),
  telefono VARCHAR(9),
  codPostal INT(5),
  email VARCHAR(35),
);

CREATE TABLE compradores (
  id INT(4) PRIMARY KEY
  nomUsuario VARCHAR(20) UNIQUE,
  contrasena VARCHAR(20),
  nombre VARCHAR(20),
  email VARCHAR(30)
);

CREATE TABLE anuncios (
  id INT(4) AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(30),
  precio FLOAT,
  imagen BLOB,
  desrcripcion VARCHAR(100),
  localizacion VARCHAR(30),
  visitas INT,
  categoria varchar(20),
  comerciante INT,
  CONSTRAINTS ANUN_CAT_FK FOREIGN KEY (categoria) REFERENCES categorias(clase),
  CONSTRAINTS ANUN_COM_FK FOREIGN KEY (comerciante) REFERENCES comerciantes(id)
);

CREATE TABLE destacados (
  idCli INT(4),
  idAnun INT(4),
  CONSTRAINTS DES_PK PRIMARY KEY (idCli,idAnun),
  CONSTRAINTS DES_COMP_FK FOREIGN KEY (idCli) REFERENCES compradores(id) ON DELETE CASCADE,
  CONSTRAINTS DES_ANUN_FK FOREIGN KEY (idAnun) REFERENCES anuncios(id) ON DELETE CASCADE,
);