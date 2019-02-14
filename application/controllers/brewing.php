<?php
class Brewing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('brewing_model');
        $this->load->model('tanks_model');
        $this->load->model('storage_model');
        $this->load->helper('url_helper');
        $this->load->helper('html');
    }

    public function index()
    {

    }

    public function start($tank_id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Začať varenie';
        $data['user'] = ['id'=>1];

        $data['tank'] = $this->tanks_model->get_tanks($data['user']['id'], $tank_id);

        $this->form_validation->set_rules('name', 'Názov piva', 'required');
        $this->form_validation->set_rules('status', 'Litrov v nádrži', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('brewing/start');
            $this->load->view('templates/footer');
        }
        else
        {
            $data['form']['user_id'] = $_POST['user_id'];
            $data['form']['tank_id'] = $_POST['tank_id'];
            $data['form']['name'] = $data['tank']['name'] = $_POST['name'];
            $data['form']['status'] = $_POST['status'];
            $data['form']['description'] = $_POST['description'];
            $this->brewing_model->start_brewing($data);
            redirect('/tanks/view/'.$tank_id);
        }
    }

    public function finish($tank_id = null, $confirmed = false)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['user'] = ['id'=>1];
        $data['title'] = 'Ukončiť varenie';

        $data['tank'] = $this->tanks_model->get_tanks($data['user']['id'], $tank_id);

        if ($confirmed !== FALSE)
        {
            $this->brewing_model->finish_brewing($data);
            redirect('/tanks/view/'.$data['tank']['id']);
        }
        else
        {
            $this->load->view('templates/header', $data);
            $this->load->view('brewing/finish');
            $this->load->view('templates/footer');
        }
    }

    public function add_step($brew_list_id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['user']['id'] = $user_id = 1;
        $data['title'] = 'Pridať krok varenia';

        $data['brew_list']['id'] = $brew_list_id;
        $data['tank'] = $this->brewing_model->get_tank_by_brew_list($data['brew_list']['id']);

        $data['storage_items'] = $this->storage_model->get_items($data['user']['id']);
        $data['storage_items_options'][''] = '(Prázdne)';
        foreach($data['storage_items'] as $storage_item) {
            $data['storage_items_options'][$storage_item['id']] = $storage_item['name'];
        }

        $this->form_validation->set_rules('brewing_list_id', 'ID varného listu chýba', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('brewing/add_step_form');
            $this->load->view('templates/footer');
        }
        else
        {
            foreach($_POST as $key => $value) {
                $data['form'][$key] = $value;
            }

            $this->brewing_model->add_step($data);

            redirect('/tanks/view/'.$data['tank']['id']);
        }
    }

}
