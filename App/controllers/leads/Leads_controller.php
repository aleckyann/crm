<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Leads_controller extends Sistema_controller {

    #GET: /leads
    public function index($localidade_id)
    {
        //$this->output->cache(60);
        $title      = "Wult | Dashboard";

        $localidade = $this->db->get_where('localidades', ['localidade_id'=>$localidade_id])->row_array();
        $leads =  $this->db->get_where('leads', ['localidade_id' => $localidade_id])->result_array();

        $this->view('leads/Leads_view', compact('title', 'leads', 'localidade'));
    }

    #POST: /leads/create/(:num)
    public function create()
    {
        $lead = $this->input->post(); //especificar parametros

        if($this->db->insert('leads', $lead)) {
            $this->session->set_flashdata('success', 'Lead cadastrada com sucesso!');
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('danger', 'Erro ao tentar cadastrar essa lead.');
            redirect($this->agent->referrer());
        }
    }

}
