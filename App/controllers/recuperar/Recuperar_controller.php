<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Recuperar_controller extends CI_Controller {

    #GET: /recuperar
    public function index()
    {
        //$this->output->cache(60);
        $title      = "WOLKO™ - Selecione seu cliente.";
        $csrf_input = '<input type="hidden" name="'.$this->security->get_csrf_token_name().'" value="'.$this->security->get_csrf_hash().'">';

        $this->load->view('recuperar/Recuperar_view', compact('csrf_input', 'title'));
    }

    #POST: /recuperar
    public function recuperar()
    {
        $email = $this->input->post('email');
        $usuario = $this->Usuarios->get_by_email($email);

        if($usuario)
        {
          $uri_recovery =  base_url() .'recuperar/senha/?id='.$usuario['usuario_id'] .'&hash='. $usuario['usuario_senha'];
          $link_recovery =  '<a href="'.$uri_recovery.'" target="_new">Clique aqui para redefinir sua senha de acesso</a>';

          $this->email->from('atendimento@microrcim.com.br', base_url());
          $this->email->subject("Wult - Recuperação de senha");
          $this->email->to($usuario['usuario_email']);
          $this->email->message($link_recovery, TRUE);
          $this->email->send();

          $this->session->set_flashdata('info', 'Enviamos um email para <b>'.$email.'</b>, contendo um link de redefinição de senha.');
          redirect('recuperar');
        } else {
          $this->session->set_flashdata('danger', 'O usuário<b> '.$email.'</b> não existe. Tente novamente...');
          redirect('recuperar');
        }

    }

    #GET: /recuperar/senha
    public function alterando_senha()
    {
        $id = $this->input->get('id');
        $senha = $this->input->get('hash');

        if($this->Usuarios->get_where(['usuario_id'=>$id, 'usuario_senha'=>$senha]))
        {
          $title      = "Wult | Alterando senha de acesso";
          $csrf_input = '<input type="hidden" name="'.$this->security->get_csrf_token_name().'" value="'.$this->security->get_csrf_hash().'">';
          $this->load->view('recuperar/Alterando_senha_view', compact('csrf_input', 'title'));
        } else {
            $this->session->set_flashdata('danger', 'Parece que este usuário não está cadastrado...');
            redirect('autenticar');
        }
    }

    #POST: /recuperar/senha
    public function alterar_senha()
    {
      $id     = $this->input->post('id');
      $hash   = $this->input->post('hash');
      $senha  = $this->input->post('senha');

      if($this->Usuarios->get_where(['usuario_id'=>$id, 'usuario_senha'=>$hash]))
      {
          $this->Usuarios->update_senha($senha, $id);
          $this->session->set_flashdata('success', '<i class="ti-check"></i> Senha alterada, agora é só realizar login novamente!');
          redirect('autenticar');
      } else {
          $this->session->set_flashdata('danger', 'A recuperação de senha falhou! Tente novamente.');
          redirect('autenticar');
      }
    }

}
