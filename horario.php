<?php

require('twig_carregar.php');
Use Carbon\Carbon;

$datas = ['hoje' => Carbon::now(), 'amanha' => Carbon::now()->addDay()];


echo $twig->render('horario.html', [
    'titulo' => 'Horário',
    'datas' => $datas,
]);