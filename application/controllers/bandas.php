<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bandas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load("message","pt-br");
        $this->load->model('banda_model', '', true);
        if ($this->session->userdata('usuario')->tipo == 3) 
            redirect(base_url());
    }

    public function index()
    {
        $bandas = $this->banda_model->getBandas();
        $this->load->view('admin/header');
        $this->load->view('admin/bandas', array('bandas'=>$bandas));
        $this->load->view('admin/footer');
    }

    public function novo($banda = null) {
        if (Empty($banda))
            $banda = new banda_model();
        $this->load->view('admin/header');
        $this->load->view('admin/form_banda', array('banda'=>$banda));
        $this->load->view('admin/footer');
    }


    public function salvar() {
        $this->banda_model-> idbanda = $this->input->post('id');
        $this->banda_model->imagem_banda =  $this->getImagem();
        $this->banda_model-> nome_banda = $this->input->post('nome');
        $this->banda_model-> site_banda =  $this->input->post('site');
        $this->banda_model-> contato_banda =  $this->input->post('contato');
        $this->banda_model-> telefone_banda =  $this->input->post('telefone');

        if ($this->banda_model->salvar()) {
            $this->session->set_flashdata('sucesso', 'Cadastro realizado com sucesso.');
        } else {
            $this->session->set_flashdata('erro', 'Erro ao realizar cadastrado.');
        }
        redirect(base_url('cms/artistas'));
    }

    public function editar($id)
    {   
        $banda = $this->banda_model->getBanda($id);
        $this->novo($banda);
    }

    public function excluir($id){
        $this->banda_model->idbanda = $id;
        if ($this->banda_model->excluir()) {
            $this->session->set_flashdata('sucesso', 'Banda excluido com sucesso.');
        } else {
            $this->session->set_flashdata('erro', 'Erro ao excluir banda.');
        }
        redirect(base_url('cms/artistas'));
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