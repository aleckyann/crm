<?php

/**
* Classe para salvar backup do banco de dados.
* Salva backups em /DATABASE
* Envia backup para bot@wolko.com.br
**/
class Backup_controller extends Sistema_Controller
{
    #GET: /backup
    public function index()
    {

        $this->load->dbutil();
        $options = array('format'=> 'zip');

        if($backup = $this->dbutil->backup($options)) {
          # SE SALVAR EM /DATABASE ENVIA PARA bot@wolko.com.br
          if(write_file('DATABASE/'.date('d-m-Y').'.gz', $backup)){
            $titulo = 'BACKUP AUTOMÁTICO - ' . date('d/m/Y');
            $this->email->from('bot@wolko.com.br', base_url());
            $this->email->subject("Backup automático do sistema: " . base_url());
            $this->email->to('bot@wolko.com.br');
            $this->email->message('O arquivo de backup está no anexo deste e-mail e no diretório local.');
            $this->email->attach(base_url().'DATABASE/'.date('d_m_Y').'.gz');
            $this->email->send();
            $this->Registros->insert('BACKUP', 'Backup do dia:'. date('d/m/Y') .'gerado com sucesso!');
          } else {
            pre('ERRO AO SALVAR O BACKUP LOCALMENTE!');
            $this->Registros->insert('BACKUP', 'Erro no backup do dia:'. date('d/m/Y'));
          }
        } else {
          $this->Registros->insert('BACKUP', 'Erro no backup do dia:'. date('d/m/Y'));
        }

    }

}
