<?php

class Messages_model  extends CI_Model {

    public function create($data)
    {
        if($data)
        {
            $date = date('Y-m-d H:i:s');
            $data = array(
                'first_name' => $data['first_name'],
                'email' => $data['email'],
                'message' => $data['message'],
                'date_created' => $date
            );
            $this->db->insert('messages', $data);
            return TRUE;
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
            $this->db->delete('messages', array('id' => $id));
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
        $data = array(
            'id' => $data['id'],
            'first_name' => $data['first_name'],
            'email' => $data['email'] ,
            'message' => $data['message'],
            'date_updated' => $date,
        );
        $this->db->where('id', $data['id']);
        if($this->db->update('messages', $data))
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
            $query = $this->db->get('messages', $limit, $offset);

            $data = $query->result_array();
            return $data;
        }
    }

    public function get_row($id)
    {
        $query = $this->db->get_where('messages', array('id' => $id));
        $data = $query->result_array();
        return $data;
    }

} 