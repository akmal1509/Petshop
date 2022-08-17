<?php
include 'report_header.php';

$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN REKAP', 0, 1, 'C');
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(0, 7, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');
$penjualanTunai = $this->db->query("SELECT SUM(bayar - kembali) AS penjualan_tunai 
                                    FROM penjualan WHERE SUBSTRING(tgl, 1, 10) BETWEEN '$awal' AND '$akhir' 
                                    AND method = 'Cash' OR method = 'Kredit'")->row();
$penjualanDebit = $this->db->query("SELECT SUM(bayar - kembali) AS penjualan_debit 
                                    FROM penjualan WHERE SUBSTRING(tgl, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir' AND method = 'Debit'")->row();
$returPenjualan = $this->db->query("SELECT SUM(b.subtotal) AS retur 
                                    FROM retur_penjualan a, detil_retur_penjualan b WHERE SUBSTRING(a.created_at, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir' AND a.id_retur_penjualan = b.id_retur_penjualan")->row();
$jumlahPiutang = $this->db->query("SELECT SUM(jml_piutang) AS piutang 
                                    FROM piutang WHERE SUBSTRING(tgl_piutang, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir'")->row();
$bayarPiutang = $this->db->query("SELECT SUM(bayar) AS bayar 
                                    FROM piutang WHERE SUBSTRING(tgl_piutang, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir'")->row();
$sisaPiutang = $this->db->query("SELECT SUM(sisa) AS sisa 
                                    FROM piutang WHERE SUBSTRING(tgl_piutang, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir'")->row();

$pdf->Cell(30, 8, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(120, 6, 'NAMA', 1, 0, 'C');
$pdf->Cell(70, 6, 'TOTAL', 1, 1, 'C');

$pdf->SetFont('Times', '', 9);
$pdf->Cell(120, 6, 'Penjualan Tunai', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($penjualanTunai->penjualan_tunai, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Penjualan Non Tunai', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($penjualanDebit->penjualan_debit, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Penjualan Tunai & Non Tunai', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($penjualanTunai->penjualan_tunai + $penjualanDebit->penjualan_debit, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Retur Penjualan', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($returPenjualan->retur, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Total Piutang', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($jumlahPiutang->piutang, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Piutang Terbayar', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($bayarPiutang->bayar, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Sisa Piutang', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($sisaPiutang->sisa, '0', '.', '.'), 1, 1);

$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(120, 6, 'NETTO PENJUALAN', 1, 0, 'C');
$pdf->Cell(70, 6, 'Rp. ' . number_format(($penjualanTunai->penjualan_tunai + $penjualanDebit->penjualan_debit) - $returPenjualan->retur, '0', '.', '.'), 1, 1, 'C');

$pembelianTunai = $this->db->query("SELECT SUM(bayar - kembali) AS pembelian_tunai 
                                    FROM pembelian WHERE SUBSTRING(tgl, 1, 10) BETWEEN '$awal' AND '$akhir' 
                                    AND method = 'Cash' OR method = 'Kredit'")->row();
$pembelianDebit = $this->db->query("SELECT SUM(bayar - kembali) AS pembelian_debit 
                                    FROM pembelian WHERE SUBSTRING(tgl, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir' AND method = 'Debit'")->row();
$returPembelian = $this->db->query("SELECT SUM(b.subtotal) AS retur 
                                    FROM retur_pembelian a, detil_retur_pembelian b WHERE SUBSTRING(a.created_at, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir' AND a.id_retur_pembelian = b.id_retur_pembelian")->row();
$jumlahHutang = $this->db->query("SELECT SUM(jml_hutang) AS hutang 
                                    FROM hutang WHERE SUBSTRING(tgl_hutang, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir'")->row();
$bayarHutang = $this->db->query("SELECT SUM(bayar) AS bayar 
                                    FROM hutang WHERE SUBSTRING(tgl_hutang, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir'")->row();
$sisaHutang = $this->db->query("SELECT SUM(sisa) AS sisa 
                                    FROM hutang WHERE SUBSTRING(tgl_hutang, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir'")->row();

$pdf->SetFont('Times', '', 9);
$pdf->Cell(120, 6, 'Pembelian Tunai', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($pembelianTunai->pembelian_tunai, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Pembelian Non Tunai', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($pembelianDebit->pembelian_debit, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Pembelian Tunai & Non Tunai', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($pembelianTunai->pembelian_tunai + $pembelianDebit->pembelian_debit, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Retur Pembelian', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($returPembelian->retur, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Total Hutang', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($jumlahHutang->hutang, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Hutang Terbayar', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($bayarHutang->bayar, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Sisa Hutang', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($sisaHutang->sisa, '0', '.', '.'), 1, 1);

$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(120, 6, 'NETTO PEMBELIAN', 1, 0, 'C');
$pdf->Cell(70, 6, 'Rp. ' . number_format(($pembelianTunai->pembelian_tunai + $pembelianDebit->pembelian_debit) - $returPembelian->retur), 1, 1, 'C');

// $ppnMasukan = $this->db->query("SELECT SUM(nominal) AS masukan 
//                                     FROM pajak_ppn WHERE SUBSTRING(tanggal, 1, 10) BETWEEN '$awal' AND '$akhir' 
//                                     AND jenis = 'PPN Disetorkan'")->row();
// $ppnKeluaran = $this->db->query("SELECT SUM(nominal) AS keluaran 
//                                     FROM pajak_ppn WHERE SUBSTRING(tanggal, 1, 10) BETWEEN '$awal' AND '$akhir' 
//                                     AND jenis = 'PPN Keluaran'")->row();
$pemasukanLain = $this->db->query("SELECT SUM(nominal) AS pemasukan 
                                    FROM kas WHERE SUBSTRING(tanggal, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir' AND jenis = 'Pemasukan'")->row();
$pengeluaranLain = $this->db->query("SELECT SUM(nominal) AS pengeluaran 
                                    FROM kas WHERE SUBSTRING(tanggal, 1, 10) BETWEEN '$awal' 
                                    AND '$akhir' AND jenis = 'Pengeluaran'")->row();

$pdf->SetFont('Times', '', 9);
// $pdf->Cell(120, 6, 'Pajak PPN Disetorkan', 1, 0);
// $pdf->Cell(70, 6, 'Rp. ' . number_format($ppnMasukan->masukan, '0', '.', '.'), 1, 1);
// $pdf->Cell(120, 6, 'Pajak PPN Keluaran', 1, 0);
// $pdf->Cell(70, 6, 'Rp. ' . number_format($ppnKeluaran->keluaran, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Jumlah Pemasukan', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($pemasukanLain->pemasukan, '0', '.', '.'), 1, 1);
$pdf->Cell(120, 6, 'Jumlah Pengeluaran', 1, 0);
$pdf->Cell(70, 6, 'Rp. ' . number_format($pengeluaranLain->pengeluaran, '0', '.', '.'), 1, 1);

$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(120, 6, 'NETTO SALDO', 1, 0, 'C');
$pdf->Cell(70, 6, 'Rp. ' .  number_format($pemasukanLain->pemasukan + $pengeluaranLain->pengeluaran, '0', '.', '.'), 1, 1, 'C');


$pdf->Output('laporan_rekap.pdf', 'I');
