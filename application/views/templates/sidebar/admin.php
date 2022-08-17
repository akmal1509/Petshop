 <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-home"></i> Dashboard </a>
 </li>
 <li><a><i class="fa fa-shopping-cart"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('penjualan') ?>">Entry Penjualan</a></li>
         <li><a href="<?php echo base_url('dpenjualan') ?>">Daftar Penjualan</a></li>
         <li><a href="<?php echo base_url('pembelian') ?>">Entry Pembelian</a></li>
         <li><a href="<?php echo base_url('dpembelian') ?>">Daftar Pembelian</a></li>
         <!-- <li><a href="<?php echo base_url('hutang') ?>">Hutang</a></li>
         <li><a href="<?php echo base_url('piutang') ?>">Piutang</a></li> -->
         <li><a href="<?php echo base_url('retur/penjualan') ?>">Retur Penjualan</a></li>
         <li><a href="<?php echo base_url('retur/pembelian') ?>">Retur Pembelian</a></li>
         <li><a href="<?php echo base_url('penggajian') ?>">Penggajian</a></li>
     </ul>
 </li>
 <li><a><i class="fa fa-desktop"></i> Master Data <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('barang') ?>">Data Barang</a></li>
         <li><a href="<?php echo base_url('kategori') ?>">Data Kategori Barang</a></li>
         <li><a href="<?php echo base_url('satuan') ?>">Data Satuan Barang</a></li>
         <li><a href="<?php echo base_url('supplier') ?>">Data Supplier</a></li>
         <li><a href="<?php echo base_url('customer') ?>">Data Pelanggan</a></li>
         <li><a href="<?php echo base_url('karyawan') ?>">Data Karyawan</a></li>
         <li><a href="<?php echo base_url('jabatan') ?>">Data Jabatan</a></li>
         <li><a href="<?php echo base_url('servis') ?>">Data Servis</a></li>
         <!-- <li><a href="<?php //echo base_url('mutasi')
                            ?>">Mutasi Barang</a></li> -->
         <li><a href="<?php echo base_url('stokopname') ?>">Stok Opname</a></li>
         <li><a href="<?php echo base_url('stok') ?>">Stok In/Out</a></li>
     </ul>
 </li>
 <li><a><i class="fa fa-money"></i> Keuangan <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('kas') ?>">Kas</a></li>
         <li><a href="<?php echo base_url('ppn') ?>">PPN</a></li>
         <!-- <li><a href="<?php //echo base_url('bank') 
                            ?>">Bank</a></li> -->
     </ul>
 </li>
 <li><a href="<?php echo base_url('denda') ?>"><i class="fa fa-shopping-bag"></i> Setting Denda </a>
 </li>

 <li><a><i class="fa fa-file-text-o"></i> Laporan <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('laporan/barang') ?>">Laporan Barang</a></li>
         <li><a href="<?php echo base_url('laporan/penjualan') ?>">Laporan Penjualan</a></li>
         <li><a href="<?php echo base_url('laporan/pembelian') ?>">Laporan Pembelian</a></li>
         <!-- <li><a href="<?php //echo base_url('laporan/mutasi')
                            ?>">Laporan Mutasi Barang</a></li> -->
         <li><a href="<?php echo base_url('laporan/stokopname') ?>">Laporan Stok Opname</a></li>
         <li><a href="<?php echo base_url('laporan/laba_rugi') ?>">Laporan Keuntungan</a></li>
         <li><a href="<?php echo base_url('laporan/kas') ?>">Laporan Kas</a></li>
         <!-- <li><a href="<?php //echo base_url('laporan/kas_bank') 
                            ?>">Laporan Kas Bank</a></li> -->
         <li><a href="<?php echo base_url('laporan/stok') ?>">Laporan Stok In/Out</a></li>
         <!-- <li><a href="<?php echo base_url('laporan/hutang') ?>">Laporan Hutang</a></li>
         <li><a href="<?php echo base_url('laporan/piutang') ?>">Laporan Piutang</a></li> -->
         <li><a href="<?php echo base_url('laporan/retur_penjualan') ?>">Laporan Retur Penjualan</a></li>
         <li><a href="<?php echo base_url('laporan/retur_pembelian') ?>">Laporan Retur Pembelian</a></li>
         <li><a href="<?php echo base_url('laporan/rekap') ?>">Rekap Laporan</a></li>
     </ul>
 </li>
 <li><a><i class="fa fa-user"></i> Management User <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('user') ?>">Data User</a></li>
         <li><a href="<?php echo base_url('userlog') ?>">User Log</a></li>
     </ul>
 </li>

 <li><a><i class="fa fa-bar-chart-o"></i> Grafik <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('grafik') ?>">Grafik</a></li>
     </ul>
 </li>
 <li><a><i class="fa fa-magic"></i> Tools <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('barcode') ?>">Generate Barcode</a></li>
         <li><a href="<?php echo base_url('backup') ?>">Backup Data</a></li>
         <li><a href="<?php echo base_url('applog') ?>">Application Log</a></li>
     </ul>
 </li>
 <li><a><i class="fa fa-gift"></i> Prestasi <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('prestasi') ?>">Index Prestasi</a></li>
     </ul>
 </li>
 <li><a><i class="fa fa-gears"></i> Setting <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('profil') ?>">Profil Toko</a></li>
         <!-- <li><a href="<?php //echo base_url('promo')
                            ?>">Setting Promo</a></li> -->
     </ul>
 </li>