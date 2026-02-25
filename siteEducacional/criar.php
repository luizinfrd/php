<?php
// Trazemos a conexão com o banco de dados
require 'config.php'; 

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo_digitado = $_POST['titulo'];
    $conteudo_digitado = $_POST['conteudo'];

    $sql = "INSERT INTO artigos (titulos, conteudos) VALUES (:titulo, :conteudo)";
    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(':titulo', $titulo_digitado);
    $stmt->bindParam(':conteudo', $conteudo_digitado);
    
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
    <title>Nova Dica - Educacional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Cadastrar Nova Dica 💡</h3>
                    </div>
                    <div class="card-body">
                        
                        <form action="criar.php" method="POST">
                            
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título da Dica</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Ex: Como usar o PDO" required>
                            </div>

                            <div class="mb-3">
                                <label for="conteudo" class="form-label">Conteúdo Detalhado</label>
                                <textarea name="conteudo" id="conteudo" class="form-control" rows="5" placeholder="Escreva aqui a sua explicação..." required></textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="index.php" class="btn btn-outline-secondary">Voltar</a>
                                <button type="submit" class="btn btn-success">Salvar Dica</button>
                            </div>

                        </form>

                    </div>
                </div> </div>
        </div>
    </div>

</body>
</html>