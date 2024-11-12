<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados do formulário
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $usu_codigo = $_POST['usu_codigo'];

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO tarefas (setor, prioridade, descricao, status, usu_codigo) 
            VALUES ('$setor', '$prioridade', '$descricao', '$status', '$usu_codigo')";

    if (mysqli_query($conn, $sql)) {
        echo "Tarefa cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar tarefa: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: gerenciar_tarefas.php"); // Redireciona após o cadastro
    exit;
}
?>

