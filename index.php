<?php

include('conexao.php');

if(isset($POST['email']) || isset($_POST['senha'])) {

    if(isset($POST['email']) == 0) {
        echo "Preencha seu email";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        $nome = $_POST['username'];
        $senha = $_POST['password'];

        $stmt = $mysqli->prepare("SELECT usuario_id, nome, hash_senha FROM usuarios WHERE nome = ?, hash_senha = ?");
        $stmt->bind_param("ss", $nome, $senha);
        if($stmt->execute()){
            echo "Login feito";
            header("location: dashboard.php");
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