<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Evento_model extends CI_Model
{

    public $idevento;
    public $nome;
    public $ds_evento;
    public $data_evento;
    public $hora_evento;
    public $cliente_idcliente;
    public $genero_idGenero;
    public $local_idlocal;
    public $classificacao;
    public $imagem_evento;
    public $link_video;
    public $recomendacoes;

    public function getEventos(){
        $this->db->order_by('idevento', 'desc');
        $query = $this->db->select('e.*, u.nome nome_usuario, g.*, l.*')
                          ->from('evento e')
                          ->join('usuario u', 'u.idusuario = e.cliente_idcliente', 'left')
                          ->join('genero g', 'g.idgenero = e.genero_idGenero', 'left')
                          ->join('local l', 'l.idlocal = e.local_idlocal', 'left')
                          ->join('tb_cidade c', 'c.id_cidade = l.cidade_idcidade', 'left')
                          ->get();
        return $query->result();
    }

    public function salvar() {
        if (empty($this->idevento))
            return $this->db->insert('evento', $this);
        else
            $this->db->where('idevento', $this->idevento);
            $evento = array(
                'nome' => $this->nome, 
                'ds_evento'=>$this->ds_evento, 
                'data_evento'=>$this->data_evento, 
                'hora_evento'=>$this->hora_evento, 
                'cliente_idcliente'=>$this->cliente_idcliente, 
                'genero_idGenero'=>$this->genero_idGenero, 
                'local_idlocal'=>$this->local_idlocal, 
                'link_video'=>$this->link_video,
                'recomendacoes'=>$this->recomendacoes);
            if (!empty($this->imagem_evento))
                $evento['imagem_evento']=$this->imagem_evento;
            return $this->db->update('evento', $evento);
    }

    public function excluir() {
        $this->db->where('idevento', $this->idevento);
        return $this->db->delete('evento');
    }

    function addTicket($data){


        if ($this->db->insert('ingresso_tipo', $data)) {

            $teste['entrada'] = 'Adicionada';
            return $teste;
        }else{
            $teste['entrada'] = 'Erro';
            return $teste;
        }
    }



    function getEvent($id){

        $query = $this->db->get_where('evento', array('idevento' => $id), 1);
        return $query->row();
    }
 
}
?>