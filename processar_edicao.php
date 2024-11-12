<?php
// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', '', 'db_tarefas');

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Receber os dados do formulário
$tar_codigo = $_POST['tar_codigo'];
$setor = $_POST['setor'];
$prioridade = $_POST['prioridade'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];
$usu_codigo = $_POST['usu_codigo'];

// Atualizar a tarefa no banco de dados
$sql = "UPDATE tarefas SET
        setor = '$setor',
        prioridade = '$prioridade',
        descricao = '$descricao',
        status = '$status',
        usu_codigo = '$usu_codigo'
        WHERE tar_codigo = $tar_codigo";

if ($conn->query($sql) === TRUE) {
    echo "Tarefa atualizada com sucesso!";
    // Redirecionar ou exibir mensagem de sucesso
} else {
    echo "Erro ao atualizar a tarefa: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>
