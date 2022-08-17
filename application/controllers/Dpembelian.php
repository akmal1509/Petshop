<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dpembelian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_login();
    // cek_user();
    $this->load->model('Pembelian_m');
  }
  public function index()
  {
    $pembelian = $this->db->query("
      SELECT b.id_beli, b.kode_beli, b.faktur_beli, b.tgl_faktur, c.nama_supplier, SUM(a.qty_beli) AS qty_beli, b.total, b.diskon, b.method, b.status 
      FROM detil_pembelian a, pembelian b, supplier c WHERE b.id_beli = a.id_beli AND c.id_supplier = b.id_supplier AND b.is_active = 1
      AND a.is_retur = 0 GROUP BY a.id_beli
    ")->result();
    $retur = $this->db->query("
        SELECT a.id_pembelian, SUM(b.subtotal) as nilai
        FROM retur_pembelian a, detil_retur_pembelian b
        WHERE a.id_retur_pembelian = b.id_retur_pembelian GROUP BY b.id_retur_pembelian
    ")->result();
    $data = array(
      'title'    => 'Daftar Pembelian',
      'user'     => infoLogin(),
      'toko'     => $this->db->get('profil_perusahaan')->row(),
      'content'  => 'daftarpembelian/index',
      'pembelian' => $pembelian,
      'retur' => $retur
    );
    $this->load->view('templates/main', $data);
  }
  // public function LoadData()
  // {
  //   $sql = "SELECT b.id_beli, b.kode_beli, b.faktur_beli, b.tgl_faktur, c.nama_supplier, SUM(a.qty_beli) AS qty_beli, b.total, b.diskon, b.method, b.status FROM detil_pembelian a, pembelian b, supplier c WHERE b.id_beli = a.id_beli AND c.id_supplier = b.id_supplier AND b.is_active = 1 GROUP BY a.id_beli";

  //   $json = array(
  //     "aaData"  => $this->model->General($sql)->result_array()
  //   );
  //   echo json_encode($json);
  // }
  public function detilPembelian($id = '')
  {
    $sql = "SELECT a.kode_detil_beli, c.barcode, c.nama_barang, c.harga_beli, c.harga_jual, a.qty_beli, a.subtotal FROM detil_pembelian a, pembelian b, barang c WHERE b.id_beli = a.id_beli AND c.id_barang = a.id_barang AND a.id_beli = '$id' AND a.is_retur = 0";

    $data = $this->model->General($sql)->result_array();
    echo json_encode($data);
  }

  public function edit($id)
  {
    $data = array(
      'title' => 'Edit Pembelian',
      'user' => infoLogin(),
      'toko' => $this->db->get('profil_perusahaan')->row(),
      'pembelian' => $this->Pembelian_m->getDataById($id),
      'content' => 'daftarpembelian/edit'
    );
    $detil1 = $this->Pembelian_m->getDetilBeli();
    $detil2 = $this->Pembelian_m->getDetilBeliById($data["pembelian"]["0"]["id_beli"]);
    $detil_pembelian = array_merge($detil1, $detil2);
    $data = array_merge($data, ["detil_pembelian" => $detil_pembelian]);
    $this->load->view('templates/main', $data);
  }

  public function tambahbeli($id, $qty, $subtotal, $jual, $beli, $id_beli)
  {
    $this->Pembelian_m->addItemById($id, $qty, $subtotal, $jual, $beli, $id_beli);
  }
}
