<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Aceitação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color:#ff8045
        }
        form {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
        }
        input, select, button {
            padding: 8px;
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
        .aceito {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }
        .nao-aceito {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>
<body>
    <h1>Verificação de Aceitação</h1>
    
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="">Selecione...</option>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
        </select><br>
        
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required min="0"><br>
        
        <button type="submit">Verificar Aceitação</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = htmlspecialchars($_POST["nome"]);
        $sexo = $_POST["sexo"];
        $idade = intval($_POST["idade"]);
        
        if ($sexo == "masculino" && $idade > 21) {
            $mensagem = "$nome, Você foi ACEITO !";
            $classe = "aceito";
        } else {
            $mensagem = "$nome, Você NÃO foi ACEITO !!!";
            $classe = "nao-aceito";
        }
        
        echo "<div class='result $classe'>";
        echo $mensagem;
        echo "</div>";
    }
    ?>
</body>
</html>