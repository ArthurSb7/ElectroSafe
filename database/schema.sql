-- seed

create database if not exists ElectroSafe;

CREATE DATABASE IF NOT EXISTS ElectroSafe
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE ElectroSafe;

-- ---------------------------------------------------------------
-- Endereço
-- ---------------------------------------------------------------
CREATE TABLE IF NOT EXISTS enderecoCliente (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cep VARCHAR(9),
    numero VARCHAR(10),
    rua VARCHAR(60),
    bairro VARCHAR(60),
    cidade VARCHAR(60),
    estado VARCHAR(20),
    complemento VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    data_nascimento DATE,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    telefone VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS clientes (
    idUsuario INT PRIMARY KEY,
    idEndereco INT NOT NULL,
    -- FK
    FOREIGN KEY (idEndereco) REFERENCES enderecoCliente(id),
    FOREIGN KEY (idUsuario) REFERENCES usuarios(id)
);

CREATE TABLE IF NOT EXISTS funcionarios (
    idUsuario INT PRIMARY KEY,
    especializacao VARCHAR(30) NOT NULL,
    -- FK
    FOREIGN KEY (idUsuario) REFERENCES usuarios(id)
);

CREATE TABLE IF NOT EXISTS departamentos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero INTEGER UNIQUE NOT NULL,
    nome VARCHAR(40) NOT NULL,
    dataCriacao DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS administrador (
    idUsuario INT PRIMARY KEY,
    id_departamento INT,
    -- FK
    FOREIGN KEY (id_departamento) REFERENCES departamentos(id),
    FOREIGN KEY (idUsuario) REFERENCES usuarios(id)
);

CREATE TABLE IF NOT EXISTS funcionario_departamentos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    idFuncionario INT NOT NULL,
    idDepartamento INT NOT NULL,
    -- FK
    FOREIGN KEY (idFuncionario) REFERENCES funcionarios(idUsuario),
    FOREIGN KEY (idDepartamento) REFERENCES departamentos(id),

    UNIQUE (idFuncionario, idDepartamento)
);

--
CREATE TABLE IF NOT EXISTS pedidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    idCliente INT NULL,
    ambiente VARCHAR(100) NOT NULL,
    responsavel VARCHAR(100) NOT NULL,
    contato VARCHAR(20) NOT NULL,
    statusPedido ENUM('ANDAMENTO', 'AGUARDANDO', 'FINALIZADO', 'CANCELADO') DEFAULT 'AGUARDANDO' NOT NULL,
    categoria ENUM('TOMADA', 'ILUMINACAO', 'DISJUNTOR', 'INSTALACAO') NOT NULL,
    descricao TEXT NOT NULL,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    -- FK
    FOREIGN KEY (idCliente) REFERENCES clientes(idUsuario)
);

-
CREATE TABLE IF NOT EXISTS registros (
    id INT PRIMARY KEY AUTO_INCREMENT,
    idUsuario INT NOT NULL,
    descricao TEXT,
    status_registro ENUM('ANDAMENTO', 'AGUARDANDO', 'FINALIZADO', 'CANCELADO') DEFAULT 'AGUARDANDO' NOT NULL,
    data_ocorrencia DATETIME DEFAULT CURRENT_TIMESTAMP,
    idDepartamento INT,
    impacto_erro ENUM('LEVE', 'MODERADO', 'CRITICO') NOT NULL,
    norma_violada VARCHAR(200),
    origem_desvio VARCHAR(200),
    acao_imediata TEXT,                 -- Contenção do problema para evitar que piore
    responsavel_Imediato INT NOT NULL,  -- Responsável por executar a ação imediata
    prazo DATETIME,                     -- Data máxima para conter o erro
    analise_erro TEXT,
    acao_final TEXT,                    -- Ação corretiva definitiva (era a linha "text," solta)
    responsavel_acaoFinal INT NOT NULL, -- Responsável pela ação final
    prazo_limite DATETIME,
    data_verificacao DATETIME NULL,
    eficacia ENUM('SIM', 'NAO') DEFAULT NULL,
    obs_fechamento TEXT,
    -- FK
    FOREIGN KEY (idUsuario) REFERENCES usuarios(id),
    FOREIGN KEY (idDepartamento) REFERENCES departamentos(id),
    FOREIGN KEY (responsavel_Imediato) REFERENCES funcionarios(idUsuario),
    FOREIGN KEY (responsavel_acaoFinal) REFERENCES administrador(idUsuario)
);


CREATE TABLE IF NOT EXISTS analise_tecnica (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cliente_analise INT,  -- Busca os dados do cliente que solicitou a análise
    servicos ENUM('CONSERTO', 'MONTAGEM', 'AVALIACAO', 'MANUTENCAO', 'MODIFICACAO') NOT NULL,
    relatoProblema TEXT,
    -- FK
    FOREIGN KEY (cliente_analise) REFERENCES clientes(idUsuario)
);
-- views
-- uma view é uma query, porem simplificada, com nome amigavel
CREATE VIEW vw_funcionarios_departamentos AS

CREATE OR REPLACE VIEW vw_funcionarios_departamentos AS
SELECT
    f.especializacao,
    d.id AS idDepartamento,
    d.nome AS departamento,
    d.numero AS numeroDepartamento

FROM funcionarios f

INNER JOIN usuarios u
    ON u.id = f.idUsuario
INNER JOIN funcionario_departamentos fd
    ON f.idUsuario = fd.idFuncionario

INNER JOIN departamentos d
    ON fd.idDepartamento = d.id;


