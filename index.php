<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Mensalidade</title>
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

        form {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: 600;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 1.25rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Garante que o padding não aumente a largura total */
            font-size: 1rem;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="info.php" method="post">
        <h1>Calculadora de Mensalidade</h1>

        <label for="curso_select">Escolha um curso:</label>
        <select name="nome_curso" id="curso_select">
            <option value="">--Escolha uma opção --</option>
            <option value="engenharia_software">Engenharia de Software</option>
            <option value="engenharia_civil">Engenharia Civil</option>
            <option value="engenharia_mecanica">Engenharia Mecânica</option>
            <option value="engenharia_ambiental">Engenharia Ambiental</option>
            <option value="engenharia_biomedica">Engenharia Biomédica</option>
        </select>

        <label for="cupom_input">Digite um cupom:</label>
        <input type="text" placeholder="DESCONTO10" name="cupom_input">

        <input type="submit" value="Calcular Mensalidade">
    </form>
</body>
</html>