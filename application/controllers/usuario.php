<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuario extends CI_Controller {

	public function __construct()
    {
        parent::__construct();     
        $this->load->model('user_model', '', true);
    } 
	
    public function senha() {
        $this->user_model->senha = md5($this->input->post("senha"));
        if ($this->user_model->senha()) {
            $this->session->set_flashdata('sucesso', 'Cadastro realizado com sucesso.');
        }    
        redirect(base_url('conta'));
    }

	public function novo()
	{
        $destino = $this->input->post("destino");
        $this->user_model->idusuario = $this->input->post("idusuario");
        $this->user_model->tipo = $this->input->post("tipo");
        $this->user_model->apelido = $this->input->post("apelido");
        $this->user_model->nome = $this->input->post("nome");
        $this->user_model->endereco = $this->input->post("endereco");
        $this->user_model->numero = $this->input->post("numero");
        $this->user_model->complemento = $this->input->post("complemento");
        $this->user_model->cep = $this->input->post("cep");
        $this->user_model->bairro = $this->input->post("bairro");
        $this->user_model->cidade = $this->input->post("cidade");
        $this->user_model->estado = $this->input->post("estado");
        $this->user_model->celular = $this->input->post("celular");
        $this->user_model->cpf = $this->input->post("cpf");
        $this->user_model->email = $this->input->post("email");
        $this->user_model->senha = md5($this->input->post("senha"));

        if ($this->user_model->cadastrar()) {
        	$this->session->set_flashdata('sucesso', 'Cadastro realizado com sucesso.');
            $this->session->set_userdata('usuario', $this->user_model->usuario());
        } else {
        	$this->session->set_flashdata('erro', 'Email ja cadastrado.');
        }
        redirect(base_url($destino));
	}


}