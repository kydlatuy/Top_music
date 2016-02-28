<?php
/**
 * Created by PhpStorm.
 * User: Melikov
 * Date: 01.07.15
 * Time: 16:49
 */

class About_model extends CI_Model {

    public function get()
    {
        return $this->db->select()
            ->from('about')
            ->where('id', 1)
            ->get()
            ->row_array();
    }

    public function update($data)
    {
        $date = date('Y-m-d H:i:s');
        $data = array(
            'id' => 1,
            'text' => $data['text'],
            'date_updated' => $date
        );
        $this->db->where('id', $data['id']);
        $this->db->update('about', $data);
        return $data['id'];
    }
} 