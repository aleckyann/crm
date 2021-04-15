<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mikrotik_controller extends CI_Controller {

    #POST: /mikrotik
    public function index()
    {
        $API = new RouterosAPI();
        if ($API->connect('192.168.88.1', 'admin', '')) {
           $API->write('/interface/getall');
           $READ = $API->read(false);
           $ARRAY = $API->parseResponse($READ);
           pre($ARRAY);
           $API->disconnect();
        }

    }

}
