<?php
/**
 * Classe para manipular a tabela funil_upgrades
 */
class Funil_de_upgrades extends CI_model
{

    //Busca todos os leads por etapa do funil
    public function leads_por_etapa($localidade_id)
    {
        return [
            'etapa1' => $this->db->join('leads', 'funil_upgrades.lead_id = leads.lead_id')->order_by("funil_upgrades.updated_at", "desc")->get_where('funil_upgrades', ['funil_upgrades.localidade_id'=>$localidade_id, 'funil_etapa'=>1])->result_array(),
            'etapa2' => $this->db->join('leads', 'funil_upgrades.lead_id = leads.lead_id')->order_by("funil_upgrades.updated_at", "desc")->get_where('funil_upgrades', ['funil_upgrades.localidade_id'=>$localidade_id, 'funil_etapa'=>2])->result_array(),
            'etapa3' => $this->db->join('leads', 'funil_upgrades.lead_id = leads.lead_id')->order_by("funil_upgrades.updated_at", "desc")->get_where('funil_upgrades', ['funil_upgrades.localidade_id'=>$localidade_id, 'funil_etapa'=>3])->result_array(),
            'etapa4' => $this->db->join('leads', 'funil_upgrades.lead_id = leads.lead_id')->order_by("funil_upgrades.updated_at", "desc")->get_where('funil_upgrades', ['funil_upgrades.localidade_id'=>$localidade_id, 'funil_etapa'=>4])->result_array()
        ];
    }


    //Insere lead em um funil de upgrades
    public function inserir_lead($localidade_id, $lead_id)
    {
        $this->db->insert('funil_upgrades', ['localidade_id'=>$localidade_id, 'lead_id'=>$lead_id]);
    }


    public function funis_por_lead($lead_id)
    {
        return $this->db->join('funil_upgrades', 'leads.lead_id = funil_upgrades.lead_id')->get_where('leads', ['leads.lead_id'=>$lead_id])->result_array()[0];
    }


    public function inserir_nota($dados)
    {
        $this->db->insert('funil_upgrades_notas', $dados);
        return $this->db->insert_id();
    }

    public function mudar_etapa($funil_id, $funil_etapa)
    {
        $this->db->where('funil_id', $funil_id)->update('funil_upgrades', ['funil_etapa'=>$funil_etapa]);
        return $this->db->affected_rows();
    }

    public function pelo_id($funil_id)
    {
        return $this->db->get_where('funil_upgrades_notas', ['funil_id'=>$funil_id])->result_array();
    }
}
