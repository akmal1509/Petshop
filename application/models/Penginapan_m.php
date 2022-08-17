<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penginapan_m extends CI_Model
{

	protected $table = 'penginapan';
	protected $primary = 'id_penginapan';

	public function getAllData()
	{
		return $this->db->get($this->table)->result_array();
	}

	public function getDetilService()
	{
		$sql = "SELECT * FROM detil_penginapan WHERE id_penginapan IS NULL";
		return $this->db->query($sql)->result_array();
	}

	public function addItem()
	{
		$denda = $this->db->get('denda')->row();
		$data = array(
			'hewan' => $this->input->post('hewan'),
			// 'antar_jemput' => $this->input->post('antar_jemput') == 'ya' ? 1 : 0,
			// 'biaya_antar_jemput' => $this->input->post('biaya_antar_jemput'),
			'nama_servis' => $this->input->post('nama_servis'),
			'tanggal_awal' => $this->input->post('tanggal_awal'),
			'tanggal_akhir' => $this->input->post('tanggal_akhir'),
			'harga' => $this->input->post('harga'),
			'diskon' => 0,
			'subtotal' => $this->input->post('harga') * $this->input->post('lama'),
			'denda' => $denda->denda,

		);
		$this->db->insert('detil_penginapan', $data);
		$sql = "SELECT sum(subtotal) as subtotal FROM detil_penginapan WHERE id_penginapan IS NULL";
		$data = $this->db->query($sql)->row_array();
		echo json_encode($data);
	}

	public function editDetailPenjualan($id, $diskon, $qty, $hakhir)
	{
		$data = array(
			'diskon'     => $diskon,
			'qty_jual'   => $qty,
			'subtotal'   => $hakhir,
		);
		return $this->db->set($data)->where('id_detil_jual', $id)->update('detil_penjualan');
	}

	public function hapusDetail($id)
	{
		$sql = "delete from detil_penginapan where id_detil_penginapan = '$id'";
		$this->db->query($sql);

		$subtotal = "SELECT sum(subtotal) as subtotal FROM detil_penginapan WHERE id_penginapan IS NULL";
		$data = $this->db->query($subtotal)->row_array();
		echo json_encode($data);
	}

	public function simpanPenjualan()
	{
		$kembalian = $this->input->post('kembali');
		$bayar = $this->input->post('bayar');
		$metode = $this->input->post('metode');

		if ($kembalian < 0) {
			$kembalian = 0;
		}

		$data = array(
			'id_user' => $this->input->post('kasir'),
			'antar_jemput' => $this->input->post('antar') == '1' ? 1 : 0,
			'biaya_antar_jemput' => $this->input->post('biaya'),
			'method' => $metode,
			'bayar' => $bayar,
			'kembali' => $kembalian,
			'konsumen' => $this->input->post('nama_konsumen'),
			'telp_konsumen' => $this->input->post('telp_konsumen'),
			'status_makanan' => $this->input->post('status_makanan'),
			'deskripsi' => $this->input->post('deskripsi'),
			'alamat_konsumen' => $this->input->post('alamat_konsumen'),
			'tanggal' => date('Y-m-d'),


		);
		$this->db->insert('penginapan', $data);

		$this->db->select("RIGHT (kas.kode_kas, 7) as kode_kas", false);
		$this->db->order_by("kode_kas", "DESC");
		$this->db->limit(1);
		$query = $this->db->get('kas');

		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode_kas) + 1;
		} else {
			$kode = 1;
		}
		$kodeks = str_pad($kode, 7, "0", STR_PAD_LEFT);
		$kodekas = "KS-" . $kodeks;
		$nominal = $bayar - $kembalian;
		$kas = array(
			'id_user'     => $this->input->post('kasir'),
			'kode_kas'    => $kodekas,
			'tanggal'     => date('Y-m-d H:i:s'),
			'jenis'       => 'Pemasukan',
			'sumber'      => 'transaksi',
			'keterangan'  => 'Penginapan',
			'nominal'     => $nominal,
		);

		$this->db->insert('kas', $kas);

		$idPenginapan = "select max(id_penginapan) as id_penginapan from penginapan";
		$id = implode($this->model->General($idPenginapan)->row_array());
		$sql = "update detil_penginapan set id_penginapan = '$id' where id_penginapan is null";
		$this->db->query($sql);
		$kembali = $this->input->post('kembali');

		if ($kembali < 0 || $metode == "Kredit") {
			$jml_piutang = abs($kembali);
			$piutang = array(
				'id_jual'        => null,
				'tgl_piutang'    => date('Y-m-d H:i:s'),
				'jml_piutang'    => $jml_piutang,
				'bayar'          => 0,
				'sisa'           => $jml_piutang,
				'status'         => 'Belum Lunas',
				'jatuh_tempo'    => $this->input->post('tempo')
			);
			$this->db->insert('piutang', $piutang);
		}
	}

	public function detilItemJual($id)
	{
		$sql = "SELECT a.id_detil_jual, b.barcode, b.id_barang, b.nama_barang, b.harga_jual, a.qty_jual, a.diskon, 
		a.subtotal FROM detil_penjualan a, barang b WHERE b.id_barang = a.id_barang AND a.id_detil_jual = '$id'";
		$data = $this->model->General($sql)->row_array();
		echo json_encode($data);
	}
	public function detilServisJual($id)
	{
		$sql = "SELECT a.id_detil_jual, b.kode, b.id_servis, b.nama_servis, a.harga_item, a.qty_jual, 
		a.subtotal FROM detil_penjualan a, servis b WHERE b.id_servis = a.id_servis AND a.id_detil_jual = '$id'";
		$data = $this->model->General($sql)->row_array();
		echo json_encode($data);
	}

	public function editServisJual($id, $harga, $subtotal)
	{
		$data = array(
			'harga_item' => $harga,
			'subtotal'   => $subtotal,
		);
		return $this->db->set($data)->where('id_detil_jual', $id)->update('detil_penjualan');
	}

	public function ubahstatus($id, $status)
	{
		$data = array(
			'status_ambil' => $status
		);
		return $this->db->set($data)->where('id_penginapan', $id)->update('penginapan');
	}
}
