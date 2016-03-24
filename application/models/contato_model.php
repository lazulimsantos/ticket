<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato_model extends CI_Model {

    public $nome;
    public $email;
    public $assunto;
    public $mensagem;
    public $enviado;

    public function __construct()
    {
        parent::__construct();

    }

    function salvar(){
        $this->enviado = strtotime("Y-m-d H:i:s", "now");
        return $this->db->insert('contato',$this);
    }

    public function contatos(){
        $query = $this->db->get('contato');
        return $query->result();
    }


}
