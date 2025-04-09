<?php
session_start();

if (!isset($_SESSION['agendamentos'])) {
    $_SESSION['agendamentos'] = [];
}

// Adicionar novo agendamento
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['acao']) && $_POST['acao'] === 'adicionar') {
        $novo = [
            'nome' => htmlspecialchars($_POST['nome']),
            'servico' => htmlspecialchars($_POST['servico']),
            'preco' => number_format($_POST['preco'], 2, ',', '.')
        ];
        $_SESSION['agendamentos'][] = $novo;
    }

    // Excluir agendamento
    if (isset($_POST['acao']) && $_POST['acao'] === 'excluir') {
        $id = intval($_POST['id']);
        if (isset($_SESSION['agendamentos'][$id])) {
            unset($_SESSION['agendamentos'][$id]);
            $_SESSION['agendamentos'] = array_values($_SESSION['agendamentos']); // Reindexar
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendamentos</title>
    <style>
        h2{color: white;}
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: linear-gradient(to bottom,rgb(59, 59, 59), #fff); /* Degradê */
            min-height: 100vh;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        #form-container {
            display: none;
            margin-bottom: 20px;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 5px #aaa;
        }
        .input-group {
            margin-bottom: 10px;
        }
        .input-group label {
            display: block;
        }
        .input-group input {
            padding: 5px;
            width: 100%;
        }
        .agendamento {
            background-color: white;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 0 3px #aaa;
        }
        .btn-excluir {
            background-color: #dc3545;
        }
        .btn-excluir:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>

<h2>Lista de Agendamentos</h2>

<!-- Botão para mostrar o formulário -->
<button class="btn" onclick="mostrarFormulario()">Novo Agendamento</button>

<!-- Formulário -->
<div id="form-container">
    <form method="post">
        <input type="hidden" name="acao" value="adicionar">
        <div class="input-group">
            <label for="nome">Nome do Cliente:</label>
            <input type="text" name="nome" id="nome" required>
        </div>
        <div class="input-group">
            <label for="servico">Tipo de Serviço:</label>
            <input type="text" name="servico" id="servico" required>
        </div>
        <div class="input-group">
            <label for="preco">Preço (R$):</label>
            <input type="number" step="0.01" name="preco" id="preco" required>
        </div>
        <button class="btn" type="submit">Adicionar</button>
    </form>
</div>

<!-- Lista de agendamentos -->
<?php
if (!empty($_SESSION['agendamentos'])) {
    foreach ($_SESSION['agendamentos'] as $index => $ag) {
        echo "<div class='agendamento'>";
        echo "<strong>Nome:</strong> {$ag['nome']}<br>";
        echo "<strong>Serviço:</strong> {$ag['servico']}<br>";
        echo "<strong>Preço:</strong> R$ {$ag['preco']}<br><br>";

        echo "<form method='post' style='display:inline'>";
        echo "<input type='hidden' name='acao' value='excluir'>";
        echo "<input type='hidden' name='id' value='$index'>";
        echo "<button class='btn btn-excluir' type='submit' onclick=\"return confirm('Tem certeza que deseja excluir este agendamento?')\">Excluir</button>";
        echo "</form>";

        echo "</div>";
    }
}
?>

<script>
function mostrarFormulario() {
    const form = document.getElementById('form-container');
    form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
}
</script>

</body>
</html>
