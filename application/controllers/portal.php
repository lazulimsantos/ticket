<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portal extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load("message","pt-br");
        if ($this->session->userdata('usuario')->tipo == 3)
            redirect(base_url());
    }

    public function index()
    {
        $this->load->view('admin/header');
		$this->load->view('admin/index');
        $this->load->view('admin/footer');
	}
}