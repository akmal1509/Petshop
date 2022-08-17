<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penggajian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		// cek_user();
	}
	public function index()
	{
		$penggajian = $this->db->query("
					SELECT penggajian.*, karyawan.* 
					FROM penggajian JOIN karyawan ON karyawan.id_karyawan = penggajian.id_karyawan")
			->result();
		$data = array(
			'title'    => 'Penggajian',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'penggajian/index',
			'penggajian' => $penggajian,

		);
		$this->load->view('templates/main', $data);
	}
	public function create()
	{
		$data = array(
			'title'    => 'Tambah Penggajian',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'penggajian/form',
			'pegawai' => $this->db->get('karyawan')->result(),

		);
		$this->load->view('templates/main', $data);
	}

	public function get_data_pegawai()
	{
		$id = $this->input->post('id');
		$data = $this->db->query("
			SELECT * FROM karyawan a, jabatan b WHERE a.id_jabatan = b.id_jabatan AND a.id_karyawan = '$id'
		")->row();
		$gajiTerakhir = $this->db->query("
			SELECT * FROM penggajian WHERE id_karyawan = '$id' ORDER BY id_penggajian DESC LIMIT 1
		")->row();
		echo json_encode([
			'karyawan' => $data,
			'gaji' => $gajiTerakhir
		]);
	}

	public function store()
	{
		// check gaji karyawan terakhir
		$id_karyawan = $this->input->post('pegawai');
		$status = 'failed';
		$message = '';
		$data = '';
		$gaji_terakhir = $this->db->query("
			SELECT * FROM penggajian WHERE id_karyawan = '$id_karyawan' ORDER BY id_penggajian DESC LIMIT 1
		")->row();
		$date = isset($gaji_terakhir) ? date_create($gaji_terakhir->tanggal_gaji) : false;
		if ($date != false && date_format($date, 'm') == date('m')) {
			$message = 'Gaji pada bulan tersebut sudah dibayarkan';
		} else {
			$this->db->select("RIGHT (penggajian.referensi, 6) as referensi", false);
			$this->db->order_by("referensi", "DESC");
			$this->db->limit(1);
			$query = $this->db->get('penggajian');

			if ($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->referensi) + 1;
			} else {
				$kode = 1;
			}
			$kodeReferensi = str_pad($kode, 6, "0", STR_PAD_LEFT);
			$kode = "PGJ-" . $kodeReferensi;
			$data = [
				'referensi' => $kode,
				'id_karyawan' => $this->input->post('pegawai'),
				'tanggal_gaji' => $this->input->post('tanggal'),
				'gaji' => $this->input->post('gajipokok'),
				'komisi' => $this->input->post('komisi'),
				'potong_gaji' => $this->input->post('potonggaji'),
				'gaji_bersih' => $this->input->post('gajibersih'),
				'id_user' => infoLogin()['id_user'],
			];
			$this->db->insert('penggajian', $data);
			$status = 'success';
			$message = 'Data berhasil ditambahkan';
			$data = $this->db->query("SELECT * FROM penggajian ORDER BY id_penggajian DESC LIMIT 1")->row();
		}
		echo json_encode([
			'status' => $status,
			'message' => $message,
			'data' => $data
		]);
	}

	public function laporan($id)
	{
		$penggajian = $this->db->query("
			SELECT penggajian.*, karyawan.*, jabatan.*
			FROM penggajian JOIN karyawan ON karyawan.id_karyawan = penggajian.id_karyawan JOIN jabatan ON jabatan.id_jabatan = karyawan.id_jabatan
			WHERE penggajian.id_penggajian = '$id'
		")->row();
		$data = array(
			'title'    => 'Laporan Penggajian',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'penggajian/laporan',
			'penggajian' => $penggajian,
			// get owner from karyawan join jabatan
			'owner' => $this->db->query("
				SELECT * FROM karyawan a, jabatan b WHERE a.id_jabatan = b.id_jabatan AND b.nama_jabatan = 'Owner'
			")->row(),

		);
		$this->load->view('penggajian/laporan', $data);
	}
}
