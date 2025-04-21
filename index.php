<?php

require_once('twig_carregar.php');

session_start();

if(isset($_SESSION['usuario'])){
    echo $twig->render('index.html', [
        'fruta' => 'Abacaxi',
    ]);
}else{
    header('location:login.php');
}
