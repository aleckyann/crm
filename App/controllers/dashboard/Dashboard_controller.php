<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard_controller extends Sistema_controller {

    #GET: /registrar
    public function index()
    {
        $title      = "Wult | Dashboard";

        $funil_vendas = $this->Dashboard->quantidade_de_leads_em_funil_de_vendas_por_localidade();

        $funil_upgrades = $this->Dashboard->quantidade_de_leads_em_funil_de_upgrades_por_localidade();

        $leads_classificados = $this->Dashboard->quantidade_de_leads_qualificados_por_localidade();

        $leads_por_mes = $this->Dashboard->quantidade_de_leads_por_mes();

        $this->view('dashboard/Dashboard_view', compact('title', 'funil_vendas', 'funil_upgrades', 'leads_classificados', 'leads_por_mes'));
    }

}
