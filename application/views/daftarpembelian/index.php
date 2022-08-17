<?php //cek_user() 
?>
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
            <table id="" width="100%" class="table table-striped table-bordered datatable">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nomor Faktur</th>
                  <th>Tgl. Faktur</th>
                  <th>Supplier</th>
                  <th>Diskon</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Retur</th>
                  <th>Metode Pembayaran</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pembelian as $key => $item) : ?>
                  <tr>
                    <td><?= $item->kode_beli ?></td>
                    <td><?= $item->faktur_beli ?></td>
                    <td><?= $item->tgl_faktur ?></td>
                    <td><?= $item->nama_supplier ?></td>
                    <td>Rp. <?= number_format($item->diskon) ?></td>
                    <td><?= $item->qty_beli ?></td>
                    <td>Rp. <?= number_format($item->total) ?></td>
                    <td class="text-danger">Rp. <?= isset($retur[$key]->id_pembelian) == $item->id_beli ? number_format($retur[$key]->nilai) : '0' ?></td>
                    <td><?= $item->method ?></td>
                    <td>
                      <a href="#" class="btn btn-primary btn-xs" title="Detail Data" onclick="detilBeli('<?= $item->id_beli ?>')"><i class="fa fa-search-plus"></i></a>
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
<?php include 'detildaftar.php' ?>
<?php include 'script.php' ?>