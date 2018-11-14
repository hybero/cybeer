<?php
class Clients extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('clients_model');
        $this->load->helper('url_helper');
        $this->load->helper('html');
    }

    public function index()
    {
        $data['clients'] = $this->clients_model->get_clients(1, false);
        $data['title'] = 'Klienti';

        $this->load->view('templates/header', $data);
        $this->load->view('clients/index', $data);
        $this->load->view('templates/footer', $data);
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
