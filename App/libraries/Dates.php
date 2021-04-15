<?php

class Dates {

    /**
     * Converte DATETIME do banco para a UI
     */
    public function toUi($dateDB)
    {
        $date = new DateTime($dateDB);
        if(strlen($dateDB) > 11) {
            return $date->format('d/m/Y H:i:s');
        } else {
            return $date->format('d/m/Y');
        }
    }

    /**
     * Converte data da UI para DATETIME do banco
     */
    public function toDB($dateUI)
    {
        $date = new DateTime($dateUI);
        if(strlen($dateUI) > 11) {
            return $date->format('Y-m-d H:i:s');
        } else {
            return $date->format('Y-m-d');
        }
    }

    /**
    * Retorna array com diferença entre duas datas
    **/
    public function diferenca($date_1, $date_2)
    {
        $data_inicio = new DateTime($date_1);
        $data_fim = new DateTime($date_2);

        $diferenca = $data_inicio->diff($data_fim);

        $resultado = array(
            'anos' => $dateInterval->y,
            'meses' => $dateInterval->m,
            'dias' => $dateInterval->d,
            'horas' => $diferenca->h + ($diferenca->days * 24),
            'minutos' => $diferenca->i + ($diferenca->i * 60),
            'segundos' => $diferenca->s + ($diferenca->s * 60),
        );
        return $resultado;
    }

    /**
    * Retorna um array com todos os dias do ano por mês
    **/
    function dias_do_ano($ano){
        $datas = new DatePeriod(new DateTime($ano.'-01-01'), new DateInterval('P1D'), new DateTime($ano.'-12-31'));
        $datas_array = array();

        foreach($datas as $data) {
            array_push($datas_array, $data->format('Y-m-d'));
        }
        return $datas_array;
    }

    /**
    * Retorna um array com todos os meses do ano
    * ['janeiro' => 2018-01, 'fevereiro' => 2018-02 ...]
    **/
    function meses_do_ano($ano){
        return array(
            'Janeiro' => $ano.'-01',
            'Fevereiro' => $ano.'-02',
            'Março' => $ano.'-03',
            'Abril' => $ano.'-04',
            'Maio' => $ano.'-05',
            'Junho' => $ano.'-06',
            'Julho' => $ano.'-07',
            'Agosto' => $ano.'-08',
            'Setembro' => $ano.'-09',
            'Outubro' => $ano.'-10',
            'Novembro' => $ano.'-11',
            'Dezembro' => $ano.'-12'
        );
    }

}
