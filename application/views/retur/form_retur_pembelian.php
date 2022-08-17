<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $title ?></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Buat Retur Pembelian</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="<?= base_url('retur/simpan_retur_pembelian') ?>" method="post" id="formSubmit">
                            <section class="content invoice">
                                <?php if (isset($pembelian)) : ?>
                                    <input type="hidden" name="id_pembelian" class="form-control" value="<?= $pembelian->id_beli ?>">
                                    <input type="hidden" name="kode_beli" class="form-control" value="<?= $pembelian->kode_beli ?>">
                                    <div class="row" style="margin-bottom: 40px;">
                                        <div class="invoice-header">
                                            <h3>
                                                Total Pembelian
                                                <strong class="pull-right">Rp. <?= number_format($pembelian->subtotal) ?></strong>
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="row invoice-info" style="margin-bottom: 30px;">
                                        <div class="col-sm-4 invoice-col">
                                            Supplier :
                                            <address>
                                                <strong><?= $pembelian->nama_supplier ?></strong>
                                                <br><?= $pembelian->telp_supplier ?>
                                            </address>
                                        </div>

                                        <div class="col-sm-4 invoice-col">
                                            Kasir :
                                            <address>
                                                <strong><?= $pembelian->nama_lengkap ?></strong>
                                                <br>Phone: <?= $pembelian->telp_user ?>
                                                <br>Email: <?= $pembelian->email_user ?>
                                            </address>
                                        </div>

                                        <div class="col-sm-4 invoice-col">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <b>Nomor Transaksi</b>
                                                    </td>
                                                    <td width="5%"> : </td>
                                                    <td> #<?= $pembelian->kode_beli ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>Pembayaran</b>
                                                    </td>
                                                    <td width="5%"> : </td>
                                                    <td> <?= $pembelian->method ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="50%">
                                                        <b>Waktu Transaksi</b>
                                                    </td>
                                                    <td width="5%"> : </td>
                                                    <td> <?= $pembelian->tgl ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 40px;">
                                        <div class="  table">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th width="9%">Max. Jumlah Retur</th>
                                                        <th width="7%">Jumlah Retur</th>
                                                        <th width="8%">Stok</th>
                                                        <th width="10%">Kondisi</th>
                                                        <th>Harga</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($detil as $item) : ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $item->barcode ?></td>
                                                            <td><?= $item->nama_barang ?></td>
                                                            <td><?= $item->qty_beli ?></td>
                                                            <td>
                                                                <input type="hidden" class="form-control" value="<?= $item->hrg_beli ?>" name="harga_item[]" id="harga_item_<?= $no - 1 ?>">
                                                                <input type="hidden" class="form-control" value="<?= $item->id_barang ?>" name="id_barang[]">
                                                                <input type="hidden" class="form-control" value="<?= $item->id_detil_beli ?>" name="id_detil_beli[]">
                                                                <select name="jumlah_retur[]" id="jumlah_retur" class="form-control jumlah_retur">
                                                                    <?php for ($i = 0; $i <= $item->qty_beli; $i++) : ?>
                                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="mutasi[]" class="form-control" id="mutasi">
                                                                    <!-- <option value="in">Masuk</option> -->
                                                                    <option value="out">Keluar</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="kondisi[]" class="form-control" id="kondisi">
                                                                    <option value="baik">Baik / Layak</option>
                                                                    <option value="rusak">Rusak</option>
                                                                </select>
                                                            </td>
                                                            <td>Rp. <?= number_format($item->hrg_beli) ?></td>
                                                            <td>Rp.<?= number_format($item->subtotal) ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead">Catatan :</p>
                                            <textarea name="catatan" class="form-control" id="" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="col-md-4 pull-right">
                                            <p class="lead">Rincian :</p>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width:70%">Total Pembelian :</th>
                                                            <td>Rp. <?= number_format($pembelian->subtotal) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Jumlah Retur :</th>
                                                            <td id="total_jumlah_retur">0</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Retur :</th>
                                                            <td id="total_retur">Rp. 0</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-print">
                                        <div class=" ">
                                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-send"></i> Submit</button>
                                            <a href="<?= base_url('retur/pembelian') ?>" class="btn btn-danger pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Cancel</a>
                                        </div>
                                    </div>
                        </form>
                    <?php else : ?>
                        <div>
                            <img src="<?= base_url('assets/img/illustrations/empty.svg')  ?>" alt="" style=" display: block; margin-top: 50px; margin-left: auto; margin-right: auto; width: 30%;">
                        </div>
                        <h3 class="text-center" style="margin-top: 60px; margin-bottom: 40px">Data Tidak Ditemukan</h3>
                    <?php endif; ?>
                    </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'script.php' ?>