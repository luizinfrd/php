<?php
require 'config.php';

$sql = "SELECT * FROM artigos";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$lista_artigos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dicas Educacionais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Minhas Dicas de Programação 📚</h2>
            <a href="criar.php" class="btn btn-primary">➕ Criar Nova Dica</a>
        </div>

        <?php foreach ($lista_artigos as $artigo): ?>
            
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-primary">
                        <?php echo htmlspecialchars($artigo['titulos']); ?>
                    </h4>
                    
                    <p class="card-text text-secondary">
                        <?php echo nl2br(htmlspecialchars($artigo['conteudos'])); ?>
                    </p>
                    
                    <hr>
                    
                    <a href="editar.php?id=<?php echo $artigo['id']; ?>" class="btn btn-warning btn-sm">✏️ Editar</a>
                    <a href="deletar.php?id=<?php echo $artigo['id']; ?>" class="btn btn-danger btn-sm">🗑️ Deletar</a>
                </div>
            </div>

        <?php endforeach; ?>

        <?php if (empty($lista_artigos)): ?>
            <div class="alert alert-info text-center">
                Você ainda não cadastrou nenhuma dica. Clique no botão acima para começar!
            </div>
        <?php endif; ?>

    </div>

</body>
</html>