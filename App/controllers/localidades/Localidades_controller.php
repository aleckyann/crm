<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Localidades_controller extends Sistema_controller {



    /**
    * @method:  GET
    * @action:  localidades
    * @return:  View
    * @about:   Controller montar view com localidades
    */
    public function index()
    {
        $title      = "Wult | Dashboard";

        $leads    = $this->db->limit(10)->order_by('updated_at', 'DESC')->get('leads')->result_array(); //usado nos engajamentos


        $localidades= $this->db->get('localidades')->result_array();
        $count = 0;

        foreach ($localidades as $l) {
            if($l['localidade_id'] === $localidades[$count]['localidade_id']) {
                $localidades[$count]['leads'] = $this->db->where(['localidade_id'=>$l['localidade_id']])->count_all_results('leads');
            }
            $count++;
        }

        $this->view('localidades/Localidades_view', compact('title', 'localidades', 'leads'));
    }

    /**
    * @method:  POST
    * @action:  localidades/create
    * @return:  View
    * @about:   Controller criar nova localidade
    */

    public function create()
    {
        $localidade = $this->input->post();

        $this->db->insert('localidades', $localidade);

        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Localidade cadastrar com sucesso!');
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', 'Houve um erro ao tentarmos cadastrar essa localidade...');
            redirect($this->agent->referrer());
        }
    }



}
