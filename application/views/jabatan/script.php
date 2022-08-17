<script>
    function editJabatan(e) {
        $.ajax({
            url: base_url + "jabatan/show/" + e,
            type: "post",
            success: function(data) {
                var obj = JSON.parse(data);
                $('#id').val(obj.id_jabatan);
                $('#name').val(obj.nama_jabatan);
                $('#gaji').val(obj.gaji);
                $('#deskripsi').val(obj.deskripsi);
            }
        })
        $('#myModal').modal('show');
    }

    function hapusJabatan(e) {
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
                    url: base_url + "jabatan/destroy/" + e,
                    type: "post",
                    success: function(data) {
                        window.location = base_url + "jabatan";
                    }
                })
            }
        })
    }
</script>