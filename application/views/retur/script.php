<script>
	$(function() {
		$('.jumlah_retur').on('change', function() {
			let total = countTotalRetur();
			$('#total_jumlah_retur').text(total[0])
			$('#total_retur').text('Rp. ' + numberFormat(total[1]))
		})
	})

	function countTotalRetur() {
		let jumlah = 0;
		let total = 0;
		$('.jumlah_retur').each(function(i, el) {
			jumlah += parseInt($(el).val());
			total += parseInt($(el).val()) * parseInt($('#harga_item_' + (i + 1)).val());
		})
		return [jumlah, total];
	}

	function numberFormat(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	function validasiJumlahRetur() {
		let count = 0;
		$('.jumlah_retur').each(function(i, el) {
			if ($(el).val() > 0) {
				count++;
			}
		})
		return count;
	}

	$('#formSubmit').submit(function(e) {
		e.preventDefault();
		$('button[type="submit"]').addClass('disabled');
		$('button[type="submit"]').html('Loading...');

		if (validasiJumlahRetur() > 0) {
			$.ajax({
				url: $(this).attr('action'),
				method: $(this).attr('method'),
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data) {
					$('button[type="submit"]').removeClass('disabled');
					$('button[type="submit"]').html(
						'<em class="fa fa-send"></em><span> Submit </span>'
					);
					Swal.fire({
						title: 'Success',
						icon: 'success',
						text: data.messages,
					}).then(function() {
						if (window.location.pathname.split('/')[3] == 'tambah_retur_pembelian') {
							window.location.href = base_url + '/retur/pembelian';
						} else {
							window.location.href = base_url + '/retur/penjualan';
						}
					});
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.error(thrownError);
					$('button[type="submit"]').removeClass('disabled');
					$('button[type="submit"]').html(
						'<em class="fa fa-send"></em><span> Submit </span>'
					);
				},
			});
		} else {
			Swal.fire({
				title: 'Error',
				icon: 'error',
				text: 'Jumlah retur harus diisi!',
			});
			$('button[type="submit"]').removeClass('disabled');
			$('button[type="submit"]').html(
				'<em class="fa fa-send"></em><span> Submit </span>'
			);
		}

	});

	$('.detail-retur-jual').on('click', function() {
		let id = $(this).data('id');
		$.ajax({
			url: base_url + '/retur/get_detail_retur_penjualan/' + id,
			method: 'get',
			dataType: 'json',
			success: function(data) {
				var html = ``;
				for (var i = 0; i < data.length; i++) {
					html += `
                        <tr>
                            <td>${data[i].barcode}</td>
                            <td>${data[i].nama_barang}</td>
                            <td>Rp. ${numberFormat(data[i].harga)}</td>
                            <td>${data[i].jumlah}</td>
                            <td>Rp. ${numberFormat(data[i].subtotal)}</td>
                            <td>${data[i].mutasi.toUpperCase()}</td>
                            <td>${data[i].kondisi.toUpperCase()}</td>
                        </tr>
                    `;
				}
				$('#data-detail-retur-penjualan').html(html);
				$('#detailReturPenjualan').modal('show')
			}

		})
	})
	$('.detail-retur-beli').on('click', function() {
		let id = $(this).data('id');
		$.ajax({
			url: base_url + '/retur/get_detail_retur_pembelian/' + id,
			method: 'get',
			dataType: 'json',
			success: function(data) {
				var html = ``;
				for (var i = 0; i < data.length; i++) {
					html += `
                        <tr>
                            <td>${data[i].barcode}</td>
                            <td>${data[i].nama_barang}</td>
                            <td>Rp. ${numberFormat(data[i].harga)}</td>
                            <td>${data[i].jumlah}</td>
                            <td>Rp. ${numberFormat(data[i].subtotal)}</td>
                            <td>${data[i].mutasi.toUpperCase()}</td>
                            <td>${data[i].kondisi.toUpperCase()}</td>
                        </tr>
                    `;
				}
				$('#data-detail-retur-pembelian').html(html);
				$('#detailReturPembelian').modal('show')
			}

		})
	})

	function cetakResi(e) {
		window.location.href = base_url + "report/struk_retur/" + e;
	}
</script>
