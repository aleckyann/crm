<?php

/**
* Os controllers do sistema devem extender Sistema_Controller para adquirir ACL.
* Os controllers externos devem extender ao CI_Controller para ficarem acessíveis.
**/

class Sistema_Controller extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        /**
        * Protege as rotas
        **/
        if(!$this->session->usuario_email){
            $this->session->set_flashdata('danger', 'Ops... Faça login e tente novamente.');
            redirect('autenticar');
        }

    }

    /**
    * Função monta a view utilizando
    **/
    public function view($view, $data)
    {
        $data['csrf_input'] = '<input type="hidden" name="'.$this->security->get_csrf_token_name().'" value="'.$this->security->get_csrf_hash().'">';

        $this->load->view('includes/Header_view', $data);
        $this->load->view($view, $data);
        $this->load->view('includes/Footer_view', $data);
    }

}

?>
