create database yaexpress_crud;
USE yaexpress_crud;

create table if not exists permisos (
	id int not null auto_increment primary key,
    nombre varchar(50) not null
);

create table if not exists usuarios (
	id int not null auto_increment primary key,
    nombre varchar (50) not null,
    apellido varchar(50) not null,
    email varchar(60) not null UNIQUE,
    telefono varchar(15) not null,
    cedula varchar(15),
    password char(60) not null,
    permiso int not null,
    
    foreign key(permiso) references permisos(id)
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

create table if not exists videos (
	id int not null auto_increment primary key,
    titulo varchar(60)
);

create table if not exists usuario_metadata (
	id int not null auto_increment primary key,
    clave varchar(100),
    valor varchar(500),
    tipo varchar(50),
    idUsuario int,
    foreign key(idUsuario) references usuarios(id)
);

create table if not exists video_metadata (
	id int not null auto_increment primary key,
    clave varchar(100),
    valor varchar(500),
    tipo varchar(50),
    idVideo int,
    foreign key(idVideo) references videos(id)
);

create table if not exists post_metadata (
	id int not null auto_increment primary key,
    clave varchar(100),
    valor varchar(500),
    tipo varchar(50),
    idPost int,
    foreign key(idPost) references posts(id)
);

insert into permisos (nombre) VALUES ('All');
insert into permisos (nombre) VALUES ('Premium');
insert into permisos (nombre) VALUES ('Moderador');
insert into permisos (nombre) VALUES ('Admin');
insert into permisos (nombre) VALUES ('Owner');
