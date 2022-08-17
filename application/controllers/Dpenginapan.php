<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dpenginapan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
	}
	public function index()
	{
		$penginapan = $this->db->query("
        SELECT c.nama_lengkap, a.id_penginapan, b.telp_konsumen, b.konsumen, b.alamat_konsumen, b.tanggal, b.antar_jemput, b.biaya_antar_jemput, SUM(a.subtotal) as total, COUNT(a.id_penginapan) as jumlah, b.status_ambil as status
        FROM detil_penginapan a, penginapan b, user c
        WHERE a.id_penginapan = b.id_penginapan AND c.id_user = b.id_user GROUP BY a.id_penginapan
    ")->result();

		$data = array(
			'title'    => 'Daftar Penitipan',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'daftarpenginapan/index',
			'penginapan' => $penginapan,
		);
		$this->load->view('templates/main', $data);
	}

	public function detilPenjualanServis($id = '')
	{
		$sql = "SELECT * FROM detil_penginapan WHERE id_penginapan = '$id'";
		$data = $this->model->General($sql)->result_array();
		echo json_encode($data);
	}
}
