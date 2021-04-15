<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Api_controller extends CI_Controller {

    /**
    * @method:  GET
    * @action:  api/v1/easyauth
    * @return:  json
    * @about:   Rota para inserção de leads via hotspot easyauth
    */
    public function index()
    {
        $lead = array(
            'lead_nome' => $this->input->get('nome'),
            'lead_email' => $this->input->get('email'),
            'lead_whatsapp' => $this->input->get('telefone'),
            'localidade_id' => 7
        );

        $this->db->insert('leads', $lead);

        if($this->db->insert_id()) {
            echo_json(['success'=>TRUE]);
        } else {
            echo_json(['success'=>FALSE]);
        }


    }

}
