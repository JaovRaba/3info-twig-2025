<?php
# compras_adc.php
require('inc/banco.php');

$item = $_POST['item'] ?? null;

if ($item) {
    // Prepara a consulta
    $query = $pdo->prepare('INSERT INTO compras (item) VALUES (:it)');

    // Associa os valores dentro da consulta
    $query->bindValue(':it', $item);

    // Executa a consulta
    $query->execute();
}

header('location:compras.php');