<?php
# compras_apagar.php
require('inc/banco.php');

$id = $_GET['id'] ?? null;

if ($id) {
    $query = $pdo->prepare('DELETE FROM compras WHERE id = :id');

    $query->execute([
        ':id' => $id
    ]);
}

header('location:compras.php');