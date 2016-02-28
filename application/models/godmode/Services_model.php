<?php

class Services_model extends CI_Model {

    public function get()
    {
        return $this->db->select()
            ->from('services')
            ->where('id', 1)
            ->get()
            ->row_array();
    }

    public function updated($data)
    {
        $date = date('Y-m-d H:i:s');
        $data = array(
            'id' => 1,
            'for_sole_traders' => $data['for_sole_traders'],
            'llc' => $data['llc'],
            'legal_support' => $data['legal_support'],
            'rent_business' => $data['rent_business'],
            'legal_support' => $data['legal_support'],
            'getting_information' => $data['getting_information'],
            'legal_support_company' => $data['legal_support_company'],
            'help_in_cases' => $data['help_in_cases'],
            'subscription_accounting' => $data['subscription_accounting'],
            'ip_legislation' => $data['ip_legislation'],
            'law_services' => $data['law_services'],
            'date_created' => $date
        );
        $this->db->where('id', $data['id']);
        return  $this->db->update('services', $data);
    }
} 