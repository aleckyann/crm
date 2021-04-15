<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Funil_de_vendas_controller extends Sistema_controller {

    /**
    * @method:  GET
    * @action:  funil-de-vendas
    * @return:  View
    * @about:   Controller responsável por montar agrupamentos de funis por localidade
    */
    public function index()
    {
        $title      = "Wult | Dashboard";

        $leads      = $this->Leads->ultimos_atualizados();
        $localidades= $this->Localidades->todas();

        $count = 0;
        foreach ($localidades as $l) {
            if($l['localidade_id'] === $localidades[$count]['localidade_id']) {
                $localidades[$count]['leads'] = $this->db->where(['localidade_id'=>$l['localidade_id']])->count_all_results('leads');
            }
            $count++;
        }

        $this->view('funil_de_vendas/Funil_de_vendas_view', compact('title', 'localidades', 'leads'));
    }


    /**
    * @method:  GET
    * @action:  funil-de-vendas/(:num)
    * @return:  View
    * @about:   Controller responsável por montar o funil de vendas de uma localidade
    */
    public function funil_de_vendas($localidade_id)
    {
        $title      = "Wult | Dashboard";

        $leads = $this->Leads->fora_do_funil_de_vendas($localidade_id);
        $funil = $this->Funil_de_vendas->leads_por_etapa($localidade_id);

        $this->view('funil_de_vendas/Funil_view', compact('title', 'funil', 'leads'));
    }


     /**
     * @method:  POST
     * @action:  funil/create_card
     * @return:  Json
     * @about:   Controller responsável criar um novo card no funil de vendas
     */
     public function create_card()
     {
        $lista_de_leads_id = $this->input->post('leads');
        $localidade_id = $this->input->post('localidade_id');

        if(empty($lista_de_leads_id)) die(json_encode(0));

        $leads = [];

        foreach ($lista_de_leads_id as $lead_id) {
            $this->Funil_de_vendas->inserir_lead($localidade_id, $lead_id);
            array_push($leads, $this->Funil_de_vendas->funis_por_lead($lead_id));
        }

        echo_json($leads);
     }


     /**
     * @method:  POST
     * @action:  funil/create_nota
     * @return:  Json
     * @about:   Controller responsável criar uma nota em um card no funil de vendas
     */
     public function create_nota()
     {
        $dados = $this->input->post();
        echo_json($this->Funil_de_vendas->inserir_nota($dados));

    }


    /**
    * @method:  POST
    * @action:  funil/change
    * @return:  json
    * @about:   Controller responsável em mudar um card de posição no funil de vendas
    */
    public function change()
    {
        $funil_id    = $this->input->post('funil_id');
        $funil_etapa = $this->input->post('funil_etapa');
        echo_json($this->Funil_de_vendas->mudar_etapa($funil_id, $funil_etapa));
    }


    /**
    * @method:  POST
    * @action:  funil/read
    * @return:  Json
    * @about:   Controller responsável em retornar cards de um funil de vendas
    */
    public function read()
    {
        $funil_id = $this->input->post('funil_id');
        echo_json($this->Funil_de_vendas->pelo_id($funil_id));
    }

}
