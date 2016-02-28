<?php

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
//        $this->load->model('godmode/admins_model');
//        $this->load->model('godmode/news_model');
//        $this->load->model('godmode/about_model');
//        $this->load->model('godmode/services_model');
    }

    public function index()
    {
//        $data['about'] = $this->about_model->get();
//        $data['news'] = $this->news_model->get();
//        $data['services'] = $this->services_model->get();
//        $data['social_network'] = $this->about_model->get_network();
//        $data['webcodiums'] = $this->dashboard_model->get();
//        $data['contacts'] = $this->contacts_model->get();
//        $data['testimonials'] = $this->testimonials_model->get();
//        $data['clients'] = $this->clients_model->get();
//        $data['settings'] = $this->settings_model->get();
//
//        $data['setsize'] = function ($url = null) {
//            if (!$url)
//                return false;
//            if (file_exists($url))
//                return getimagesize($url)[3];
//            else
//                return false;
//        };
        $this->load->view('index');
    }

    public function validations()
    {

        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'errors' => 'Your message was not sent, try again.'));

        } else {
            $this->load->model('send_email');
            $this->send_email->index($data);
            $this->load->model('godmode/messages_model');
            $this->messages_model->create($data);
            echo json_encode(array('success' => true, 'message' => 'Your message was sent successfully.'));
        }
    }

    public function getNews($id)
    {

    }
}
