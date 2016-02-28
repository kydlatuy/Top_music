<?php
/**
 * Created by PhpStorm.
 * User: Melikov
 * Date: 08.06.15
 * Time: 17:49
 */

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model('auth_model');
    }

    public function index()
   {
       if ($this->session->userdata('logged_in'))
       {
           redirect('godmode/webcodium');
       }
       else
       {
           $this->load->view("login");
       }
   }

    public function login()
    {
        die("sfsd");
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                $temp['data'] = 1;
                $this->load->view('godmode/login_view', $temp);
            }
            else
            {
                $data = $this->input->post();
                $this->load->model('godmode/admins_model');
                $result = $this->admins_model->login($data);

                if($result == FALSE)
                {
                    $temp['data'] = 1;
                    $this->load->view('godmode/login_view', $temp);
                }
                else
                {
                    $temp['data'] = 1;
                    $this->session->set_userdata('logged_in', $temp);
                    redirect('godmode/admins');
                }
            }
        }
    }

    public function register()
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');
//            $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check', array(
                'required'      => 'You have not provided %s.'));
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'trim|required|matches[password]');
            if ($this->form_validation->run() == FALSE)
            {
                die("32");
                $this->load->view('');
            }
            else
            {
                $data = $this->input->post();
                $this->auth_model->create($data);
                redirect('index');
            }
        }

        $this->load->view('register');
    }

    function email_check($str)
    {
        $query = $this->auth_model->email_check($str);
        if($query == FALSE)
        {
            $this->form_validation->set_message('email_check', '{field} busy');
            return FALSE;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('godmode');
    }
} 