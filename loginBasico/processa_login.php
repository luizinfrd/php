<?php
$email_digitado = $_POST['email'];
$senha_digitada = $_POST['senha'];


$dsn = "mysql:host=localhost;dbname=login_basico";
$usuario = "root";
$senha = "";


try{
    $conexao = new PDO($dsn, $usuario, $senha);

    // Configura o PDO para mostrar os erros caso algo dê errado no SQL
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam("email", $email_digitado);
    $stmt->execute();

    $usuario_encontrado = $stmt->fetch(PDO::FETCH_ASSOC);
    if($usuario_encontrado == null){
        $mensagem = "Usuário não encontrado!";
        header("Location: index.php?erro=" . urlencode($mensagem));
        exit();

    } elseif(!password_verify($senha_digitada, $usuario_encontrado['senha'])){ // essa linha ja realiza a comparação da senha digitada com a senha criptografada no banco
        $mensagem = "Senha incorreta!";
        header("Location: index.php?erro=" . urlencode($mensagem));
        exit();

    } else{
        session_start();
        
        $_SESSION['usuario_id'] = $usuario_encontrado['id'];
        $_SESSION['usuario_nome'] = $usuario_encontrado['nome'];

        header("Location: dashboard.php");
        exit();
    }

} catch(PDOException $erro){
    $mensagem = "Erro de conexão: ".$erro->getMessage();
    header("Location: index.php?erro=" . urlencode($mensagem));
    exit();
}


?>