CREATE DATABASE web_anuncios ;

USE web_anuncios;

CREATE TABLE supercategorias (
  superclase VARCHAR(20) PRIMARY KEY
);

CREATE TABLE categorias (
  clase VARCHAR(20) PRIMARY KEY,
  superclase VARCHAR(20),
  CONSTRAINT CATE_SU_FK FOREIGN KEY (superclase) REFERENCES supercategorias(superclase) ON DELETE CASCADE
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
  imagen VARCHAR(30),
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


CREATE USER '2gdaw'@'localhost' IDENTIFIED BY '12345Abcde';
GRANT CREATE,SELECT,DELETE,INSERT ON web_anuncios.* TO '2gdaw'@'localhost';
FLUSH PRIVILEGES;

INSERT INTO usuarios (nomUsuario,contrasena) VALUES ('admin','admin');
INSERT INTO comerciantes VALUES (LAST_INSERT_ID(),'error404','999999999','12345','admin@localhost');

INSERT INTO usuarios (nomUsuario,contrasena) VALUES ('developer','dev');
INSERT INTO comerciantes VALUES (LAST_INSERT_ID(),'error404','888888888','12346','developer@localhost');

INSERT INTO usuarios (nomUsuario,contrasena) VALUES ('cliente','cli');
INSERT INTO compradores VALUES (LAST_INSERT_ID(),'markel','markel@gmail.com');

INSERT INTO supercategorias VALUES ('vehiculos');
INSERT INTO supercategorias VALUES ('ropa');
INSERT INTO supercategorias VALUES ('casa');
INSERT INTO supercategorias VALUES ('varios');
INSERT INTO supercategorias VALUES ('deportes');

INSERT INTO categorias VALUES ('coches','vehiculos');
INSERT INTO categorias VALUES ('motos','vehiculos');
INSERT INTO categorias VALUES ('furgonetas','vehiculos');
INSERT INTO categorias VALUES ('camiones','vehiculos');

INSERT INTO categorias VALUES ('camisetas','ropa');
INSERT INTO categorias VALUES ('pantalones','ropa');
INSERT INTO categorias VALUES ('zapatillas','ropa');
INSERT INTO categorias VALUES ('calcetines','ropa');
INSERT INTO categorias VALUES ('gorras','ropa');

INSERT INTO categorias VALUES ('lavadoras','casa');
INSERT INTO categorias VALUES ('tostadoras','casa');
INSERT INTO categorias VALUES ('cafeteras','casa');

INSERT INTO categorias VALUES ('juguetes','varios');
INSERT INTO categorias VALUES ('juegos de mesa','varios');

INSERT INTO categorias VALUES ('futbol','deportes');
INSERT INTO categorias VALUES ('baloncesto','deportes');
INSERT INTO categorias VALUES ('balonmano','deportes');
INSERT INTO categorias VALUES ('quidditch','deportes');
INSERT INTO categorias VALUES ('rugby','deportes');
INSERT INTO categorias VALUES ('voley','deportes');

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('opel segunda mano',1430.50,null,'descripcion','quinto pino','coches',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('seat panda',3000,null,'descripcion','siemens','coches',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('lamborghini fasterozza',40000,null,'descripcion','siemens','coches',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('ford anglia',2000,null,'descripcion','siemens','coches',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('bmw',500,null,'descripcion','siemens','coches',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('harley davinson',1430.50,null,'descripcion','quinto pino','motos',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('kawazaki',3000,null,'descripcion','siemens','motos',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('vespa',40000,null,'descripcion','siemens','motos',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('duccati',2000,null,'descripcion','siemens','motos',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('yamaha',2000,null,'descripcion','siemens','motos',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('tartana',1430.50,null,'descripcion','quinto pino','furgonetas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('mercedes benz',3000,null,'descripcion','siemens','furgonetas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('ford',40000,null,'descripcion','siemens','furgonetas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('kia',2000,null,'descripcion','siemens','furgonetas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('citroen',2000,null,'descripcion','siemens','furgonetas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('camion1',1430.50,null,'descripcion','quinto pino','camiones',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('camion2',3000,null,'descripcion','siemens','camiones',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('camion3',40000,null,'descripcion','siemens','camiones',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('camion4',2000,null,'descripcion','siemens','camiones',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('camion5',2000,null,'descripcion','siemens','camiones',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('camisetas1',1430.50,null,'descripcion','quinto pino','camisetas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('camisetas2',3000,null,'descripcion','siemens','camisetas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('camisetas3',40000,null,'descripcion','siemens','camisetas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('camisetas4',2000,null,'descripcion','siemens','camisetas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('camisetas5',2000,null,'descripcion','siemens','camisetas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('pantalones1',1430.50,null,'descripcion','quinto pino','pantalones',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('pantalones2',3000,null,'descripcion','siemens','pantalones',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('pantalones3',40000,null,'descripcion','siemens','pantalones',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('pantalones4',2000,null,'descripcion','siemens','pantalones',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('pantalones5',2000,null,'descripcion','siemens','pantalones',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('zapatillas1',1430.50,null,'descripcion','quinto pino','zapatillas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('zapatillas2',3000,null,'descripcion','siemens','zapatillas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('zapatillas3',40000,null,'descripcion','siemens','zapatillas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('zapatillas4',2000,null,'descripcion','siemens','zapatillas',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('zapatillas5',2000,null,'descripcion','siemens','zapatillas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('calcetines1',1430.50,null,'descripcion','quinto pino','calcetines',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('calcetines2',3000,null,'descripcion','siemens','calcetines',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('calcetines3',40000,null,'descripcion','siemens','calcetines',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('calcetines4',2000,null,'descripcion','siemens','calcetines',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('calcetines5',2000,null,'descripcion','siemens','calcetines',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('gorras1',1430.50,null,'descripcion','quinto pino','gorras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('gorras2',3000,null,'descripcion','siemens','gorras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('gorras3',40000,null,'descripcion','siemens','gorras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('gorras4',2000,null,'descripcion','siemens','gorras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('gorras5',2000,null,'descripcion','siemens','gorras',1);

 INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('lavadoras1',1430.50,null,'descripcion','quinto pino','lavadoras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('lavadoras2',3000,null,'descripcion','siemens','lavadoras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('lavadoras3',40000,null,'descripcion','siemens','lavadoras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('lavadoras4',2000,null,'descripcion','siemens','lavadoras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('lavadoras5',2000,null,'descripcion','siemens','lavadoras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('tostadoras1',1430.50,null,'descripcion','quinto pino','tostadoras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('tostadoras2',3000,null,'descripcion','siemens','tostadoras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('tostadoras3',40000,null,'descripcion','siemens','tostadoras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('tostadoras4',2000,null,'descripcion','siemens','tostadoras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('tostadoras5',2000,null,'descripcion','siemens','tostadoras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('cafeteras1',1430.50,null,'descripcion','quinto pino','cafeteras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('cafeteras2',3000,null,'descripcion','siemens','cafeteras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('cafeteras3',40000,null,'descripcion','siemens','cafeteras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('cafeteras4',2000,null,'descripcion','siemens','cafeteras',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('cafeteras5',2000,null,'descripcion','siemens','cafeteras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('juguetes1',1430.50,null,'descripcion','quinto pino','juguetes',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('juguetes2',3000,null,'descripcion','siemens','juguetes',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('juguetes3',40000,null,'descripcion','siemens','juguetes',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('juguetes4',2000,null,'descripcion','siemens','juguetes',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('juguetes5',2000,null,'descripcion','siemens','juguetes',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('juegos de mesa1',1430.50,null,'descripcion','quinto pino','juegos de mesa',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('juegos de mesa2',3000,null,'descripcion','siemens','juegos de mesa',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('juegos de mesa3',40000,null,'descripcion','siemens','juegos de mesa',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('juegos de mesa4',2000,null,'descripcion','siemens','juegos de mesa',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('juegos de mesa5',2000,null,'descripcion','siemens','juegos de mesa',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('futbol1',1430.50,null,'descripcion','quinto pino','futbol',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('futbol2',3000,null,'descripcion','siemens','futbol',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('futbol3',40000,null,'descripcion','siemens','futbol',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('futbol4',2000,null,'descripcion','siemens','futbol',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('futbol5',2000,null,'descripcion','siemens','futbol',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('baloncesto1',1430.50,null,'descripcion','quinto pino','baloncesto',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('baloncesto2',3000,null,'descripcion','siemens','baloncesto',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('baloncesto3',40000,null,'descripcion','siemens','baloncesto',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('baloncesto4',2000,null,'descripcion','siemens','baloncesto',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('baloncesto5',2000,null,'descripcion','siemens','baloncesto',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('balonmano1',1430.50,null,'descripcion','quinto pino','balonmano',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('balonmano2',3000,null,'descripcion','siemens','balonmano',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('balonmano3',40000,null,'descripcion','siemens','balonmano',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('balonmano4',2000,null,'descripcion','siemens','balonmano',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('balonmano5',2000,null,'descripcion','siemens','balonmano',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('quidditch1',1430.50,null,'descripcion','quinto pino','quidditch',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('quidditch2',3000,null,'descripcion','siemens','quidditch',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('quidditch3',40000,null,'descripcion','siemens','quidditch',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('quidditch4',2000,null,'descripcion','siemens','quidditch',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('quidditch5',2000,null,'descripcion','siemens','quidditch',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('rugby1',1430.50,null,'descripcion','quinto pino','rugby',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('rugby2',3000,null,'descripcion','siemens','rugby',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('rugby3',40000,null,'descripcion','siemens','rugby',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('rugby4',2000,null,'descripcion','siemens','rugby',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('rugby5',2000,null,'descripcion','siemens','rugby',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('voley1',1430.50,null,'descripcion','quinto pino','voley',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('voley2',3000,null,'descripcion','siemens','voley',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('voley3',40000,null,'descripcion','siemens','voley',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('voley4',2000,null,'descripcion','siemens','voley',1);
INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
 VALUES ('voley5',2000,null,'descripcion','siemens','voley',1);

INSERT INTO destacados VALUES (3,2);
