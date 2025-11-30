<?php
session_start();
require_once "conexao.php";

if (!isset($_SESSION["cargo"]) || strtolower($_SESSION["cargo"]) !== "gerente") {
    header("Location: dashboard.php?erro=acesso_negado");
    exit;
}

if (!isset($_POST["usuario_id"])) {
    die("ID inválido.");
}

$usuario_id = $_POST["usuario_id"];

$stmt = $pdo->prepare("SELECT cargo FROM Usuarios WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$dados) {
    die("Funcionário não encontrado.");
}

if (strtolower($dados["cargo"]) === "gerente") {
    die("Erro: Gerentes não podem excluir outros gerentes.");
}

$stmt = $pdo->prepare("DELETE FROM Usuarios WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);

header("Location: funcionarios.php?sucesso=1");
exit;
?>