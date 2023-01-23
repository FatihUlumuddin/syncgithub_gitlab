<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginModel extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    function loginCek($username,$password)
    {                              
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get('users');
        
        return $query;
    }       
}
?>