<?php

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->library(array('session'));
    }

    public function index()
    {
        if ($this->session->userdata('logged_in'))
        {
            $data['stars'] = $this->auth_model->get();
            $this->load->view('index', $data);
        }
        else
        {
            $this->load->view("login");
        }
    }
}
