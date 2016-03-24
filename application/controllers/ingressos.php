<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingressos extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load("message","pt-br");
        $this->load->model('ingresso_model', '', true);
    }

    public function cadastrar() {
        $this->ingresso_model->idTipoIngresso = $this->input->post('idevento_ingresso');
        $this->ingresso_model->nm_tipo_ingresso = $this->input->post('setor');
        $this->ingresso_model->sexo_tipo_ingresso =  $this->input->post('genero');
        $this->ingresso_model->qt_tipo_ingresso =  $this->input->post('quantidade');
        $this->ingresso_model->valor_tipo_ingresso =  $this->input->post('valor');
        $this->ingresso_model->lote_tipo_ingresso =  $this->input->post('lote');
        $this->ingresso_model->qt_max_tipo_ingresso =  $this->input->post('maximo');
        $this->ingresso_model->meiaentrada =  $this->input->post('meiaentrada');
        $this->ingresso_model->evento_idevento =  $this->input->post('idevento');

        if ($this->ingresso_model->salvar()) {
            $this->session->set_flashdata('sucesso', 'Cadastro realizado com sucesso.');
        } else {
            $this->session->set_flashdata('erro', 'Erro ao realizar cadastrado.');
        }
        redirect(base_url('cms/eventos/editar/'.$this->ingresso_model->evento_idevento));
    }
    
    public function adicionar($evento)
    {
        $this->ingresso_model->adicionar($evento);
        redirect(base_url());
    }

    public function deleteCarrinho($evento)
    {
        $this->ingresso_model->deleteCarrinho($evento);
        redirect(base_url('checkout'));
    }    

    public function favoritos($evento)
    {
        $this->ingresso_model->favoritos($evento);
        redirect(base_url());
    }

    public function deleteFavorito($evento)
    {
        $this->ingresso_model->deleteFavorito($evento);
        redirect(base_url('favoritos'));
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

}