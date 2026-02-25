<?php
require 'config.php';

// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    $id_recebido = $_GET['id'];

    // O comando SQL de deleção
    $sql = "DELETE FROM artigos WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    
    // Amarramos o ID e executamos
    $stmt->bindParam(':id', $id_recebido);
    $stmt->execute();
}

// Independentemente de ter apagado ou não, volta para o início
header("Location: index.php");
exit;
?>