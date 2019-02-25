<?php
class Tanks extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
        $this->load->model('tanks_model');
        $this->load->model('brewing_model');
    }

    public function index()
    {
        $data['tanks'] = $this->tanks_model->get_tanks($this->session->userdata('id'), false);
        $data['title'] = 'Tanky';

        $this->load->view('templates/header', $data);
        $this->load->view('tanks/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($id = NULL)
    {
        $data['user']['id'] = $this->session->userdata('id');
        $data['tanks_item'] = $this->tanks_model->get_tanks($data['user']['id'], $id);

        if (empty($data['tanks_item'])) {
            show_404();
        }

        $data['title'] = $data['tanks_item']['name'];

        $data['brew_list'] = $this->brewing_model->get_brew_list_by_tank_id($id);

        $data['brew_log'] = $this->brewing_model->get_brew_log($data['brew_list']['id']);

        $this->load->view('templates/header', $data);
        $this->load->view('tanks/view', $data);
        $this->load->view('templates/footer');
    }

    public function empty_tank($id = null, $confirmed = false)
    {
        $user_id = $this->session->userdata('id');

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
            unset($data['tank']['filling_amount_percent']);
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

        $user_id = $this->session->userdata('id');

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

        $user_id = $this->session->userdata('id');

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

    public function add_tank()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $user_id = $this->session->userdata('id');
        $data = [];

        $this->form_validation->set_rules('type', 'Typ tanku', 'required');
        $this->form_validation->set_rules('capacity', 'Kapacita', 'required|numeric');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('tanks/add_tank_form');
            $this->load->view('templates/footer');
        }
        else
        {
            $data = $_POST;
            $data['user_id'] = $user_id;

            $this->tanks_model->create_tank($data);

            redirect('/tanks');
            //$this->load->view('templates/header', $data);
            //$this->load->view('tanks/add_tank_success');
            //$this->load->view('templates/footer');
        }
    }

    public function delete($id = null, $confirmed = false)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['user'] = ['id'=>$this->session->userdata('id')];
        $data['title'] = 'Zmazať tank';
        $data['tank'] = $this->tanks_model->get_tanks($data['user']['id'], $id);

        if($id !== null && $confirmed !== false)
        {
            $this->tanks_model->delete_tank($id);
            //$this->load->view('templates/header', $data);
            //$this->load->view('clients/delete_client_success');
            //$this->load->view('templates/footer');
            redirect('/tanks');
        }
        else
        {
            $this->load->view('templates/header', $data);
            $this->load->view('tanks/delete_tank_form');
            $this->load->view('templates/footer');
        }
    }

}
