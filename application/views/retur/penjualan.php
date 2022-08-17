<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?php echo $title ?></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-sm btn-primary" title="Tambah Data"><i class="fa fa-plus"></i> Tambah Data</button>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php echo $this->session->flashdata('message'); ?>
                        <table width="100%" class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Retur</th>
                                    <th>Nomor Penjualan</th>
                                    <th>Kasir</th>
                                    <th>Jumlah</th>
                                    <th>Nilai</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($retur as $key => $item) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $item->nomor ?></td>
                                        <td><?= $item->invoice ?></td>
                                        <td><?= $item->nama_lengkap ?></td>
                                        <td><?= $item->jumlah ?></td>
                                        <td>Rp. <?= number_format($item->nilai) ?></td>
                                        <td><?= $item->created_at ?></td>
                                        <td><?= $item->catatan ?></td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-xs detail-retur-jual" data-id="<?= $item->id_retur_penjualan ?>"><i class="fa fa-search"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'search.php'; ?>
<?php include 'script.php'; ?>
<?php include 'detail_retur_penjualan.php'; ?>