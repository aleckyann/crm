<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Lead_controller extends Sistema_controller {

    #GET: /lead/(:num)
    public function index($lead_id)
    {
        //$this->output->cache(60);
        $title      = "Wult | Dashboard";

        $lead = $this->db->get_where('leads', ['lead_id'=>$lead_id])->result_array()[0];

        $this->view('lead/Lead_view', compact('title', 'lead'));
    }

    #GET: /lead/update
    public function update()
    {
        $lead = $this->input->post(); //especificar parametros

        if($this->db->where('lead_id', $lead['lead_id'])->update('leads', $lead)) {
            $this->session->set_flashdata('success', 'Lead atualizada com sucesso!');
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('danger', 'Erro ao tentar atualizar essa lead.');
            redirect($this->agent->referrer());
        }
    }

    #POST /lead/sms
    public function sms()
    {
        $lead_id = $this->input->post('lead_id');
        $numero = $this->Leads->get_where(['lead_id'=>$lead_id])['lead_whatsapp'];
        $mensagem = $this->input->post('lead_sms_text');

        $pacote = array('user' => 'darciosouza', 'password' => '130983', 'type' => '0', 'number' => '55'.$numero, 'content' => $mensagem);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.smsmarket.com.br/webservice-rest/send-single?');

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $pacote);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res    = curl_exec ($ch);
        $err    = curl_errno($ch);
        $errmsg = curl_error($ch);
        $header = curl_getinfo($ch);
        curl_close($ch);

        echo($res);
    }


    #POST /lead/email
    public function email()
    {

        $lead_email_assunto = $this->input->post('lead_email_assunto');
        $lead_email_text = $this->input->post('lead_email_text');
        $lead_email = $this->input->post('lead_email');

        $this->email->from('atendimento@microrcim.com.br');//ALTERE CONFORME NECESSÁRIO
        $this->email->to($lead_email);
        $this->email->subject('MICRORCIM TELECOM');
        $this->email->message($this->load->view('emails/Basic_view', array('assunto'=>$lead_email_assunto, 'mensagem'=>$lead_email_text), TRUE));

        if($this->email->send()){
            echo_json('TRUE');
        } else {
            echo_json($this->email->print_debugger());
        }

    }

}
