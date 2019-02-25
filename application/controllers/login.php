<?php
class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('session');
    }

    function index()
    {
        $this->load->view('login/login');
    }

    function auth()
    {
        $email    = $this->input->post('email',TRUE);
        $password = md5($this->input->post('password',TRUE));
        $validate = $this->login_model->validate($email,$password);
        if($validate->num_rows() > 0) {
            $data  = $validate->row_array();
            $sesdata = array(
                'id'        => $data['id'],
                'name'      => $data['name'],
                'email'     => $data['email'],
                //'level'     => $data['name'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            redirect('tanks/index');
        }else{
            echo $this->session->set_flashdata('msg','Meno alebo heslo je nesprávne');
            redirect('login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}
