<?php
class Export extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
        $this->load->model('export_model');
        $this->load->model('clients_model');
        $this->load->model('tanks_model');
        $this->load->helper('url_helper');
        $this->load->helper('html');
    }

    public function index()
    {
        $data['user'] = ['id'=>$this->session->userdata('id')];
        $data['exports'] = $this->export_model->get_exports($data['user']['id'], null);
        $data['title'] = 'Export';

        $this->load->view('templates/header', $data);
        $this->load->view('export/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create($tank_id = '')
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Exportovať pivo';
        $data['user'] = ['id'=>$this->session->userdata('id')];
        $data['tank']['id'] = $tank_id;
        $data['client_options'] = $this->clients_model->get_clients_options($data['user']['id']);
        $data['tanks_options'] = $this->tanks_model->get_tanks_options($data['user']['id']);

        $this->form_validation->set_rules('client_id', 'Klient', 'required');
        $this->form_validation->set_rules('amount', 'Množstvo', 'required');
        $this->form_validation->set_rules('packaging', 'Balenie', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('export/export_beer_form');
            $this->load->view('templates/footer');
        }
        else
        {
            foreach($_POST as $key => $value) {
                $data['form'][$key] = $value;
            }
            $data['form']['user_id'] = $data['user']['id'];
            $this->export_model->export_beer($data);
            redirect('/export/index');
        }
    }

}
