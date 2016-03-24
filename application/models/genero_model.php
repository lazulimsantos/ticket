<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Genero_model extends CI_Model
{

    public $idgenero;
    public $ds_genero;

    public function getGeneros(){
        $this->db->order_by('ds_genero', 'asc');
        $query = $this->db->get('genero');
        return $query->result();
    }

    function getGenero($id){
        $query = $this->db->get_where('genero', array('idgenero' => $id), 1);
        return $query->row();
    }
    
    function subMenu($id) {
        $query = $this->db->select('c.genero_idgenero, c.ds_categoria')
                          ->from('categoria_genero c')
                          ->where('c.genero_idgenero',$id)
                          ->get();
        return $query->result();
    }
 
}
?>