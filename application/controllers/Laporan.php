<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
   public function __construct()
   {

      parent::__construct();
      cek_login();
      // cek_user();
   }
   public function barang()
   {
      $sql = "select * from supplier";
      $data = array(
         'title'    => 'Laporan Data Barang',
         'user'     => infoLogin(),
         'supplier' => $this->model->General($sql)->result_array(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'barang/item/laporan'
      );
      $this->load->view('templates/main', $data);
   }
   public function pembelian()
   {
      $data = array(
         'title'    => 'Laporan Pembelian',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'pembelian/laporan'
      );
      $this->load->view('templates/main', $data);
   }
   public function penjualan()
   {
      $data = array(
         'title'    => 'Laporan Penjualan',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'penjualan/laporan'
      );
      $this->load->view('templates/main', $data);
   }
   public function stokopname()
   {
      $data = array(
         'title'    => 'Laporan Stok Opname',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'stokopname/laporan'
      );
      $this->load->view('templates/main', $data);
   }

   public function laba_rugi()
   {
      $data = array(
         'title'    => 'Laporan Keuntungan',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'penjualan/laba_rugi'
      );
      $this->load->view('templates/main', $data);
   }
   public function kas()
   {
      $data = array(
         'title'    => 'Laporan Kas',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'kas/laporan'
      );
      $this->load->view('templates/main', $data);
   }
   public function kas_bank()
   {
      $data = array(
         'title'    => 'Laporan Kas Bank',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'bank/laporan'
      );
      $this->load->view('templates/main', $data);
   }
   public function stok()
   {
      $data = array(
         'title'    => 'Laporan Stok In/Out',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'stok/laporan'
      );
      $this->load->view('templates/main', $data);
   }

   public function hutang()
   {
      $data = array(
         'title'    => 'Laporan Hutang',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'hutang/laporan',
         'supplier' => $this->db->get('supplier')->result_array()
      );
      $this->load->view('templates/main', $data);
   }
   public function piutang()
   {
      $data = array(
         'title'    => 'Laporan Piutang',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'piutang/laporan',
         'customer' => $this->db->get('customer')->result_array()
      );
      $this->load->view('templates/main', $data);
   }
   public function retur_penjualan()
   {
      $data = array(
         'title'    => 'Laporan Retur Penjualan',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'retur/laporan_retur_penjualan',
         'customer' => $this->db->get('customer')->result_array()
      );
      $this->load->view('templates/main', $data);
   }
   public function retur_pembelian()
   {
      $data = array(
         'title'    => 'Laporan Retur Pembelian',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'retur/laporan_retur_pembelian',
         'supplier' => $this->db->get('supplier')->result_array()
      );
      $this->load->view('templates/main', $data);
   }
   public function pemesanan()
   {
      $data = array(
         'title'    => 'Laporan Pemesanan',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'pemesanan/laporan',
      );
      $this->load->view('templates/main', $data);
   }

   public function rekap()
   {
      $data = array(
         'title'    => 'Laporan Rekap',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'rekap/laporan',
      );
      $this->load->view('templates/main', $data);
   }
}
