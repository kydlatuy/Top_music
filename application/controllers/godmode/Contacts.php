<?php
/**
 * Created by PhpStorm.
 * User: Melikov
 * Date: 06.07.15
 * Time: 15:04
 */

class Contacts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('godmode/contacts_model');
        $this->load->library('form_validation');
        $this->check_login();
    }

    public function index()
    {
        $data['contact'] = $this->contacts_model->get();
        $this->load->view('godmode/contacts', $data);
    }

    public function updated()
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
            $this->form_validation->set_rules('name_company', 'Name Company');
            $this->form_validation->set_rules('phone_mob', 'Phone Work');
            $this->form_validation->set_rules('phone_home', 'Phone Home');
            $this->form_validation->set_rules('address', 'Address');
            $this->form_validation->set_rules('bank_account', 'bank Account');

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('godmode/contacts');
            }
            else
            {
                $data = $this->input->post();
                $this->contacts_model->updated($data);
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