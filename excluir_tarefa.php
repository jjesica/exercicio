<?php
include 'conexao.php';

if (isset($_GET['tar_codigo']) && is_numeric($_GET['tar_codigo'])) {
    $tar_codigo = mysqli_real_escape_string($conn, $_GET['tar_codigo']);

    // Deletar tarefa do banco de dados
    $sql = "DELETE FROM tarefas WHERE tar_codigo = $tar_codigo";
    if (mysqli_query($conn, $sql)) {
        echo "Tarefa excluída com sucesso!";
    } else {
        echo "Erro ao excluir tarefa: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: gerenciar_tarefas.php"); // Redireciona de volta para a página de gerenciamento
    exit;
} else {
    echo "ID de tarefa inválido.";
}
?>
