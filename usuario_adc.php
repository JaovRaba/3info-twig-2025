<?php

require('inc/banco.php');

$nome = $_POST['nome'] ?? null;
$senha = $_POST['senha'] ?? null;

$hash = password_hash($senha, PASSWORD_DEFAULT);

if ($nome && $hash) {

    $query = $pdo->prepare('INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)');


    $query->execute([':nome'=> $nome, ':senha'=> $hash]);
}

header('location:login.php');