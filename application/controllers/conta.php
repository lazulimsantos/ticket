<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conta extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('evento_model', '', true);
        $this->load->model('ingresso_model', '', true);
        $this->load->model('user_model', '', true);
    }
	
	public function index()
	{
        $itens = $this->ingresso_model->getCarrinho();
        $eventos = array();
        foreach ($itens as $item) {
            $evento = $this->evento_model->getEvent($item->evento_idevento);
            $evento->ingressos = $this->ingresso_model->getIngressosByEvento($item->evento_idevento);
            array_push($eventos, $evento);
        }
        $this->load->view('front/header');
        $this->load->view('front/conta', array('eventos'=>$eventos));
        $this->load->view('front/footer');
	}

	public function pagamento()
	{
        /*$method = $_SERVER['REQUEST_METHOD'];

        if ('POST' == $method) {
            $credentials = PagSeguroConfig::getAccountCredentials();
            $type = $_POST['notificationType'];
            $notificatioCode = $_POST['notificatioCode'];

            if ($type == 'TRANSACTION') {
                $transaction = PagSeguroNotificationService::checkTransaction($credentials, $notificatioCode);
                $status = $transaction->getStatus();
                $meioPagamento = $transaction->getPaymentMethod();
                $tipoMeio = $meioPagamento->getType();
                $itens = $transaction->getItems();
                $codigo = $transaction->getCode();
                $valor = $transaction->getGrossAmount();
            }
        }*/
        
        $this->user_model->valor = str_replace(",", ".", $this->input->post('valor'));
        if ($this->user_model->carregaSaldo())
            $this->session->set_userdata('saldo', $this->user_model->getSaldo());
        redirect(base_url('conta'));

	}

    public function finalizar()
    {
        $ingressos = trim($this->input->post('ingressos'));

        if (!empty($ingressos))
        {
            $tickets = explode(",", $ingressos);
            //if (count($tickets) > 1) {
                foreach ($ticket as $tickets) {
              //      $ingresso = $this->ingresso_model->getById(str_replace("ticket", "", $ticket));
                    $this->ingresso_model->ticketUser(str_replace("ticket", "", $ticket));
                //    $this->ingresso_model->deleteCarrinho($ingresso->evento_idevento);
                }            
            //} else {
            //    $ingresso = $this->ingresso_model->getById(str_replace("ticket", "", $ingressos));
            //    $this->ingresso_model->ticketUser(str_replace("ticket", "", $ingressos));
            //    $this->ingresso_model->deleteCarrinho($ingresso->evento_idevento);
            //}
        }

        redirect(base_url('checkout'));
    }

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */