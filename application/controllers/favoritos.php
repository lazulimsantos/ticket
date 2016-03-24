<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favoritos extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('evento_model', '', true);
        $this->load->model('ingresso_model', '', true);
    }
	
	public function index()
	{
        $itens = $this->ingresso_model->getFavoritos();
        $eventos = array();
        foreach ($itens as $item) {
            $evento = $this->evento_model->getEvent($item->evento_idevento);
            $evento->ingressos = $this->ingresso_model->getIngressosByEvento($item->evento_idevento);
            array_push($eventos, $evento);
        }
        $this->load->view('front/header');
        $this->load->view('front/favoritos', array('eventos'=>$eventos));
        $this->load->view('front/footer');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */