<?php
/**
 * Created by PhpStorm.
 * User: Melikov
 * Date: 06.07.15
 * Time: 11:25
 */

class Auth_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function show_users()
    {
        $query = $this->db->get('users');
        $query_result = $query->result();
        return $query_result;
    }

    public function login($data)
    {
        $salt = 'OIgM12%3@';
        $password = md5($data['password'] . $salt);
        $query = $this->db->get_where('users', array('email' => $data['email'], 'password' => $password));
        if ($query->num_rows() > 0)
        {
            $this->session->set_userdata($data['email']);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function create($data)
    {
        if($data)
        {
            $date = date('Y-m-d H:i:s');
            $salt = 'OIgM12%3@';
            $password = md5($data['password'] . $salt);
            $input_data = array(
                //'first_name' => $data['first_name'],
                'email' => $data['email'],
                'password' => $password,
//                'date_created' => $date
            );
            $this->db->insert('users', $input_data);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function email_check($data)
    {
        $this->db->where('email',$data);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function delete($id)
    {
        if($id)
        {
            $this->db->delete('users', array('id' => $id));
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function update($data)
    {
        $date = date('Y-m-d H:i:s');
        if ($data['password'])
        {
            $salt = 'OIgM12%3@';
            $password = md5($data['password'] . $salt);
            $data = array(
                'id' => $data['id'],
                'first_name' => $data['first_name'],
                'email' => $data['email'] ,
                'password' => $password,
                'date_updated' => $date
            );
        }
        else
        {
            $data = array(
                'id' => $data['id'],
                'first_name' => $data['first_name'],
                'email' => $data['email'],
                'date_updated' => $date
            );
        }
        $this->db->where('id', $data['id']);
        if($this->db->update('admins', $data))
        {
            return $data['id'];
        }
        else
        {
            return FALSE;
        }
    }

    public function get($limit, $offset = false, $title = false, $order = false)
    {
        {
            if( ! $title)
            {
                $this->db->order_by("id", "desc");

            }
            else
            {
                $this->db->order_by($title, $order);
            }
            $query = $this->db->get('admins', $limit, $offset);

            $data = $query->result_array();
            return $data;
        }
    }

    public function get_row($id = FALSE)
    {
        if($id)
        {
            $query = $this->db->get_where('admins', array('id' => $id));
            $data = $query->result_array();
        }
        else
        {
            $data = $this->db->count_all_results('admins');
        }
        return $data;
    }
}
