<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_m extends CI_Model
{

    protected $table = 'jabatan';
    protected $primary = 'id_jabatan';

    public function getAllData()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function Save()
    {
        $data = array(
            'nama_jabatan'    => htmlspecialchars($this->input->post('name'), true),
            'gaji'   => htmlspecialchars($this->input->post('gaji'), true),
            'deskripsi'    => htmlspecialchars($this->input->post('deskripsi'), true),

        );
        return $this->db->insert($this->table, $data);
    }

    public function Edit()
    {
        $id = $this->input->post('idjabatan');
        $data = array(
            'nama_jabatan'    => htmlspecialchars($this->input->post('name'), true),
            'gaji'   => htmlspecialchars($this->input->post('gaji'), true),
            'deskripsi'    => htmlspecialchars($this->input->post('deskripsi'), true),

        );
        return $this->db->set($data)->where($this->primary, $id)->update($this->table);
    }

    public function Delete($id)
    {
        return $this->db->where($this->primary, $id)->delete($this->table);
    }

    public function Detail($id)
    {
        return $this->db->get_where($this->table, [$this->primary => $id])->row_array();
    }
}
