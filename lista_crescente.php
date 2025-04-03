<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenar 3 Números</title>
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
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            margin-top: 10px;
        }
        button:hover {
            background-color: #45a049;
        }
        .resultado {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
        }
        .iguais {
            background-color: #e7f3fe;
            color: #31708f;
        }
        .ordenados {
            background-color: #dff0d8;
            color: #3c763d;
        }
    </style>
</head>
<body>
    <h1>Ordenar 3 Números</h1>
    
    <form method="post" action="">
        <label for="num1">Número 1:</label>
        <input type="number" id="num1" name="num1" required step="any"><br>
        
        <label for="num2">Número 2:</label>
        <input type="number" id="num2" name="num2" required step="any"><br>
        
        <label for="num3">Número 3:</label>
        <input type="number" id="num3" name="num3" required step="any"><br>
        
        <button type="submit">Ordenar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $num3 = $_POST["num3"];
        
        if ($num1 == $num2 && $num2 == $num3) {
            echo '<div class="resultado iguais">';
            echo '<h3>Resultado:</h3>';
            echo 'Todos os três números são iguais: ' . $num1;
            echo '</div>';
        } else {
            $numeros = [$num1, $num2, $num3];
            sort($numeros);
            
            echo '<div class="resultado ordenados">';
            echo '<h3>Números em ordem crescente:</h3>';
            echo $numeros[0] . ', ' . $numeros[1] . ', ' . $numeros[2];
            echo '</div>';
        }
    }
    ?>
</body>
</html>