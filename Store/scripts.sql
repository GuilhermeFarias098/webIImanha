/* Deleta o banco de dados */
/* drop database if exists empresa; */

/* Criar o banco de dados */
create database if not exists empresa;
use empresa;

create table if not exists departamento(
	idDepartamento smallint primary key auto_increment,
    nome_departamento varchar(30) not null,
    sala tinyint not null,
    andar tinyint not null
);

create table if not exists projeto(
	idProjeto smallint primary key auto_increment,
    nome_projeto varchar(30) not null,
    data_inicio date not null,
    data_termino date,
    custo decimal(7,2)
);

create table if not exists usuario(
	idUsuario smallint primary key auto_increment,
    login varchar(45) not null,
    senha varchar(45) not null
);

create table if not exists departamento_projeto(
	idDepartamento smallint,
    idProjeto smallint,
    primary key(idDepartamento,idProjeto),
    constraint fk_departamento foreign key(idDepartamento) references departamento(idDepartamento),
    constraint fk_projeto foreign key(idProjeto) references projeto(idProjeto)
);

create table if not exists funcionario(
	idFuncionario smallint primary key auto_increment,
    nome_funcionario varchar(30) not null,
    email varchar(50) unique key not null,
    salario decimal(7,2) not null,
    idDepartamento smallint not null,
    idUsuario smallint not null,
    constraint fk_func_departamento foreign key(idDepartamento) references departamento(idDepartamento),
    constraint fk_usuario foreign key(idUsuario) references usuario(idUsuario)
);