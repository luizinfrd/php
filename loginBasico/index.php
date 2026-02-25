<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Sistema</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Acesso ao Sistema 🔐</h2>

    <?php if(isset($_GET['erro'])): ?>
        <div class="alert">
            <?= htmlspecialchars($_GET['erro']) ?>
        </div>
    <?php endif; ?>

    <form action="processa_login.php" method="POST">
        
        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>
        </div>
        
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
        </div>
        
        <button type="submit">Entrar no Dashboard</button>
        
    </form>
</div>

</body>
</html>