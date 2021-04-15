<?php
/**
 * Classe para entregar dados ao dashboard
 */
class Dashboard extends CI_model
{

    //Retorna quantidade de leads em cada etapa do funil de vendas de todas as localidades
    public function quantidade_de_leads_em_funil_de_vendas_por_localidade()
    {
        $localidades = $this->db->get('localidades')->result_array();

        $quantidade_funil_vendas = [];
        foreach ($localidades as $l) {
            $quantidade_funil_vendas[$l['localidade_id']] = [
                'localidade_nome'=> $l['localidade_nome'],
                'etapa1'=> sizeof( $this->db->get_where('funil_vendas', ['funil_etapa'=>1, 'localidade_id'=>$l['localidade_id']])->result_array() ),
                'etapa2'=> sizeof( $this->db->get_where('funil_vendas', ['funil_etapa'=>2, 'localidade_id'=>$l['localidade_id']])->result_array() ),
                'etapa3'=> sizeof( $this->db->get_where('funil_vendas', ['funil_etapa'=>3, 'localidade_id'=>$l['localidade_id']])->result_array() ),
                'etapa4'=> sizeof( $this->db->get_where('funil_vendas', ['funil_etapa'=>4, 'localidade_id'=>$l['localidade_id']])->result_array() ),
            ];
        }
        return $quantidade_funil_vendas;
    }

    //Retorna quantidade de leads em cada etapa do funil de upgrades de todas as localidades
    public function quantidade_de_leads_em_funil_de_upgrades_por_localidade()
    {
        $localidades = $this->db->get('localidades')->result_array();

        $quantidade_funil_upgrades = [];
        foreach ($localidades as $l) {
            $quantidade_funil_upgrades[$l['localidade_id']] = [
                'localidade_nome'=> $l['localidade_nome'],
                'etapa1'=> sizeof( $this->db->get_where('funil_upgrades', ['funil_etapa'=>1, 'localidade_id'=>$l['localidade_id']])->result_array() ),
                'etapa2'=> sizeof( $this->db->get_where('funil_upgrades', ['funil_etapa'=>2, 'localidade_id'=>$l['localidade_id']])->result_array() ),
                'etapa3'=> sizeof( $this->db->get_where('funil_upgrades', ['funil_etapa'=>3, 'localidade_id'=>$l['localidade_id']])->result_array() ),
                'etapa4'=> sizeof( $this->db->get_where('funil_upgrades', ['funil_etapa'=>4, 'localidade_id'=>$l['localidade_id']])->result_array() ),
            ];
        }
        return $quantidade_funil_upgrades;
    }


    //Retorna quantidade de leads por mês
    public function quantidade_de_leads_por_mes()
    {
        $localidades = $this->db->get('localidades')->result_array();

        $result = [];
        foreach ($localidades as $l) {
            $result[$l['localidade_id']] = [
                $l['localidade_nome'],
                $this->db->like('created_at', date('Y').'-01')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows(),
                $this->db->like('created_at', date('Y').'-02')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows(),
                $this->db->like('created_at', date('Y').'-03')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows(),
                $this->db->like('created_at', date('Y').'-04')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows(),
                $this->db->like('created_at', date('Y').'-05')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows(),
                $this->db->like('created_at', date('Y').'-06')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows(),
                $this->db->like('created_at', date('Y').'-07')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows(),
                $this->db->like('created_at', date('Y').'-08')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows(),
                $this->db->like('created_at', date('Y').'-09')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows(),
                $this->db->like('created_at', date('Y').'-10')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows(),
                $this->db->like('created_at', date('Y').'-11')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows(),
                $this->db->like('created_at', date('Y').'-12')->get_where('leads', ['localidade_id'=>$l['localidade_id']])->num_rows()
            ];
        }

        return $result;
    }

    public function quantidade_de_leads_qualificados_por_localidade()
    {
        $localidades = $this->db->get('localidades')->result_array();
        $leads_classificados = [];

        foreach ($localidades as $l) {
            $leads_classificados[$l['localidade_id']]['localidade_nome'] = $l['localidade_nome'];
            $leads_classificados[$l['localidade_id']]['perigosos'] = 0;
            $leads_classificados[$l['localidade_id']]['arriscados'] = 0;
            $leads_classificados[$l['localidade_id']]['favoraveis'] = 0;

            $leads = $this->db->get_where('leads', ['localidade_id'=>$l['localidade_id']])->result_array();

            foreach ($leads as $le) {
                $leadPoints = calcula_pontuacao_lead( $this->db->get_where('leads', ['lead_id'=>$le['lead_id']])->result_array()[0] );

                if( $leadPoints < 0 ){
                    $leads_classificados[$l['localidade_id']]['perigosos'] = $leads_classificados[$l['localidade_id']]['perigosos'] + 1;
                } elseif ( $leadPoints == 0 || $leadPoints == 1  ) {
                    $leads_classificados[$l['localidade_id']]['arriscados'] = $leads_classificados[$l['localidade_id']]['arriscados'] + 1;
                } elseif($leadPoints > 1) {
                    $leads_classificados[$l['localidade_id']]['favoraveis'] = $leads_classificados[$l['localidade_id']]['favoraveis'] + 1;
                }
            }
        }
        return $leads_classificados;
    }

}
