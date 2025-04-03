<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Radar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        form {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
        }
        input, button {
            padding: 8px;
            margin: 5px 0;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .ok {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        .warning {
            background-color: #fff8e1;
            color: #ff8f00;
        }
        .danger {
            background-color: #ffebee;
            color: #c62828;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Simulador de Radar de Velocidade</h1>
    
    <table>
        <tr>
            <th>Velocidade</th>
            <th>Mensagem</th>
        </tr>
        <tr>
            <td>Abaixo de 50</td>
            <td>Velocidade OK</td>
        </tr>
        <tr>
            <td>Maior que 50 e menor que 60</td>
            <td>Cuidado</td>
        </tr>
        <tr>
            <td>Maior que 60</td>
            <td>Multado !</td>
        </tr>
    </table>
    
    <form method="post" action="">
        <label for="velocidade">Velocidade registrada (km/h):</label>
        <input type="number" id="velocidade" name="velocidade" required min="0" step="0.1"><br>
        
        <button type="submit">Verificar</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $velocidade = floatval($_POST["velocidade"]);
        
        if ($velocidade < 50) {
            $mensagem = "Velocidade OK";
            $classe = "ok";
        } elseif ($velocidade >= 50 && $velocidade < 60) {
            $mensagem = "Cuidado";
            $classe = "warning";
        } else {
            $mensagem = "Multado! Pare o carro!";
            $classe = "danger";
        }
        
        echo "<div class='result $classe'>";
        echo "<h3>Resultado:</h3>";
        echo "Velocidade registrada: <strong>{$velocidade} km/h</strong><br>";
        echo "Mensagem: <strong>{$mensagem}</strong>";
        echo "</div>";
    }
    ?>
</body>
</html>
