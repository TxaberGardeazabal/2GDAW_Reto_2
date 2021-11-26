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
INSERT INTO supercategorias VALUES ('electrodomesticos');
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

INSERT INTO categorias VALUES ('lavadoras','electrodomesticos');
INSERT INTO categorias VALUES ('tostadoras','electrodomesticos');
INSERT INTO categorias VALUES ('cafeteras','electrodomesticos');

INSERT INTO categorias VALUES ('juguetes','varios');
INSERT INTO categorias VALUES ('juegos de mesa','varios');

INSERT INTO categorias VALUES ('futbol','deportes');
INSERT INTO categorias VALUES ('baloncesto','deportes');
INSERT INTO categorias VALUES ('balonmano','deportes');
INSERT INTO categorias VALUES ('quidditch','deportes');
INSERT INTO categorias VALUES ('rugby','deportes');
INSERT INTO categorias VALUES ('voley','deportes');



INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Balon La Liga 2021/22',80,'./imagenes/subidas/balon.png','Balon Oficial de La Liga temporada 2021/22','Adidas','futbol',2);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('BMW Serie 6 GT 2020',66000,'./imagenes/subidas/bmwgt6.png','BMW Serie 6 GT 2020 Gasolina','Barcelona','coches',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Kawasaki Ninja 650 2021',8300,'./imagenes/subidas/KawasakiNinja.png','Kawasaki Ninja 650 Metallic Carbon Gray','Bilbao','motos',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Balon Spalding NBA Oficial',175,'./imagenes/subidas/balonbasket.jpg','Balon Oficial de la NBA desde 1983','Valencia','baloncesto',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Audi R8 2019',120000,'./imagenes/subidas/audia8.png','Audi R8 2019 Diesel','Galicia','coches',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Gorra Beisbol Azul',20,'./imagenes/subidas/gorra1.png','Gorra Beisbol Azul Marino','Vitoria-Gasteiz','gorras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Gorra Beisbol Marron',23,'./imagenes/subidas/gorra2.png','Gorra Beisbol Marron','Vitoria-Gasteiz','gorras',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Gorra Beisbol Azul/Blanco/Rojo',20,'./imagenes/subidas/gorra3.png','Gorra Beisbol Azul/Blanco/Rojo','Vitoria-Gasteiz','gorras',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Gorra Beisbol Gris',22,'./imagenes/subidas/gorra4.png','Gorra Beisbol Gris','Vitoria-Gasteiz','gorras',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Gorra Beisbol Negra',20,'./imagenes/subidas/gorra5.png','Gorra Beisbol Negra','Vitoria-Gasteiz','gorras',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Gorra Beisbol Amarilla',18,'./imagenes/subidas/gorra6.png','Gorra Beisbol Amarilla','Vitoria-Gasteiz','gorras',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Gorra Beisbol Verde',18,'./imagenes/subidas/gorra7.png','Gorra Beisbol Verde','Vitoria-Gasteiz','gorras',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Gorra Beisbol Morada',15,'./imagenes/subidas/gorra8.png','Gorra Beisbol Morada','Vitoria-Gasteiz','gorras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Game Of Thrones Card Game',35,'./imagenes/subidas/juegosMesa1.png','Juego de Mesa Game Of Thrones Card Game','Navarra','juegos de mesa',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('The Great Apes Survival Game',25,'./imagenes/subidas/juegosMesa2.png','Juego de Mesa The Great Apes','Navarra','juegos de mesa',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('The Impulse Control Game',27,'./imagenes/subidas/juegosMesa3.png','Juego de Mesa The Impulse','Navarra','juegos de mesa',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Monopoly',30,'./imagenes/subidas/juegosMesa4.png','Juego de Mesa Monopoly','Navarra','juegos de mesa',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('XCOM The Board Game',27,'./imagenes/subidas/juegosMesa5.png','Juego de mesa XCOM The Board Game','Navarra','juegos de mesa',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('JAWS',27,'./imagenes/subidas/juegosMesa6.png','Juego de Mesa JAWS The Board Game','Navarra','juegos de mesa',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Broks Mad Race',30,'./imagenes/subidas/juguete1.png','Juguete de Construccion a piezas','Burgos','juguetes',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Transformers',32,'./imagenes/subidas/juguete2.png','Transformers Muneco Optimus Prime','Burgos','juguetes',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Coleccion de Juguetes',80,'./imagenes/subidas/juguete3.png','Variedad de juguetes','Burgos','juguetes',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Juguete Bebe',12,'./imagenes/subidas/juguete4.png','Juguete Transparente para bebes','Burgos','juguetes',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Moto Juguete',74,'./imagenes/subidas/juguete5.png','Moto de Juguete','Burgos','juguetes',1); 

 INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Coche Fantastico',22,'./imagenes/subidas/juguete6.png','Juguete Coche Fantastico','Burgos','juguetes',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Lego Toy Story',38,'./imagenes/subidas/juguete7.png','Juguete Lego Toy Story','Burgos','juguetes',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Coche Teledirigido',33,'./imagenes/subidas/juguete8.png','Coche Teledirigido Naranja','Burgos','juguetes',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Tostadora CookWorks Negra',39.99,'./imagenes/subidas/tostadora1.png','Tostadora CookWorks Negra','Jaen','tostadoras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Tostadora Morphy Richards',39.99,'./imagenes/subidas/tostadora2.png','Tostadora Morphy Richards Blanca','Jaen','tostadoras',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Tostadora Hamilton Beach',35,'./imagenes/subidas/tostadora3.png','Tostadora Hamilton Beach 4 piezas','Jaen','tostadoras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Tostadora SENCOR',37.5,'./imagenes/subidas/tostadora4.png','Tostadora SENCOR Negra','Jaen','tostadoras',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Tostadora Wolf Gourmet',40,'./imagenes/subidas/tostadora5.png','Tostadora Wolf Gourmet Gris','Jaen','tostadoras',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Jordan Retro XI Concord',210,'./imagenes/subidas/zapatillas1.png','Jordan Retro XI Concord Black 2020 44(EU)','Madrid','zapatillas',2);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Jordan Retro IV Wolf Grey 43',200,'./imagenes/subidas/zapatillas2.png','Jordan Retro IV Wolf Grey 43(EU)','Madrid','zapatillas',2);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Jordan Retro I High Red/Black',170,'./imagenes/subidas/zapatillas3.png','Jordan Retro I OG High Red/White 41(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Nike Air Max Ultra FlyKnit',143,'./imagenes/subidas/zapatillas4.png','Nike Air Max Ultra FlyKnit 42(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Nike Air Uptempo White/Black',160,'./imagenes/subidas/zapatillas5.png','Nike Air Uptempo White/Black 42(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Nike Air Force I White',100,'./imagenes/subidas/zapatillas6.png','Nike Air Force I White 43(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Adidas SuperStar Black/White',90,'./imagenes/subidas/zapatillas7.png','Adidas SuperStar Black/White 40(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Adidas Stan Smith White/Green',100,'./imagenes/subidas/zapatillas8.png','Adidas Stan Smith White/Green 44(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Adidas Gazelle Green/White',70,'./imagenes/subidas/zapatillas9.png','Adidas Gazelle Green/White 41(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Reebok Running White/Black',85,'./imagenes/subidas/zapatillas10.png','Reebok Running White/Black 41(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Zapatilla Running Blue/White',50,'./imagenes/subidas/zapatillas11.png','Zapatilla Running Blue/White 40(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Reebok Shaq Black/White',139.99,'./imagenes/subidas/zapatillas12.png','Reebok Shaq Black/White 43(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Reebok Pump 20 Red',170,'./imagenes/subidas/zapatillas13.png','Reebok Pump 20 Red 42(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Zapatillas Azul Marino',45,'./imagenes/subidas/zapatillas14.png','Zapatillas Azul Marino 42(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Botas Marrones',90,'./imagenes/subidas/zapatillas15.png','Botas Marrones 44(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Botas Beige Nieve',110,'./imagenes/subidas/zapatillas16.png','Botas Beige Nieve 44(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Botas Nieve Negro/Morado',150,'./imagenes/subidas/zapatillas17.png','Botas Nieve Negro/Morado 43(EU)','Madrid','zapatillas',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Nike Mercurial',75,'./imagenes/subidas/futbol2.png','Nike Mercurial 43(EU)','Sevilla','futbol',2);


NSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Nike Mercurial Black',80,'./imagenes/subidas/futbol3.png','Nike Mercurial Black 43(EU)','Sevilla','futbol',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Porteria Futbol',30,'./imagenes/subidas/futbol1.png','Porteria Futbol','Sevilla','futbol',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Guantes Portero Neuer',30,'./imagenes/subidas/futbol4.png','Guantes Portero Neuer','Sevilla','futbol',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Guantes Portero Reusch',28,'./imagenes/subidas/futbol5.png','Guantes Portero Reusch','Sevilla','futbol',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Puma EvoPower Ball',40,'./imagenes/subidas/futbol6.png','Puma EvoPower Ball White','Sevilla','futbol',2);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Bajaj Pulsar Moto',2900,'./imagenes/subidas/moto1.png','Bajaj Pulsar Moto Black','Bilbao','motos',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Bajaj Avenger 220',4000,'./imagenes/subidas/moto2.png','Bajaj Avenger 220 Moto','Bilbao','motos',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Kawasaki Dominar 400',5360,'./imagenes/subidas/moto3.png','Kawasaki Dominar 400','Bilbao','motos',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Kymco MXU 300',5360,'./imagenes/subidas/moto4.png','Kymnco MXU 300','Bilbao','motos',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Razor Dirt Quad',2000,'./imagenes/subidas/moto5.png','Razor Dirt Quad','Bilbao','motos',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Moto Vespa Rojo 2019',3500,'./imagenes/subidas/moto6.png','Moto Vespa Rojo 2019','Bilbao','motos',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('RAM Promaster City Cargo',20000,'./imagenes/subidas/furgoneta1.png','RAM Promaster City Cargo','Lugo','furgonetas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Mercedes Benz Sprinter 2019',39000,'./imagenes/subidas/furgoneta2.png','Mercedes Benz Sprinter Cargo Van','Lugo','furgonetas',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Mercedes Benz Sprinter Luxury',70000,'./imagenes/subidas/furgoneta3.png','Mercedes Benz Sprinter Cargo Van Luxury Bus Black','Lugo','furgonetas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Nissan Nv350 Cargo Van',22300,'./imagenes/subidas/furgoneta4.png','Nissan Nv350 Cargo Van Grey','Lugo','furgonetas',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Ford Cargo Van',31700,'./imagenes/subidas/furgoneta5.png','Ford Cargo Van','Lugo','furgonetas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Camion Carga',130000,'./imagenes/subidas/camion1.png','Camion de carga para empresas','Murcia','camiones',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('IVECO Camion Carga',105000,'./imagenes/subidas/camion2.png','IVECO Camion Carga','Murcia','camiones',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Camion Refrigerado',90000,'./imagenes/subidas/camion3.png','Camion Refrigerado','Murcia','camiones',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Mitsubishi Dump Truck',120000,'./imagenes/subidas/camion4.png','Mitsubishi Dump Truck','Murcia','camiones',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Ford Raptor',75000,'./imagenes/subidas/furgoneta6.png','Ford Raptor','Lugo','furgonetas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Mercedes Benz Gls Class Red',50000,'./imagenes/subidas/coche1.png','Mercedes Benz Gls Class Red','Extremadura','coches',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Lexus Ls 500 Sedan',52000,'./imagenes/subidas/coche2.png','Lexus Ls 500 Sedan','Extremadura','coches',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Range Rover Velar',57000,'./imagenes/subidas/coche3.png','Range Rover Velar White 2020','Extremadura','coches',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Chevrolet Camaro',45000,'./imagenes/subidas/coche4.png','Chevrolet Camaro Yellow','Extremadura','coches',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Lamborghini Urus',241000,'./imagenes/subidas/coche5.png','Lamborghini Urus Yellow','Extremadura','coches',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Cadillac Escalade',70000,'./imagenes/subidas/coche6.png','Cadillac Escalade 2018','Extremadura','coches',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)                                                                 ->  VALUES ('Pantalones Rojos',30.50,'./imagenes/subidas/pantalones1.png','Pantalones Rojos','Barcelona','pantalones',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Pantalones Negros',30.50,'./imagenes/subidas/pantalones2.png','Pantalones Negros','Barcelona','pantalones',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Pantalones Grises',30.50,'./imagenes/subidas/pantalones3.png','Pantalones Grises','Barcelona','pantalones',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Pantalones Cortos Grises',23,'./imagenes/subidas/pantalones4.png','Pantalones Cortos Grises','Barcelona','pantalones',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Pantalones Cortos Beige',23,'./imagenes/subidas/pantalones5.png','Pantalones Cortos Beige','Barcelona','pantalones',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Pantalones Cortos Oliva',23,'./imagenes/subidas/pantalones6.png','Pantalones Cortos Oliva','Barcelona','pantalones',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Polo Verde L',29.99,'./imagenes/subidas/camiseta1.png','Polo Verde L','Madrid','camisetas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Polo Morado L',29.99,'./imagenes/subidas/camiseta2.png','Polo Morado L','Madrid','camisetas',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Camiseta Amarilla M',20,'./imagenes/subidas/camiseta3.png','Camiseta Amarilla M','Madrid','camisetas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Camiseta Azul M',20,'./imagenes/subidas/camiseta4.png','Camiseta Azul M','Madrid','camisetas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Camiseta Roja M',20,'./imagenes/subidas/camiseta5.png','Camiseta Roja M','Madrid','camisetas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Camiseta Verde M',20,'./imagenes/subidas/camiseta6.png','Camiseta Verde M','Madrid','camisetas',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Hero Angle Washing',320,'./imagenes/subidas/lavadora1.png','Hero Angle Washing','Vitoria-Gasteiz','lavadoras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Hero Angle Washing Black',320,'./imagenes/subidas/lavadora2.png','Hero Angle Washing Black','Vitoria-Gasteiz','lavadoras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Energy Star Washers',250,'./imagenes/subidas/lavadora3.png','Energy Star Washers White','Vitoria-Gasteiz','lavadoras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('SERVIS Washing Machine',269,'./imagenes/subidas/lavadora4.png','SERVIS Washing Machine','Vitoria-Gasteiz','lavadoras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Whirlpool Washing Machine',300,'./imagenes/subidas/lavadora5.png','Whirlpool Washing Machine','Vitoria-Gasteiz','lavadoras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)
VALUES ('Cafetera PHILIPS Espresso',60,'./imagenes/subidas/cafetera1.png','Cafetera PHILIPS Expresso Cofee','Canarias','cafeteras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Cafetera Rusell Hobbs',60,'./imagenes/subidas/cafetera2.png','Cafetera Expresso Rusell Hobbs','Canarias','cafeteras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Cafetera Havells Cofee',50,'./imagenes/subidas/cafetera3.png','Cafetera Havells','Canarias','cafeteras',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Rockets 3 NBA',175,'./imagenes/subidas/baloncesto1.png','Camiseta Dorsal 3 Rockets NBA','Valencia','baloncesto',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Canasta Basket',20,'./imagenes/subidas/baloncesto2.png','Canasta Basket','Valencia','baloncesto',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Basket NBA Head Band',25,'./imagenes/subidas/baloncesto3.png','Basket NBA Head Band Yellow','Valencia','baloncesto',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Porteria Balonmano',30,'./imagenes/subidas/balonmano.png','Porteria Balonmano','Palencia','balonmano',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Balon Balonmano Liga MX',25,'./imagenes/subidas/balonmano1.png','Balon Balonmano Liga MX','Palencia','balonmano',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Balon Rugby Wilson',28,'./imagenes/subidas/rugby1.png','Balon Wilson Rubgy','Mallorca','rugby',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Soft Helmet Rugby',30,'./imagenes/subidas/rugby2.png','Soft Helmet Rugby','Mallorca','rugby',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Helmet Rugby',30,'./imagenes/subidas/rugby3.png','Helmet Rugby','Mallorca','rugby',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)VALUES ('Aros Quidditch',25,'./imagenes/subidas/quidditch.png','Aros Quidditch','Irlanda','quidditch',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante)  VALUES ('Balon Quidditch',25,'./imagenes/subidas/quidditch2.png','Balon Quidditch','Irlanda','quidditch',1);

INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Balon Voley',20,'./imagenes/subidas/voley.png','Balon Voley','Irlanda','voley',1);


INSERT INTO anuncios (nombre,precio,imagen,descripcion,localizacion,categoria,comerciante) VALUES ('Calcetines Lana',4,'./imagenes/subidas/calcetines1.png','Calcetines Lana','Vitoria-Gasteiz','calcetines',1);




INSERT INTO destacados VALUES (3,2);
