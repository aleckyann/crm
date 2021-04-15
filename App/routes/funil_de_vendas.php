<?php

//mostra funis por localidade
$route['funil-de-vendas']['get']                = 'funil_de_vendas/Funil_de_vendas_controller/index';

//mostra funil de venda de uma localidade_id
$route['funil-de-vendas/(:num)']['get']         = 'funil_de_vendas/Funil_de_vendas_controller/funil_de_vendas/$1';

//adiciona novo lead ao funil
$route['funil-de-vendas/create_card']['post']   = 'funil_de_vendas/Funil_de_vendas_controller/create_card';

//adiciona nova nota ao lead
$route['funil-de-vendas/create_nota']['post']   = 'funil_de_vendas/Funil_de_vendas_controller/create_nota';

//move o lead dentro do funil
$route['funil-de-vendas/change']['post']        = 'funil_de_vendas/Funil_de_vendas_controller/change';

//
$route['funil-de-vendas/read']['post']          = 'funil_de_vendas/Funil_de_vendas_controller/read';
