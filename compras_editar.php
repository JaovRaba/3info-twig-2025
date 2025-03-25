<?php
# compras_editar.php
require_once('twig_carregar.php');
require('inc/banco.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get = Visualizar o formulário
    $id = $_GET['id'] ?? null;

    if ($id) {
        $item = $pdo->prepare('SELECT * FROM compras WHERE id = :id');
        $item->execute([':id' => $id]);
        $dados = $item->fetch();

        echo $twig->render('compras_editar.html', [
            'titulo' => 'Compras',
            'dados' => $dados,
        ]);
    }
}
else {
    // Post = Gravar os dados
    $edit = $pdo->prepare('UPDATE compras SET item = :item WHERE id = :id');
    $edit->execute([
        ':item' => $_POST['item'],
        ':id' => $_POST['id'],
    ]);
    header('location:compras.php');
}
