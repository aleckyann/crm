<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Compress output
$hook['display_override'][] = array(
	'class' => '',
	'function' => 'compress',
	'filename' => 'compress.php',
	'filepath' => 'hooks'
);


// ACL
$hook['post_controller_constructor'] = array(
			  'class' => 'ACL',
			  'function' => 'auth',
			  'filename' => 'ACL.php',
			  'filepath' => 'hooks'
);
