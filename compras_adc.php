<?php
# compras_adc.php
require('inc/banco.php');

$item = $_POST['item'] ?? null;

session_start();

if ($item) {
    // Prepara a consulta
    $query = $pdo->prepare('INSERT INTO compras (item, id_user) VALUES (:it,:id)');

    // Associa os valores dentro da consulta
    $query->bindValue(':it', $item);
    $query->bindValue(':id', $_SESSION['usuario']);

    // Executa a consulta
    $query->execute();
}

header('location:compras.php');