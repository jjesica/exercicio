<?php 
include 'conexao.php';

$sql = "SELECT * FROM tarefas";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Erro ao buscar tarefas: " . mysqli_error($conn);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Tarefas</title>
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
            max-width: 1000px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .actions {
            text-align: center;
        }
        .actions a {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .actions a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="cadastrar_usuarios.php">Cadastro de Usuários</a>
            <a href="cadastrar_tarefas.php">Cadastro de Tarefas</a>
            <a href="gerenciar_tarefas.php">Gerenciar Tarefas</a>
        </nav>
    </header>
    <div class="formContainer">
        <h1>Gerenciamento de Tarefas</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Setor</th>
                    <th>Prioridade</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['tar_codigo']; ?></td>
                    <td><?php echo $row['setor']; ?></td>
                    <td><?php echo $row['prioridade']; ?></td>
                    <td><?php echo $row['descricao']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td class="actions">
                        <a href="editar_tarefa.php?tar_codigo=<?php echo $row['tar_codigo']; ?>">Editar</a> | 
                        <a href="excluir_tarefa.php?tar_codigo=<?php echo $row['tar_codigo']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>

