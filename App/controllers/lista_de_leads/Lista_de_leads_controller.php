<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Lista_de_leads_controller extends Sistema_controller {

    /**
    * @method:  GET
    * @action:  lista-de-leads
    * @return:  View
    * @about:   Controller responsável por mostrar todos os leads
    */
    public function index()
    {
        $title      = "Wult | Lista de leads";
        $leads      = $this->Leads->get_all();

        $this->view('lista_de_leads/Lista_de_leads_view', compact('title', 'leads'));
    }

}
