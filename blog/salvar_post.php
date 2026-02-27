<?php
require 'conexao.php';

$titulo = $_POST['titulo'];
$categoria = $_POST['categoria'];
$conteudo = $_POST['conteudo'];

$sql = "INSERT INTO posts (titulo, categoria, conteudo) VALUES (:titulo, :categoria, :conteudo)";
$stmt = $conexao->prepare($sql);

$stmt->bindParam(":titulo", $titulo);
$stmt->bindParam(":categoria", $categoria);
$stmt->bindParam(":conteudo", $conteudo);
$stmt->execute();

// Redireciona de volta para a home após salvar
header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Post</title>
</head>
<body>
    <form action="salvar_post.php" method="POST">
    <label>Título:</label><br>
    <input type="text" name="titulo" required><br>

    <label>Categoria:</label><br>
    <input type="text" name="categoria"><br>

    <label>Conteúdo:</label><br>
    <textarea name="conteudo" rows="10" required></textarea><br>

    <button type="submit">Publicar Post</button>
</form>
</body>
</html>