CREATE DATABASE yaexpress_crud; 

USE yaexpress_crud;

create table if not exists usuarios (
	id int not null auto_increment primary key,
    nombre varchar (50) not null,
    apellido varchar(50) not null,
    email varchar(60) not null,
    telefono varchar(15) not null,
    cedula varchar(15),
    password char(60) not null,
    permiso int not null,
    
    foreign key(permiso) references permisos(id)
);

create table if not exists permisos (
	id int not null auto_increment primary key,
    nombre varchar(50) not null
);

create table if not exists posts (
	id int not null auto_increment primary key,
    titulo varchar(60) not null,
    contenido varchar(500) not null,
    imagen varchar(100),
    tipo varchar(50) not null,
    usuario int not null,
    fecha datetime default now(),
	foreign key(usuario) references usuarios(id)
);

create table videos (
	id int not null auto_increment primary key,
    titulo varchar(60)
);

insert into permisos (nombre) VALUES ('miembro');
insert into permisos (nombre) VALUES ('administrador');
