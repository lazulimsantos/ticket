<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contato extends CI_Controller {

	public function __construct()
    {
        parent::__construct();     
    } 
	public function index()
	{
		private function loadViewContato() {
		$this->load->view('front/header');
		$this->load->view('front/contato');
		$this->load->view('front/footer');
	}
	
	public function salvar() {
		$this->load->model('contato_model', '', true);

		$this->contato_model->nome = $this->input->post('nome');
		$this->contato_model->email = $this->input->post('email');
		$this->contato_model->assunto = $this->input->post('assunto');
		$this->contato_model->mensagem = $this->input->post('mensagem');
		
		if ($this->contato_model->salvar()) {
			$this->load->library('email');

			$this->email->from($this->contato_model->email, $this->contato_model->nome);
			$this->email->to('lazulimsantos@gmail.com'); 
			$this->email->cc('alexandro12@gmail.com'); 
			$this->email->bcc('raphaelws@yahoo.com'); 

			$this->email->subject($this->contato_model->assunto);
			$this->email->message($this->contato_model->mensagem);	

			$this->email->send();


			$this->session->set_flashdata('sucesso', 'Contato enviado com sucesso.');
        } else {
        	$this->session->set_flashdata('erro', 'Ocorreu um erro ao enviar contato.');
        }
        redirect(base_url('contato'));
	}
}