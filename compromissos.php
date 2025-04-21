<?php

require_once('twig_carregar.php');
require('inc/banco.php');

use Carbon\Carbon;
date_default_timezone_set('America/Sao_Paulo');

session_start();

$dados = $pdo->prepare('SELECT * FROM compromissos WHERE id_user = :id');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['filtro'])){
    switch($_GET['filtro']){
        case 'asc_data':
            $dados = $pdo->prepare('SELECT * FROM compromissos WHERE id_user = :id ORDER BY data ASC');
            break;
        case 'dsc_data':
            $dados = $pdo->prepare('SELECT * FROM compromissos WHERE id_user = :id ORDER BY data DESC');
            break;
        case 'asc_titulo':
            $dados = $pdo->prepare('SELECT * FROM compromissos WHERE id_user = :id ORDER BY titulo ASC');
            break;
        case 'dsc_titulo':
            $dados = $pdo->prepare('SELECT * FROM compromissos WHERE id_user = :id ORDER BY titulo DESC');
            break;
    }
}

$dados->execute([':id' => $_SESSION['usuario']]);
$comp = $dados->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($comp); $i++){
    $data = $comp[$i]['data'];
    $date = Carbon::createFromFormat('Y-m-d', $data);
    Carbon::parse($date);
    if($date->isWeekend() == true){
        $comp[$i]['f_semana'] = 1;
    }else{
        $comp[$i]['f_semana'] = 0;
    }

}


echo $twig->render('compromissos.html', [
    'titulo' => 'Compromissos',
    'compromissos' => $comp,
]);