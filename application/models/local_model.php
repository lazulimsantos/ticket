<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Local_model extends CI_Model
{

    public $idlocal;
    public $nome_local;
    public $endereco_idendereco;
    public $imagem;
    public $cidade_idcidade;
    public $telefone_local;

    public function getLocais(){
        $this->db->order_by('idlocal', 'desc');
        $query = $this->db->select('l.*, c.nome nome_cidade, e.*')
                          ->from('local l')
                          ->join('endereco e', 'e.idEndereco = l.endereco_idendereco', 'left')
                          ->join('tb_cidade c', 'c.id_cidade = l.cidade_idcidade', 'left')
                          ->get();
        return $query->result();
    }

    public function salvar() {
        if (empty($this-> idlocal))
            return $this->db->insert('local', $this);
        else
            $this->db->where('idlocal', $this-> idlocal);
            $local = array(
                'idlocal' => $this->idlocal, 
                'endereco_idendereco'=>$this->endereco_idendereco, 
                'imagem'=>$this->imagem, 
                'cidade_idcidade'=>$this-> cidade_idcidade,
                'telefone_local'=>$this->telefone_local);
            if (!empty($this->imagem))
                $local['imagem']=$this->imagem;
            return $this->db->update('local', $local);
    }

    public function excluir() {
        $this->db->where('idlocal', $this-> idlocal);
        return $this->db->delete('local');
    }

    function getLocal($id){
        $this->db->where('idlocal', $id);
        $query = $this->db->select('l.*, c.nome nome_cidade, e.*')
                          ->from('local l')
                          ->join('endereco e', 'e.idEndereco = l.endereco_idendereco', 'left')
                          ->join('tb_cidade c', 'c.id_cidade = l.cidade_idcidade', 'left')
                          ->get();
        return $query->row();
    }
 
}
?>	