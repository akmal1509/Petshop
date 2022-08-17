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
        <?php echo $this->session->flashdata('message') ?>
        <form class="form-horizontal" method="post" action="<?php echo base_url('pembelian/tambahbeli') ?>">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Faktur</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="date" class="form-control" name="tanggalf" id="tanggalf" value="<?= $pembelian["0"]["tgl_faktur"]; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Faktur</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="nofaktur" id="nofaktur" value="<?= $pembelian["0"]["faktur_beli"]; ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="idsup" id="idsup">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="namasupplier" id="namasupplier" autocomplete="off">
                                    <span class="input-group-btn">
                                        <button type="button" onclick="tampilsupplier('<?= $pembelian['0']['id_supplier']; ?>')" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="idoperator" id="idoperator" readonly value="<?php echo $user['id_user'] ?>">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Operator</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="operator" id="operator" readonly value="<?php echo $user['nama_lengkap'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="idbarangitembeli" id="idbarangitembeli" readonly>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Barcode</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="barcodebeli" id="barcodebeli" autofocus onkeypress="scanBarcode()" autocomplete="off">
                                    <span class="input-group-btn">
                                        <button type="button" onclick="tampildata()" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="namaitembeli" id="namaitembeli" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Qty</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control" name="qtybeli" id="qtybeli" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Beli</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control" name="hargabeli" id="hargabeli" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Jual</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control" name="hargaitembeli" id="hargaitembeli" autocomplete="off">
                                </div>
                            </div>
                            <div style="text-align: right; margin-bottom: 18px;">
                                <button type="button" onclick="addBeliByClick('<?= $pembelian['0']['id_beli']; ?>')" class="btn btn-success btn-sm"><i class="fa fa-shopping-cart m-right-xs"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="detilitembeli" width="100%" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>Nama Item</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detil_pembelian as $key => $value) : ?>
                                        <tr>
                                            <td><?= $value["barcode"]; ?></td>
                                            <td><?= $value["nama_barang"]; ?></td>
                                            <td><?= $value["harga_beli"]; ?></td>
                                            <td><?= $value["harga_jual"]; ?></td>
                                            <td><?= $value["qty_beli"]; ?></td>
                                            <td id="sumTotal"><?= $value["subtotal"]; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editDetilBeli('<?= $value['id_detil_beli']; ?>')"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusDetilBeli('<?= $value['id_detil_beli']; ?>')"><i class="fa fa-trash "></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="idoperator" id="idoperator">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Diskon (Rp)</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control" name="diskon_beli" id="diskon_beli" value="<?= $pembelian["0"]["diskon"]; ?>" autocomplete="off">
                                </div>
                            </div>
                            <div style="margin-left: 20px">
                                <span><i>Note: Diskon disini merupakan diskon keseluruhan dari pembelian. Jika diskon di nota adalah diskon per satuan, maka harap dijumlahkan secara keseluruhan.</i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-9 col-sm-12 col-xs-12">
                                    <h1>Total (Rp)</h1>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <input type="hidden" class="form-control" name="totalbeli" id="totalbeli">
                                    <h1 style="text-align: right" id="grandtotalbeli"> 0</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div style="text-align: right">
                                    <button type="button" onclick="updateBeli('<?= $pembelian['0']['id_beli']; ?>')" class="btn btn-primary"><i class="fa fa-paper-plane-o m-right-xs"></i> Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="row">

            </div> -->
        </form>
    </div>
</div>
<?php include 'showbarang.php' ?>
<?php include 'showsupplier.php' ?>
<?php include 'editdetil.php' ?>
<?php include 'checkout.php' ?>
<?php include 'script.php' ?>
<script>
    const id = "<?= $pembelian['0']['id_supplier']; ?>";
    fetch(base_url + 'supplier/LoadData', ).then(response => {
        return response.json();
    }).then(value => {
        value.aaData.forEach(function(data) {
            if (id == data.id_supplier) {
                $('#idsup').val(data.id_supplier);
                $('#namasupplier').val(data.nama_supplier);
            }
        });
    });

    const sumTotal = document.querySelectorAll('#sumTotal');
    let sumGrandTotal = 0;
    sumTotal.forEach(function(node) {
        sumGrandTotal += parseInt(node.innerHTML);
    });
    document.getElementById('grandtotalbeli').innerHTML = sumGrandTotal;

    const bayar = "<?= $pembelian['0']['bayar']; ?>";
    const kembalian = parseInt(bayar) - sumGrandTotal;
    document.getElementById('kembali').value = kembalian;
</script>