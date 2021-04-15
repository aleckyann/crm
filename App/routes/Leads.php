<?php

$route['leads/(:num)']['get']  = 'leads/Leads_controller/index/$1';

$route['leads/create']['post'] = 'leads/Leads_controller/create';
