<?php

require('inc/banco.php');

session_start();

$titulo = $_POST['titulo'] ?? null;
$data = $_POST['data'] ?? null;

if ($titulo && $data) {

    $query = $pdo->prepare('INSERT INTO compromissos (titulo, data, id_user) VALUES (:cm, :dt, :id)');


    $query->execute([':cm'=> $titulo, ':dt'=> $data, ':id' => $_SESSION['usuario']]);
}

header('location:compromissos.php');