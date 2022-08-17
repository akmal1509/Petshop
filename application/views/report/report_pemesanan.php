<?php
include 'report_header.php';
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN PEMESANAN', 0, 1, 'C');
$pdf->SetFont('Times', 'B', 11);

$pdf->Cell(0, 7, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');
$sql = "SELECT a.id, a.tanggal, a.status,a.nama_pemesanan, b.nama_lengkap FROM pemesanan a, user b WHERE a.id_user = b.id_user AND SUBSTRING(a.tanggal, 1, 10) BETWEEN '$awal' AND '$akhir'";

$sqldetil = "SELECT a.id, a.id_pemesanan, a.jumlah, b.nama_barang, b.barcode FROM detil_pemesanan a, barang b WHERE a.id_barang = b.id_barang";


$detil = $this->db->query($sqldetil)->result_array();
$jual = $this->db->query($sql)->result_array();

foreach ($jual as $j) {
    $pdf->Cell(30, 17, '', 0, 1);
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(20, 6, 'USER', 0, 0, 'L');
    $pdf->Cell(2, 6, ': ', 0, 0, 'C');
    $pdf->Cell(65, 6, $j['nama_lengkap'], 0, 0, 'L');
    $pdf->Cell(25, 6, 'TANGGAL', 0, 0, 'L');
    $pdf->Cell(3, 6, ': ', 0, 0, 'R');
    $pdf->Cell(50, 6, $j['tanggal'], 0, 1, 'L');
    $pdf->Cell(30, 0, '', 0, 1);
    $pdf->Cell(20, 6, 'NAMA', 0, 0, 'L');
    $pdf->Cell(3, 6, ': ', 0, 0, 'C');
    $pdf->Cell(64, 6, $j['nama_pemesanan'], 0, 0, 'L');
    $pdf->Cell(25, 6, 'STATUS', 0, 0, 'L');
    $pdf->Cell(3, 6, ': ', 0, 0, 'C');
    $pdf->Cell(64, 6, $j['status'] == 'pending' ? 'Pending' : ($j['status'] == 'submit' ? 'Disubmit' : ($j['status'] == 'acc' ? 'Disetujui' : 'Ditolak')), 0, 0, 'L');
    $pdf->Cell(30, 6, '', 0, 1);
    $i = 1;
    $a = 1;
    //if ($this->db->query($sqldetil)->num_rows() > 0) {

    $pdf->SetFont('Times', 'B', 9);
    $pdf->Cell(7, 6, 'NO', 1, 0, 'C');
    $pdf->Cell(25, 6, 'KODE', 1, 0, 'C');
    $pdf->Cell(125, 6, 'ITEM', 1, 0, 'C');
    $pdf->Cell(30, 6, 'JUMLAH', 1, 1, 'C');


    foreach ($detil as $d) {
        if ($j['id'] == $d['id_pemesanan']) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(7, 6, $i++, 1, 0);
            $pdf->Cell(25, 6, $d['barcode'], 1, 0);
            $pdf->Cell(125, 6, $d['nama_barang'], 1, 0);
            $pdf->Cell(30, 6, $d['jumlah'], 1, 1);
        }
    }
}
// }

$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_penjualan.pdf', 'I');
