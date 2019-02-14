<?php
class Storage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('storage_model');
        $this->load->model('storage_log_model');
        $this->load->helper('url_helper');
        $this->load->helper('html');
    }

    public function index()
    {
        $data['user'] = ['id'=>1];
        $data['storage'] = $this->storage_model->get_items($data['user']['id'], null);
        $data['title'] = 'Sklad';

        $this->load->view('templates/header', $data);
        $this->load->view('storage/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Pridať nového užívateľa';
        $data['user'] = ['id'=>1];

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

        $data['user'] = ['id'=>1];
        $data['title'] = 'Zmazať užívateľa';
        $data['client'] = $this->clients_model->get_clients($data['user']['id'], $id);

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('clients/delete_client_form');
            $this->load->view('templates/footer');

        }
        else if($id !== null && $confirmed !== false)
        {
            $this->clients_model->delete_client($id);
            $this->load->view('templates/header', $data);
            $this->load->view('clients/delete_client_success');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/footer');
            die('error: ID is null');
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

    public function add_item()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $user_id = 1;
        $data = [];

        $this->form_validation->set_rules('name', 'Názov položky', 'required');
        $this->form_validation->set_rules('amount', 'Množstvo', 'required|numeric');
        $this->form_validation->set_rules('units', 'Jednotka', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('storage/add_item_form');
            $this->load->view('templates/footer');
        }
        else
        {
            $data = $_POST;
            $data['user_id'] = $user_id;

            $this->storage_model->add_item($data);

            $this->load->view('templates/header', $data);
            $this->load->view('storage/add_item_success');
            $this->load->view('templates/footer');
        }
    }

    public function history()
    {
        $data['user']['id'] = 1;
        $data['storage_log'] = $this->storage_log_model->get_by_user_id($data['user']['id']);

        $this->load->view('templates/header', $data);
        $this->load->view('storage/history');
        $this->load->view('templates/footer');
    }

}
