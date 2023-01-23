<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('LoginModel');
    }

	public function index()
	{   
        $this->load->view('_partial/head');
		$this->load->view('view_login');
	}

    public function loginProcess()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $rs = $this->LoginModel->loginCek($username, $password);
        if ($rs->num_rows()>0){
            
            foreach ($rs->result() as $row){
                $sess = array (
                'username' => $row->username, 
                'password' => $row->password
            );
            }
            $this->session->set_userdata($sess);
            redirect('promo/');
        }else{
            $this->session->set_flashdata('message', 'Username dan Password Salah');
            redirect('login/');
        }
    }
    
}
