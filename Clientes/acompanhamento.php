<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroSafe - Acompanhamento</title>
    <link rel="stylesheet" href="stylesClientes/styleAcompanhamento.css">
</head>
<body>

    <div class="main-layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <i></i>
                <div class="logo">
                    <i></i>
                    <span>Electro<strong>Safe</strong></span>
                </div>
            </div>

            <nav class="sidebar-nav">
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
                    <span>Análise e inspeção</span>
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

        <main class="content">
            <header class="topbar">
                <h1>Olá, Thiago. Aqui você verá o status de seus pedidos.</h1>
                <div class="header-buttons">
                    <a href="historico.html" class="btn btn-warning">Histórico</a>
                    <a href="novo_pedido.html" class="btn btn-warning">Novo Pedido</a>
                </div>
            </header>

            <section class="kanban-board">
                
                <div class="kanban-column col-aberto">
                    <h2>Em Aberto</h2>
                    <div class="cards-list">
                        
                        <div class="card">
                            <div class="card-header">
                                <span class="pedido-id">Pedido 01</span>
                                <span class="pedido-time">Há 7 minutos</span>
                            </div>
                            <div class="card-body">
                                <p class="cliente-nome">Thiago Navarro</p>
                                <p class="local-nome">Condomínio</p>
                            </div>
                            <div class="card-actions">
                                <button type="button" class="badge-btn">Aceitar</button>
                                <button type="button" class="badge-btn">Recusar</button>
                                <a href="detalhes.html" class="badge-btn">Ver Detalhes</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <span class="pedido-id">Pedido 01</span>
                                <span class="pedido-time">Há 43 minutos</span>
                            </div>
                            <div class="card-body">
                                <p class="cliente-nome">Thiago Navarro</p>
                                <p class="local-nome">Casa</p>
                            </div>
                            <div class="card-actions">
                                <button type="button" class="badge-btn">Aceitar</button>
                                <button type="button" class="badge-btn">Recusar</button>
                                <a href="detalhes.html" class="badge-btn">Ver Detalhes</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <span class="pedido-id">Pedido 01</span>
                                <span class="pedido-time">Há 2 horas</span>
                            </div>
                            <div class="card-body">
                                <p class="cliente-nome">Thiago Navarro</p>
                                <p class="local-nome">Posto de Gasolina</p>
                            </div>
                            <div class="card-actions">
                                <button type="button" class="badge-btn">Aceitar</button>
                                <button type="button" class="badge-btn">Recusar</button>
                                <a href="detalhes.html" class="badge-btn">Ver Detalhes</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="kanban-column col-andamento">
                    <h2>Em Andamento</h2>
                    <div class="cards-list">
                        
                        <div class="card">
                            <div class="card-header">
                                <span class="pedido-id">Pedido 02</span>
                                <span class="pedido-time">Há 9 horas</span>
                            </div>
                            <div class="card-body">
                                <p class="cliente-nome">Thiago Oliveira</p>
                                <p class="local-nome">Galpão Fabril</p>
                            </div>
                            <div class="card-actions">
                                <button type="button" class="badge-btn">Colocar em Entregue</button>
                                <a href="detalhes.html" class="badge-btn">Ver Detalhes</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <span class="pedido-id">Pedido 02</span>
                                <span class="pedido-time">Há 9 horas</span>
                            </div>
                            <div class="card-body">
                                <p class="cliente-nome">Thiago Oliveira</p>
                                <p class="local-nome">Igreja</p>
                            </div>
                            <div class="card-actions">
                                <button type="button" class="badge-btn">Colocar em Entregue</button>
                                <a href="detalhes.html" class="badge-btn">Ver Detalhes</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="kanban-column col-entregue">
                    <h2>Entregue</h2>
                    <div class="cards-list">
                        
                        <div class="card">
                            <div class="card-header">
                                <span class="pedido-id">Pedido 01</span>
                                <span class="pedido-time">Há 1 dia</span>
                            </div>
                            <div class="card-body">
                                <p class="cliente-nome">Thiago Oliveira Navarro</p>
                                <p class="local-nome">Shopping</p>
                            </div>
                            <div class="card-actions">
                                <span class="badge-btn highlight">Aguardando Confirmação</span>
                                <a href="detalhes.html" class="badge-btn">Ver Detalhes</a>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
        </main>
    </div>

</body>
</html>