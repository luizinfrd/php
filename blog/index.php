<?php
require 'conexao.php';

$sql = "SELECT * FROM posts";

$stmt = $conexao->prepare($sql);
$resultado = $stmt->execute();
$lista_posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meu Blog Educacional</title>
</head>
<body>
    <h1>Bem-vindo ao meu Blog!</h1>

    <?php foreach($lista_posts as $post): ?>
        <article>
            <h2><?php echo $post['titulo']; ?></h2>
            <p>Categoria: <?php echo $post['categoria']; ?></p>
            <a href="posts.php?id=<?php echo $post['id']; ?>">Ler mais</a>
            <hr>
        </article>
    <?php endforeach; ?>

</body>
</html>