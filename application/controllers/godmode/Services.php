<?php
/**
 * Created by PhpStorm.
 * User: Melikov
 * Date: 06.07.15
 * Time: 15:04
 */

class Services extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('godmode/services_model');
        $this->check_login();
    }


    public function index()
    {
        $data['services'] = $this->services_model->get();
        $this->load->view('godmode/services', $data);
    }

    public function updated()
    {
        if($this->input->post())
        {
            $data = $this->input->post();
            $this->services_model->updated($data);
        }

        $this->index();
    }


    public function check_login()
    {
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect("godmode");
        }
    }
}
