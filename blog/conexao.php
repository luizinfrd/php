<?php
$dsn = "mysql:host=localhost;dbname=blog";
$usuario = "root";
$senha = "";

try{
    $conexao = new PDO($dsn, $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $erro){
    die("Erro de conexão: " . $erro->getMessage());
}

?>