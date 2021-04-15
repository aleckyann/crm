<!doctype html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?=base_url()?>public/assets/img/favicon.ico" rel="icon" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
        <link href="<?=base_url()?>public/assets/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>

        <div class="layout layout-nav-side">
            <div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
                <a class="navbar-brand" href="index.html">
                    <img alt="Pipeline" src="<?=base_url()?>public/assets/img/logo.svg" />
                </a>
                <div class="d-flex align-items-center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="d-block d-lg-none ml-2">
                        <div class="dropdown">
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="nav-side-user.html" class="dropdown-item">Profile</a>
                                <a href="utility-account-settings.html" class="dropdown-item">Account Settings</a>
                                <a href="#" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
                    <ul class="navbar-nav d-lg-block">
                        <li class="nav-item">
                            <a class="nav-link <?=active_uri($this->uri->segment(1), 'conta')?>" href="<?=base_url('conta')?>">Conta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=active_uri($this->uri->segment(1), 'dashboard')?>" href="<?=base_url('dashboard')?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=active_uri($this->uri->segment(1), 'localidades')?>" href="<?=base_url('localidades')?>">Localidades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=active_uri($this->uri->segment(1), 'lista-de-leads')?>" href="<?=base_url('lista-de-leads')?>">Lista de Leads</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=active_uri($this->uri->segment(1), 'funil-de-vendas')?>" href="<?=base_url('funil-de-vendas')?>">Funil de vendas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=active_uri($this->uri->segment(1), 'funil-de-upgrades')?>" href="<?=base_url('funil-de-upgrades')?>">Funil de upgrades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-none <?=active_uri($this->uri->segment(1), '')?>" href="<?=base_url()?>">Campanhas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-none <?=active_uri($this->uri->segment(1), '')?>" href="<?=base_url()?>">Envio de SMS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-none <?=active_uri($this->uri->segment(1), '')?>" href="<?=base_url()?>">Envio de E-mail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=active_uri($this->uri->segment(1), 'configuracoes')?>" href="<?=base_url('configuracoes')?>">Configurações</a>
                        </li>
                    </ul>
                    <hr>
                </div>

            </div>
