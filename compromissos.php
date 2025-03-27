<?php

require_once('twig_carregar.php');
require('inc/banco.php');

use Carbon\Carbon;
date_default_timezone_set('America/Sao_Paulo');

$dados = $pdo->query('SELECT * FROM compromissos');

$comp = $dados->fetchAll(PDO::FETCH_ASSOC);


foreach($comp as $i){
    $data = $i['data'];
    $date = Carbon::createFromFormat('Y-m-d', $data);
    Carbon::parse($date);
    if($date->isWeekend() == true){
        $i['f_semana'] = 1;
    }else{
        $i['f_semana'] = 0;
    }

}


echo $twig->render('compromissos.html', [
    'titulo' => 'Compromissos',
    'compromissos' => $comp,
]);