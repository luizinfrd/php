<?php

$curso = $_POST['nome_curso'];
$cupom = $_POST['cupom_input'];


$valor_base = 0;


switch ($curso) {
    case 'engenharia_software':
        $valor_base = 1000;
        break;
    
        case 'engenharia_civil':
        $valor_base = 1200;
        break;
    
        case 'engenharia_mecanica':
        $valor_base = 1500;
        break;
    
        case 'engenharia_ambiental':
        $valor_base = 1300;
        break;
    
        case 'engenharia_biomedica':
        $valor_base = 1400;
        break;
}
        
if($cupom == 'DESCONTO10'){
    $valor_novo = $valor_base - ($valor_base * 0.10);
} else if($cupom == 'DESCONTO20'){
    $valor_novo = $valor_base - ($valor_base * 0.20);
} else if($cupom == 'DESCONTO30'){
    $valor_novo = $valor_base - ($valor_base * 0.30);
} else {
    $valor_novo = $valor_base;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Mensalidade</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .resultado {
            font-size: 1.8rem;
            color: #28a745; /* Verde para indicar valor monetário */
            font-weight: bold;
            margin: 1.5rem 0;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Valor da Mensalidade</h1>
        <p>O valor calculado com os descontos aplicados é:</p>
        <div class="resultado">
            R$ <?php echo number_format($valor_novo, 2, ',', '.'); ?>
        </div>
        <a href="index.php" class="btn">Calcular Novamente</a>
    </div>
</body>
</html>
