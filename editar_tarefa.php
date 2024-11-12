<?php
// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', '', 'db_tarefas');

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verificar se o parâmetro 'id' foi passado na URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idTarefa = $_GET['id'];

    // Consulta para obter os dados da tarefa, incluindo o nome do usuário
    $sql = "SELECT t.tar_codigo, t.setor, t.prioridade, t.descricao, t.status, t.usu_codigo, u.nome AS nome_usuario
            FROM tarefas t
            LEFT JOIN usuarios u ON t.usu_codigo = u.usu_codigo
            WHERE t.tar_codigo = $idTarefa";
    $result = $conn->query($sql);

    // Verificar se a tarefa existe
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Tarefa não encontrada!";
        exit();
    }
} else {
    echo "ID da tarefa não fornecido!";
    exit();
}

// Consulta para obter os usuários
$sqlUsuarios = "SELECT usu_codigo, nome FROM usuarios ORDER BY nome";
$queryUsuarios = mysqli_query($conn, $sqlUsuarios);

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Tarefa</title>
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
        input[type="text"], select {
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
        <h1>Editar Tarefa</h1>
        <form method="POST" action="processar_edicao.php">
            <input type="hidden" name="tar_codigo" value="<?= $row['tar_codigo'] ?>">

            <label for="setor">Setor:</label>
            <input type="text" id="setor" name="setor" value="<?= $row['setor'] ?>" required>

            <label for="prioridade">Prioridade:</label>
            <select name="prioridade" id="prioridade" required>
                <option value="Baixa" <?= ($row['prioridade'] == 'Baixa') ? 'selected' : '' ?>>Baixa</option>
                <option value="Média" <?= ($row['prioridade'] == 'Média') ? 'selected' : '' ?>>Média</option>
                <option value="Alta" <?= ($row['prioridade'] == 'Alta') ? 'selected' : '' ?>>Alta</option>
            </select>

            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" value="<?= $row['descricao'] ?>" required>

            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="A Fazer" <?= ($row['status'] == 'A Fazer') ? 'selected' : '' ?>>A Fazer</option>
                <option value="Fazendo" <?= ($row['status'] == 'Fazendo') ? 'selected' : '' ?>>Fazendo</option>
                <option value="Pronto" <?= ($row['status'] == 'Pronto') ? 'selected' : '' ?>>Pronto</option>
            </select>

            <label for="usuario">Usuário:</label>
            <select name="usu_codigo" id="usu_codigo" required>
                <option value="">Selecione o Usuário</option>
                <?php
                    // Preenche as opções com os usuários do banco
                    while ($usuario = mysqli_fetch_array($queryUsuarios)) {
                        echo "<option value=\"{$usuario['usu_codigo']}\" " . ($row['usu_codigo'] == $usuario['usu_codigo'] ? 'selected' : '') . ">{$usuario['nome']}</option>";
                    }
                ?>
            </select>

            <input type="submit" value="Atualizar">
        </form>
    </div>
</body>
</html>
