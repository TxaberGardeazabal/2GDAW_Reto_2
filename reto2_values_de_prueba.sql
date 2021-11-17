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