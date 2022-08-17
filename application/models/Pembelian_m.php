<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_m extends CI_Model
{

    protected $table = 'pembelian';
    protected $primary = 'id_beli';

    public function getAllData()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getDataById($id)
    {
        return $this->db->get_where($this->table, ['id_beli' => $id])->result_array();
    }

    public function getDetilBeli()
    {
        $sql = "SELECT a.id_detil_beli, b.barcode, b.nama_barang, b.harga_beli, b.harga_jual, a.qty_beli, a.subtotal FROM detil_pembelian a, barang b WHERE b.id_barang = a.id_barang AND a.id_beli IS NULL";
        return $this->db->query($sql)->result_array();
    }

    public function getDetilBeliById($id)
    {
        $sql = "SELECT a.id_detil_beli, b.barcode, b.nama_barang, b.harga_beli, b.harga_jual, a.qty_beli, a.subtotal FROM detil_pembelian a, barang b WHERE b.id_barang = a.id_barang AND a.id_beli = '$id'";
        return $this->db->query($sql)->result_array();
    }

    public function addItem($id, $qty, $subtotal, $jual, $beli)
    {
        $this->db->select("RIGHT (detil_pembelian.kode_detil_beli, 7) as kode_detil_beli", false);
        $this->db->order_by("kode_detil_beli", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('detil_pembelian');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_detil_beli) + 1;
        } else {
            $kode = 1;
        }
        $kodebeli = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $detilbeli = "DB-" . $kodebeli;
        $data = array(
            'id_barang'           => $id,
            'kode_detil_beli'     => $detilbeli,
            'hrg_beli'            => $beli,
            'hrg_jual'            => $jual,
            'qty_beli'            => $qty,
            'subtotal'            => $subtotal,

        );
        $this->db->insert('detil_pembelian', $data);
        $sqlstok = "select stok from barang where id_barang = '$id'";
        $stok = implode($this->db->query($sqlstok)->row_array());
        $hasil = $stok + $qty;
        $barang = array(
            'harga_beli'  => $beli,
            'harga_jual'  => $jual,
            'stok'        => $hasil
        );

        $this->db->set($barang)->where('id_barang', $id)->update('barang');
        $sql = "SELECT sum(subtotal) as subtotal FROM detil_pembelian WHERE id_beli IS NULL";
        $data = $this->db->query($sql)->row_array();
        echo json_encode($data);
    }
    public function addItemById($id, $qty, $subtotal, $jual, $beli, $id_beli)
    {
        $this->db->select("RIGHT (detil_pembelian.kode_detil_beli, 7) as kode_detil_beli", false);
        $this->db->order_by("kode_detil_beli", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('detil_pembelian');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_detil_beli) + 1;
        } else {
            $kode = 1;
        }
        $kodebeli = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $detilbeli = "DB-" . $kodebeli;
        $data = array(
            'id_beli'           => $id_beli,
            'id_barang'           => $id,
            'kode_detil_beli'     => $detilbeli,
            'hrg_beli'            => $beli,
            'hrg_jual'            => $jual,
            'qty_beli'            => $qty,
            'subtotal'            => $subtotal,

        );
        $this->db->insert('detil_pembelian', $data);
        $sqlstok = "select stok from barang where id_barang = '$id'";
        $stok = implode($this->db->query($sqlstok)->row_array());
        $hasil = $stok + $qty;
        $barang = array(
            'harga_beli'  => $beli,
            'harga_jual'  => $jual,
            'stok'        => $hasil
        );

        $this->db->set($barang)->where('id_barang', $id)->update('barang');
        $sql = "SELECT sum(subtotal) as subtotal FROM detil_pembelian WHERE id_beli IS NULL";
        $data = $this->db->query($sql)->row_array();
        echo json_encode($data);
    }

    public function hapusDetail($id)
    {
        $getDetil = $this->db->get_where('detil_pembelian', ['id_detil_beli' => $id])->row_array();
        $qty = $getDetil['qty_beli'];
        $idBrg = $getDetil['id_barang'];
        $getBrg = $this->db->get_where('barang', ['id_barang' => $idBrg])->row_array();
        $stokBrg = $getBrg['stok'];
        $stok = $stokBrg - $qty;
        $updateStok = $this->db->set(array('stok' => $stok))->where('id_barang', $idBrg)->update('barang');

        $sql = "delete from detil_pembelian where id_detil_beli = '$id'";
        $this->db->query($sql);

        $totalbeli = "SELECT sum(subtotal) as subtotalbeli FROM detil_pembelian WHERE id_beli IS NULL";
        $data = $this->db->query($totalbeli)->row_array();
        echo json_encode($data);
    }

    public function simpanPembelian()
    {
        $this->db->select("RIGHT (pembelian.kode_beli, 7) as kode_beli", false);
        $this->db->order_by("kode_beli", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('pembelian');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_beli) + 1;
        } else {
            $kode = 1;
        }
        $kodebeli = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $beli = "PB-" . $kodebeli;
        $kembalian = $this->input->post('kembali');
        $bayar = $this->input->post('bayar');
        $metode = $this->input->post('metode');

        if ($kembalian < 0) {
            $kembalian = 0;
        }

        $data = array(
            'id_supplier'    => htmlspecialchars($this->input->post('sup'), true),
            'id_user'        => htmlspecialchars($this->input->post('kasir'), true),
            'kode_beli'      => $beli,
            'tgl_faktur'     => htmlspecialchars($this->input->post('tgl_faktur'), true),
            'faktur_beli'    => htmlspecialchars($this->input->post('no_faktur'), true),
            'diskon'         => htmlspecialchars($this->input->post('diskon1'), true),
            'method'         => $metode,
            'total'          => htmlspecialchars($this->input->post('grandtotal'), true),
            'bayar'          => htmlspecialchars($bayar, true),
            'kembali'        => htmlspecialchars($kembalian, true),
            'tgl'            => date('Y-m-d H:i:s'),
            'is_active'      => 1,
            'status'         => htmlspecialchars($this->input->post('status'), true)
        );
        $this->db->insert('pembelian', $data);

        $idbeli = "select max(id_beli) as id_beli from pembelian";
        $id = implode($this->db->query($idbeli)->row_array());
        $sql = "update detil_pembelian set id_beli = '$id' where id_beli is null";
        $this->db->query($sql);

        if ($this->input->post('status') == 1) {

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
                'id_user'     => htmlspecialchars($this->input->post('kasir'), true),
                'kode_kas'    => $kodekas,
                'tanggal'     => date('Y-m-d H:i:s'),
                'jenis'       => 'Pengeluaran',
                'sumber'      => 'transaksi',
                'keterangan'  => 'Pembelian',
                'nominal'     => $nominal,
            );
            $this->db->insert('kas', $kas);

            $kembali = $this->input->post('kembali');

            if ($kembali < 0 || $metode == "Kredit") {
                $jml_hutang = abs($kembali);
                $hutang = array(
                    'id_beli'       => $id,
                    'tgl_hutang'    => date('Y-m-d H:i:s'),
                    'jml_hutang'    => $jml_hutang,
                    'bayar'         => 0,
                    'sisa'          => $jml_hutang,
                    'status'        => 'Belum Lunas',
                    'jatuh_tempo'   => $this->input->post('tempo'),
                );
                $this->db->insert('hutang', $hutang);
            }
        } else {
            $kembali = $this->input->post('kembali');

            if ($kembali < 0 || $metode == "Kredit") {
                $jml_hutang = abs($kembali);
                $hutang = array(
                    'id_beli'       => $id,
                    'tgl_hutang'    => date('Y-m-d H:i:s'),
                    'jml_hutang'    => $jml_hutang,
                    'bayar'         => 0,
                    'sisa'          => $jml_hutang,
                    'status'        => 'Belum Lunas',
                    'jatuh_tempo'   => $this->input->post('tempo'),
                );
                $this->db->insert('hutang', $hutang);
            }
        }
    }
    public function updatePembelian()
    {
        $this->db->select("RIGHT (pembelian.kode_beli, 7) as kode_beli", false);
        $this->db->order_by("kode_beli", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('pembelian');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_beli) + 1;
        } else {
            $kode = 1;
        }
        $kodebeli = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $beli = "PB-" . $kodebeli;
        $kembalian = $this->input->post('kembali');
        $bayar = $this->input->post('bayar');
        $metode = $this->input->post('metode');

        if ($kembalian < 0) {
            $kembalian = 0;
        }

        $data = array(
            'id_supplier'    => htmlspecialchars($this->input->post('sup'), true),
            'id_user'        => htmlspecialchars($this->input->post('kasir'), true),
            'kode_beli'      => $beli,
            'tgl_faktur'     => htmlspecialchars($this->input->post('tgl_faktur'), true),
            'faktur_beli'    => htmlspecialchars($this->input->post('no_faktur'), true),
            'diskon'         => htmlspecialchars($this->input->post('diskon1'), true),
            'method'         => $metode,
            'total'          => htmlspecialchars($this->input->post('grandtotal'), true),
            'bayar'          => htmlspecialchars($bayar, true),
            'kembali'        => htmlspecialchars($kembalian, true),
            'tgl'            => date('Y-m-d H:i:s'),
            'is_active'      => 1,
            'status'         => htmlspecialchars($this->input->post('status'), true),
        );
        $this->db->set($data);
        $this->db->where('id_beli', $this->input->post('id_beli'));
        $this->db->update('pembelian');
        $idbeli = "select max(id_beli) as id_beli from pembelian";
        $id = implode($this->db->query($idbeli)->row_array());
        $sql = "update detil_pembelian set id_beli = '$id' where id_beli is null";
        $this->db->query($sql);

        $check_hutang = $this->db->get_where('hutang', ['id_beli' => $id]);
        if ($this->input->post('status') == 1) {

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
                'id_user'     => htmlspecialchars($this->input->post('kasir'), true),
                'kode_kas'    => $kodekas,
                'tanggal'     => date('Y-m-d H:i:s'),
                'jenis'       => 'Pengeluaran',
                'sumber'      => 'transaksi',
                'keterangan'  => 'Pembelian',
                'nominal'     => $nominal,
            );
            $this->db->insert('kas', $kas);

            $kembali = $this->input->post('kembali');

            if ($kembali < 0 || $metode == "Kredit") {
                $jml_hutang = abs($kembali);
                $hutang = array(
                    'id_beli'       => $id,
                    'tgl_hutang'    => date('Y-m-d H:i:s'),
                    'jml_hutang'    => $jml_hutang,
                    'bayar'         => 0,
                    'sisa'          => $jml_hutang,
                    'status'        => 'Belum Lunas',
                    'jatuh_tempo'   => $this->input->post('tempo'),
                );
                if ($check_hutang->num_rows() > 0) {
                    $this->db->set($hutang)->where('id_beli', $id)->update('hutang');
                } else {
                    $this->db->insert('hutang', $hutang);
                }
            } else {
                $this->db->where('id_beli', $id)->delete('hutang');
            }
        } else {
            $kembali = $this->input->post('kembali');

            if ($kembali < 0 || $metode == "Kredit") {

                $hutang = array(
                    'id_beli'       => $id,
                    'tgl_hutang'    => date('Y-m-d H:i:s'),
                    'status'        => 'Belum Lunas',
                    'jatuh_tempo'   => $this->input->post('tempo'),
                );
                if ($check_hutang->num_rows() > 0) {
                    $this->db->set($hutang)->where('id_beli', $id)->update('hutang');
                } else {
                    $this->db->insert('hutang', $hutang);
                }
            } else {
                $this->db->where('id_beli', $id)->delete('hutang');
            }
        }
    }

    public function editDetail($id, $qty, $hakhir)
    {
        $data = array(
            'qty_beli'     => $qty,
            'subtotal'     => $hakhir,
        );
        return $this->db->set($data)->where('id_detil_beli', $id)->update('detil_pembelian');
    }

    public function editStatus($id, $status)
    {
        $sales = $this->db->get_where('pembelian', ['id_beli' => $id])->row();
        $sales_detail = $this->db->query("SELECT SUM(subtotal) as total FROM detil_pembelian WHERE id_beli = '$sales->id_beli'")->row();

        $nominal_kas = $sales->bayar - $sales->kembali;
        $hutang = $sales_detail->total - $sales->bayar;

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
            'id_user'     => $sales->id_user,
            'kode_kas'    => $kodekas,
            'tanggal'     => date('Y-m-d H:i:s'),
            'jenis'       => 'Pengeluaran',
            'sumber'      => 'transaksi',
            'keterangan'  => 'Pembelian',
            'nominal'     => $nominal_kas,
        );
        $this->db->insert('kas', $kas);
        $check_hutang = $this->db->get_where('hutang', ['id_beli' => $id]);

        if ($check_hutang->num_rows() > 0) {
            $hutang = array(
                'jml_hutang'    => $hutang,
                'bayar'         => 0,
                'sisa'          => $hutang,
            );
            $this->db->set($hutang)->where('id_beli', $id)->update('hutang');
        }

        $data = [
            "status" => $status
        ];
        $this->db->set($data)->where('id_beli', $id)->update('pembelian');
    }
}
