<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ui {

    var $CI;

    function __construct()
    {
        $this->CI =& get_instance();
    }

    /**
    * Função checa se a página possui flashdatas e as renderiza automaticamente.
    * Argumentos: 'success', 'warning', 'danger', 'info' e 'help'
    **/
    public function alert_flashdata()
    {
        if($this->CI->session->flashdata('success')){
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> '.$this->CI->session->flashdata("success").'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
            ';
        }

        if($this->CI->session->flashdata('warning')){
            echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> '.$this->CI->session->flashdata("warning").'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
            ';
        }

        if($this->CI->session->flashdata('danger')){
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> '.$this->CI->session->flashdata("danger").'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
            ';
        }

        if($this->CI->session->flashdata('info')){
            echo '
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fas fa-info-circle"></i> '.$this->CI->session->flashdata("info").'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
            ';
        }

        if($this->CI->session->flashdata('help')){
            echo '
                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <i class="fas fa-question-circle"></i> '.$this->CI->session->flashdata("help").'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
            ';
        }
    }

    /**
    * Retorna disabled se os argumentos forem iguais (Uso em botões, inputs)
    **/
    public function disabled($disable, $disabled)
    {
        if($disable == $disabled){
            return 'disabled';
        } else {
            return 'not-hidden';
        }
    }

    /**
    * Retorna hidden se os argumentos forem iguais (Uso em elementos html)
    **/
    public function hidden($hidden, $hiddened)
    {
        if($hidden == $hiddened){
            return 'hidden';
        } else {
            return 'not-hidden';
        }
    }

    /**
    * Escreve checked se argumento for 'TRUE' (Uso em checkbox)
    **/
    public function checked($check)
    {
        if($check){
            return 'checked';
        } else {
            return 'not-checked';
        }
    }

    /**
    * Escreve selected se argumentos forem iguais. (Uso em <option>)
    **/
    public function selected($select, $selected)
    {
        if($select == $selected){
            return 'selected';
        } else {
            return 'not-selected';
        }
    }

    /**
    * Escreve active se argumentos forem iguais (Uso em breadcrumbs)
    **/
    function active($active, $actived)
    {
        if($active == $actived){
            return 'active';
        } else {
            return 'not-active';
        }
    }

    /**
    * Escreve colapsed se argumentos forem iguais (Uso em componentes css)
    **/
    function colapsed($colapse, $colapsed)
    {
        if($colapse === $colapsed){
            return 'class="colapsed"';
        } else {
            return 'class="collapse"';
        }
    }

}
