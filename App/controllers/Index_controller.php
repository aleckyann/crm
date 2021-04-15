<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_controller extends CI_Controller {


  #GET: /
  public function index()
  {
      redirect('autenticar');
  }


  public function error()
  {
    $this->output->set_status_header(404);
    $this->load->view('error');
  }

  // public function csvInventario()
  // {
  //   writeCSV(base_url('equipamentos.csv'), $this->get('equipamentos')->result_array());
  // }
  //
  // public function csv_to_inventario()
  // {
  //   $inventario = readCSV('inventario.csv', array("unidade_id","equipamento_setor","equipamento_patrimonio","equipamento_nome","equipamento_modelo","equipamento_serie","equipamento_fabricante","equipamento_vida_util","equipamento_contrato_manutencao","equipamento_condicao_funcionamento","created_at","updated_at","inserted_by") );
  //   foreach ($inventario as $i) {
  //     $this->db->insert('equipamentos', $i);
  //   }
  // }
  //
  // public function chat()
  // {
  //   $this->load->view('chat');
  // }
  //
  // public function send_message()
  // {
  //   $options = array(
  //     'host' => 'api.pusherapp.com',
  //     'encrypted' => true
  //   );
  //   $pusher = new Pusher\Pusher('82b3c1e354e2e3774b89', '9c9551f27499a2fcdda5', '547193', $options);
  //
  //   $pusher->trigger('chat', 'sendMessage', array('message' => $this->input->post('message')));
  // }


}
