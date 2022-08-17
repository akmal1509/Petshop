<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retur extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('Retur_m');
	}
	public function penjualan()
	{
		$retur = $this->db->query("
                        SELECT a.id_retur_penjualan, a.catatan, a.nomor, SUM(b.subtotal) as nilai, SUM(b.jumlah) as jumlah, c.invoice, a.created_at, d.nama_lengkap
                        FROM retur_penjualan a, detil_retur_penjualan b, penjualan c, user d
                        WHERE a.id_retur_penjualan = b.id_retur_penjualan AND a.id_penjualan = c.id_jual AND a.id_user = d.id_user GROUP BY b.id_retur_penjualan ORDER BY a.created_at DESC
                ")->result();

		$data = array(
			'title'    => 'Retur Penjualan',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'retur/penjualan',
			'action'   => 'retur/tambah_retur_penjualan',
			'retur' => $retur
		);
		$this->load->view('templates/main', $data);
	}

	public function tambah_retur_penjualan()
	{
		$nomor = $this->input->get('nomor');
		$queryPenjualan = "SELECT 
                            b.nama_cs, b.jenis_cs, c.nama_lengkap, c.telp_user, 
                            c.email_user, a.invoice, a.id_jual, a.method, a.tgl, SUM(d.subtotal) as subtotal  
                        FROM penjualan a, customer b, user c,  detil_penjualan d 
                        WHERE 
                            a.id_user = c.id_user AND a.id_cs = b.id_cs AND a.invoice = '$nomor' 
                            AND d.id_jual = a.id_jual ORDER BY a.id_jual DESC LIMIT 1";

		$penjualan = $this->db->query($queryPenjualan)->row();
		if (isset($penjualan)) {

			$queryDetilPenjualan = "SELECT 
                                        a.id_detil_jual, b.id_barang, b.nama_barang, b.barcode, a.qty_jual, a.harga_item, a.subtotal 
                                    FROM detil_penjualan a, barang b 
                                    WHERE a.id_barang = b.id_barang AND a.id_jual = '$penjualan->id_jual'";

			$detilPenjualan = $this->db->query($queryDetilPenjualan)->result();
		}

		$data = array(
			'title'    => 'Tambah Retur Penjualan',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'retur/form_retur_penjualan',
			'penjualan' =>  $penjualan,
			'detil'     => isset($penjualan) ? $detilPenjualan : ''
		);
		$this->load->view('templates/main', $data);
	}

	public function simpan_retur_penjualan()
	{
		$subtotal = 0;
		$returArr = [
			'nomor' => 'RTRJ' . date('dmYHis'),
			'id_user' => infoLogin()['id_user'],
			'id_penjualan' => $this->input->post('id_penjualan'),
			'catatan' =>  $this->input->post('catatan') == '' ? '-' : $this->input->post('catatan'),
		];
		$this->db->insert('retur_penjualan', $returArr);
		$retur = $this->db->query('SELECT * FROM retur_penjualan ORDER BY created_at DESC LIMIT 1')->row();
		foreach ($this->input->post('jumlah_retur') as $key => $data) {
			if ($data > 0) {
				if ($this->input->post('mutasi')[$key] == 'in') {
					$barang = $this->db->get_where('barang', ['id_barang' => $this->input->post('id_barang')[$key]])->row();
					$stokUpdate = $barang->stok + $data;
					$this->db->set(['stok' => $stokUpdate])->where('id_barang',  $this->input->post('id_barang')[$key])->update('barang');
				}

				$detilJual = $this->db->get_where('detil_penjualan', ['id_detil_jual' => $this->input->post('id_detil_jual')[$key]])->row();
				$stokDetilUpdate = $detilJual->qty_jual - $data;
				$isRetur = $stokDetilUpdate == 0 ? 1 : 0;
				$this->db->set([
					'harga_item' => $stokDetilUpdate == 0 ? 0 : $detilJual->harga_item,
					'subtotal' => $stokDetilUpdate * $detilJual->harga_item,
					'qty_jual' => $stokDetilUpdate,
					'is_retur' => $isRetur
				])
					->where('id_detil_jual',  $this->input->post('id_detil_jual')[$key])
					->update('detil_penjualan');

				$detailReturArr = [
					'id_retur_penjualan' => $retur->id_retur_penjualan,
					'id_barang' => $this->input->post('id_barang')[$key],
					'harga' => $this->input->post('harga_item')[$key],
					'jumlah' => $data,
					'subtotal' =>  $this->input->post('harga_item')[$key] * $data,
					'mutasi' => $this->input->post('mutasi')[$key],
					'kondisi' =>  $this->input->post('kondisi')[$key]
				];
				$this->db->insert('detil_retur_penjualan', $detailReturArr);
				$subtotal += $this->input->post('harga_item')[$key] * $data;
			}
		}

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
		$kas = array(
			'id_user'     => infoLogin()['id_user'],
			'kode_kas'    => $kodekas,
			'tanggal'     => date('Y-m-d H:i:s'),
			'jenis'       => 'Pengeluaran',
			'sumber'      => 'transaksi',
			'keterangan'  => 'Retur Penjualan dari kode invoice #' . $this->input->post('invoice'),
			'nominal'     => $subtotal,
		);

		$this->db->insert('kas', $kas);
	}

	public function get_detail_retur_penjualan($id)
	{
		$data = $this->db->query("
            SELECT b.barcode, b.nama_barang, a.jumlah, a.harga, a.subtotal, a.mutasi, a.kondisi
            FROM detil_retur_penjualan a, barang b
            WHERE a.id_barang = b.id_barang AND a.id_retur_penjualan = '$id'
        ")->result();

		echo json_encode($data);
	}

	public function pembelian()
	{
		$retur = $this->db->query("
                        SELECT a.id_retur_pembelian, a.catatan, a.nomor, SUM(b.subtotal) as nilai, SUM(b.jumlah) as jumlah, c.kode_beli, a.created_at, d.nama_lengkap
                        FROM retur_pembelian a, detil_retur_pembelian b, pembelian c, user d
                        WHERE a.id_retur_pembelian = b.id_retur_pembelian AND a.id_pembelian = c.id_beli AND a.id_user = d.id_user GROUP BY b.id_retur_pembelian ORDER BY a.created_at DESC
                ")->result();

		$data = array(
			'title'    => 'Retur Pembelian',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'retur/pembelian',
			'action'   => 'retur/tambah_retur_pembelian',
			'retur' => $retur
		);
		$this->load->view('templates/main', $data);
	}

	public function tambah_retur_pembelian()
	{
		$nomor = $this->input->get('nomor');
		$queryPembelian = "SELECT 
                            b.nama_supplier, b.telp_supplier, c.nama_lengkap, c.telp_user, 
                            c.email_user, a.kode_beli, a.id_beli, a.method, a.tgl, SUM(d.subtotal) as subtotal  
                        FROM pembelian a, supplier b, user c,  detil_pembelian d 
                        WHERE 
                            a.id_user = c.id_user AND a.id_supplier = b.id_supplier AND a.kode_beli = '$nomor' 
                            AND d.id_beli = a.id_beli ORDER BY a.id_beli DESC LIMIT 1";

		$pembelian = $this->db->query($queryPembelian)->row();
		if (isset($pembelian)) {

			$queryDetilPembelian = "SELECT 
                                        a.id_detil_beli, b.id_barang, b.nama_barang, b.barcode, a.qty_beli, a.hrg_beli, a.subtotal 
                                    FROM detil_pembelian a, barang b 
                                    WHERE a.id_barang = b.id_barang AND a.id_beli = '$pembelian->id_beli'";

			$detilPembelian = $this->db->query($queryDetilPembelian)->result();
		}

		$data = array(
			'title'    => 'Tambah Retur Pembelian',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'retur/form_retur_pembelian',
			'pembelian' =>  $pembelian,
			'detil'     => isset($pembelian) ? $detilPembelian : ''
		);
		$this->load->view('templates/main', $data);
	}

	public function simpan_retur_pembelian()
	{
		$subtotal = 0;
		$returArr = [
			'nomor' => 'RTRP' . date('dmYHis'),
			'id_user' => infoLogin()['id_user'],
			'id_pembelian' => $this->input->post('id_pembelian'),
			'catatan' =>  $this->input->post('catatan') == '' ? '-' : $this->input->post('catatan'),
		];
		$this->db->insert('retur_pembelian', $returArr);
		$retur = $this->db->query('SELECT * FROM retur_pembelian ORDER BY created_at DESC LIMIT 1')->row();
		foreach ($this->input->post('jumlah_retur') as $key => $data) {
			if ($data > 0) {
				if ($this->input->post('mutasi')[$key] == 'out') {
					$barang = $this->db->get_where('barang', ['id_barang' => $this->input->post('id_barang')[$key]])->row();
					$stokUpdate = $barang->stok - $data;
					$this->db->set(['stok' => $stokUpdate])->where('id_barang',  $this->input->post('id_barang')[$key])->update('barang');
				}

				$detilBeli = $this->db->get_where('detil_pembelian', ['id_detil_beli' => $this->input->post('id_detil_beli')[$key]])->row();
				$stokDetilUpdate = $detilBeli->qty_beli - $data;
				$isRetur = $stokDetilUpdate == 0 ? 1 : 0;
				$this->db->set([
					'hrg_beli' => $stokDetilUpdate == 0 ? 0 : $detilBeli->hrg_beli,
					'subtotal' => $stokDetilUpdate * $detilBeli->hrg_beli,
					'qty_beli' => $stokDetilUpdate,
					'is_retur' => $isRetur
				])
					->where('id_detil_beli',  $this->input->post('id_detil_beli')[$key])
					->update('detil_pembelian');

				$detailReturArr = [
					'id_retur_pembelian' => $retur->id_retur_pembelian,
					'id_barang' => $this->input->post('id_barang')[$key],
					'harga' => $this->input->post('harga_item')[$key],
					'jumlah' => $data,
					'subtotal' =>  $this->input->post('harga_item')[$key] * $data,
					'mutasi' => $this->input->post('mutasi')[$key],
					'kondisi' =>  $this->input->post('kondisi')[$key]
				];
				$this->db->insert('detil_retur_pembelian', $detailReturArr);
				$subtotal += $this->input->post('harga_item')[$key] * $data;
			}
		}

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
		$kas = array(
			'id_user'     => infoLogin()['id_user'],
			'kode_kas'    => $kodekas,
			'tanggal'     => date('Y-m-d H:i:s'),
			'jenis'       => 'Pemasukan',
			'sumber'      => 'transaksi',
			'keterangan'  => 'Retur Pembelian dari kode #' . $this->input->post('kode_beli'),
			'nominal'     => $subtotal,
		);

		$this->db->insert('kas', $kas);
	}

	public function get_detail_retur_pembelian($id)
	{
		$data = $this->db->query("
            SELECT b.barcode, b.nama_barang, a.jumlah, a.harga, a.subtotal, a.mutasi, a.kondisi
            FROM detil_retur_pembelian a, barang b
            WHERE a.id_barang = b.id_barang AND a.id_retur_pembelian = '$id'
        ")->result();

		echo json_encode($data);
	}
}
