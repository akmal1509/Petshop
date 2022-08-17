<script>
	function detilJual(e) {
		var produk = '';
		var servis = '';
		$.ajax({
			url: base_url + "dpenginapan/detilPenjualanServis/" + e,
			type: "post",
			success: function(data) {
				var obj = JSON.parse(data);
				if (obj.length < 1) {
					$('.tabel-servis').hide();
				} else {
					$('.tabel-servis').show();
				}
				var increment = 1;
				let denda = 0;
				for (var i = 0; i < obj.length; i++) {
					denda = dateCompare(obj[i].tanggal_akhir) <= 0 ? 0 : dateCompare(obj[i].tanggal_akhir) * obj[i].denda
					servis += '<tr><td>' + increment++ + '</td>' +
						'<td>' + obj[i].hewan.toUpperCase() + '</td>' +
						'<td>' + obj[i].tanggal_awal + '</td>' +
						'<td>' + obj[i].tanggal_akhir + '</td>' +
						'<td>' + obj[i].harga + '</td>' +
						'<td>' + obj[i].subtotal + '</td>' +
						'<td>' + denda + '</td>'
					'</tr>';
					denda = 0;
				}
				$('#detilpenjualanservis').html(servis);
				$('#detilPenjualanModal').modal('show');
			}
		})
	}

	function dateCompare(date) {
		let today = new Date();
		let yyyy = today.getFullYear();
		let mm = today.getMonth() + 1; // Months start at 0!
		let dd = today.getDate();

		if (dd < 10) dd = '0' + dd;
		if (mm < 10) mm = '0' + mm;

		today = yyyy + '-' + mm + '-' + dd;
		return date_diff_indays(date, today);

	}
	var date_diff_indays = function(date1, date2) {
		dt1 = new Date(date1);
		dt2 = new Date(date2);
		return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
	}

	function cetakResi(e) {
		window.location.href = base_url + "report/struk_penginapan/" + e;
	}

	function ubahstatus(e) {

		$('#ubahstatusmodel').modal('show');
	}
</script>
