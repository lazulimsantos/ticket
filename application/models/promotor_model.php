<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotor_model extends CI_Model {

    public $documento;
    public $senha;
    public $inserido;

    public function __construct()
    {
        parent::__construct();

    }

    function cadastrar(){
        $this->inserido = strtotime('Y-m-d H:i:s', 'now');
        $promotor = $this->promotor();
        if (empty($promotor))
            return $this->db->insert('promotor',$this);
        else
            return false;
    }

    public function promotor(){
        $this->db->where('documento', $this->email);
        $query = $this->db->get('promotor');
        return $query->row();
    }


}
