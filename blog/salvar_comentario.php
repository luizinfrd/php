<?php
require 'conexao.php';

$post_id = $_POST['post_id'];
$autor = $_POST['autor'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO comentarios (post_id, autor, mensagem) VALUES (:post_id, :autor, :mensagem)";
$stmt = $conexao->prepare($sql);

$stmt->bindParam(":post_id", $post_id);
$stmt->bindParam(":autor", $autor);
$stmt->bindParam(":mensagem", $mensagem);
$stmt->execute();

header("Location: posts.php");
?>
