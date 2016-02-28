<?php
/**
 * Created by PhpStorm.
 * User: Melikov
 * Date: 11.06.15
 * Time: 17:35
 */

class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('godmode/news_model');
    }

    public function index($offset = 0)
    {

        if($this->input->post())
        {
            $title = $this->input->post('title');
            $order = $this->input->post('order');
            $news_order_data = array(
                'title' => $title,
                'order' => $order
            );

            $this->session->set_userdata('news_order_data', $news_order_data);
            return;
        }
        else
        {
            $news_order_data = $this->session->userdata('news_order_data');
            if ($news_order_data)
            {
                $title = $news_order_data['title'];
                $order = $news_order_data['order'];
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
        $data['row_news']=$this->db->count_all_results('news');
        $data['news'] = $this->news_model->get($limit, $offset, $title, $order);
;
        $this->load->library('pagination');
        $config['base_url'] = site_url('godmode/news/index');
        $config['total_rows'] = $data['row_news'];

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('godmode/news', $data);
    }

    public function created()
    {
        if($this->input->post())
        {
            $this->load->library('upload');
            $this->config->load('upload_news', TRUE);
            $config['upload_path'] = $this->config->item('upload_path', 'upload_news');
            $config['allowed_types'] = $this->config->item('allowed_types', 'upload_news');
            $this->upload->initialize($config);
            $this->upload->do_upload();
            $data = $this->input->post();
            $upload = array('upload_data' => $this->upload->data());
            $this->news_model->created($data, $upload);
            redirect('godmode/news');
        }
        $this->load->view('godmode/add_news');
    }

    public function update($id)
    {

        if($this->input->post())
        {
            $this->load->library('upload');
            $this->config->load('upload_news', TRUE);
            $config['upload_path'] = $this->config->item('upload_path', 'upload_news');
            $config['allowed_types'] = $this->config->item('allowed_types', 'upload_news');
            $this->upload->initialize($config);
            $this->upload->do_upload();
            $data = $this->input->post();
            $upload = array('upload_data' => $this->upload->data());
            $this->news_model->created($data, $upload);
            redirect('godmode/news');
        }
        $data['news'] = $this->news_model->get_row($id);
        $this->load->view('godmode/add_news', $data);
    }

    public function delete($id)
    {
        $this->news_model->delete($id);
        redirect('godmode/news');
    }
} 