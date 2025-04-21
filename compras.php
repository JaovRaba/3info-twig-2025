<?php
// compras.php
require_once('twig_carregar.php');
require('inc/banco.php');

session_start();

$dados = $pdo->prepare('SELECT * FROM compras WHERE id_user = :id');

$dados->execute([':id' => $_SESSION['usuario']]);
$comp = $dados->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('compras.html', [
    'titulo' => 'Compras',
    'compras' => $comp,
]);