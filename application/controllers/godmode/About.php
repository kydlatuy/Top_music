<?php
/**
 * Created by PhpStorm.
 * User: Melikov
 * Date: 24.06.15
 * Time: 17:46
 */

class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('godmode/about_model');
        $this->load->library('form_validation');
        $this->check_login();
    }

    public function index()
    {
        $data['about'] = $this->about_model->get();
        $this->load->view('godmode/about', $data);
    }


    public function update()
    {
        if($this->input->post())
        {
            $this->form_validation->set_rules('text', 'Text');
            if ( ! $this->form_validation->run() == FALSE)
            {
                $data = $this->input->post();

                $this->about_model->update($data);
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