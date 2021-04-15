<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Registrar_controller extends CI_Controller {

    #GET: /registrar
    public function index()
    {
        //$this->output->cache(60);
        $title      = "WOLKO™ - Selecione seu cliente.";
        $csrf_input = '<input type="hidden" name="'.$this->security->get_csrf_token_name().'" value="'.$this->security->get_csrf_hash().'">';

        $this->load->view('registrar/Registrar_view', compact('csrf_input', 'unidades', 'title'));
    }

    #POST: /registrar
    public function registrar()
    {
        $novo_usuario = array(
          'usuario_email' => $this->input->post('email'),
          'usuario_senha' => password_hash($this->input->post('senha'), PASSWORD_DEFAULT)
        );

        if($this->Usuarios->get_by_email($novo_usuario['usuario_email']))
        {
          $this->session->set_flashdata('danger', '<i class="ti-unlink"></i> Parece que você já está cadastrado. Faça login ou tente novamente.');
          redirect($this->agent->referrer());
        } else {
          $this->Usuarios->registrar($novo_usuario);
          $this->session->set_flashdata('success', '<i class="ti-unlink"></i> Parabéns, agora é só entrar na página de login e se autenticar.');
          redirect($this->agent->referrer());
        }
    }

}
