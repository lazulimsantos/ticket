<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    function cadastrar($data){
       return $this->db->insert('usuario', $data);
    }

    function catraca($data){
       $this->db->select('u.nome nome_usuario, e.nome nome_evento');
       $this->db->from('ingresso i');
       $this->db->join('evento e', 'e.idevento = i.idIngresso','inner');
       $this->db->join('usuario u', 'u.idusuario = i.usuario_idusuario','inner');
       $this->db->where($data);
        $this->db->order_by('i.idIngresso');
       $query = $this->db->get();
       //$query = $this->db->get_where('ingresso',$data);
        $teste = $query->row_array();
        if ($query->num_rows == 1) {

            $teste['entrada'] = 'Liberada';
            return $teste;
        }else{
            $teste['entrada'] = 'Bloqueada';
            return $teste;
        }
    }

    function teste($data){
        $this->db->select('*');
        $this->db->from('ingresso');
        $this->db->join('evento', 'evento.idevento = ingresso.idIngresso','inner');
        // $this->db->join('usuario', 'usuario.idusuario = ingresso.usuario_idusuario','inner');
        $this->db->where($data);
        $query = $this->db->get();
        //$query = $this->db->get_where('ingresso',$data);
        if ($query->num_rows == 1) {
            $teste = $query->row_array();
            $teste['sucesso'] = 'sucesso';
            return $teste;
        }else{
            $teste['sucesso'] = 'falha';
        }
    }

    function login($username, $password)
    {
        $this -> db -> select('idusuario,nome,email');
        $this -> db -> from('usuario');
        $this -> db -> where('email', $username);
        $this -> db -> where('senha', md5($password));
        $this -> db -> limit(1);
        $query = $this -> db -> get();

        if ($query->num_rows == 1) {
            $retorno = $query->row_array();
            $retorno['login'] = 'sucesso';
            return $retorno;
        }else{
            $retorno['login'] = 'login_errado';

           return $retorno;
        }
    }

    function getEventos(){
     $query = $this->db->get('evento');
    return $query->result();
    }


}
