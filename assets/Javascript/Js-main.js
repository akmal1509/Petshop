var tablekaryawan = $('#datakaryawan').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'karyawan/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "kode_karyawan",
			bSearchable: true
		},
		{
			"mDataProp": "nama_karyawan",
			bSearchable: true
		},
		{
			"mDataProp": "nama_jabatan",
			bSearchable: true
		},
		{
			"mDataProp": "telp_karyawan",
			bSearchable: true
		},
		{
			"mDataProp": "email_karyawan",
			bSearchable: true
		},
		{
			"mDataProp": "alamat",
			bSearchable: true
		},
		{
			"mDataProp": "status_karyawan",
			bSearchable: true
		},
		{
			"mDataProp": "tgl_masuk",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_karyawan;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editKaryawan(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusKaryawan(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var tableSupplier = $('#datasupplier').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'supplier/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "kode_supplier",
			bSearchable: true
		},
		{
			"mDataProp": "nama_supplier",
			bSearchable: true
		},
		{
			"mDataProp": "telp_supplier",
			bSearchable: true
		},
		{
			"mDataProp": "email_supplier",
			bSearchable: true
		},
		{
			"mDataProp": "bank",
			bSearchable: true
		},
		{
			"mDataProp": "rekening",
			bSearchable: true
		},
		{
			"mDataProp": "alamat_supplier",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_supplier;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editSupplier(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusSupplier(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var tableCustomer = $('#datacustomer').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'customer/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "kode_cs",
			bSearchable: true
		},
		{
			"mDataProp": "nama_cs",
			bSearchable: true
		},
		{
			"mDataProp": "telp",
			bSearchable: true
		},
		{
			"mDataProp": "email",
			bSearchable: true
		},
		{
			"mDataProp": "alamat",
			bSearchable: true
		},
		{
			"mDataProp": "jenis_cs",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_cs;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editCustomer(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusCustomer(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var tableKategori = $('#datakategori').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'kategori/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "kategori",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_kategori;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editkategori(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapuskategori(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var tableSatuan = $('#datasatuan').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'satuan/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "satuan",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_satuan;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editsatuan(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapussatuan(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var tableUser = $('#datauser').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'user/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "username",
			bSearchable: true
		},
		{
			"mDataProp": "tipe",
			bSearchable: true
		},
		{
			"mDataProp": "nama_lengkap",
			bSearchable: true
		},
		{
			"mDataProp": "alamat_user",
			bSearchable: true
		},
		{
			"mDataProp": "telp_user",
			bSearchable: true
		},
		{
			"mDataProp": "email_user",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_user;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="edituser(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapususer(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var dPenjualan = $('#daftarjual').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'dpenjualan/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "invoice",
			bSearchable: true
		},

		{
			"mDataProp": "nama_lengkap",
			bSearchable: true
		},
		{
			"mDataProp": "nama_cs",
			bSearchable: true
		},
		{
			"mDataProp": "diskon",
			bSearchable: true
		},
		{
			"mDataProp": "total",
			bSearchable: true
		},
		{
			"mDataProp": "method",
			bSearchable: true
		},
		{
			"mDataProp": "qty",
			bSearchable: true
		},
		{
			"mDataProp": "tgl",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_jual;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Detail Data" onclick="detilJual(' + pKode + ')"><i class="fa fa-search-plus"></i></a> \n\ <a href="#" class="btn btn-success btn-xs" title="Print Resi" onclick="cetakResi(' + pKode + ')"><i class="fa fa-print"></i></a>';
				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var dPembelian = $('#daftarpembelian').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'dpembelian/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "kode_beli",
			bSearchable: true
		},
		{
			"mDataProp": "faktur_beli",
			bSearchable: true
		},
		{
			"mDataProp": "tgl_faktur",
			bSearchable: true
		},
		{
			"mDataProp": "nama_supplier",
			bSearchable: true
		},
		{
			"mDataProp": "diskon",
			bSearchable: true
		},
		{
			"mDataProp": "qty_beli",
			bSearchable: true
		},
		{
			"mDataProp": "total",
			bSearchable: true
		},
		{
			"mDataProp": "method",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				const status = data.status;
				const id = data.id_beli;

				if (status == 1) {
					badge = `
						<a href="#" class="btn btn-success btn-xs" title="Status">
							<i class="fa fa-check"></i> Post
						</a>
					`;
				} else {
					badge = `

					<div class="btn-group">
						<button type="button" class="btn btn-warning btn-xs">Draft</button>
							<button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
							<li>
								<li><a href="#" id="btnStatus" onclick="updateStatusInList({'id': ${id}, 'status': 1})">Post</a></li>
							</li>
						</ul>
					</div>

					`;
				}

				return (badge).toString();
			},
			bSortable: false,
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_beli;
				status = data.status;

				if (status == 1) {
					btn = `
					<a href="#" class="btn btn-primary btn-xs" title="Detail Data" onclick="detilBeli(${pKode})">
						<i class="fa fa-search-plus"></i>
					</a>
				`;
				} else {
					btn = `
					<a href="#" class="btn btn-primary btn-xs" title="Detail Data" onclick="detilBeli(${pKode})">
						<i class="fa fa-search-plus"></i>
					</a>
					<a href="${base_url}dpembelian/edit/${pKode}" class="btn btn-primary btn-xs" title="Edit Data">
						<i class="fa fa-edit"></i>
					</a>
				`;
				}
				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});

var dataKas = $('#datakas').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'kas/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "kode_kas",
			bSearchable: true
		},
		{
			"mDataProp": "tanggal",
			bSearchable: true
		},
		{
			"mDataProp": "jenis",
			bSearchable: true
		},
		{
			"mDataProp": "nominal",
			bSearchable: true
		},
		{
			"mDataProp": "keterangan",
			bSearchable: true
		},
		{
			"mDataProp": "nama_lengkap",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_kas;
				var btn = '<a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusKas(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});

// var tableUserlog = $('#datauserlog').DataTable({
// 	"bProcessing": true,
// 	"bJQueryUI": true,
// 	"sPaginationType": "full_numbers",
// 	"sAjaxSource": base_url + 'userlog/LoadData',
// 	"sAjaxDataProp": "aaData",
// 	"fnRender": function (oObj) {
// 		uss = oObj.aData["Username"];
// 	},
// 	"aoColumns": [{
// 			"mDataProp": "username",
// 			bSearchable: true
// 		},
// 		{
// 			"mDataProp": "nama_lengkap",
// 			bSearchable: true
// 		},
// 		{
// 			"mDataProp": "tipe",
// 			bSearchable: true
// 		},
// 		{
// 			"mDataProp": "waktu",
// 			bSearchable: true
// 		},
// 	],
// 	"bDestroy": true,
// });
