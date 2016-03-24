<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

        $tagID = $_POST['tagID'];
		echo $tagID;
	}

    public  function  entrar()
    {
        $this->load->model('api_model');
        $tagID = $_POST['tagID'];
        $idEvento = $_POST['idEvento'];

       /* $data['token'] = $tagID;
        $teste = $this->api_model->catraca($data);*/

        $data['i.token'] = $tagID;
        $data['evento_idevento'] = $idEvento;
        $teste = $this->api_model->catraca($data);


        echo json_encode($teste);

    }

    public  function  appLogin()
    {
        $this->load->model('api_model');
        $email = $this->input->post("email");
        $senha =$this->input->post("senha");
        $erro = array();
       if ($email == ''){
           $erro['email'] = 'vazio';
       }
       if ($senha == ''){
            $erro['senha'] = 'vazio';
        }
        if(count($erro)){
            echo json_encode($erro);

        }else{
            $retorno = $this->api_model->login($email, $senha);
            echo json_encode($retorno);
        }


    }

    public function listarEventos()
    {

        $this->load->model('api_model');
        $retorno = $this->api_model->getEventos();
        echo json_encode($retorno);

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */