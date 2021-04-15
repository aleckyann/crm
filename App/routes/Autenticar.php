<?php

// Autenticação de usuário
$route['autenticar']['get']                    = 'autenticar/Autenticar_controller/index';
$route['autenticar']['post']                   = 'autenticar/Autenticar_controller/autenticar';
$route['logout']['get']                        = 'autenticar/Autenticar_controller/logout';
