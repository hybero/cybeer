<?php
class Tanks extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tanks_model');
        $this->load->helper('url_helper');
        $this->load->helper('html');
    }

    public function index()
    {
        $data['tanks'] = $this->tanks_model->get_tanks(1, false);
        $data['title'] = 'Tanky';

        $this->load->view('templates/header', $data);
        $this->load->view('tanks/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($id = NULL)
    {
        $data['tanks_item'] = $this->tanks_model->get_tanks($id);

        if (empty($data['tanks_item'])) {
            show_404();
        }

        $data['title'] = $data['tanks_item']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('tanks/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Vytvoriť nový tank';

        $this->form_validation->set_rules('name', 'Názov', 'required');
        $this->form_validation->set_rules('capacity', 'Kapacita', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('tanks/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->tanks_model->set_tanks();
            $this->load->view('tanks/success');
        }
    }

    public function empty_tank($id = null, $confirmed = false)
    {
        $user_id = 1;

        $data['tank'] = $this->tanks_model->get_tanks($user_id, $id);

        if ($confirmed === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('tanks/empty_tank');
            $this->load->view('templates/footer');
        }
        else
        {
            $data['tank']['status'] = 0;
            $this->tanks_model->update_tank($data['tank']);

            $this->load->view('templates/header', $data);
            $this->load->view('tanks/empty_tank_success');
            $this->load->view('templates/footer');
        }
    }

    public function cast_tank($id = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $user_id = 1;

        $data['casting_tank'] = $this->tanks_model->get_tanks($user_id, $id);
        $tanks = $this->tanks_model->get_tanks($user_id);

        foreach($tanks as $tank) {
            if($tank['id'] !== $data['casting_tank']['id']) {
                $data['tanks'][$tank['id']] = $tank['type'] . ' - ' . $tank['name'];
            }
        }

        $this->form_validation->set_rules('tank', 'Tank', 'required');
        $this->form_validation->set_rules('amount', 'Množstvo', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('tanks/cast_tank_form');
            $this->load->view('templates/footer');
        }
        else
        {
            $data = $_POST;

            $casting_tank = $this->tanks_model->get_tanks($user_id, $data['id']);
            $casting_tank['status'] -= intval($data['amount']);
            $this->tanks_model->update_tank($casting_tank);

            $casted_tank = $this->tanks_model->get_tanks($user_id, $data['tank']);
            $casted_tank['status'] += intval($data['amount']);
            $this->tanks_model->update_tank($casted_tank);

            $this->load->view('templates/header', $data);
            $this->load->view('tanks/cast_tank_success');
            $this->load->view('templates/footer');
        }
    }

    public function fill_tank($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $user_id = 1;

        $this->form_validation->set_rules('amount', 'Množstvo', 'required');

        $data['filling_tank'] = $this->tanks_model->get_tanks($user_id, $id);

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('tanks/fill_tank_form');
            $this->load->view('templates/footer');
        }
        else
        {
            $data = $_POST;
            $data['filling_tank'] = $this->tanks_model->get_tanks($user_id, $id);

            $data['filling_tank']['status'] += intval($data['amount']);
            $this->tanks_model->update_tank($data['filling_tank']);

            $this->load->view('templates/header', $data);
            $this->load->view('tanks/fill_tank_success');
            $this->load->view('templates/footer');
        }
    }

}
