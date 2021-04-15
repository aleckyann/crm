<?php
/**
 * Classe para manipular a tabela pessoas
 */
class Leads extends CI_model
{


    public function get_all()
    {
        return $this->db->join('localidades', 'leads.localidade_id = localidades.localidade_id')->get('leads')->result_array();
    }


    //Busca um lead por um where
    public function get_where($where)
    {
      return $this->db->get_where('leads', $where)->row_array();
    }


    //Busca os 10 ultimos leads atualizados
    public function ultimos_atualizados()
    {
        return $this->db->limit(10)->order_by('updated_at', 'DESC')->get_where('leads', ['deleted_at'=> null])->result_array();
    }


    //Busca leads que não estejam em um funil de vendas
    public function fora_do_funil_de_vendas($localidade_id)
    {
        return $this->db->where('`lead_id` NOT IN (SELECT `lead_id` FROM `funil_vendas`)', NULL, FALSE)->get_where('leads', ['localidade_id'=>$localidade_id])->result_array();
    }

    //Busca leads que não estejam em um funil de vendas
    public function fora_do_funil_de_upgrades($localidade_id)
    {
        return $this->db->where('`lead_id` NOT IN (SELECT `lead_id` FROM `funil_upgrades`)', NULL, FALSE)->get_where('leads', ['localidade_id'=>$localidade_id])->result_array();
    }

}
