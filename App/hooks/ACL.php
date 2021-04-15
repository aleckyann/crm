<?php

class ACL {

    #CLASS:METHODS BLOQUEADOS PARA 'normal'
    public function __construct()
	{
        $this->ACL['comum']['Inventario_controller']['s'] = true;
        $this->ACL['normal']['Api_controller']['get'] = true;
        $this->ACL['normal']['Api_controller']['get'] = true;
        $this->ACL['normal']['Api_controller']['get'] = true;
        $this->ACL['normal']['Api_controller']['get'] = true;
    }


    public function auth()
    {
        $CI =& get_instance();
        $class = $CI->router->fetch_class();
        $method = $CI->router->fetch_method();

        if(@$this->ACL[$CI->session->usuario_acl][$class][$method]){
            die('Access Denied: ACL.');
        } else {
            return TRUE;
        }
    }
}
