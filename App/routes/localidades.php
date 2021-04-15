<?php

//mostra localidades
$route['localidades']['get']                = 'localidades/Localidades_controller/index';

//registrar nova localidade
$route['localidades/create']['post']                = 'localidades/Localidades_controller/create';
