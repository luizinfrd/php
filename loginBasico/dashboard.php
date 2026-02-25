<?php
session_start();

// o isset verifica se a session está settada e nula
if(!isset($_SESSION['usuario_id'])){
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container dashboard-container">
        <header class="dashboard-header">
            <h1>Dashboard Principal</h1>
            <div class="user-info">
                <span><i class="fas fa-user-circle"></i> Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</span>
                <a href="logout.php" class="btn-logout">Sair</a>
            </div>
        </header>

        <!-- Cards de Resumo -->
        <section class="card-container">
            <div class="card">
                <h3><i class="fas fa-chart-line"></i> Vendas do Mês</h3>
                <p class="card-value">R$ 12.345,67</p>
            </div>
            <div class="card">
                <h3><i class="fas fa-users"></i> Novos Clientes</h3>
                <p class="card-value">89</p>
            </div>
            <div class="card">
                <h3><i class="fas fa-tasks"></i> Tarefas Pendentes</h3>
                <p class="card-value">12</p>
            </div>
            <div class="card">
                <h3><i class="fas fa-ticket-alt"></i> Tickets Abertos</h3>
                <p class="card-value">4</p>
            </div>
        </section>

        <!-- Conteúdo Principal -->
        <main class="main-content">
            <section class="content-block chart-block">
                <h2>Visão Geral de Vendas</h2>
                <!-- Placeholder para um gráfico. -->
                <img src="https://i.imgur.com/s9w5aJg.png" alt="Gráfico de Vendas" style="width:100%; max-width: 600px; margin-top: 1rem; border-radius: 8px;">
            </section>
            <section class="content-block">
                <h2>Últimos Pedidos</h2>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID do Pedido</th>
                            <th>Cliente</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1024</td>
                            <td>Empresa ABC</td>
                            <td>01/07/2024</td>
                            <td><span class="status-completed">Concluído</span></td>
                            <td>R$ 1.500,00</td>
                        </tr>
                        <tr>
                            <td>#1023</td>
                            <td>Cliente XYZ</td>
                            <td>30/06/2024</td>
                            <td><span class="status-processing">Processando</span></td>
                            <td>R$ 750,50</td>
                        </tr>
                        <tr>
                            <td>#1022</td>
                            <td>Organização QWE</td>
                            <td>29/06/2024</td>
                            <td><span class="status-shipped">Enviado</span></td>
                            <td>R$ 2.300,00</td>
                        </tr>
                        <tr>
                            <td>#1021</td>
                            <td>Companhia Z</td>
                            <td>28/06/2024</td>
                            <td><span class="status-cancelled">Cancelado</span></td>
                            <td>R$ 120,00</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>