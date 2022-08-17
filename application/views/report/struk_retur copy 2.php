<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<style>
	.text-center {
		text-align: center;
	}

	.text-left {
		text-align: left;
	}

	.text-right {
		text-align: right;
	}

	.m-0 {
		margin: 0px;
	}

	.p-0 {
		padding: 0px;
	}

	.pt-10 {
		padding-top: 10px;
	}

	/* table,
	th,
	td {
		border: 1px solid black;
	} */

	.wb {
		border-collapse: collapse;
	}

	.wb th {
		border: 1px solid black;
	}

	.nob {
		border: none;
	}
</style>

<body>

	<table class="" style="width:100%">
		<tr class="">
			<th class="" style="width:30%">
				<div class="">
					<img style="float: left;margin-right:5px" width="50px" height="50px" src="<?= base_url('./assets/img/profil/' . $profile['logo_toko'],) ?>" alt="">
					<p class="text-left m-0 p-0"><?= $profile['nama_toko'] ?></p>
					<p class="text-left m-0 p-0"><?= $profile['alamat_toko'] ?></p>
				</div>
			</th>
			<th class="" style="width:60%">
				<h2 class="text-center m-0 pt-10">BUKTI RETUR PEMBELIAN</h2>
				<h3 class="text-center m-0"><?= $akm->nomor ?></h3>
			</th>
			<th style="width:30%;font-weight:500;padding-left:40px">

			</th>
		</tr>
	</table>

	<table class="wb" style="width:100% ;height:200px;margin-top:20px;">
		<tr>
			<th>
				Kode barang
			</th>
			<th>Nama Item</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>SubTotal</th>
		</tr>

		<?php foreach ($detail as $item) : ?>
			<tr>
				<td class="text-center"><?= $item->barcode ?></td>
				<td class="text-center"><?= $item->nama_barang ?></td>
				<td class="text-center"><?= $item->harga ?></td>
				<td class="text-center"><?= $item->jumlah ?></td>
				<td class="text-right"><?= $item->subtotal ?></td>
			</tr>
		<?php endforeach; ?>

	</table>
	<hr>
	<table class="" style="width:100% ;">
		<tr>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th>Total</th>
			<th><?= $item->subtotal ?></th>
		</tr>
	</table>
</body>

</html>
