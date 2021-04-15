<?php

function get_array_dias_do_ano($ano){
	$datas = new DatePeriod(new DateTime($ano.'-01-01'), new DateInterval('P1D'), new DateTime($ano.'-12-31'));
	$datas_array = array();

	foreach($datas as $data) {
		array_push($datas_array, $data->format('Y-m-d'));
	}
	return $datas_array;
}

function get_array_meses_do_ano($ano){
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

function get_days_difference($date){
    $data_inicio = new DateTime($date);
    $data_fim = new DateTime(date('Y-m-d H:i:s'));

    // Resgata diferença entre as datas
    $dateInterval = $data_inicio->diff($data_fim);
    return $dateInterval->days;
}

function get_horas_de_diferenca($date1, $date2){
    //if(empty($date2)) $date2 = $date1; #PODE EVITAR BUGS

    $data_inicio = new DateTime($date1);
    $data_fim = new DateTime($date2);

    // Resgata diferença entre as datas
    $dateInterval = $data_inicio->diff($data_fim);
    return $dateInterval->h +($dateInterval->days * 24);

}


function time_difference($datetime2)
{
    $datatime1 = new DateTime(date('Y-m-d H:i:s'));
    $datatime2 = new DateTime($datetime2);

    $data1  = $datatime1->format('Y-m-d H:i:s');
    $data2  = $datatime2->format('Y-m-d H:i:s');

    $resultado = $datatime1->diff($datatime2);

    if($resultado->y > 0){
        if($resultado->y > 1){
            return $resultado->y .' anos';
        } else {
            return $resultado->y .' ano';
        }
        die();
    }
    if($resultado->m > 0){
        if($resultado->m > 1){
            return $resultado->m .' meses e '. $resultado->d. ' dias';
        } else {
            return $resultado->m .' mês e '. $resultado->d. ' dias';
        }
        die();
    }
    if($resultado->d > 0){
        if($resultado->d > 1){
            return $resultado->d .' dias';
        } else {
            return $resultado->d .' dia';
        }
        die();
    }
    if($resultado->h > 0){
        if($resultado->h > 1){
            return $resultado->h .' horas';
        } else {
            return $resultado->h .' hora';
        }
        die();
    }
    if($resultado->i > 0){
        if($resultado->i > 1){
            return $resultado->i .' minutos';
        } else {
            return $resultado->i .' minuto';
        }
        die();
    }
    if($resultado->s > 0){
        if($resultado->s > 1){
            return $resultado->s .' segundos';
        } else {
            return $resultado->s .' segundo';
        }
        die();
    }

    return '20 segundos';
}

//completo!
function time_interval($datetime1, $datetime2)
{
    $datatime1 = new DateTime($datetime1);
    $datatime2 = new DateTime($datetime2);

    $data1  = $datatime1->format('Y-m-d H:i:s');
    $data2  = $datatime2->format('Y-m-d H:i:s');

    $resultado = $datatime1->diff($datatime2);

    if($resultado->y > 0){
        if($resultado->y > 1){
            return $resultado->y .' anos e '. $resultado->m . ' meses';
        } else {
            return $resultado->y .' ano e '. $resultado->m . ' meses';
        }
        die();
    }
    if($resultado->m > 0){
        if($resultado->m > 1){
            return $resultado->m .' meses e ' . $resultado->d . ' dias';
        } else {
            return $resultado->m .' mes e ' . $resultado->d . ' dias';
        }
        die();
    }
    if($resultado->d > 0){
        if($resultado->d > 1){
            return $resultado->d .' dias e ' . $resultado->h .' horas';
        } else {
            return $resultado->d .' dia e ' . $resultado->h .' horas';
        }
        die();
    }
    if($resultado->h > 0){
        if($resultado->h > 1){
            return $resultado->h .' horas';
        } else {
            return $resultado->h .' hora';
        }
        die();
    }
    if($resultado->i > 0){
        if($resultado->i > 1){
            return $resultado->i .' minutos';
        } else {
            return $resultado->i .' minuto';
        }
        die();
    }
    if($resultado->s > 0){
        if($resultado->s > 1){
            return $resultado->s .' segundos';
        } else {
            return $resultado->s .' segundo';
        }
        die();
    }

    return '1 minuto';
}


function small_time_interval($datetime1, $datetime2)
{
    $datatime1 = new DateTime($datetime1);
    $datatime2 = new DateTime($datetime2);

    $data1  = $datatime1->format('Y-m-d H:i:s');
    $data2  = $datatime2->format('Y-m-d H:i:s');

    $resultado = $datatime1->diff($datatime2);

    if($resultado->d > 0){
        if($resultado->d > 1){
            return $resultado->d .' dias e ' . $resultado->h .' horas';
        } else {
            return $resultado->d .' dia e ' . $resultado->h .' horas';
        }
        die();
    }

    if($resultado->h > 0){
        if($resultado->h > 1){
            return $resultado->h .' horas e' . $resultado->i. ' minutos';
        } else {
            return $resultado->h .' hora e' . $resultado->i. ' minutos';
        }
        die();
    }
    if($resultado->i > 0){
        if($resultado->i > 1){
            return $resultado->i .' minutos';
        } else {
            return $resultado->i .' minuto';
        }
        die();
    }
    if($resultado->s > 0){
        if($resultado->s > 1){
            return $resultado->s .' segundos';
        } else {
            return $resultado->s .' segundo';
        }
        die();
    }
}


function welcome()
{
    if(date('H') < 11 && date('H') >= 4){
        return '<b class="text-info">Bom dia!</b>';
    } elseif (date('H') >= 11 && date('H') < 19) {
        return '<b class="text-danger">Boa tarde!</b>';
    } else {
        return '<b class="text-success">Boa noite!</b>';
    }
}

?>
