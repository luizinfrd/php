<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Inscrição</title>
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
        form {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 15px 35px rgba(50,50,93,.1), 0 5px 15px rgba(0,0,0,.07);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            margin-top: 0;
            color: #32325d;
            margin-bottom: 20px;
            font-weight: 600;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #6b7c93;
            font-weight: 500;
            font-size: 14px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #e6ebf1;
            border-radius: 4px;
            background-color: #f6f9fc;
            box-sizing: border-box;
            transition: box-shadow 0.15s ease;
            font-size: 16px;
            color: #32325d;
        }
        input[type="text"]:focus, input[type="email"]:focus {
            outline: none;
            background-color: #fff;
            box-shadow: 0 1px 3px 0 #cfd7df;
            border-color: #aab7c4;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #6772e5;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
            transition: all 0.15s ease;
        }
        input[type="submit"]:hover {
            background-color: #5469d4;
            transform: translateY(-1px);
            box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
        }
    </style>
</head>
<body>
    <form action="processa.php" method="post">
        <h2>Inscreva-se</h2>
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Seu nome completo" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="seu@email.com" required>

        <label for="area">Área de Interesse</label>
        <input type="text" name="area" placeholder="Ex: Desenvolvimento Web">

        <input type="submit" value="Enviar">

    </form>
</body>
</html>