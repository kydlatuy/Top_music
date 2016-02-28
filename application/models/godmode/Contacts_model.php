<?php
/**
 * Created by PhpStorm.
 * User: Melikov
 * Date: 06.07.15
 * Time: 15:08
 */

class Contacts_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->select()
            ->from('contacts')
            ->where('id', 1)
            ->get()
            ->row_array();
    }

    public function updated($data)
    {
        $date = date('Y-m-d H:i:s');
        $data = array(
            'id' => 1,
            'email' => $data['email'],
            'phone_mob' => $data['phone_mob'],
            'phone_home' => $data['phone_home'],
            'name_company' => $data['name_company'],
            'address' => $data['address'],
            'bank_account' => $data['bank_account'],
            'date_updated' => $date
        );
        $this->db->where('id', $data['id']);
        $this->db->update('contacts', $data);

        return true;
    }

}