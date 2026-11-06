-- seed
-- arquivo pra usar os dados de teste...

USE ElectroSafe;

-- 1. Endereços (10 registros)
INSERT INTO enderecoCliente
(cep, numero, rua, bairro, cidade, estado, complemento)
VALUES
('09010-100', 120, 'Rua das Flores', 'Centro', 'Santo André', 'SP', 'Casa'),
('09020-200', 45, 'Avenida Brasil', 'Jardim', 'Santo André', 'SP', 'Apartamento 12'),
('09110-300', 780, 'Rua dos Ipês', 'Vila Assunção', 'Santo André', 'SP', 'Bloco B'),
('09210-400', 63, 'Rua São Pedro', 'Campestre', 'Santo André', 'SP', NULL),
('09310-500', 215, 'Rua das Acácias', 'Utinga', 'Santo André', 'SP', 'Fundos'),
('09410-600', 990, 'Avenida Industrial', 'Jardim', 'Santo André', 'SP', 'Sala 3'),
('09510-700', 31, 'Rua do Comércio', 'Centro', 'São Bernardo do Campo', 'SP', 'Casa 2'),
('09610-800', 402, 'Rua Paraná', 'Nova Petrópolis', 'São Bernardo do Campo', 'SP', NULL),
('09710-900', 88, 'Rua Bahia', 'Rudge Ramos', 'São Bernardo do Campo', 'SP', 'Apto 21'),
('09810-000', 150, 'Rua Minas Gerais', 'Baeta Neves', 'São Bernardo do Campo', 'SP', 'Casa');

-- 2. Clientes (10 registros)
INSERT INTO clientes
(nome, email, data_nascimento, senha, cpf, telefone, idEndereco)
VALUES
('Ana Martins', 'ana.martins@example.com', '1995-03-14', 'senhaTeste01', '00000000001', '11900000001', 1),
('Bruno Costa', 'bruno.costa@example.com', '1988-07-22', 'senhaTeste02', '00000000002', '11900000002', 2),
('Camila Rocha', 'camila.rocha@example.com', '2000-11-09', 'senhaTeste03', '00000000003', '11900000003', 3),
('Diego Almeida', 'diego.almeida@example.com', '1992-01-30', 'senhaTeste04', '00000000004', '11900000004', 4),
('Eduarda Lima', 'eduarda.lima@example.com', '1998-05-18', 'senhaTeste05', '00000000005', '11900000005', 5),
('Felipe Santos', 'felipe.santos@example.com', '1985-09-02', 'senhaTeste06', '00000000006', '11900000006', 6),
('Gabriela Souza', 'gabriela.souza@example.com', '2001-12-12', 'senhaTeste07', '00000000007', '11900000007', 7),
('Heitor Ribeiro', 'heitor.ribeiro@example.com', '1990-04-25', 'senhaTeste08', '00000000008', '11900000008', 8),
('Isabela Ferreira', 'isabela.ferreira@example.com', '1997-08-16', 'senhaTeste09', '00000000009', '11900000009', 9),
('João Oliveira', 'joao.oliveira@example.com', '1993-06-05', 'senhaTeste10', '00000000010', '11900000010', 10);

-- 3. Funcionários (10 registros)
INSERT INTO funcionarios
(nome, email, data_nascimento, senha, cpf, especializacao)
VALUES
('Lucas Mendes', 'lucas.mendes@electrosafe.example', '1990-02-11', 'funcTeste01', '10000000001', 'Eletricista'),
('Mariana Alves', 'mariana.alves@electrosafe.example', '1994-06-19', 'funcTeste02', '10000000002', 'Iluminação'),
('Nicolas Barros', 'nicolas.barros@electrosafe.example', '1987-10-03', 'funcTeste03', '10000000003', 'Instalação'),
('Olivia Cardoso', 'olivia.cardoso@electrosafe.example', '1996-12-27', 'funcTeste04', '10000000004', 'Segurança'),
('Pedro Teixeira', 'pedro.teixeira@electrosafe.example', '1989-04-08', 'funcTeste05', '10000000005', 'Eletricista'),
('Rafaela Gomes', 'rafaela.gomes@electrosafe.example', '1992-08-14', 'funcTeste06', '10000000006', 'Manutenção'),
('Samuel Nunes', 'samuel.nunes@electrosafe.example', '1998-01-21', 'funcTeste07', '10000000007', 'Iluminação'),
('Talita Freitas', 'talita.freitas@electrosafe.example', '1991-05-31', 'funcTeste08', '10000000008', 'Instalação'),
('Vitor Pires', 'vitor.pires@electrosafe.example', '1986-09-17', 'funcTeste09', '10000000009', 'Segurança'),
('Yasmin Carvalho', 'yasmin.carvalho@electrosafe.example', '1999-11-06', 'funcTeste10', '10000000010', 'Manutenção');

-- 4. Departamentos (10 registros)
INSERT INTO departamentos (numero, nome)
VALUES
(101, 'Atendimento'),
(102, 'Instalações'),
(103, 'Manutenção'),
(104, 'Iluminação'),
(105, 'Segurança Elétrica'),
(106, 'Vistorias'),
(107, 'Orçamentos'),
(108, 'Suporte Técnico'),
(109, 'Projetos'),
(110, 'Administração');

-- 5. Administradores (10 registros)
INSERT INTO administrador
(nome, email, data_nascimento, senha, cpf, id_departamento)
VALUES
('Alice Ribeiro', 'alice.ribeiro@electrosafe.example', '1982-02-10', 'adminTeste01', '20000000001', 1),
('Breno Lopes', 'breno.lopes@electrosafe.example', '1980-07-15', 'adminTeste02', '20000000002', 2),
('Cecilia Ramos', 'cecilia.ramos@electrosafe.example', '1985-03-28', 'adminTeste03', '20000000003', 3),
('Davi Moreira', 'davi.moreira@electrosafe.example', '1979-11-04', 'adminTeste04', '20000000004', 4),
('Elisa Fernandes', 'elisa.fernandes@electrosafe.example', '1988-05-20', 'adminTeste05', '20000000005', 5),
('Fabio Batista', 'fabio.batista@electrosafe.example', '1983-09-12', 'adminTeste06', '20000000006', 6),
('Giovana Melo', 'giovana.melo@electrosafe.example', '1986-01-25', 'adminTeste07', '20000000007', 7),
('Hugo Azevedo', 'hugo.azevedo@electrosafe.example', '1981-06-17', 'adminTeste08', '20000000008', 8),
('Iris Monteiro', 'iris.monteiro@electrosafe.example', '1987-10-30', 'adminTeste09', '20000000009', 9),
('Jonas Duarte', 'jonas.duarte@electrosafe.example', '1984-12-08', 'adminTeste10', '20000000010', 10);

-- 6. Relação funcionário-departamento (10 registros)
INSERT INTO funcionario_departamentos (idFuncionario, idDepartamento)
VALUES
(1, 2),
(2, 4),
(3, 2),
(4, 5),
(5, 3),
(6, 3),
(7, 4),
(8, 9),
(9, 5),
(10, 8);

-- 7. Pedidos (10 registros)
INSERT INTO pedidos (idCliente, statusPedido, categoria, descricao)
VALUES
(1, 'AGUARDANDO', 'TOMADA', 'Verificar tomada que apresenta mau contato.'),
(2, 'ANDAMENTO', 'ILUMINACAO', 'Avaliar instalação de iluminação na sala.'),
(3, 'FINALIZADO', 'DIJUNTOR', 'Inspecionar disjuntor do quadro elétrico.'),
(4, 'AGUARDANDO', 'INSTALACAO', 'Solicitação de instalação elétrica em um cômodo.'),
(5, 'CANCELADO', 'TOMADA', 'Pedido cancelado pelo cliente.'),
(6, 'ANDAMENTO', 'ILUMINACAO', 'Substituição de pontos de iluminação.'),
(7, 'AGUARDANDO', 'DIJUNTOR', 'Verificar dimensionamento do disjuntor.'),
(8, 'FINALIZADO', 'INSTALACAO', 'Instalação de novo ponto elétrico concluída.'),
(9, 'ANDAMENTO', 'TOMADA', 'Avaliar necessidade de novo ponto de tomada.'),
(10, 'AGUARDANDO', 'INSTALACAO', 'Solicitação de vistoria da instalação elétrica.');

-- Fim do seed: 10 registros em cada uma das 7 tabelas.
