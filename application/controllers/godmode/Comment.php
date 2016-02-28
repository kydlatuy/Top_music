<?php
/**
 * Created by PhpStorm.
 * User: Melikov
 * Date: 24.06.15
 * Time: 17:46
 */

class Comment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('godmode/about_model');
    }

    public function index()
    {

        $this->load->view('godmode/comments');
    }
}