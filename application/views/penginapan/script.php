<script>
	function addItemByClick() {
		if ($('#lama').val() < 0) {
			alert('Jumlah hari tidak valid')
		} else {
			$.ajax({
				url: base_url + "penginapan/tambah/",
				type: "post",
				data: {
					hewan: $('#hewan').val(),
					// antar_jemput: $('#antar_jemput').val(),
					// biaya_antar_jemput: $('#biaya_antar').val(),
					nama_servis: $('#nama_servis').val(),
					tanggal_awal: $('#awal').val(),
					tanggal_akhir: $('#akhir').val(),
					lama: $('#lama').val(),
					harga: $('#harga').val(),
				},
				success: function(data) {
					var obj = JSON.parse(data);
					LoadService();
					// barcode.value = "";
					// barcode.focus();
					// document.getElementById('qty').value = "";
					// var ppn = obj.subtotal * 10 / 100;
					// var hargaAkhir = Number(obj.subtotal) + ppn;
					$('#subtot').html(obj.subtotal);
					$('#subtotal').val(obj.subtotal);
					$('#grandtotal').val(obj.subtotal);
					// $('#nominal_ppn').val(ppn);
					$('#nominal').val(obj.subtotal);
				}
			});

		}
	}


	function LoadService() {
		$('#detilservis').DataTable({
			"bProcessing": true,
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": base_url + 'penginapan/LoadDataService',
			"sAjaxDataProp": "aaData",
			"fnRender": function(oObj) {
				uss = oObj.aData["Username"];
			},
			"aoColumns": [{
					"mDataProp": "hewan",
					bSearchable: true,
					mRender: function(data, type, row) {
						return data.toUpperCase();
					}
				},
				{
					"mDataProp": "tanggal_awal",
					bSearchable: true,
					mRender: function(data, type, row) {
						return date_diff_indays(row.tanggal_awal, row.tanggal_akhir) + ' hari'
					}
				},
				{
					"mDataProp": "harga",
					bSearchable: true
				},
				{
					"mDataProp": "tanggal_awal",
					bSearchable: true
				},
				{
					"mDataProp": "tanggal_akhir",
					bSearchable: true
				},
				{
					"mDataProp": "subtotal",
					bSearchable: true
				},
				{
					"mDataProp": function(data, type, val) {
						pKode = data.id_detil_penginapan;
						// var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editDetilServis(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ 
						// <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusDetilService(' + pKode + ')"><i class="fa fa-trash "></i></a>';
						var btn = ' <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusDetilService(' + pKode + ')"><i class="fa fa-trash "></i></a>';

						return (btn).toString();
					},
					bSortable: false,
					bSearchable: false
				}
			],
			"bDestroy": true,
		});
	}

	function editDetilServis(e) {
		var qty = $('#detilqty');
		var diskon = $('#detildiskonitem');
		var subtotal = $('#detiltotalitem');
		$.ajax({
			url: base_url + "penjualan/detilservisjual/" + e,
			type: "post",
			success: function(data) {
				var obj = JSON.parse(data);
				$('#id_detil_jual').val(obj.id_detil_jual);
				$('#edit_kode_servis').val(obj.kode);
				$('#nama_detil_servis').val(obj.nama_servis);
				$('#harga_detil_servis').val(obj.harga_item);
				$('#detil_qty').val(obj.qty_jual);
				$('#detil_total_servis').val(obj.subtotal);

			}
		});
		$('#editDetilServisModal').modal('show');
	}




	function hapusDetilService(e) {
		Swal.fire({
			title: "Are you sure ?",
			text: "Deleted data can not be restored!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!"
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: base_url + "penginapan/hapusdetil/" + e,
					type: "post",
					success: function(data) {
						LoadService();
						var obj = JSON.parse(data);
						var ppn = obj.subtotal * 10 / 100;
						var hargaAkhir = ppn + Number(obj.subtotal);
						if (obj.subtotal != null) {
							$('#subtot').text(obj.subtotal);
						} else {
							$('#subtot').text(0);
						}
					}
				})
			}
		})
	}

	function editServisJual() {
		const id = $('#id_detil_jual').val();
		const qty = $('#detil_qty').val();
		const harga = $('#harga_detil_servis').val();
		const subtotal = $('#detil_total_servis').val();
		$.ajax({
			url: base_url + "penjualan/editservisjual/" + id + '/' + harga + '/' + subtotal,
			type: "post",
			success: function(data) {
				LoadService();
				$.ajax({
					url: base_url + "penjualan/hargatotal",
					type: "post",
					success: function(data) {
						var obj = JSON.parse(data);
						// var ppn = obj.subtotal * 10 / 100;
						// var hargaAkhir = ppn + Number(obj.subtotal);
						$('#subtot').html(obj.subtotal);
						$('#subtotal').val(obj.subtotal);
						$('#grandtotal').val(obj.subtotal);
						$('#diskon1').val(obj.diskon);

					}
				});
			}
		});
	}


	function simpanPenjualan() {
		var cs = $('#customer').val();
		var user = $('#idoperator').val();
		var antarJemput = $('#antar_jemput').val();
		var biayaAntarJemput = $('#biaya_antar').val();
		var konsumen = $('#konsumen').val();
		var telpKonsumen = $('#telp').val();
		var alamat = $('#alamat').val();
		var status_makanan = $('#status_makanan').val();
		var deskripsi = $('#deskripsi').val();
		console.log(status_makanan);
		$('#status_makanan_m').val(status_makanan);
		$('#deskripsi_m').val(deskripsi);
		$('#cus').val(cs);
		$('#kasir').val(user);
		$('#antar').val(antarJemput);
		$('#biaya').val(biayaAntarJemput);
		$('#nama_konsumen').val(konsumen);
		$('#telp_konsumen').val(telpKonsumen);
		$('#alamat_konsumen').val(alamat);
		$.ajax({
			url: base_url + "penginapan/hargatotal",
			type: "post",
			success: function(data) {
				var obj = JSON.parse(data);
				var ppn = obj.subtotal * 10 / 100;
				var hargaAkhir = ppn + Number(obj.subtotal);
				$('#diskon1').val(obj.diskon);
				$('#subtot').html(obj.subtotal);
				$('#subtotal').val(obj.subtotal);
				$('#grandtotal').val(obj.subtotal);
				// $('#nominal_ppn').val(ppn);
				$('#nominal').val(obj.subtotal);

			}
		});
		$('#pembayaranModal').modal('show');
	}

	$(function() {
		var dateStart = document.getElementById('awal');
		var dateEnd = document.getElementById('akhir');
		dateStart.valueAsDate = new Date();
		dateEnd.valueAsDate = new Date();

		dateStart.onchange = function() {
			$('#lama').val(date_diff_indays(this.value, dateEnd.value))
		}
		dateEnd.onchange = function() {
			$('#lama').val(date_diff_indays(dateStart.value, this.value))
		}
	})
	var date_diff_indays = function(date1, date2) {
		dt1 = new Date(date1);
		dt2 = new Date(date2);
		return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
	}

	$('#antar_jemput').on('change', function() {
		if ($(this).val() == 'ya') {
			$('#biaya_antar').removeAttr('readonly');
			$('#alamat').removeAttr('readonly');
		} else {
			$('#biaya_antar').attr('readonly', true);
			$('#alamat').attr('readonly', true);
		}
	})
</script>
