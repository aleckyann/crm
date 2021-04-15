<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Conta_controller extends Sistema_controller {

    #GET: /registrar
    public function index()
    {
        //$this->output->cache(60);
        $title      = "Wult | Conta";
        $usuario = $this->db->get_where('usuarios', ['usuario_id'=>$this->session->usuario_id])->row_array();

        $this->view('conta/Conta_view', compact('title', 'usuario'));
    }

    #POST: /update
    public function update() {
        $usuario_id = $this->session->usuario_id;
        $usuario['usuario_nome']    = $this->input->post('usuario_nome');
        $usuario['usuario_email']   = $this->input->post('usuario_email');

        if($this->input->post('usuario_senha')) {
            $dados['usuario_senha'] = password_hash($this->input->post('usuario_senha'), PASSWORD_DEFAULT);
        }

        $this->db->where('usuario_id', $usuario_id)->update('usuarios', $usuario);

        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Dados alterados com sucesso!');
            redirect('conta');
        } else {
            $this->session->set_flashdata('danger', 'Erro ao alterar dados!');
            redirect('conta');
        }
    }

    #POST: /update-senha
    public function update_senha() {
        $usuario_id = $this->session->usuario_id;

        if($this->input->post('usuario_senha')) {
            $dados['usuario_senha'] = password_hash($this->input->post('usuario_senha'), PASSWORD_DEFAULT);
            $this->db->where('usuario_id', $usuario_id)->update('usuarios', $dados);
        }

        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Senha de acesso alterada com sucesso!');
            redirect('conta');
        } else {
            $this->session->set_flashdata('danger', 'Tente mudar sua senha outra vez!');
            redirect('conta');
        }
    }

}
