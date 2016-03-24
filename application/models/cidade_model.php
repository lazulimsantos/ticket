<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Cidade_model extends CI_Model
{

    public $id_cidade;
    public $nome;

    public function getCidades(){
        $this->db->order_by('nome', 'asc');
        $query = $this->db->get('tb_cidade');
        return $query->result();
    }

    public function getCidadesSC(){
        $this->db->order_by('nome', 'asc');
        $query = $this->db->get_where('tb_cidade', array('estado' =>'SC'));
        return $query->result();
    }

    function getCidade($id){
        $query = $this->db->get_where('tb_cidade', array('id_cidade' => $id), 1);
        return $query->row();
    }
 
}
?>