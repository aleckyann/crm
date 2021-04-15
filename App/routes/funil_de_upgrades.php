<?php

//mostra funis por localidade
$route['funil-de-upgrades']['get']                = 'funil_de_upgrades/Funil_de_upgrades_controller/index';

//mostra funil de upgrade de uma localidade_id
$route['funil-de-upgrades/(:num)']['get']         = 'funil_de_upgrades/Funil_de_upgrades_controller/funil_de_upgrades/$1';

//adiciona novo lead ao funil
$route['funil-de-upgrades/create_card']['post']   = 'funil_de_upgrades/Funil_de_upgrades_controller/create_card';

//adiciona nova nota ao lead
$route['funil-de-upgrades/create_nota']['post']   = 'funil_de_upgrades/Funil_de_upgrades_controller/create_nota';

//move o lead dentro do funil
$route['funil-de-upgrades/change']['post']        = 'funil_de_upgrades/Funil_de_upgrades_controller/change';

//
$route['funil-de-upgrades/read']['post']          = 'funil_de_upgrades/Funil_de_upgrades_controller/read';
