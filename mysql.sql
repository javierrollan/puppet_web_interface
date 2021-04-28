create dabatabase dashboard;

create user 'dashboard'@'localhost' identified by 'dashboard';

GRANT ALL PRIVILEGES ON * . * TO 'dashboard'@'localhost';

use dashboard;

/* Modulos de Puppet */

create table modulos (
	id_modulo int not null auto_increment, 
	nombre char(25) not null unique, 
	primary key (id_modulo)
);

insert into modulos (nombre) values ('$nombre_modulo');

/* Clases de los modulos */

create table clases (
	id_modulo int not null,
	id_clase int not null auto_increment,
	nombre char(25) not null unique,
	primary key (id_clase),
	foreign key (id_modulo) refences modulos (id_modulo)
);

/* Nodos servidos por puppet */

create table nodos (
	id_nodo	int not null auto_increment,
	ip_addr varchar(15),
	mac_addr varchar(17) unique,
	hostname varchar(32),
	primary key (id_nodo)
);


192.168.123.124
91:75:1a:ec:9a:c7

/* Querys utiles */
delete from tabla;

alter table tabla auto_increment=1;