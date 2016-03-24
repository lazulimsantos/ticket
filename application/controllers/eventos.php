<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load("message","pt-br");
        $this->load->model('evento_model', '', true);
        $this->load->model('ingresso_model', '', true);
        $this->load->model('genero_model', '', true);
        $this->load->model('local_model', '', true);
        if ($this->session->userdata('usuario')->tipo == 3) 
            redirect(base_url());
    }

    public function index()
    {
        $eventos = $this->evento_model->getEventos();
        foreach ($eventos as $evento) {
            $evento->ingressos = $this->ingresso_model->getIngressosByEvento($evento->idevento);
        }
        $this->load->view('admin/header');
        $this->load->view('admin/eventos', array('eventos'=>$eventos));
        $this->load->view('admin/footer');
    }

    public function novo($evento = null) {
        if (Empty($evento))
            $evento = new evento_model();
        else
             $evento->ingressos = $this->ingresso_model->getIngressosByEvento($evento->idevento);
        $locais = $this->local_model->getLocais();
        $generos = $this->genero_model->getGeneros();
        $this->load->view('admin/header');
        $this->load->view('admin/form_evento', array('evento'=>$evento, 'generos'=>$generos, 'locais'=>$locais));
        $this->load->view('admin/footer');
    }


    public function salvar() {
        $this->evento_model->idevento = $this->input->post('id');
        $this->evento_model->imagem_evento =  $this->getImagem();
        $this->evento_model->nome = $this->input->post('nome');
        $this->evento_model->ds_evento =  $this->input->post('ds_evento');
        $this->evento_model->data_evento =  $this->input->post('data');
        $this->evento_model->hora_evento =  $this->input->post('hora');
        $this->evento_model->cliente_idcliente =  $this->input->post('promotor');
        $this->evento_model->genero_idGenero =  $this->input->post('genero');
        $this->evento_model->local_idlocal =  $this->input->post('local');
        $this->evento_model->classificacao =  $this->input->post('idade');
        $this->evento_model->link_video =  $this->input->post('link');
        $this->evento_model->recomendacoes =  $this->input->post('recomendacoes');

        if ($this->evento_model->salvar()) {
            $this->session->set_flashdata('sucesso', 'Cadastro realizado com sucesso.');
        } else {
            $this->session->set_flashdata('erro', 'Erro ao realizar cadastrado.');
        }
        redirect(base_url('cms/eventos'));
    }

    public function editar($id)
    {   
        $evento = $this->evento_model->getEvent($id);
        $evento->ingressos = $this->ingresso_model->getIngressosByEvento($evento->idevento);
        $this->novo($evento);
    }

    public function excluir($id){
        $this->evento_model->idevento = $id;
        if ($this->evento_model->excluir()) {
            $this->session->set_flashdata('sucesso', 'Evento excluido com sucesso.');
        } else {
            $this->session->set_flashdata('erro', 'Erro ao excluir evento.');
        }
        redirect(base_url('cms/eventos'));
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

    public function addTicket()
    {

        $data['cd_evento'] = $_POST['id_evento'];
        $data['nm_ingresso_tipo'] = $_POST['ticket_type'];
        $data['vl_ingresso_tipo'] = $_POST['ticket_dsValue'];
        $data['qt_ingresso_tipo'] = $_POST['ticket_dsQty'];

        $erro = array();
        if ($data['nm_ingresso_tipo'] == ''){
            $erro['nm_ingresso_tipo'] = 'vazio';
        }
        if ($data['vl_ingresso_tipo'] == ''){
            $erro['vl_ingresso_tipo'] = 'vazio';
        }
        if ($data['qt_ingresso_tipo'] == ''){
            $erro['qt_ingresso_tipo'] = 'vazio';
        }

        if(count($erro)){
            echo json_encode($erro);

        } else{

            if($this->evento->addTicket($data)){
                $data['retorno'] = "sucesso";
                echo json_encode($data);
            }else{
                $data['retorno'] = "erro";
                echo json_encode($data);
            }

        }

        exit;

        $data['eventos'] = $this->evento->getEventos();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/detailsEvents',$data);
        $this->load->view('admin/modals/eventos');
        $this->load->view('admin/layout/footer');
    }
}