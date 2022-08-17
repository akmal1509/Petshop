<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Denda_m extends CI_Model
{

    protected $table = 'denda';
    protected $primary = 'id';

    public function getAllData()
    {
        return $this->db->get($this->table)->row_array();
    }

    public function Edit()
    {
        $id = $this->input->post('id_denda');
        $data = array(
            'denda'    => htmlspecialchars($this->input->post('denda'), true),

        );
        return $this->db->set($data)->where($this->primary, $id)->update($this->table);
    }
}
