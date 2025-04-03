<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedra, Papel e Tesoura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .escolhas {
            display: flex;
            justify-content: space-around;
            margin: 30px 0;
        }
        .escolha {
            cursor: pointer;
            transition: transform 0.2s;
            border: 3px solid transparent;
            border-radius: 10px;
            padding: 10px;
        }
        .escolha:hover {
            transform: scale(1.1);
            border-color: #4CAF50;
        }
        .escolha.selecionada {
            border-color: #2196F3;
        }
        .escolha img {
            width: 120px;
            height: 120px;
            object-fit: contain;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            margin: 20px 0;
        }
        button:hover {
            background-color: #45a049;
        }
        button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }
        .resultado-jogo {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f5f5f5;
        }
        .selecoes {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }
        .selecao {
            text-align: center;
        }
        .selecao img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
        .resultado {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            padding: 15px;
            border-radius: 5px;
        }
        .vitoria {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .derrota {
            background-color: #f2dede;
            color: #a94442;
        }
        .empate {
            background-color: #e7f3fe;
            color: #31708f;
        }
    </style>
</head>
<body>
    <h1>Pedra, Papel e Tesoura</h1>
    
    <div class="escolhas">
        <div class="escolha" data-escolha="pedra">
            <img src="pedra.jpeg" alt="Pedra">
            <p>Pedra</p>
        </div>
        <div class="escolha" data-escolha="papel">
            <img src="papel.jpeg" alt="Papel">
            <p>Papel</p>
        </div>
        <div class="escolha" data-escolha="tesoura">
            <img src="tesoura.jpeg" alt="Tesoura">
            <p>Tesoura</p>
        </div>
    </div>
    
    <form method="post" action="" id="formulario-jogo">
        <input type="hidden" id="escolha-usuario" name="escolha-usuario" value="">
        <button type="submit" id="botao-jogar" disabled>Jogar</button>
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $escolhaUsuario = $_POST["escolha-usuario"];
        
        $opcoes = ['pedra', 'papel', 'tesoura'];
        $escolhaSistema = $opcoes[array_rand($opcoes)];
        
        $resultado = '';
        if ($escolhaUsuario == $escolhaSistema) {
            $resultado = 'Empate!';
            $classeResultado = 'empate';
        } else {
            switch ($escolhaUsuario) {
                case 'pedra':
                    $resultado = ($escolhaSistema == 'tesoura') ? 'Você ganhou!' : 'Você perdeu!';
                    break;
                case 'papel':
                    $resultado = ($escolhaSistema == 'pedra') ? 'Você ganhou!' : 'Você perdeu!';
                    break;
                case 'tesoura':
                    $resultado = ($escolhaSistema == 'papel') ? 'Você ganhou!' : 'Você perdeu!';
                    break;
            }
            $classeResultado = strpos($resultado, 'ganhou') !== false ? 'vitoria' : 'derrota';
        }
        
        echo '<div class="resultado-jogo">';
        echo '<h2>Resultado</h2>';
        
        echo '<div class="selecoes">';
        echo '<div class="selecao">';
        echo '<h3>Sua escolha</h3>';
        echo '<img src="' . obterImagem($escolhaUsuario) . '" alt="' . $escolhaUsuario . '">';
        echo '<p>' . ucfirst($escolhaUsuario) . '</p>';
        echo '</div>';
        
        echo '<div class="selecao">';
        echo '<h3>Escolha do sistema</h3>';
        echo '<img src="' . obterImagem($escolhaSistema) . '" alt="' . $escolhaSistema . '">';
        echo '<p>' . ucfirst($escolhaSistema) . '</p>';
        echo '</div>';
        echo '</div>';
        
        echo '<div class="resultado ' . $classeResultado . '">' . $resultado . '</div>';
        echo '</div>';
    }
    
    function obterImagem($escolha) {
        $imagens = [
            'pedra' => 'pedra.jpeg',
            'papel' => 'papel.jpeg',
            'tesoura' => 'tesoura.jpeg'
        ];
        return $imagens[$escolha];
    }
    ?>
    
    <script>
        const escolhas = document.querySelectorAll('.escolha');
        const inputEscolhaUsuario = document.getElementById('escolha-usuario');
        const botaoJogar = document.getElementById('botao-jogar');
        
        escolhas.forEach(escolha => {
            escolha.addEventListener('click', () => {
                escolhas.forEach(e => e.classList.remove('selecionada'));
                
                escolha.classList.add('selecionada');
                inputEscolhaUsuario.value = escolha.dataset.escolha;
                botaoJogar.disabled = false;
            });
        });
    </script>
</body>
</html>