<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        $this->load->view('front/header');
        $this->load->view('front/login');
		$this->load->view('front/footer');
	}
        
        public function logar() 
        {
            $this->load->model('user_model', '', TRUE);
            $this->user_model->email = $this->input->post('email');
            $usuario = $this->user_model->usuario();
            if ($usuario->senha === md5($this->input->post('senha'))) {
                $this->session->set_userdata('usuario', $usuario);
                $this->session->set_userdata('logado', TRUE);    
                $this->session->set_userdata('saldo', $this->user_model->getSaldo());
                
                if ($usuario->tipo == 3)
                    redirect(base_url());
                else
                    redirect('cms');
            } else
                redirect(base_url('login'));
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */