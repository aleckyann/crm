<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Não utilize bancos com caracteres especiais(.,;!@#$%*()),
* isto cria bug em operações de backups, dbutils, etc
**/


$query_builder = TRUE;

if($_SERVER['SERVER_NAME'] == 'localhost')
{
	$active_group = 'desenvolvimento';
}
elseif ($_SERVER['SERVER_NAME'] == 'demo.')
{
	$active_group = 'demo';
}
elseif ($_SERVER['SERVER_NAME'] == 'crm.microrcim.com.br')
{
	$active_group = 'producao';
}

# AMBIENTE DE DESENVOLVIMENTO
$db['desenvolvimento'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'phpmyadmin',
	'password' => '106.312.266-05',
	'database' => 'crm',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => TRUE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => TRUE,
	'stricton' => TRUE,
	'failover' => array(),
	'save_queries' => TRUE
);

# AMBIENTE DE DEMONSTRAÇÃO
$db['teste'] = array(
	'dsn'	=> '',
	'hostname' => '127.0.0.1',//
	'username' => 'demo',//
	'password' => '106.312.266-05Wolko',//
	'database' => 'demo',//
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => TRUE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => TRUE,
	'stricton' => TRUE,
	'failover' => array(),
	'save_queries' => TRUE
);

# AMBIENTE DE PRODUÇÃO
$db['producao'] = array(
	'dsn'	=> '',
	'hostname' => '127.0.0.1',//
	'username' => 'crmmicrorcim',//
	'password' => '106.312.266-05@Microrcim',//
	'database' => 'crmmicrorcim',//
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => TRUE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => TRUE,
	'stricton' => TRUE,
	'failover' => array(),
	'save_queries' => TRUE
);
