<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maior de Três Números</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff35f;
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
            background-color: #e8f5e9;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Verificar o Maior de Três Números</h1>
    
    <form method="post" action="">
        <label for="num1">Número 1:</label>
        <input type="number" id="num1" name="num1" required step="any"><br>
        
        <label for="num2">Número 2:</label>
        <input type="number" id="num2" name="num2" required step="any"><br>
        
        <label for="num3">Número 3:</label>
        <input type="number" id="num3" name="num3" required step="any"><br>
        
        <button type="submit">Verificar Maior Número</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $num3 = $_POST["num3"];
        
        $maior = $num1;
        
        if ($num2 > $maior) {
            $maior = $num2;
        }
        
        if ($num3 > $maior) {
            $maior = $num3;
        }
        
        echo "<div class='result'>";
        echo "<h3>Resultado:</h3>";
        echo "Números digitados: $num1, $num2, $num3<br>";
        echo "O maior número é: <strong>$maior</strong>";
        echo "</div>";
    }
    ?>
</body>
</html>