<?php
include 'report_header.php';
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN RETUR PENJUALAN', 0, 1, 'C');
$pdf->SetFont('Times', 'B', 11);

$pdf->Cell(0, 7, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');
$sql = "SELECT a.id_retur_penjualan, a.nomor, a.created_at, b.invoice, c.nama_lengkap
        FROM retur_penjualan a, penjualan b, user c
        WHERE a.id_penjualan = b.id_jual AND a.id_user = c.id_user
        AND SUBSTRING(a.created_at, 1, 10) BETWEEN '$awal' AND '$akhir' 
        ORDER BY a.created_at DESC";

$sqldetil = "SELECT a.id_retur_penjualan, b.barcode, b.nama_barang, a.harga, a.jumlah, a.mutasi, a.subtotal
            FROM detil_retur_penjualan a, barang b
            WHERE a.id_barang = b.id_barang";

$detil = $this->db->query($sqldetil)->result_array();
$jual = $this->db->query($sql)->result_array();

foreach ($jual as $j) {
    $pdf->Cell(30, 17, '', 0, 1);
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(20, 6, 'NOMOR', 0, 0, 'L');
    $pdf->Cell(2, 6, ': ', 0, 0, 'C');
    $pdf->Cell(65, 6, $j['nomor'], 0, 0, 'L');
    $pdf->Cell(25, 6, 'KASIR', 0, 0, 'L');
    $pdf->Cell(3, 6, ': ', 0, 0, 'R');
    $pdf->Cell(50, 6, $j['nama_lengkap'], 0, 1, 'L');
    $pdf->Cell(30, 0, '', 0, 1);
    $pdf->Cell(20, 6, 'WAKTU', 0, 0, 'L');
    $pdf->Cell(3, 6, ': ', 0, 0, 'C');
    $pdf->Cell(64, 6, $j['created_at'], 0, 0, 'L');
    $pdf->Cell(25, 6, 'INVOICE', 0, 0, 'L');
    $pdf->Cell(3, 6, ': ', 0, 0, 'R');
    $pdf->Cell(20, 6, $j['invoice'], 0, 0, 'L');
    $pdf->Cell(30, 6, '', 0, 1);
    $i = 1;
    $a = 1;

    $pdf->SetFont('Times', 'B', 9);
    $pdf->Cell(7, 6, 'NO', 1, 0, 'C');
    $pdf->Cell(25, 6, 'KODE', 1, 0, 'C');
    $pdf->Cell(68, 6, 'ITEM', 1, 0, 'C');
    $pdf->Cell(25, 6, 'HARGA', 1, 0, 'C');
    $pdf->Cell(17, 6, 'QTY', 1, 0, 'C');
    $pdf->Cell(25, 6, 'MUTASI', 1, 0, 'C');
    $pdf->Cell(25, 6, 'SUBTOTAL', 1, 1, 'C');

    $total = 0;

    foreach ($detil as $d) {
        if ($j['id_retur_penjualan'] == $d['id_retur_penjualan']) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(7, 6, $i++, 1, 0);
            $pdf->Cell(25, 6, $d['barcode'], 1, 0);
            $pdf->Cell(68, 6, $d['nama_barang'], 1, 0);
            $pdf->Cell(25, 6, number_format($d['harga'], '0', '.', '.'), 1, 0);
            $pdf->Cell(17, 6, $d['jumlah'], 1, 0);
            $pdf->Cell(25, 6, strtoupper($d['mutasi']), 1, 0);
            $pdf->Cell(25, 6, number_format($d['subtotal'], '0', '.', '.'), 1, 1);
            $total += $d['subtotal'];
        }
    }

    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(28, 6, '', 0, 1, 'L');
    $pdf->Cell(132, 6, '', 0, 0, 'R');
    $pdf->Cell(28, 6, 'Grand Total', 1, 0, 'L');
    $pdf->Cell(32, 6, 'Rp. ' . number_format($total, '0', '.', '.') . ' ,-', 1, 1, 'L');
}

$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_retur_penjualan.pdf', 'I');
