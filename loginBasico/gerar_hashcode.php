<?php
$senha_teste = 'maria123';
$hash = password_hash($senha_teste, PASSWORD_DEFAULT);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerar Hash</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Gerador de Hash</h2>
        <p>Senha pura: <?php echo $senha_teste; ?></p>
        <p>Hash gerado: <b><?php echo $hash; ?></b></p>
    </div>
</body>
</html>
