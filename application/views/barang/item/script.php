<script>
    function tambahitem() {
        $('#inputDataBarang').modal('show');
    }

    function importExcel() {
        $('#importBarang').modal('show');
    }

    function hapusbarang(e) {
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
                    url: base_url + "barang/hapusbarang/" + e,
                    type: "post",
                    success: function(data) {
                        window.location = base_url + "barang/index"
                    }
                })
            }
        })
    }

    $('#select-all').change(function() {
        var checkboxes = $(this).closest('form').find(':checkbox');
        checkboxes.prop('checked', $(this).is(':checked'));
        let count = isChecked();
        count > 0 ? $('.proses-pemesanan').show() : $('.proses-pemesanan').hide()
    });

    function isChecked() {
        let count = 0;
        $('input:checkbox:checked').each(function() {
            count++;
        });
        return count;
    };

    $('.barang').on('change', function() {
        let count = isChecked();
        count > 0 ? $('.proses-pemesanan').show() : $('.proses-pemesanan').hide()
    })
</script>