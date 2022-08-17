<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Document</title>
</head>

<style>
	<?php require_once('bootstrap.css') ?>.text-center {
		text-align: center;
	}

	.m-0 {
		margin: 0px;
	}

	.pt-10 {
		padding-top: 10px;
	}
</style>

<body>
	<div class="row">
		<div class="col-sm-3">
			<h2 class="text-center m-0 pt-10">BUKTI RETUR PEMBELIAN</h2>
			<h3 class="text-center m-0"><?= $akm->nomor ?></h3>
		</div>
	</div>

</body>

</html>
