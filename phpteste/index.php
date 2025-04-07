<?php

$mensagem = "Este é um exemplo de conteúdo dinâmico gerado pelo PHP!";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Dados HTML com PHP e JS</title>
    <style>
   
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            padding: 20px;
        }

        
        h2 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

       
        p {
            text-align: center;
            font-size: 1.2rem;
            color: #555;
            margin: 20px 0;
        }

       
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        
        #resultado {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-top: 30px;
            max-height: 300px;
            overflow-y: auto;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        
        #resultado pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            font-size: 0.9rem;
            color: #666;
        }

       
        .content-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        
        .alert {
            background-color: #ff9800;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
            font-size: 1.1rem;
        }
    </style>
    <script type="text/javascript">
       
        function mostrarDadosHTML() {
          
            var conteudoHTML = document.documentElement.innerHTML;

            
            document.getElementById("resultado").textContent = conteudoHTML;

          
            console.log("Conteúdo HTML da página:", conteudoHTML);

           
            try {
                console.log('Tentando abrir o console...');
                
                alert("Por favor, abra o console (F12 ou Ctrl+Shift+I) para ver os dados!");
            } catch (e) {
                console.error("Não foi possível abrir o console automaticamente.");
            }

            
            var novoParagrafo = document.createElement("p");
            novoParagrafo.textContent = "Novo conteúdo adicionado ao HTML com JavaScript!";
            document.body.appendChild(novoParagrafo); 
        }
    </script>
</head>
<body>
    <div class="content-container">
        <h2>Exemplo de PHP e JavaScript para Mostrar Dados HTML e Adicionar Conteúdo</h2>

        
        <p><?php echo $mensagem; ?></p>

        
        <button onclick="mostrarDadosHTML()">Mostrar Dados HTML da Página</button>

        <hr>

       
        <div id="resultado"></div>

        
        <div class="alert">
            Lembre-se de abrir o console (pressione F12 ou Ctrl+Shift+I) para ver os dados no console.
        </div>
    </div>
</body>
</html>


