<?php

/**
 * Created by PhpStorm.
 * User: oles
 * Date: 06.08.15
 * Time: 14:20
 */
class Settings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('godmode/settings_model');
        $this->load->library('form_validation');
        $this->check_login();
    }

    public function index()
    {
        $data['settings'] = $this->settings_model->get();
        $this->load->view('godmode/settings', $data);
    }

    public function update()
    {
        if($this->input->post())
        {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'valid_email');
            $this->form_validation->set_rules('phone', 'Phone');
            $this->form_validation->set_rules('address', 'Address');

            if ($this->form_validation->run() == FALSE)
            {
                die("ajfhkajsdfhjksd");
            }
            else
            {
                $data = $this->input->post();
                $this->settings_model->updated($data);
            }
        }

        $this->index();
    }

    public function check_login()
    {
        if ($this->session->userdata('logged_in') == FALSE)
        {
            redirect("godmode");
        }
    }



}