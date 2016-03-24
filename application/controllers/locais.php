<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locais extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load("message","pt-br");
        $this->load->model('local_model', '', true);
        $this->load->model('cidade_model', '', true);
        $this->load->model('endereco_model', '', true);
        if ($this->session->userdata('usuario')->tipo == 3) 
            redirect(base_url());
    }

    public function index()
    {
        $locais = $this->local_model->getLocais();
        $this->load->view('admin/header');
        $this->load->view('admin/locais', array('locais'=>$locais));
        $this->load->view('admin/footer');
    }

    public function novo($local = null) {
        if (Empty($local))
            $local = new local_model();
        $cidades = $this->cidade_model->getCidadesSC();
        $this->load->view('admin/header');
        $this->load->view('admin/form_local', array('local'=>$local, 'cidades'=>$cidades));
        $this->load->view('admin/footer');
    }


    public function salvar() {
        $this->local_model-> idlocal = $this->input->post('id');
        $this->local_model-> imagem =  $this->getImagem();
        $this->endereco_model->idEndereco = $this->input->post('idEndereco');
        $this->endereco_model->logradouro = $this->input->post('endereco');
        $this->local_model->endereco_idendereco = $this->endereco_model->salvar();
        $this->local_model-> cidade_idcidade =  $this->input->post('cidade');
        $this->local_model-> nome_local =  $this->input->post('nome');
        $this->local_model-> telefone_local =  $this->input->post('telefone');

        if ($this->local_model->salvar()) {
            $this->session->set_flashdata('sucesso', 'Cadastro realizado com sucesso.');
        } else {
            $this->session->set_flashdata('erro', 'Erro ao realizar cadastrado.');
        }
        redirect(base_url('cms/locais'));
    }

    public function editar($id)
    {   
        $local = $this->local_model->getLocal($id);
        $this->novo($local);
    }

    public function excluir($id){
        $this->local_model->idlocal = $id;
        if ($this->local_model->excluir()) {
            $this->session->set_flashdata('sucesso', 'Evento excluido com sucesso.');
        } else {
            $this->session->set_flashdata('erro', 'Erro ao excluir evento.');
        }
        redirect(base_url('cms/locais'));
    }

    private function getImagem() {
        $tipo = explode('.', $_FILES["imagem"]["name"]);
        $tipo = $tipo[count($tipo)-1];
        $url = "./api/eventos/imagens/".  uniqid(rand()).'.'.$tipo;
        
        if (in_array($tipo, array("jpg", "jpeg", "png", "JPG", "JPEG", "PNG")))
            if (is_uploaded_file($_FILES["imagem"]["tmp_name"]))
                if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $url)) {
                    return $url;
                }
        return "";
    }

}	