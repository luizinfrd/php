<?php
require 'config.php';

// ETAPA 1: Busca os dados atuais para preencher o formulário
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM artigos WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $artigo = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$artigo) {
        header("Location: index.php");
        exit;
    }
}

// ETAPA 2: Processa a atualização quando o botão é clicado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_recebido = $_POST['id'];
    $novo_titulo = $_POST['titulo'];
    $novo_conteudo = $_POST['conteudo'];

    $sql = "UPDATE artigos SET titulos = :titulo, conteudos = :conteudo WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    
    $stmt->bindParam(':titulo', $novo_titulo);
    $stmt->bindParam(':conteudo', $novo_conteudo);
    $stmt->bindParam(':id', $id_recebido);
    
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dica - Educacional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark">
                        <h3 class="mb-0">Editar Dica ✏️</h3>
                    </div>
                    <div class="card-body">
                        
                        <form action="editar.php?id=<?php echo $artigo['id']; ?>" method="POST">
                            
                            <input type="hidden" name="id" value="<?php echo $artigo['id']; ?>">

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título da Dica</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" 
                                       value="<?php echo htmlspecialchars($artigo['titulos']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="conteudo" class="form-label">Conteúdo Detalhado</label>
                                <textarea name="conteudo" id="conteudo" class="form-control" rows="5" required><?php echo htmlspecialchars($artigo['conteudos']); ?></textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-warning">Atualizar Alterações</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>