<?php
session_start();
require_once "conexao.php";

// Verifica se quem está logado é gerente
if (!isset($_SESSION["cargo"]) || strtolower($_SESSION["cargo"]) !== "Gerente") {
    die("Acesso negado.");
}

if (!isset($_POST["usuario_id"])) {
    die("ID inválido.");
}

$usuario_id = $_POST["usuario_id"];

// Busca o cargo do funcionário que tentam excluir
$stmt = $pdo->prepare("SELECT cargo FROM Usuarios WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$dados) {
    die("Funcionário não encontrado.");
}

// ❌ SE O FUNCIONÁRIO TAMBÉM FOR GERENTE → NÃO PERMITIR
if (strtolower($dados["cargo"]) === "Gerente") {
    die("Erro: Gerentes não podem excluir outros gerentes.");
}

// ✔ Excluir funcionário permitido
$stmt = $pdo->prepare("DELETE FROM Usuarios WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);

header("Location: funcionarios.php?sucesso=1");
exit;
