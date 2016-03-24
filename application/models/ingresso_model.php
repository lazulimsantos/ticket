<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Ingresso_model extends CI_Model
{

    public $idTipoIngresso;
    public $nm_tipo_ingresso;
    public $sexo_tipo_ingresso;
    public $valor_tipo_ingresso;
    public $lote_tipo_ingresso;
    public $qt_max_tipo_ingresso;
    public $qt_tipo_ingresso;
    public $evento_idevento;
    public $meiaentrada;

    public function getIngressos(){
        $this->db->order_by('idTipoIngresso', 'asc');
        $query = $this->db->get('ingresso_tipo');
        return $query->result();
    }

    public function getIngressosByEvento($idevento){
        $this->db->where('evento_idevento', $idevento);
        $this->db->order_by('idTipoIngresso', 'asc');
        $query = $this->db->get('ingresso_tipo');
        return $query->result();
    }

    public function salvar() {
        if (empty($this->idevento_ingresso))
            return $this->db->insert('ingresso_tipo', $this);
        else
            $this->db->where('idevento_ingresso', $this->idevento);
            return $this->db->update('ingresso_tipo', array(
                'nm_tipo_ingresso' => $this->nm_tipo_ingresso, 
                'sexo_tipo_ingresso'=>$this->sexo_tipo_ingresso, 
                'valor_tipo_ingresso'=>$this->valor_tipo_ingresso, 
                'lote_tipo_ingresso'=>$this->lote_tipo_ingresso, 
                'qt_max_tipo_ingresso'=>$this->qt_max_tipo_ingresso, 
                'qt_tipo_ingresso'=>$this->qt_tipo_ingresso, 
                'evento_idevento'=>$this->evento_idevento,
                'meiaentrada', $this->meiaentrada)
            );
    }

    public function excluir() {
        $this->db->where('idTipoIngresso', $this->idevento);
        return $this->db->delete('ingresso_tipo');
    }

    public function getIngresso($id){

        $query = $this->db->get_where('ingresso_tipo', array('evento_idevento' => $id), 1);
        return $query->row();
    }

    public function getById($id) {
        $query = $this->db->get_where('ingresso_tipo', array('idTipoIngresso' => $id), 1);
        return $query->row();   
    }

    public function adicionar($id) {
        if (!empty($this->getFavorito($id)))
            $this->deleteFavorito($id);
        return $this->db->insert('carrinho', array('evento_idevento'=>$id, 'usuario_idusuario'=>$this->session->userdata('usuario')->idusuario));
    }

     public function favoritos($id) {
        return $this->db->insert('favoritos', array('evento_idevento'=>$id, 'usuario_idusuario'=>$this->session->userdata('usuario')->idusuario));
    }

    public function getCarrinho() {
        $this->db->where('usuario_idusuario', $this->session->userdata('usuario')->idusuario);
        $query = $this->db->get('carrinho');
        return $query->result();
    }
 
    public function getFavoritos() {
        $this->db->where('usuario_idusuario', $this->session->userdata('usuario')->idusuario);
        $query = $this->db->get('favoritos');
        return $query->result();
    }

    public function deleteCarrinho($id) {
        $this->db->where('evento_idevento', $id);
        return $this->db->delete('carrinho');
    }    

    public function ticketUser($id) {
        return $this->db->insert('ingresso_usuario', array('ingresso_tipo_idTipoIngresso'=>$id, 'usuario_idusuario'=>$this->session->userdata('usuario')->idusuario));
    }

    public function deleteTodoCarrinho($id) {
        $this->db->where('usuario_idusuario', $this->session->userdata('usuario')->idusuario);
        return $this->db->delete('carrinho');
    }

    public function deleteFavorito($id) {
        $this->db->where('evento_idevento', $id);
        return $this->db->delete('favoritos');
    }
    public function getFavorito($evento) {
        $this->db->where('evento_idevento', $evento);
        $query = $this->db->get('favoritos');
        return $query->row();
    }
}