<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan_m extends CI_Model
{

    protected $table = 'pemesanan';
    protected $primary = 'id';

    public function getAllData()
    {
        if (infoLogin()['tipe'] == 'Owner') {
            $query = "SELECT a.id, a.nama_pemesanan, a.tanggal, a.status, c.nama_lengkap 
           FROM pemesanan a INNER JOIN user c ON c.id_user = a.id_user WHERE a.status != 'pending' ";
        } else {
            $query = "SELECT a.id, a.nama_pemesanan, a.tanggal, a.status, c.nama_lengkap 
           FROM pemesanan a INNER JOIN user c ON c.id_user = a.id_user";
        }
        return $this->db->query($query)->result_array();
    }
    public function getDetail($id)
    {
        return $this->db->query('
           SELECT a.id, b.barcode, b.nama_barang, a.jumlah, a.tanggal, c.nama_supplier, d.satuan
            FROM detil_pemesanan a, barang b, supplier c, satuan d
            WHERE a.id_barang = b.id_barang AND a.id_supplier = c.id_supplier AND a.id_satuan = d.id_satuan AND a.id_pemesanan=' . $id)->result_array();
    }

    public function delete($id)
    {
        return $this->db->where($this->primary, $id)->delete($this->table);
    }

    public function save()
    {
        $data = array(
            'id_user'    => infoLogin()['id_user'],
            'nama_pemesanan'    => htmlspecialchars($this->input->post('nama'), true),
            'status' => 'pending',
            'tanggal' => htmlspecialchars($this->input->post('tanggal'), true)

        );
        return $this->db->insert($this->table, $data);
    }
    public function update($id)
    {
        $data = array(
            'nama_pemesanan'    => htmlspecialchars($this->input->post('nama'), true),
            'tanggal' => htmlspecialchars($this->input->post('tanggal'), true)

        );
        return $this->db->set($data)->where($this->primary, $id)->update($this->table);
    }
    public function delete_detail($id)
    {
        return $this->db->where('id', $id)->delete('detil_pemesanan');
    }

    public function save_detail($id)
    {
        $data = array(
            'id_pemesanan'    => $id,
            'id_barang'    => htmlspecialchars($this->input->post('barang'), true),
            'id_supplier' => htmlspecialchars($this->input->post('supplier'), true),
            'id_satuan' => htmlspecialchars($this->input->post('satuan'), true),
            'jumlah' => htmlspecialchars($this->input->post('jumlah'), true),
            'tanggal' => htmlspecialchars($this->input->post('tanggal'), true)

        );
        return $this->db->insert('detil_pemesanan', $data);
    }
    public function update_detail($id)
    {
        $data = array(
            'id_barang'    => htmlspecialchars($this->input->post('barang'), true),
            'id_supplier' => htmlspecialchars($this->input->post('supplier'), true),
            'id_satuan' => htmlspecialchars($this->input->post('satuan'), true),
            'jumlah' => htmlspecialchars($this->input->post('jumlah'), true),
            'tanggal' => htmlspecialchars($this->input->post('tanggal'), true)

        );
        return $this->db->set($data)->where('id', $id)->update('detil_pemesanan');
    }
    public function status($id, $status)
    {
        $data = array(
            'status'    => $status,
        );
        return $this->db->set($data)->where($this->primary, $id)->update($this->table);
    }

    public function show($id)
    {
        return $this->db->get_where($this->table, [$this->primary => $id])->row_array();
    }
    public function show_detail($id)
    {
        return $this->db->get_where('detil_pemesanan', ['id' => $id])->row_array();
    }
}
