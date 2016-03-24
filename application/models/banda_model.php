<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Banda_model extends CI_Model
{

    public $idbanda;
    public $imagem_banda;
    public $nome_banda;
    public $site_banda;
    public $contato_banda;
    public $telefone_banda;

    public function getBandas(){
        $this->db->order_by('idbanda', 'desc');
        $query = $this->db->get('banda');
        return $query->result();
    }

    public function salvar() {
        if (empty($this->idbanda))
            return $this->db->insert('banda', $this);
        else
            $this->db->where('idbanda', $this->idbanda);
            $banda = array(
                'idbanda' => $this->idbanda, 
                'imagem_banda'=>$this->imagem_banda, 
                'nome_banda'=>$this->nome_banda, 
                'site_banda'=>$this->site_banda, 
                'contato_banda'=>$this->contato_banda, 
                'telefone_banda'=>$this->telefone_banda);
            if (!empty($this->imagem_banda))
                $banda['imagem_banda']=$this->imagem_banda;
            return $this->db->update('banda', $banda);
    }

    public function excluir() {
        $this->db->where('idbanda', $this->idbanda);
        return $this->db->delete('banda');
    }

    function getBanda($id){

        $query = $this->db->get_where('banda', array('idbanda' => $id), 1);
        return $query->row();
    }
 
}
?>