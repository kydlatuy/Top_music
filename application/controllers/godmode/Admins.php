<?php
/**
 * Created by PhpStorm.
 * User: Melikov
 * Date: 11.06.15
 * Time: 17:35
 */

class Admins extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('godmode/admins_model');
    }

    public function index($offset = 0)
    {

        if($this->input->post())
        {
            $title = $this->input->post('title');
            $order = $this->input->post('order');
            $admins_order_data = array(
                'title' => $title,
                'order' => $order
            );

            $this->session->set_userdata('admins_order_data', $admins_order_data);
            return;
        }
        else
        {
            $admins_order_data = $this->session->userdata('admins_order_data');
            if ($admins_order_data)
            {
                $title = $admins_order_data['title'];
                $order = $admins_order_data['order'];
            }
            else
            {
                $title = 'id';
                $order = 'asc';
            }
        }

        if($order == 'desc')
        {
            $data['order'] = 'asc';
        }
        else
        {
            $data['order'] = 'desc';
        }
        $data['title'] = $title;
        $limit = 5;
        $data['row_admins']=$this->db->count_all_results('admins');
        $data['admins'] = $this->admins_model->get($limit, $offset, $title, $order);

        $this->load->library('pagination');
        $config['base_url'] = site_url('godmode/admins/index');
        $config['total_rows'] = $data['row_admins'];

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('godmode/admins', $data);




    }

    public function create()
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check', array(
                'required'      => 'You have not provided %s.'));
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'trim|required|matches[password]');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('godmode/add_godmode');
            }
            else
            {
                $data = $this->input->post();
                $this->load->model('godmode/admins_model');
                $this->admins_model->create($data);
                redirect('godmode/admins');
            }
        }
        else
        {
            $this->load->view('godmode/add_admin');
        }
    }

    function email_check($str)
    {
        $query = $this->admins_model->email_check($str);
        if($query == FALSE)
        {
            $this->form_validation->set_message('email_check', '{field} busy');
            return FALSE;
        }
    }

    public function update($id)
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim');
            $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'trim|matches[password]');
            if ( ! $this->form_validation->run() == FALSE)
            {
                $data = $this->input->post();
                $this->load->model('godmode/admins_model');
                $this->admins_model->update($data);
                redirect('godmode/admins');
            }
        }
        $this->load->model('godmode/admins_model');
        $data['admins'] = $this->admins_model->get_row($id);
        $this->load->view('godmode/add_admin', $data);
    }

    public function delete($id)
    {
        $this->admins_model->delete($id);
        redirect('godmode/admins');
    }
} 