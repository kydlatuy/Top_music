<?php
class News_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function show_users()
    {
        $query = $this->db->get('news');
        $query_result = $query->result();
        return $query_result;
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
            $query = $this->db->get('news', $limit, $offset);

            $data = $query->result_array();
            return $data;
        }
    }

        public function created($data, $upload)
    {
        $date = date('Y-m-d H:i:s');;
        if($upload)
        {
            $data = array(
                'title' => $data['title'],
                'path' => 'img/' . $upload['upload_data']['file_name'],
                'content' => $data['text'],
                'date_created' => $date,
            );
        }
        $this->db->insert('news', $data);
    }

    public function updated($data, $upload)
    {
        $value = $this->get();
        $date = date('Y-m-d H:i:s');;
        if($upload)
        {
            $data = array(
                'title' => $data['title'],
                'path' => 'img/' . $upload['upload_data']['file_name'],
                'content' => $data['text'],
                'date_updated' => $date,
            );
        }
        else
        {
            $data = array(
                'id' => 1,
                'title' => $data['title'],
                'content' => $data['text'],
                'date_updated' => $date
            );
        }
        $this->db->where('id', $data['id']);
        if($this->db->update('news', $data))
        {
            if($upload)
            {
                unlink($value['path']);
            }
            return $data['id'];
        }
        else
        {
            return FALSE;
        }
    }

    public function delete($id)
    {
        if($id)
        {
            $this->db->delete('news', array('id' => $id));
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function get_row($id)
    {
        if($id)
        {
            $query = $this->db->get_where('news', array('id' => $id));
            $data = $query->result_array();
        }
        return $data;
    }

//    public function get_title()
//    {
//        $title = $_GET['id'];
//        if($title)
//        {
//            $query = $this->db->get_where('news', array('title' => $title));
//            $data = $query->result_array();
//        }
//        return $data;
//    }
}
