<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
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
            display: flex;
            margin-top: 100px;
            padding: 20px;
            justify-content: center;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
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
        <div>
            <h2>Cadastro de Usuários</h2>
            <div class="form-container">
                <form action="#" method="POST">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
