<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px 20px;
            background-color: #007bff;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        h1 {
            margin: 0;
            font-size: 20px;
        }
        .menu-container {
            display: flex;
            gap: 20px;
        }
        .menu-button {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }
        .menu-button:hover {
            color: #cce7ff;
        }
        .content {
            margin-top: 100px; /* Para evitar que o conteúdo fique escondido atrás do cabeçalho fixo */
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Gerenciamento de Tarefas</h1>
        <div class="menu-container">
            <a href="cadastrar_usuarios.php" class="menu-button">Cadastro de Usuários</a>
            <a href="cadastrar_tarefas.php" class="menu-button">Cadastro de Tarefas</a>
            <a href="gerenciar_tarefas.php" class="menu-button">Gerenciar Tarefas</a>
        </div>
    </header>
    <div class="content">
        <p>Bem-vindo ao sistema de gerenciamento de tarefas!</p>
    </div>
</body>
</html>
