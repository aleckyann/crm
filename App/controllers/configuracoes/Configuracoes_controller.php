<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Configuracoes_controller extends Sistema_controller {

    #GET: /registrar
    public function index()
    {
        $title      = "Wult | Configuracões";
        $usuario = $this->db->get_where('usuarios', ['usuario_id'=>$this->session->usuario_id])->row_array();

        $this->view('configuracoes/Configuracoes_view', compact('title', 'usuario'));
    }

}
