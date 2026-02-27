<?php
require 'conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = $id";

$stmt = $conexao->prepare($sql);
$resultado = $stmt->execute();
$posts = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$posts){
    header('Location: index.php');
    exit;
}

$sql_comentarios = "SELECT * FROM comentarios WHERE post_id = :post_id ORDER BY data_criacao DESC";
$stmt_comentarios = $conexao->prepare($sql_comentarios);

$stmt_comentarios->bindParam(':post_id', $id);

$stmt_comentarios->execute();

$lista_comentarios = $stmt_comentarios->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
    <h1><?php echo $posts['titulo']; ?></h1>
    <p><strong>Categoria:</strong> <?php echo $posts['categoria']; ?></p>
    <div class="conteudo">
        <?php echo $posts['conteudo']; ?>
    </div>

<hr>

    <form action="salvar_comentario.php" method="POST">
    <input type="hidden" name="post_id" value="<?php echo $posts['id']; ?>">

    <label>Seu Nome:</label><br>
    <input type="text" name="autor" required><br>

    <label>Comentário:</label><br>
    <textarea name="mensagem" required></textarea><br>

    <button type="submit">Enviar Comentário</button>
</form>

<h3>Comentários</h3>
<?php foreach ($lista_comentarios as $c): ?>
    <div style="border-bottom: 1px solid #ccc; margin-bottom: 10px;">
        <strong><?php echo htmlspecialchars($c['autor']); ?></strong> diz:
        <p><?php echo nl2br(htmlspecialchars($c['mensagem'])); ?></p>
        <small>Em: <?php echo $c['data_criacao']; ?></small>
    </div>
<?php endforeach; ?>

</body>
</html>