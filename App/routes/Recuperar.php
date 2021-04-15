<?php

// Recuperação de senha
$route['recuperar']['get']        = 'recuperar/Recuperar_controller/index';
$route['recuperar']['post']       = 'recuperar/Recuperar_controller/recuperar';
$route['recuperar/senha']['get']  = 'recuperar/Recuperar_controller/alterando_senha';
$route['recuperar/senha']['post'] = 'recuperar/Recuperar_controller/alterar_senha';
