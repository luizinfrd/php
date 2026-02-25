<?php
$dsn = "mysql:host=localhost;dbname=educacional";
$usuario = "root";
$senha = "";

try{
    $conexao = new PDO($dsn, $usuario, $senha);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $erro){

    //usamos o die() aqui porque, se o banco cair, não queremos que o resto do site tente carregar.
    die("Erro de conexão: " . $erro->getMessage());
}


?>