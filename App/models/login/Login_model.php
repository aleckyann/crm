<?php
/**
 * Classe de autenticação de usuários
 */
class Login_model extends CI_model
{

    public function auth($dados)
    {
        // Salva senha enviada em outra variável e retira do array de dados enviados
        $senha = $dados['usuario_password']; unset($dados['usuario_password']);

        // Salva a unidade acessada em outra variável e retira do array de dados enviados
        $unidade_id = $dados['unidade_id']; unset($dados['unidade_id']);

        // Busca no DB com essas credenciais no BD
        $usuario = $this->db->get_where('usuarios', $dados)->row_array();
        // Verifica se a senha informada bate com a contida no DB
        if(password_verify($senha, $usuario['usuario_password'])) {
            // Extrai de "unidade_id" quais unidades ele possui acesso
            $unidades = explode(',', $usuario['unidades_id']);
            // Verifica se a unidade_id da url é permitida para este usuário
            if(in_array($unidade_id, $unidades)) {
                return $usuario;
            }
        } else {
            return FALSE;
        }
    }


    public function verifica_usuario($dados)
    {
        return @$this->db->get_where('usuarios', $dados)->result_array()[0];
    }

    /**
     * Atualiza a senha do usuário
     * Criptografia é realizada no controller
     */
    public function redefine_senha($senha_criptografada, $usuario)
    {
        $this->db->update('usuarios', array('usuario_password' => $senha_criptografada), $usuario);
    }


}
