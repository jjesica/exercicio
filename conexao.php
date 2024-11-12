<?php
$servername = "localhost";
$database = "tarefas"; // Nome do banco de dados correto
$username = "root";
$password = "";

// Conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificação da conexão
if (!$conn) {
    die("Conexão Falhou: " . mysqli_connect_error());
} else {
    echo "Conexão bem-sucedida!";
}
?>
