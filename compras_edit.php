<?php

require_once('twig_carregar.php');
require('inc/banco.php');

$dados = $pdo->query('SELECT * FROM compras');

$comp = $dados->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == 'get'){
    



$id = $_GET['id'] ?? null;

if($id){
    $item = $pdo->prepare('SELECT * compras WHERE id=:id');
    $item->execute([':id' => $_GET['id']]);
    $dados = $item->fetch();

    echo $twig->render('compras.html',[
        'item' => $dados,
        'id' => $_GET['id']
    ]);
} 

}else{
    $query = $pdo->prepare('UPDATE compras item=:item WHERE id=:id');
    $query->bindValue([':item' => $_POST['novo'], ':id' => $_POST['id']]);
    $query->execute();
}




