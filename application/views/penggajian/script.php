<script>
    $(document).ready(function() {
        //   select onchange on select pegawai
        $('#pegawai').change(function() {
            var id = $(this).val();
            if (id == null || id == '') {
                $('#jabatan').val('');
                $('#gajipokok').val(0);
                $('#gajiterakhir').val("-");
                $('#gajibersih').val(0);
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>" + "penggajian/get_data_pegawai",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#jabatan').val(data.karyawan.nama_jabatan);
                        $('#gajipokok').val(data.karyawan.gaji);
                        $('#gajiterakhir').val(data.gaji == null ? '-' : data.gaji.tanggal_gaji);
                        $('#gajibersih').val(data.karyawan.gaji);
                    }
                });
            }
        });
        // potong gaji on change
        $('#potonggaji').keyup(function() {
            var komisi = parseInt($('#komisi').val());
            var potongan = $(this).val();
            var gajipokok = $('#gajipokok').val();
            var total = gajipokok - potongan + komisi;
            $('#gajibersih').val(total);
        });
        // komisi gaji on change
        $('#komisi').keyup(function() {
            var komisi = $(this).val();
            var potongan = $('#potonggaji').val();
            var gajipokok = $('#gajipokok').val();
            var total = (gajipokok - potongan) + Number(komisi);
            $('#gajibersih').val(total);
        });

        // form on submit ajax
        $('#formSubmit').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var data = form.serialize();
            $.ajax({
                url: url,
                method: "POST",
                data: data,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: data.message,
                        }).then(function() {
                            window.location.href = base_url + 'penggajian/laporan/' + data.data.id_penggajian;
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: data.message,
                        });
                    }
                }
            });
        });
    });
</script>