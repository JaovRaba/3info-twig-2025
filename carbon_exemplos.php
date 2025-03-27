<?php

require_once('vendor/autoload.php');
date_default_timezone_set('America/Sao_Paulo');

use Carbon\Carbon;

echo Carbon::now().'<br>';

echo Carbon::now()->addDay().'<br>';

echo Carbon::now()->subWeek().'<br>';

echo 'Próximas Olimpíadas '.Carbon::createFromDate(2024)->addYears(4)->year.'<br>';

echo 'Sua idade é: '.Carbon::createFromDate(2004, 9, 8)->age.'<br>';

if(Carbon::now()->isWeekend()){
    echo 'Festa <br>';
}else{
    echo 'Aula <br>';
}

$nacimento = Carbon::createFromDate(2010, 07, 23);
echo 'Diferença de data: '. Carbon::now()->diff($nacimento);

$data_aleatoria = '2023-04-05';

$data = Carbon::parse($data_aleatoria);