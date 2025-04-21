<?php

require('inc/banco.php');

$nome = $_POST['nome'] ?? null;
$senha = $_POST['senha'] ?? null;

if ($nome && $senha) {
    
    $query = $pdo->prepare('SELECT * from usuarios WHERE nome=:nome');
    $query->execute([':nome' => $nome]);
    $dados = $query->fetch();

    if(password_verify($senha, $dados['senha'])){
        session_start();
        $_SESSION['usuario'] = $dados['id'];
        header('location:index.php');
    }else{
        echo 'Senha Incorreta <br>';
        echo "<a href=login.php>Voltar</a>";
    }
}else{
    header('location:login.php');
}

