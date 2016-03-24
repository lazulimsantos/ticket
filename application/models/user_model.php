<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    function cadastrar(){
        if (empty($this->usuario()))
            return $this->db->insert('usuario',$this);
        else {
            $this->db->where('idusuario', $this->idusuario);
            return $this->db->update('usuario', array('apelido' => $this->apelido, 
                                                     'nome' => $this->nome, 
                                                     'endereco' => $this->endereco, 
                                                     'numero' => $this->numero, 
                                                     'complemento' => $this->complemento, 
                                                     'cep' => $this->cep, 
                                                     'bairro' => $this->bairro, 
                                                     'cidade' => $this->cidade, 
                                                     'estado' => $this->estado, 
                                                     'celular' => $this->celular, 
                                                     'cpf' => $this->cpf, 
                                                     'email' => $this->email
                                                     )
                                    );
        }
    }

    public function senha() {
        $this->db->where('idusuario', $this->session->userdata('usuario')->idusuario);
        return $this->db->update('usuario', array('senha'=>$this->senha));    
    }

    public function getSaldo() {
        $query = $this->db->get_where('saldo', array('usuario_idusuario'=> $this->session->userdata('usuario')->idusuario), 1);
        return $query->row();
    }

    public function carregaSaldo() {
        $saldo = $this->getSaldo();
        $this->valor += $saldo->valor;
        if (!empty($saldo))
            return $this->db->update('saldo', array('valor'=>$this->valor), 'usuario_idusuario ='.$this->session->userdata('usuario')->idusuario);
        else
            return $this->db->insert('saldo', array('usuario_idusuario' => $this->session->userdata('usuario')->idusuario, 'valor' => $this->valor));
    }

    public function usuario(){
        $this->db->where('email', $this->email);
        $query = $this->db->get('usuario');
        return $query->row();
    }
    
    function login($username)
    {
        $query = $this -> db -> select('*')
                    -> from('usuario')
                    -> where('email', $username)
                    //-> where('senha', MD5($password))
                    -> limit(1)
                    -> get();

        return $query->row();
        
    }


}
