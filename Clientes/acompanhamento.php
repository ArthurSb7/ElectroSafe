<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroSafe - Acompanhamento</title>
    <link rel="stylesheet" href="stylesClientes/styleAcompanhamento.css">
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="layout-principal">
        <aside class="barra-menu">
            <div class="barra-menu-cabeça">
                <i></i>
                <div class="logo">
                    <span>Electro<strong>Safe</strong></span>
                </div>
            </div>

            <nav class="nav">
                <a href="index.html" class="nav-item">
                    <i></i>
                    <span>Início</span>
                </a>
                <a href="registro.html" class="nav-item">
                    <i></i>
                    <span>Registro de não conformidades</span>
                </a>
                <a href="analise.html" class="nav-item">
                    <i></i>
                    <span>Análise técnica e inspeção</span>
                </a>
                <a href="checklist.html" class="nav-item">
                    <i></i>
                    <span>Checklist</span>
                </a>
                <a href="acompanhamento.html" class="nav-item active">
                    <i></i>
                    <span>Acompanhamento</span>
                </a>
                <a href="indicacao.html" class="nav-item">
                    <i></i>
                    <span>Indicação</span>
                </a>
            </nav>
        </aside>

        <main class="espaço">
            <header class="barra-principal">
                <h1>Olá Thiago, aqui você verá o status de seus pedidos.</h1>
                <div class="header-buttons">
                    <a href="historico.html" class="botao-de-fora">Histórico</a>
                    <a href="novo_pedido.html" class="botao-de-fora">Novo Pedido</a>
                </div>
            </header>

            <section class="kanban-board">
                
                <div class="kanban-column col-aberto">
                    <h2>Em Aberto</h2>
                    <div class="cards-espaço">
                        
                        <div class="card">
                            <div class="card-header">
                                <span>Pedido 01</span>
                                <span>Há 7 minutos</span>
                            </div>
                            <div class="card-body">
                                <p>Thiago Navarro</p>
                                <br>
                                <p>Condomínio</p>
                            </div>
                            <div class="espaçamento-card">
                                <button type="button" class="detalhes">Aceitar</button>
                                <button type="button" class="detalhes">Recusar</button>
                                <a href="detalhes.html" class="detalhes">Ver Detalhes</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <span>Pedido 01</span>
                                <span>Há 43 minutos</span>
                            </div>
                            <div class="card-body">
                                <p>Thiago Navarro</p>
                                <br>
                                <p>Casa</p>
                            </div>
                            <div class="espaçamento-card">
                                <button type="button" class="detalhes">Aceitar</button>
                                <button type="button" class="detalhes">Recusar</button>
                                <a href="detalhes.html" class="detalhes">Ver Detalhes</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <span>Pedido 01</span>
                                <span>Há 2 horas</span>
                            </div>
                            <div class="card-body">
                                <p>Thiago Navarro</p>
                                <br>
                                <p>Posto de Gasolina</p>
                            </div>
                            <div class="espaçamento-card">
                                <button type="button" class="detalhes">Aceitar</button>
                                <button type="button" class="detalhes">Recusar</button>
                                <a href="detalhes.html" class="detalhes">Ver Detalhes</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="kanban-column col-andamento">
                    <h2>Em Andamento</h2>
                    <div class="cards-espaço">
                        
                        <div class="card">
                            <div class="card-header">
                                <span>Pedido 02</span>
                                <span>Há 9 horas</span>
                            </div>
                            <div class="card-body">
                                <p>Thiago Oliveira</p>
                                <br>
                                <p>Galpão Fabril</p>
                            </div>
                            <div class="espaçamento-card">
                                <button type="button" class="detalhes">Colocar em Entregue</button>
                                <a href="detalhes.html" class="detalhes">Ver Detalhes</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <span>Pedido 02</span>
                                <span>Há 9 horas</span>
                            </div>
                            <div class="card-body">
                                <p>Thiago Oliveira</p>
                                <br>
                                <p>Igreja</p>
                            </div>
                            <div class="espaçamento-card">
                                <button type="button" class="detalhes">Colocar em Entregue</button>
                                <a href="detalhes.html" class="detalhes">Ver Detalhes</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="kanban-column col-entregue">
                    <h2>Entregue</h2>
                    <div class="cards-espaço">
                        
                        <div class="card">
                            <div class="card-header">
                                <span>Pedido 01</span>
                                <span>Há 1 dia</span>
                            </div>
                            <div class="card-body">
                                <p>Thiago Oliveira Navarro</p>
                                <br>
                                <p>Shopping</p>
                            </div>
                            <div class="espaçamento-card">
                                <span class="detalhes">Aguardando Confirmação</span>
                                <a href="detalhes.html" class="detalhes">Ver Detalhes</a>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
        </main>
    </div>
</body>
</html>