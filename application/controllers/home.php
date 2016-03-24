<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model', '', true);
        $this->load->model('promotor_model', '', true);
        $this->load->model('evento_model', '', true);
        $this->load->model('ingresso_model', '', true);
        $this->load->model('genero_model', '', true);
        $this->load->model('user_model', '', true);
        $this->load->model('local_model', '', true);
    }
	
	public function index()
	{
            //$this->session->set_userdata('saldo', $this->user_model->getSaldo());
        
            $eventos = $this->evento_model->getEventos();
            foreach ($eventos as $evento) {
                $evento->ingressos = $this->ingresso_model->getIngressosByEvento($evento->idevento);
            }
            $generos = $this->genero_model->getGeneros();
            foreach($generos as $genero) {
                $menu = $this->genero_model->subMenu($genero->idgenero);
                $genero->menu = $menu;
            }
            $locais = $this->local_model->getLocais();
            $this->load->view('front/header');
            $this->load->view('front/index', array('eventos'=>$eventos, 'generos'=>$generos, 'locais'=>$locais));
            $this->load->view('front/footer');
	}

	public function login() {
		$this->user_model->email = $this->input->post('email');
		$usuario = $this->user_model->usuario();
		if (!empty($usuario)) {
			if (md5($this->input->post('password')) == $usuario->senha) {
				$this->session->set_userdata('usuario', $usuario);
				$this->session->set_userdata('logado', true);
				redirect(base_url('portal'));
			}
		} else {
			$this->session->set_userdata('logado', false);
			redirect(base_url());
		}
	}

    public function logout(){
        $this->session->unset_userdata("logado");
        $this->session->unset_userdata("usuario");
        redirect(base_url());

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */