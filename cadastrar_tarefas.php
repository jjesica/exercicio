<?php
include 'conexao.php';

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados do formulário
    $setor = mysqli_real_escape_string($conn, $_POST['setor']);
    $prioridade = mysqli_real_escape_string($conn, $_POST['prioridade']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $usu_codigo = mysqli_real_escape_string($conn, $_POST['usu_codigo']);

    // Inserir dados na tabela de tarefas
    $sql = "INSERT INTO tarefas (setor, prioridade, descricao, status, usu_codigo) 
            VALUES ('$setor', '$prioridade', '$descricao', '$status', '$usu_codigo')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Tarefa cadastrada com sucesso!'); window.location.href='gerenciar_tarefas.php';</script>";
    } else {
        echo "Erro ao cadastrar a tarefa: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #007bff;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            font-weight: bold;
        }
        nav a:hover {
            background-color: #0056b3;
        }
        .formContainer {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], input[type="email"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="cadastro_usuarios.php">Cadastro de Usuários</a>
            <a href="cadastro_tarefas.php">Cadastro de Tarefas</a>
            <a href="gerenciar_tarefas.php">Gerenciar Tarefas</a>
        </nav>
    </header>
    <div class="formContainer">
        <h1>Cadastro de Tarefas</h1>
        <form method="POST" action="cadastro_tarefas.php">
            <label for="setor">Setor:</label>
            <input type="text" id="setor" name="setor" required>

            <!-- Campo de Prioridade -->
            <label for="prioridade">Prioridade:</label>
            <select name="prioridade" id="prioridade" required>
                <option value="">Selecione a Prioridade</option>
                <option value="Baixa">Baixa</option>
                <option value="Média">Média</option>
                <option value="Alta">Alta</option>
            </select>

            <!-- Campo de Descrição -->
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>

            <!-- Campo de Status -->
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="">Selecione o Status</option>
                <option value="A Fazer">A Fazer</option>
                <option value="Fazendo">Fazendo</option>
                <option value="Pronto">Pronto</option>
            </select>

            <!-- Campo de Usuário -->
            <label for="usuario">Usuário:</label>
            <select name="usu_codigo" id="usu_codigo" required>
                <option value="">Selecione o Usuário</option>
                <?php
                    // Conectar ao banco de dados
                    $conn = new mysqli('localhost', 'root', '', 'db_tarefas');

                    // Verificar a conexão
                    if ($conn->connect_error) {
                        die("Erro de conexão: " . $conn->connect_error);
                    }

                    // Consulta para obter todos os usuários
                    $sqlUsuarios = "SELECT usu_codigo, nome FROM usuarios ORDER BY nome";
                    $queryUsuarios = mysqli_query($conn, $sqlUsuarios);

                    // Verificar se há resultados
                    if (mysqli_num_rows($queryUsuarios) > 0) {
                        while ($usuario = mysqli_fetch_array($queryUsuarios)) {
                            echo "<option value=\"{$usuario['usu_codigo']}\">{$usuario['nome']}</option>";
                        }
                    }
                    // Fechar a conexão
                    $conn->close();
                ?>
            </select>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>


