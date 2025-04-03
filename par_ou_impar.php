<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo de Par ou Ímpar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        form {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        input, select, button {
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 12px 20px;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 18px;
        }
        .win {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }
        .lose {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
        .game-info {
            margin: 15px 0;
            padding: 10px;
            background-color: #e7f3fe;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Jogo de Par ou Ímpar</h1>
    
    <form method="post" action="">
        <h3>Escolha Par (P) ou Ímpar (I):</h3>
        <select id="escolha" name="escolha" required>
            <option value="">Selecione...</option>
            <option value="P">Par</option>
            <option value="I">Ímpar</option>
        </select>
        
        <h3>Digite um número (0 a 10):</h3>
        <input type="number" id="numero" name="numero" required min="0" max="10">
        
        <br>
        <button type="submit">Jogar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $escolhaUsuario = strtoupper($_POST["escolha"]);
        $numeroUsuario = intval($_POST["numero"]);
        
        if ($numeroUsuario < 0 || $numeroUsuario > 10) {
            echo "<div class='result lose'>Por favor, escolha um número entre 0 e 10.</div>";
            exit;
        }
        
        $numeroSistema = rand(0, 10);
        
        $soma = $numeroUsuario + $numeroSistema;
        
        $resultado = ($soma % 2 == 0) ? 'P' : 'I';
        
        if ($escolhaUsuario == $resultado) {
            $mensagem = "Você GANHOU!";
            $classe = "win";
        } else {
            $mensagem = "Você PERDEU!";
            $classe = "lose";
        }
        
        echo "<div class='game-info'>";
        echo "<h3>Resultado do Jogo:</h3>";
        echo "Sua escolha: <strong>" . ($escolhaUsuario == 'P' ? 'Par' : 'Ímpar') . "</strong><br>";
        echo "Seu número: <strong>$numeroUsuario</strong><br>";
        echo "Número do sistema: <strong>$numeroSistema</strong><br>";
        echo "Soma: <strong>$soma</strong> (" . ($resultado == 'P' ? 'Par' : 'Ímpar') . ")<br>";
        echo "</div>";
        
        echo "<div class='result $classe'>";
        echo "<h2>$mensagem</h2>";
        echo "</div>";
    }
    ?>
</body>
</html>