<?php

// require_once __DIR__ . "/index.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesClientes/styleAcompanhamento.css">
</head>
<nav div class="menu">
    <button><a href="index.php"></a>🏠 Início</button>
    <button><a href="acompanhamento.php"></a> 📃 Acompanhamento</button>
    <button><a href="analise.php"></a> 🔎 Análise Técnica/Inspeções</button>
    <button><a href="checklist.php"></a>✔️ Checklist</button>
    <button><a href="indicacao.php"></a>🫵 Indicação</button>
    <button><a href="registro.php"></a>🗂️ Registro de não confirmidades</button>
    </div>
</nav>
<img src="Logo" alt="">
<img src="Imagem" alt="">
<div class="corpo">
<body>
    <h1>Olá, (nome do usuario). Aqui você verá o status de seus pedidos. </h1>

    <button class="botao">Histórico</button>
    <button class="botao">Novo Pedido</button>
<hr>
</div>
<div class="aberto">
    <h2>Em Aberto</h2>
    <div class="quadrado">

    <h2>Pedido 01</h2> <h3>Há 7 minutos</h3>
    <h2>Thiago Oliveira Navarro</h2>
    <h2>Condomínio</h2>

    <button class="botoes">Aceitar</button>
    <button class="botoes">Recusar</button>
    <button class="botoes">Ver Detalhes</button>
</div>
<br>
<div class="quadrado">

    <h2>Pedido 02</h2> <h3>Há 43 minutos</h3>
    <h2>Thiago Oliveira Navarro</h2>
    <h2>Condomínio</h2>

    <button class="botoes">Aceitar</button>
    <button class="botoes">Recusar</button>
    <button class="botoes">Ver Detalhes</button>
</div>
<br>
<div class="quadrado">

    <h2>Pedido 03</h2> <h3>Há 2 horas</h3>
    <h2>Thiago Oliveira Navarro</h2>
    <h2>Condomínio</h2>

    <button class="botoes">Aceitar</button>
    <button class="botoes">Recusar</button>
    <button class="botoes">Ver Detalhes</button>
</div>
</div>
<div class="andamento">
    <h2>Em Andamento</h2>
    <div class="quadrado">

    <h2>Pedido 04</h2> <h3>Há 9 horas</h3>
    <h2>Thiago Oliveira Navarro</h2>
    <h2>Condomínio</h2>

    <button class="botoes">Colocar em Entregue</button>
    <button class="botoes">Ver Detalhes</button>
</div>
<br>
<div class="quadrado">

    <h2>Pedido 05</h2> <h3>Há 9 horas</h3>
    <h2>Thiago Oliveira Navarro</h2>
    <h2>Condomínio</h2>

    <button class="botoes">Colocar em Entregue</button>
    <button class="botoes">Ver Detalhes</button>
</div>
</div>

<div class="entregue">
    <h2>Entregue</h2>
    <div class="quadrado">

    <h2>Pedido 06</h2> <h3>Há 1 dia</h3>
    <h2>Thiago Oliveira Navarro</h2>
    <h2>Shopping</h2>

    <button class="botoes">Aguardando Confirmação</button>
    <button class="botoes">Ver Detalhes</button>
</div>
</div>
</body>
</html>