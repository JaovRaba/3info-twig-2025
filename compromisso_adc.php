<?php
# compras_adc.php
require('inc/banco.php');

$titulo = $_POST['titulo'] ?? null;
$data = $_POST['data'] ?? null;

if ($titulo && $data) {

    $query = $pdo->prepare('INSERT INTO compromissos (titulo, data) VALUES (:cm, :dt)');


    $query->execute([':cm'=> $titulo, ':dt'=> $data]);
}

header('location:compromissos.php');