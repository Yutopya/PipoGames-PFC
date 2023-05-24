create database if not exists pfc;

use pfc;

create table usuarios(
	id int not null auto_increment,
    nombre varchar(45) not null,
    email varchar(50) not null,
    id_rol int (2) not null,
    contrasena varchar(30) not null,
    PRIMARY KEY (id)
)ENGINE = InnoDB;

create table juegos(
	id int not null auto_increment,
    nombre varchar(45) not null,
	precio_base varchar(5) not null,
    genero varchar(200) not null,
    plataforma varchar(20) not null,
    fecha_lanzamiento date,
    descripcion varchar(500) not null,
    link_img varchar(100) not null,
    PRIMARY KEY (id)
)ENGINE = InnoDB;

create table Usuario_has_Juegos(
	usuarios_id int,
    juegos_id int
)ENGINE = InnoDB;


create table tiendas(
	id int not null auto_increment,
    nombre varchar(45),
    moneda varchar(15),
    region Varchar(50) not null,
    metodo_pago Varchar(90),
    tipo_tienda varchar(45),
    PRIMARY KEY (id)
)ENGINE = InnoDB;

create table Juegos_has_tiendas(
	precio_tienda varchar(5) not null,
    stock_tienda int(1) not null,
	juegos_id int,
    tiendas_id int,
    constraint foreign key (juegos_id) references juegos(id),
    constraint foreign key (tiendas_id) references tiendas(id)
)ENGINE = InnoDB;

/*Usuarios*/
insert into usuarios (id, nombre, email, id_rol, contrasena) values (null, "pipo","pipopapo@gmail.com",1, "contrasena01");
insert into usuarios (id, nombre, email, id_rol, contrasena) values (null, "Pedro","Picapedro@yahoo.es",2, "contrasena02");
insert into usuarios (id, nombre, email, id_rol, contrasena) values (null, "Antonio","Anton@gmail.com",2, "contrasena03");

/*Juegos*/
insert into juegos (nombre, genero, precio_base, plataforma, fecha_lanzamiento, descripcion, link_img)values
("Outer Wilds","Mundo abierto, Puzzles, Misterio", "20.00", "PC", '2019-05-28', "Outer Wilds, nombrado juego del año 2019 por Giant Bomb, Polygon, Eurogamer y The Guardian, es un galardonado título de mundo abierto, que se desarrolla en un enigmático sistema solar confinado a un bucle temporal infinito.", "../IMG/outerwilds"),
("Risk of rain 2", "Rogue-Like", "20.00", "Playstation", '2020-08-11', "Lucha contra hordas de monstruos enloquecidos junto a tus amigos o en solitario para lograr escapar de un planeta alienígena sumido en el caos. Combina el botín de maneras asombrosas y domina cada personaje hasta encarnar la destrucción que tanto te aterraba tras tu primer aterrizaje forzoso.", "../IMG/riskofrain"),
("Grand Theft Auto 5", "Mundo abierto, FPS", "60.00", "PC", '2015-04-14', "Grand Theft Auto V para PC ofrece a los jugadores la opción de explorar el galardonado mundo de Los Santos y el condado de Blaine con una resolución de 4K y disfrutar del juego a 60 fotogramas por segundo.", "../IMG/gtav"),
("Atroneer","Mundo abierto, Supervivencia, Espacio, Cooperativo", "23.00", "PC", '2016-12-16', "¡Explora y da forma a mundos lejanos! Astroneer se desarrolla durante la fiebre del oro del siglo XXV. Los jugadores deben explorar las fronteras del espacio exterior, arriesgar su vida y sus recursos en entornos hostiles en un intento por alcanzar la ansiada riqueza.","../IMG/astroneer"),
("Castle Crashers","Cooperativo, Hack and Slash, Aventura", "12.00", "Xbox", '2012-9-26',"¡Ábrete paso golpeando, acuchillando y machacando hasta la victoria en esta aventura arcade en 2D de The Behemoth!","../IMG/castlecrashers"),
("Cyberpunk 2077","Ciberpunk, Mundo abierto, Rol, FPS", "60.00", "PC", '2020-12-10',"Cyberpunk 2077 es un RPG de aventura y acción de mundo abierto ambientado en el futuro sombrío de Night City, una peligrosa megalópolis obsesionada con el poder, el glamur y las incesantes modificaciones corporales.","../IMG/cyberpunk2077"),
("A Hat in Time","Plataformas, Aventura, Indie", "28.00", "Playstation", '2017-10-5',"A Hat in Time is a cute-as-heck 3D platformer featuring a little girl who stitches hats for wicked powers! Freely explore giant worlds and recover Time Pieces to travel to new heights!","../IMG/ahatintime");

/*Tiendas*/
insert into tiendas (id, nombre, moneda, region, metodo_pago, tipo_tienda) values (null, "Steam", "Euros", "Europa", "Visa", "Primera Mano");
insert into tiendas (id, nombre, moneda, region, metodo_pago, tipo_tienda) values (null, "Epic Games", "Euros", "Europa", "Master Card", "Primera Mano");
insert into tiendas (id, nombre, moneda, region, metodo_pago, tipo_tienda) values (null, "Instant Gaming", "Euros", "España", "Visa, PSC","Proveedor de claves");

/*Precios Steam*/
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("13.99",1,1,1);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("10.99",0,2,1);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("40.00",1,3,1);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("17.99",1,4,1);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("9.99",0,5,1);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("60.00",1,6,1);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("23.00",1,7,1);

/*Precios Epic*/
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("18.99",1,1,2);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("15.99",0,2,2);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("35.99",1,3,2);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("13.99",1,4,2);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("8.99",0,5,2);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("60.00",1,6,2);
insert into Juegos_has_tiendas (precio_tienda, stock_tienda, juegos_id, tiendas_id) values ("25.00",1,7,2);


select * from usuarios;
select * from juegos;
select * from tiendas;
select * from Juegos_has_tiendas;
select * from usuario_has_juegos;