<?php
/**
 * Classe para manipular a tabela localidades
 */
class Localidades extends CI_model
{


    public function todas()
    {
        return $this->db->get('localidades')->result_array();
    }

}
