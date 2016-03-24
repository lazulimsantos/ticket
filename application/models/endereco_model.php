<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Endereco_model extends CI_Model
{

    public $idEndereco;
    public $logradouro;

    public function salvar() {
        if (empty($this->idEndereco))
            return $this->db->insert('endereco', $this);
        else
            $this->db->where('idEndereco', $this->idEndereco);
            $endereco = array(
                'logradouro' => $this->logradouro);
            $this->db->update('endereco', $endereco);
            return $this->db->insert_id();
    }
 
}
?>		