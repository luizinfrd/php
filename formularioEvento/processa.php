<?php
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$area = $_POST['area'] ?? '';

// DSN (Data Source Name)
$dsn = "mysql:host=localhost;dbname=cadastroemeventos";
$usuario = "root";
$senha = "";

$mensagem = "";
$tipo_alerta = "";

try{
    $conexao = new PDO($dsn, $usuario, $senha);

    // Configura o PDO para mostrar os erros caso algo dê errado no SQL
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO inscricoes (nome, email, area_interesse) VALUES (:nome, :email, :area)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam("nome", $nome);
    $stmt->bindParam("email", $email);
    $stmt->bindParam("area", $area);

    $stmt->execute();

    $mensagem = "Inscrição realizada com sucesso!";
    $tipo_alerta = "success";

} catch(PDOException $erro){
    $mensagem = "Erro de conexão: ".$erro->getMessage();
    $tipo_alerta = "error";
} 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 15px 35px rgba(50,50,93,.1), 0 5px 15px rgba(0,0,0,.07);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 { margin-top: 0; color: #32325d; }
        p { color: #6b7c93; }
        .success { color: #2e7d32; }
        .error { color: #c62828; }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #6772e5;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
            transition: all 0.15s ease;
        }
        .btn:hover {
            background-color: #5469d4;
            transform: translateY(-1px);
            box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
        }
    </style>
</head>
<body>
    <div class="card">
        <h2 class="<?php echo $tipo_alerta; ?>">
            <?php echo ($tipo_alerta == 'success') ? 'Sucesso!' : 'Erro'; ?>
        </h2>
        <p><?php echo $mensagem; ?></p>
        <a href="index.php" class="btn">Voltar</a>
    </div>
</body>
</html>
