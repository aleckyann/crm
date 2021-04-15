<?php

/**
*Pega array da requisição e transforma em string pra inserir no DB;
**/
function checklist_to_DB($inputs){
    $text = '';
    for ($i=0; $i < sizeof($inputs); $i++) {
        $text = $text.'{{STOP}}'.$inputs[$i];
    }
    return mb_strtoupper($text);
}

/**
*Pega checklist salvo no DB e retorna array organizado pra uso em foreach;
**/
function checklist_to_UI($inputs){
    $resultado = explode('{{STOP}}', $inputs);
    unset($resultado[0]);
    return $resultado;
}

/**
*Pega array da requisição de resposta do usuário e transforma em string pra inserir no DB;
**/
function checklist_response_to_DB($inputs){
    $resultado = '';
    for($i=1; $i <= sizeof($inputs); $i++){
        $resultado = $resultado.'{{STOP}}'.$inputs[$i];
    }
    return mb_strtoupper($resultado);
}

/**
*Pega resposta do checklist salvo no DB e retorna array organizado pra uso em foreach;
**/
function checklist_response_to_UI($inputs){
    $r = explode('{{STOP}}', $inputs); unset($r[0]);
    $resultado = array();
    for($i = 1; $i <= sizeof($r); $i++){
        array_push($resultado, array(0 => $r[$i], 1 => $r[$i+1] ));
        $i++;
    }
    return $resultado;
}

/**
* *Usar em <option> para dar SELECTED
**/
function select($select, $selected)
{
    if($select == $selected){
        return 'selected';
    }
}

/**
* *Usar em <option> para dar SELECTED
**/
function select_unidades_id($select, $selected)
{
    $select = explode(',', $select);

    if(in_array($selected, $select)) {
        return 'selected';
    }


}

/**
*Usar em input type checkbox para dar CHECKED
**/
function check($check)
{
    if($check == 'on'){
        return 'checked';
    }
}

/**
*Converte uma array php em uma array js
**/
function convert_array_to_js($data)
{
    echo '[' . implode(', ', $data) . ']';
}

#Colore uma <tr> de vermelho se valores da array forem null, e amarelo se metade deles forem null
function tr_inventario($values){
    $total = sizeof($values);
    $total_warning = $total / 2;
    $total_null = 0;
    foreach ($values as $v) {
        if(strlen($v) == 0) $total_null += 1;
    }
    if($total_null >= $total_warning) return 'class="bg-danger" style="color:white" data-toggle="tooltip" title="PERIGO! EQUIPAMENTO COM FICHA-VIDA INCOMPLETA!"';
    if($total_null < $total_warning AND $total_null > 0) return 'class="bg-warning" data-toggle="tooltip" title="ATENÇÃO! EQUIPAMENTO COM FICHA-VIDA INCOMPLETA."';
}

function disable($disable, $disabled)
{
    if($disable == $disabled){
        return 'disabled';
    }
}

function hidden($hidden, $hiddened)
{
    if($hidden == $hiddened){
        return 'hidden';
    }
}

function alert($content, $type){
    if($content) {
        echo "<div class='card-1 panel panel-".$type."' style='opacity:0.8'>";
        echo "<div class='panel-heading'>";
        echo "<div class='pull-right'>";
        echo "<a href=''#' data-perform='panel-dismiss'><i class='ti-close'></i></a>";
        echo "</div>";
        echo $content;
        echo "</div>";
        echo "</div>";
    }
}

function status($status){
    if($status == 'ENCERRADA'){
        echo('<span class="label label-success">'.$status.' <i class="ti-check"></i></span>');
    } elseif($status == 'PROCESSADA'){
        echo('<span class="label label-warning">'.$status.' <i class="ti-bolt"></i></span>');
    } elseif($status == 'PENDENTE'){
        echo('<span class="label label-danger">'.$status.' <i class="ti-time"></i></span>');
    }
}


//00/00/0000 -> 0000-00-00
function data_db($data)
{
    $data = explode("/", $data);
    return $data[2]. '-' .$data[1]. '-' .$data[0];
}

//0000-00-00 00:00:00 -> 00/00/0000
function data_normal($data)
{
    if($data == ''){
        return '';
    } else {
        $data = explode(' ', $data);
        $data = explode("-", $data[0]);
        $data = $data[2]. '/' .$data[1]. '/' .$data[0];
        return $data;
    }
}

//0000-00-00 00:00:00 -> 00/00/0000
function timeline($data)
{
    if($data == ''){
        return '';
    } else {
        $data = explode(' ', $data);
        $horas = $data[1];
        $data = explode("-", $data[0]);
        $data = $data[2]. '/' .$data[1]. '/' .$data[0] .'T'. $horas;
        return $data;
    }
}

//0000-00-00 00:00:00 -> 00/00/0000 00:00:00
function datetime_normal($dateDB)
{
    if(empty($dateDB)) return '';
    $date = new DateTime($dateDB);
    if(strlen($dateDB) > 11) {
        return $date->format('d/m/Y H:i:s');
    } else {
        return $date->format('d/m/Y');
    }
}

//0000-00-00 00:00:00 -> 00/00/0000 00:00:00
function datetime_db($dateUI)
{
    if(strlen($dateUI) > 11) {
        $dateUI = explode(' ', $dateUI);
        $date = $dateUI[0];
        $time = $dateUI[1];

        $data = explode('/', $date);
        $dia = explode(':', $time);

        return $data[2].'-'.$data[1].'-'.$data[0].' '.$dia[0].':'.$dia[1].':'.$dia[2];
    } else {
        $date = explode('/', $dateUI);
        return $date[2].'-'.$data[1].'-'.$data[0];
    }
}

function use_uri_segment($uri)
{
    return ucfirst(str_replace('-', ' ', $uri));
}

function msg($data = '')
{
    echo '<pre style="margin:5px; opacity:0.9; border-radius:0; box-shadow: 1px 3px 5px 1px #888888; background-color:#D4FFC4; color:#666666; padding:10px; border-style:hidden hidden hidden inset; border-width:5px; border-color:#00CF95;">';
    print_r($data);
    echo '</pre>';
}

function pre($data = '')
{
    echo '<pre style="margin:5px; opacity:0.9; border-radius:0; box-shadow: 1px 3px 5px 1px #888888; background-color:#D4FFC4; color:#666666; padding:10px; border-style:hidden hidden hidden inset; border-width:5px; border-color:#00CF95;">';
    print_r($data);
    echo '</pre>';
}


function to_url($segment)
{
    return str_replace(' ', '-', urldecode($segment));
}

function breadcrumb($segment)
{
    return ucfirst(str_replace('-', ' ', urldecode($segment)));
}

function usuario_url($segment)
{
    return ucfirst(str_replace('-', ' ', urldecode($segment)));
}

function criptografia($value){
    return hash('Whirlpool', $value);
}


/**
* Retorna array com diferença entre duas datas
**/
function timeDiferenca($date_1, $date_2)
{
    $data_inicio = new DateTime($date_1);
    $data_fim = new DateTime($date_2);

    $diferenca = $data_inicio->diff($data_fim);

    $resultado = array(
        'anos' => $diferenca->y,
        'meses' => $diferenca->m + ($diferenca->y * 364),
        'dias' => $diferenca->d + ($diferenca->m * 30),
        'horas' => $diferenca->h + ($diferenca->days * 24),
        'minutos' => $diferenca->i + ($diferenca->i * 60),
        'segundos' => $diferenca->s + ($diferenca->s * 60),
    );
    return $resultado;
}

?>
