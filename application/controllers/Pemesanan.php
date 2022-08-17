<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Pemesanan_m');
        $this->load->model('Barang_m');
        $this->load->model('Satuan_m');
        $this->load->model('Supplier_m');
    }
    public function index()
    {
        $data = array(
            'title'    => 'Pemesanan',
            'user'     => infoLogin(),
            'toko'     => $this->db->get('profil_perusahaan')->row(),
            'content'  => 'pemesanan/index',
            'pemesanan' => $this->Pemesanan_m->getAllData()
        );

        $this->load->view('templates/main', $data);
    }
    public function detail($id)
    {
        $data = array(
            'title'    => 'Detail Pemesanan',
            'user'     => infoLogin(),
            'toko'     => $this->db->get('profil_perusahaan')->row(),
            'content'  => 'pemesanan/detail',
            'detail' =>  $this->Pemesanan_m->show($id),
            'barang_item'       => $this->Barang_m->getAllData(),
            'satuan'       => $this->Satuan_m->getAllData(),
            'supplier'       => $this->Supplier_m->getAllData(),
            'barang' =>  $this->Pemesanan_m->getDetail($id)
        );

        $this->load->view('templates/main', $data);
    }

    public function delete($id = '')
    {
        $this->Pemesanan_m->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Pemesanan berhasil dihapus.</div>');
    }

    public function input()
    {
        $this->Pemesanan_m->save();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Pemesanan berhasil disimpan.</div>');
        redirect('pemesanan');
    }
    public function update($id)
    {
        $this->Pemesanan_m->update($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Pemesanan berhasil diubah.</div>');
        redirect('pemesanan');
    }
    public function input_detail($id)
    {
        $this->Pemesanan_m->save_detail($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data detail pemesanan berhasil disimpan.</div>');
        redirect('pemesanan/detail/' . $id);
    }
    public function update_detail($id, $idPemesanan)
    {
        $this->Pemesanan_m->update_detail($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data detail pemesanan berhasil diubah.</div>');
        redirect('pemesanan/detail/' . $idPemesanan);
    }
    public function delete_detail($id = '')
    {
        $this->Pemesanan_m->delete_detail($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data detail pemesanan berhasil dihapus.</div>');
    }
    public function status($id = '', $status)
    {
        $this->Pemesanan_m->status($id, $status);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data pemesanan berhasil disubmit.</div>');
    }

    public function show($id = '')
    {
        $data = $this->Pemesanan_m->show($id);
        echo json_encode($data);
    }
    public function show_detail($id = '')
    {
        $data = $this->Pemesanan_m->show_detail($id);
        echo json_encode($data);
    }

    public function buat_pemesanan()
    {
        if (count($this->input->post('barang')) > 0) {
            $data = array(
                'id_user'    => infoLogin()['id_user'],
                'nama_pemesanan'    => 'Pemesanan barang pada tanggal ' . date('Y-m-d') . ' oleh ' . infoLogin()['nama_lengkap'],
                'status' => 'pending',
                'tanggal' => date('Y-m-d')
            );
            $insert = $this->db->insert('pemesanan', $data);
            $sql = "SELECT * FROM pemesanan ORDER BY id DESC LIMIT 1";
            $queryRes = $this->db->query($sql)->row();
            foreach ($this->input->post('barang') as $key => $item) {
                $barang = $this->db->get_where('barang', ['id_barang' => $item])->row();
                $detail = array(
                    'id_pemesanan'    => $queryRes->id,
                    'id_barang'    => $item,
                    'id_supplier' => $barang->id_supplier,
                    'id_satuan' => $barang->id_satuan,
                    'jumlah' => $this->input->post($barang->id_barang),
                    'tanggal' => date('Y-m-d')
                );
                $insertDetail = $this->db->insert('detil_pemesanan', $detail);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Pemesanan berhasil disimpan.</div>');
            redirect('pemesanan');
        } else {
            redirect('barang/stok_habis');
        }
    }
}
