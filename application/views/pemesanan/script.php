<script>
    function deletePesanan(e) {
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
                    url: base_url + "pemesanan/delete/" + e,
                    type: "post",
                    success: function(data) {
                        window.location = base_url + "pemesanan"
                    }
                })
            }
        })
    }

    function submit(e, status) {
        Swal.fire({
            title: "Are you sure ?",
            text: "Apakah anda yakin ingin " + status + " pesanan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, submit!"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: base_url + "pemesanan/status/" + e + '/' + status,
                    type: "post",
                    success: function(data) {
                        window.location = base_url + "pemesanan"
                    }
                })
            }
        })
    }

    function deleteDetailPesanan(e) {
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
                    url: base_url + "pemesanan/delete_detail/" + e,
                    type: "post",
                    success: function(data) {
                        window.location = base_url + "pemesanan/detail/" + e
                    }
                })
            }
        })
    }

    $('.add-order').on('click', function() {
        $('#form-modal .modal-title').text('Input Pemesanan')
        $('#form-modal form').attr('action', '<?= base_url('pemesanan/input') ?>')
        $("#form-pemesanan").trigger("reset");
    });

    function editPesanan(e) {
        $('#form-modal .modal-title').text('Edit Pemesanan')
        $('#form-modal form').attr('action', '<?= base_url('pemesanan/update/') ?>' + e);

        $.ajax({
            url: base_url + "pemesanan/show/" + e,
            type: "post",
            success: function(data) {
                var obj = JSON.parse(data);
                $('#nama').val(obj.nama_pemesanan);
                $('#tanggal').val(obj.tanggal);
                $('#form-modal').modal('show')
            }
        })
    }
    $('.add-barang').on('click', function() {
        let id = $(this).data('id');
        $('#form-barang .modal-title').text('Input Barang')
        $('#form-barang form').attr('action', '<?= base_url('pemesanan/input_detail/') ?>' + id)
        $("#form-barang").trigger("reset");
    });

    function editDetailPesanan(id, idPemesanan) {
        $('#form-barang .modal-title').text('Edit Barang')
        $('#form-barang form').attr('action', '<?= base_url('pemesanan/update_detail/') ?>' + id + '/' + idPemesanan);

        $.ajax({
            url: base_url + "pemesanan/show_detail/" + id,
            type: "post",
            success: function(data) {
                var obj = JSON.parse(data);
                $('#barang').val(obj.id_barang).trigger('change');
                $('#satuan').val(obj.id_satuan).trigger('change');
                $('#supplier').val(obj.id_supplier).trigger('change');
                $('#jumlah').val(obj.jumlah);
                $('#tanggal').val(obj.tanggal);
                $('#form-barang').modal('show')
            }
        })
    }
</script>