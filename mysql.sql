create dabatabase dashboard;

create user 'dashboard'@'localhost' identified by 'dashboard';

GRANT ALL PRIVILEGES ON * . * TO 'dashboard'@'localhost';

use dashboard;

/* Modulos de Puppet */

create table modulos (
	id_modulo int not null auto_increment, 
	nombre char(25) not null, 
	primary key (id_modulo)
);

insert into modulos (nombre) values ('$nombre_modulo');

/* Clases de los modulos */

create table clases (
	id_modulo int not null,
	id_clase int not null auto_increment,
	nombre char(25) not null,
	primary key (id_clase),
	foreign key (id_modulo) refences modulos (id_modulo)
);

/* Nodos servidos por puppet */

create table nodos (
	direccion int unsigned,
);


/* Querys utiles */
delete from tabla;

alter table tabla auto_increment=1;