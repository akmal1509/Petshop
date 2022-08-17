<?php
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->setMargins(6, 10, 20);
// $pdf->SetAutoPageBreak(true,30);
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 18);
$profil = $this->db->get('profil_perusahaan')->row_array();
$pdf->Image('./assets/img/profil/' . $profil['logo_toko'], 6, 4, 13, 13);
$pdf->Cell(25);
$pdf->Cell(0, -6, '', 0, 1);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(85, 6, $profil['nama_toko'], 0, 1, 'C');
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell(85, 2, $profil['alamat_toko'], 0, 1, 'C');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(85, 6, 'Telp : ' . $profil['telp_toko'] . ' / Fax : ' . $profil['fax_toko'], 0, 1, 'C');

$max_id = "SELECT MAX(id_jual) AS id_jual FROM penjualan";
$id = implode($this->db->query($max_id)->row_array());

if ($id_resi == null) {
	$sql_general = "SELECT a.*, b.username,b.id_user, a.method FROM penginapan a, user b WHERE a.id_user = b.id_user AND a.id_penginapan = '$id'";
	$sql_detail = "SELECT * FROM detil_penginapan WHERE id_penginapan = '$id'";
	$sql_total = "SELECT SUM(subtotal) AS total, SUM(diskon) AS diskon FROM detil_penginapan WHERE id_penginapan = '$id'";
} else {
	$sql_general = "SELECT a.*, b.username, b.id_user, a.method FROM penginapan a, user b WHERE a.id_user = b.id_user AND a.id_penginapan = '$id_resi'";
	$sql_detail = "SELECT * FROM detil_penginapan WHERE id_penginapan = '$id_resi'";
	$sql_total = "SELECT SUM(subtotal) AS total, SUM(diskon) AS diskon FROM detil_penginapan WHERE id_penginapan = '$id_resi'";
}
$general = $this->db->query($sql_general)->row_array();
$detail = $this->db->query($sql_detail)->result_array();
$total = $this->db->query($sql_total)->row_array();

$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(70, 6, '-----------------------------------------------------------------------------', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(56, 5, 'PELANGGAN : ' . $general['konsumen'], 0, 0, 'L');
$pdf->Cell(32, 5, $general['method'], 0, 1, 'L');
$pdf->Cell(32, 2, $general['tanggal'], 0, 0, 'L');
$pdf->Cell(35, 2, $general['username'] . $general['id_user'], 0, 1, 'R');

$pdf->Cell(70, 6, '-----------------------------------------------------------------------------', 0, 1, 'C');

$pdf->Cell(56, 5, 'Status Makanan : ' . $general['status_makanan'], 0, 1, 'L');
$pdf->Cell(56, 5, 'Deskripsi : ', 0, 1, 'L');
$pdf->Cell(56, 2, $general['deskripsi'], 0, 1, 'L');

$pdf->Cell(70, 6, '-----------------------------------------------------------------------------', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 8);
if ($this->db->query($sql_detail)->num_rows() > 0) {

	$pdf->Cell(32, 5, 'PENITIPAN :', 0, 1, 'L');
}

foreach ($detail as $d) {
	$pdf->Cell(49, 2, $d['nama_servis'] . ' (' . $d['hewan'] . ')', 0, 0, 'L');
	$pdf->Cell(4, 2, 'x1', 0, 0, 'L');
	$pdf->Cell(20, 2, number_format($d['subtotal']), 0, 1, 'R');
	$pdf->Cell(47, 5, $d['tanggal_awal'] . ' s/d ' . $d['tanggal_akhir'], 0, 0, 'L');
	$pdf->Cell(10, 5, 'Diskon:', 0, 0, 'L');
	$pdf->Cell(4, 5, $d['diskon'], 0, 1, 'L');
}
$pdf->SetFont('helvetica', '', 8);

$pdf->Cell(73, 6, '----------------------------------------', 0, 1, 'R');
$pdf->Cell(54, 3, 'GRAND TOTAL', 0, 0, 'R');
$pdf->Cell(3, 3, ':', 0, 0, 'R');
$pdf->Cell(20, 3, 'Rp. ' . number_format($total['total'], '0', '.', '.'), 0, 1, 'L');
$pdf->Cell(54, 5, 'DISKON', 0, 0, 'R');
$pdf->Cell(3, 5, ':', 0, 0, 'R');
$pdf->Cell(20, 5, 'Rp. ' . number_format($total['diskon'], '0', '.', '.'), 0, 1, 'L');
$pdf->Cell(54, 5, 'B. ANTAR JEMPUT', 0, 0, 'R');
$pdf->Cell(3, 5, ':', 0, 0, 'R');
$pdf->Cell(20, 5, 'Rp. ' . number_format($general['biaya_antar_jemput'], '0', '.', '.'), 0, 1, 'L');
$pdf->Cell(54, 5, 'TOTAL', 0, 0, 'R');
$pdf->Cell(3, 5, ':', 0, 0, 'R');
$pdf->Cell(20, 5, 'Rp. ' . number_format($total['total'] + $general['biaya_antar_jemput'], '0', '.', '.'), 0, 1, 'L');
$pdf->Cell(54, 5, 'TUNAI', 0, 0, 'R');
$pdf->Cell(3, 5, ':', 0, 0, 'R');
$pdf->Cell(20, 5, 'Rp. ' . number_format($general['bayar'], '0', '.', '.'), 0, 1, 'L');
$pdf->Cell(54, 5, 'KEMBALI', 0, 0, 'R');
$pdf->Cell(3, 5, ':', 0, 0, 'R');
$pdf->Cell(20, 5, 'Rp. ' . number_format($general['kembali'], '0', '.', '.'), 0, 1, 'L');

$pdf->Cell(73, 8, '', 0, 1, 'R');
$pdf->Cell(73, 4, '', 0, 1, 'C');
$pdf->Cell(73, 4, '=== TERIMA KASIH SUDAH BERBELANJA ===', 0, 1, 'C');
$pdf->Cell(73, 4, ' BARANG YANG SUDAH DIBELI TIDAK BOLEH DIKEMBALIKAN', 0, 1, 'C');

$pdf->Output('struk_penginapan' . '.pdf', 'I');
