<?php

include('conexao.php');

if(isset($POST['email']) || isset($_POST['senha'])) {

    if(isset($POST['email']) == 0) {
        echo "Preencha seu email";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                    session_start();
            }

            $_SESSION['user'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h1>LOGIN</h1>
        <form id="loginForm">
            <div class="form-group">
                <label for="username">Nome de usuário</label>
                <input type="text" id="username" name="username" placeholder="Nome de Usuário" required>
            </div>
            
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Senha" required>
                <small>Esqueceu a Senha?</small>
            </div>
            
            <button type="submit" class="btn-login">Login</button>
            
        </form>
    </div>
    
    <script src="scriptmenu.js"></script>
</body>
</html>