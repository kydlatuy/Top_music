<?php

/**
 * Created by PhpStorm.
 * User: oles
 * Date: 06.08.15
 * Time: 14:21
 */
class Settings_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $query = $this->db->get('settings');
        $data = $query->row_array();
        return $data;
    }

    public function updated($data)
    {
        $date = date('Y-m-d H:i:s');
        $input_data = array(
            'site_title' => $data['site_title'],
            'site_description' => $data['site_description'],
            'site_keywords' => $data['site_keywords'],
            'author' => $data['author'],
            'copyright' => $data['copyright'],
            'reply_to_email' => $data['reply_to_email'],
            'google_analytics_site_id' => $data['google_analytics_site_id'],
            'date_updated' => $date
        );

        $this->db->where('id', 1);
        if($this->db->update('settings', $input_data))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

}