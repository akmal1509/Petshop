 <li><a><i class="fa fa-shopping-cart"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('pembelian') ?>">Entry Pembelian</a></li>
         <li><a href="<?php echo base_url('dpembelian') ?>">Daftar Pembelian</a></li>
         <!-- <li><a href="<?php echo base_url('hutang') ?>">Hutang</a></li>
         <li><a href="<?php echo base_url('piutang') ?>">Piutang</a></li> -->
         <li><a href="<?php echo base_url('retur/pembelian') ?>">Retur Pembelian</a></li>
     </ul>
 </li>
 <li><a><i class="fa fa-desktop"></i> Master Data <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('barang') ?>">Data Barang</a></li>
         <li><a href="<?php echo base_url('kategori') ?>">Data Kategori Barang</a></li>
         <li><a href="<?php echo base_url('satuan') ?>">Data Satuan Barang</a></li>
         <li><a href="<?php echo base_url('supplier') ?>">Data Supplier</a></li>
         <!-- <li><a href="<?php //echo base_url('mutasi')
                            ?>">Mutasi Barang</a></li> -->
         <li><a href="<?php echo base_url('stokopname') ?>">Stok Opname</a></li>
         <li><a href="<?php echo base_url('stok') ?>">Stok In/Out</a></li>
     </ul>
 </li>
 <li><a><i class="fa fa-file-text-o"></i> Laporan <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
         <li><a href="<?php echo base_url('laporan/pembelian') ?>">Laporan Pembelian</a></li>
         <li><a href="<?php echo base_url('laporan/retur_pembelian') ?>">Laporan Retur Pembelian</a></li>
         <li><a href="<?php echo base_url('laporan/pemesanan') ?>">Laporan Pemesanan</a></li>
     </ul>
 </li>
 <li><a href="<?php echo base_url('barang/stok_habis') ?>"><i class="fa fa-shopping-bag"></i> Stok Habis </a>
 </li>
 <li><a href="<?php echo base_url('pemesanan') ?>"><i class="fa fa-server"></i> Pemesanan </a>
 </li>