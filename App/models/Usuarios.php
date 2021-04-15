<?php
/**
 * Classe para manipular a tabela usuarios
 */
class Usuarios extends CI_model
{


    public function get_all()
    {
        return $this->db->select('*')->get('usuarios')->result_array();
    }

    public function get_by_email($email)
    {
      return $this->db->get_where('usuarios', ['usuario_email'=>$email])->row_array();
    }

    public function get_where($where)
    {
      return $this->db->get_where('usuarios', $where)->result_array();
    }

    public function registrar($novo_usuario)
    {
      return $this->db->insert('usuarios', $novo_usuario);
    }

    public function get_nome_by_id($usuario_id)
    {
        return @$this->db->select('usuario_nome')->get_where('usuarios', array('usuario_id' => $usuario_id))->result_array()[0]['usuario_nome'];
    }

    public function get_by_id($usuario_id)
    {
        return @$this->db->get_where('usuarios', array('usuario_id' => $usuario_id))->result_array()[0];
    }

    public function insert($dados)
    {
        if( empty($this->db->get_where('usuarios', array('usuario_email' => $dados['usuario_email'], 'unidades_id' => $dados['unidades_id'], 'usuario_acl' => $dados['usuario_acl']))->result_array()) )
        {
            $this->db->insert('usuarios', $dados);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete($registro_id)
    {
        $registro = $this->get_by_id($registro_id);
        $this->db->delete('registros', array('registro_id' => $registro_id));
        return $registro;
    }


    public function update_senha($senha, $id)
    {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $this->db->update('usuarios', ['usuario_senha'=>$senha], ['usuario_id'=>$id]);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function update_by_id($dados, $usuario_id)
    {
        return $this->db->update('usuarios', $dados, array('usuario_id' => $usuario_id));
    }

    public function desativa($usuario_id)
    {
        $this->db->update('usuarios', array('deleted_at' => date('Y/m/d H:i:s')), array('usuario_id' => $usuario_id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function ativa($usuario_id)
    {
        $this->db->update('usuarios', array('deleted_at' => NULL), array('usuario_id' => $usuario_id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }


}
