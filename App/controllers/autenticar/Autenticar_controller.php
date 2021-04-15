<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Autenticar_controller extends CI_Controller {

    #GET: /autenticar
    public function index()
    {
        $title      = "Wult | CRM especialista em provedores de internet";
        $description= "Wult | Autenticar usuário";
        $csrf_input = '<input type="hidden" name="'.$this->security->get_csrf_token_name().'" value="'.$this->security->get_csrf_hash().'">';
        $this->load->view('autenticar/Usuario_view', compact('csrf_input', 'title', 'description'));
    }


    #POST: autenticar
    public function autenticar()
    {
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');

        $usuario = $this->Usuarios->get_by_email($email);

        if(password_verify($senha, $usuario['usuario_senha']))
        {
            $this->session->set_userdata($usuario);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('danger', 'Usuário ou senha incorretos.');
            redirect($this->agent->referrer());
        }
    }

    #GET: engenheiro/auth/trade
    // Efetua a troca da unidade atravéz da mudança da sessão 'unidade_id';
    public function auth_trade($unidade_id)
    {
        $unidade_antiga = $this->Unidades->get_nome_by_id($this->session->unidade_id);

        if(in_array($unidade_id, explode(',', $this->session->unidades_id))) {
            $this->session->set_userdata(array('unidade_id' => $unidade_id));
        } else {
            session_destroy();
            redirect();
        }

        $this->session->set_flashdata('auth_trade', 'Agora você está conectado no cliente: '.$this->Unidades->get_nome_by_id($this->session->unidade_id));
        redirect($this->agent->referrer());
    }

    #GET: logout
    public function logout()
    {
        session_destroy();
        redirect();
    }

}
