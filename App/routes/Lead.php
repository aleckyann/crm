<?php

$route['lead/(:num)']['get']        = 'lead/Lead_controller/index/$1';

$route['lead/update']['post']       = 'lead/Lead_controller/update';

$route['lead/sms']['post']          = 'lead/Lead_controller/sms';

$route['lead/email']['post']          = 'lead/Lead_controller/email';
