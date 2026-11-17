-- seed

create database if not exists ElectroSafe;

use ElectroSafe;


create table if not exists  enderecoCliente(
	id INT PRIMARY KEY auto_increment,
    cep VARCHAR(10),
    numero int,
    rua VARCHAR (60),
    bairro VARCHAR (60),
    cidade VARCHAR (60),
    estado VARCHAR (20),
    complemento VARCHAR (100)
);


create table if not exists  clientes (
	id INT PRIMARY KEY auto_increment,
    nome VARCHAR (100) NOT NULL,
    email VARCHAR (100) unique,
    data_nascimento DATE, 
    senha VARCHAR (20),
    cpf VARCHAR (11),
    telefone VARCHAR (11),
    idEndereco int,
    -- FK
    foreign key(idEndereco) references enderecoCliente(id)
);

create table if not exists  funcionarios (
	id INT PRIMARY KEY auto_increment,
    nome VARCHAR (100) NOT NULL,
    email VARCHAR (100) unique,
    data_nascimento DATE, 
    senha VARCHAR (20),
    cpf VARCHAR (11),
	especializacao VARCHAR(30)
);

create table if not exists  departamentos(
	id int primary key auto_increment,
    numero INTEGER unique NOT NULL,
    nome VARCHAR (40),
    dataCriacao DATETIME DEFAULT current_timestamp
    );

create table if not exists   administrador(
	id INT PRIMARY KEY auto_increment,
    nome VARCHAR (100) NOT NULL,
    email VARCHAR (100) unique,
    data_nascimento DATE, 
    senha VARCHAR (20),
    cpf VARCHAR (11),
    id_departamento int,
    -- FK
    foreign key (id_departamento) references departamentos(id)
);


    
create table if not exists  funcionario_departamentos(
	id int primary key auto_increment,
    idFuncionario int,
    idDepartamento int,
    -- FK
    foreign key (idFuncionario) references funcionarios(id),
	foreign key(idDepartamento) references departamentos(id)
);
create table if not exists  pedidos(
	id int primary key auto_increment,
    idCliente int,
    statusPedido ENUM('ANDAMENTO', 'AGUARDANDO', 'FINALIZADO', 'CANCELADO') DEFAULT 'AGUARDANDO' NOT NULL,
    -- FK
	categoria ENUM('TOMADA', 'ILUMINACAO', 'DIJUNTOR', 'INSTALACAO') NOT NULL,
    descricao text,
    foreign key (idCliente) references clientes(id)
);

-- views
-- uma view é uma query, porem simplificada, com nome amigavel
CREATE VIEW vw_funcionarios_departamentos AS

SELECT
    f.id AS idFuncionario,
    f.nome AS funcionario,
    f.email,
    f.data_nascimento,
    f.cpf,
    f.especializacao,
    d.id AS idDepartamento,
    d.nome AS departamento,
    d.numero AS numeroDepartamento

FROM funcionarios f

INNER JOIN funcionario_departamentos fd
    ON f.id = fd.idFuncionario

INNER JOIN departamentos d
    ON fd.idDepartamento = d.id;
    