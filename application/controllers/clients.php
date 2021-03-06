<?php
class Clients extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
        $this->load->model('clients_model');
    }

    public function index()
    {
        $data['user'] = ['id'=>$this->session->userdata('id')];
        $data['clients'] = $this->clients_model->get_clients($data['user']['id'], null);
        $data['title'] = 'Klienti';

        $this->load->view('templates/header', $data);
        $this->load->view('clients/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Pridať nového užívateľa';
        $data['user'] = ['id'=>$this->session->userdata('id')];

        $this->form_validation->set_rules('name', 'Meno', 'required');
        $this->form_validation->set_rules('surname', 'Priezvisko', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('clients/create_client');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->clients_model->set_clients();
            $this->load->view('templates/header', $data);
            $this->load->view('clients/create_client_success');
            $this->load->view('templates/footer');
        }
    }

    public function delete($id = null, $confirmed = false)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['user'] = ['id'=>$this->session->userdata('id')];
        $data['title'] = 'Zmazať užívateľa';
        $data['client'] = $this->clients_model->get_clients($data['user']['id'], $id);

        if($id !== null && $confirmed !== false)
        {
            $this->clients_model->delete_client($id);
            redirect('/clients');
        }
        else
        {
            $this->load->view('templates/header', $data);
            $this->load->view('clients/delete_client_form');
            $this->load->view('templates/footer');
        }
    }

    public function view($id = NULL)
    {
        $data['client_item'] = $this->clients_model->get_clients($id);

        if (empty($data['clients_item'])) {
            show_404();
        }

        $data['title'] = $data['clients_item']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('clients/view', $data);
        $this->load->view('templates/footer');
    }

}
