<?php

/**
 * Retornar a bg-color dependendo do perfil comportamental
 */

 function bg_comportamental($p)
 {
    $points= 0;
    if($p['lead_reclama_facebook'] == 'on') $points--;
    if($p['lead_reclama_google'] == 'on') $points--;
    if($p['lead_reclama_telefone'] == 'on') $points--;
    if($p['lead_curte_facebook'] == 'on') $points++;
    if($p['lead_recomenda_facebook'] == 'on') $points++;
    if($p['lead_segue_instagram'] == 'on') $points++;
    if($p['lead_boa_pagadora'] == 'on') $points++;
    if($p['lead_familiar'] == 'on') $points++;

    if($points < 0) return 'bg-danger';
    if($points == 0 || $points == 1) return 'bg-warning';
    if($points > 1) return 'bg-success';
 }


 function calcula_pontuacao_lead($p)
 {
     if(empty($p)) return false;
    $points= 0;
    if($p['lead_reclama_facebook'] == 'on') $points--;
    if($p['lead_reclama_google'] == 'on') $points--;
    if($p['lead_reclama_telefone'] == 'on') $points--;
    if($p['lead_curte_facebook'] == 'on') $points++;
    if($p['lead_recomenda_facebook'] == 'on') $points++;
    if($p['lead_segue_instagram'] == 'on') $points++;
    if($p['lead_boa_pagadora'] == 'on') $points++;
    if($p['lead_familiar'] == 'on') $points++;

    return $points;
 }


 /**
  * Escreve últimos engajamentos
  */

  function ultimos_engajamentos($leads, $localidade_id)
  {
      foreach ($leads as $p) {
          if($p['localidade_id'] === $localidade_id){
              echo('
              <li>
                  <a href="'.base_url('lead/').$p['lead_id'].'" data-toggle="tooltip" title="'.$p['lead_nome'].'">
                    <span class="badge badge-primary border border-dark mr-2">'.mb_substr($p['lead_nome'], 0, 2).'</span>
                  </a>
              </li>');
          }
      }

  }


  /**
   * escreve algo se ambas entradas forem iguais
   */
function active_uri($segmento_atual, $segmento_deste)
{
    if($segmento_atual == $segmento_deste) {
        return 'text-info';
    }
}

/**
 * Escreve json
 */
function echo_json($data)
{
    header('Content-Type: application/json');
    echo(json_encode($data));
}
