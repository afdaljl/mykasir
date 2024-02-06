<?= $this->extend('layout/index'); ?>
<?= $this->section('content') ?>
<h4 align=center class="text-dark font-weight-bold">PELANGGAN</h4>
<br>
<body>
    <!-- Form untuk menambah dan mengupdate produk -->
    <form id="formPelanggan">
        <input type="hidden" id="pelangganID" name="pelangganID">
        <label for="NamaPelanggan">Nama:</label>
        <input type="text" id="NamaPelanggan" name="NamaPelanggan" required>

        <label for="Alamat">Alamat:</label>
        <input type="text" id="Alamat" name="Alamat" required>

        <label for="NomorTelepon">NomorTelepon:</label>
        <input type="number" id="NomorTelepon" name="NomorTelepon" required>

        <!-- <input type ="submit" value="Simpan" class="btn btn-danger"> -->
        <button id="simpan" class="btn btn-success">Simpan</button>
        <button id="batal" class="btn btn-danger">Batal</button>
    </form>
    <!-- Tabel untuk menampilkan data pelanggan -->
    <table class="table table-bordered" id="tbPelanggan">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="dataPelanggan">
            <!-- Data pelanggan akan ditampilkan di sini -->
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // main.js
        $(document).ready(function () {
            loadPelanggan();

            $('#simpan').on('click', function (e) {
                e.preventDefault();
                simpanPelanggan();
            })
            $('#formPelanggan').on('click', '#batal', function (e) {
                e.preventDefault();
                resetFormPelanggan();
            })

            function loadPelanggan() {
                $.ajax({
                    url: '/pelanggan/getAllPelanggan',
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        var dataPelanggan = '';
                        $.each(response.pelanggan, function (key, value) {
                            dataPelanggan += '<tr>';
                            dataPelanggan += '<td>' + (key + 1) + '</td>'; // Kolom nomor
                            dataPelanggan += '<td>' + value.NamaPelanggan + '</td>';
                            dataPelanggan += '<td>' + value.Alamat + '</td>';
                            dataPelanggan += '<td>' + value.NomorTelepon + '</td>';
                            dataPelanggan += '<td><button type="button" class="btn btn-secondary" id="edit" data-id="' + value.pelangganID + '">Edit</button>';
                            dataPelanggan += '<button type="button" class="btn btn-danger" id="hapus" data-id="' + value.pelangganID + '">Hapus</button></td>';
                            dataPelanggan += '</tr>';
                        });
                        $('#dataPelanggan').html(dataPelanggan);
                    }
                });

                $('#dataPelanggan').on('click', '#edit', function () {
                    var idpelanggan = $(this).data('id');

                    $.ajax({
                        url: '/pelanggan/getPelangganById/',
                        data: { idpelanggan: idpelanggan },
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#pelangganID').val(data.pelangganID);
                            $('#NamaPelanggan').val(data.NamaPelanggan);
                            $('#Alamat').val(data.Alamat);
                            $('#NomorTelepon').val(data.NomorTelepon);
                        }
                    });
                })

                $('#dataPelanggan').on('click', '#hapus', function () {
                    var idpelanggan = $(this).data('id');
                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: 'Apakah Anda yakin ingin menghapus pelanggan?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Melakukan permintaan AJAX untuk menghapus produk
                            $.ajax({
                                url: '/pelanggan/hapusPelanggan',
                                type: 'POST',
                                data: { pelangganID: idpelanggan },
                                // dataType: 'json',
                                success: function (data) {
                                    // Menampilkan pesan sukses
                                    Swal.fire({
                                        title: 'Sukses!',
                                        text: 'berhasil',
                                        icon: 'success'
                                    }).then(() => {
                                        // Memuat ulang data produk setelah menghapus
                                        loadPelanggan();
                                    });
                                },
                                error: function (error) {
                                    console.error("Terjadi kesalahan dalam permintaan AJAX:", error);
                                }
                            });
                        }
                    })
                })
            }


            function simpanPelanggan() {
                var pelangganID = $('#pelangganID').val();
                var Nama = $('#NamaPelanggan').val().trim();
                var Alamat = $('#Alamat').val().trim();
                var Telepon = $('#NomorTelepon').val().trim();

                // Memeriksa apakah form kosong
                if (Nama == '' || Alamat == '' || Telepon == '') {
                    // Menampilkan alert warning jika form kosong
                    Swal.fire({
                        title: 'Peringatan!',
                        text: 'Form tidak boleh kosong.',
                        icon: 'warning'
                    });
                    return; // Menghentikan eksekusi fungsi jika form kosong
                }

                var url = pelangganID ? '/pelanggan/updatePelanggan' : '/pelanggan/addPelanggan';
                //Status
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: $('#formPelanggan').serialize(),
                    dataType: 'json',
                    success: function (response) {
                        // Menggunakan SweetAlert2 untuk menampilkan pesan
                        Swal.fire({
                            title: 'Sukses!',
                            text: response.message,
                            icon: 'success'
                        });
                        // alert(response.message);
                        loadPelanggan();
                        resetFormPelanggan();

                    },
                    error: function (error) {
                        console.error("Terjadi kesalahan dalam permintaan AJAX:", error);
                    }
                });
                
                // $('#dataPelanggan').on('click', '#edit', function () {
                //     var idpelanggan = $(this).data('id');

                //     $.ajax({
                //         url: '/pelanggan/getPelangganById/',
                //         data: { idpelanggan: idpelanggan },
                //         type: 'GET',
                //         dataType: 'json',
                //         success: function (data) {
                //             $('#pelangganID').val(data.pelangganID);
                //             $('#NamaPelanggan').val(data.NamaPelanggan);
                //             $('#Alamat').val(data.Alamat);
                //             $('#NomorTelepon').val(data.NomorTelepon);
                //         }
                //     });
                // })

            // $('#dataPelanggan').on('click', '#hapus', function () {
            //     var idpelanggan = $(this).data('id');
            //     Swal.fire({
            //         title: 'Konfirmasi Hapus',
            //         text: 'Apakah Anda yakin ingin menghapus pelanggan?',
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#d33',
            //         cancelButtonColor: '#3085d6',
            //         confirmButtonText: 'Ya, Hapus!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             // Melakukan permintaan AJAX untuk menghapus produk
            //             $.ajax({
            //                 url: '/pelanggan/hapusPelanggan',
            //                 type: 'POST',
            //                 data: { pelangganID: idpelanggan },
            //                 // dataType: 'json',
            //                 success: function (data) {
            //                     // Menampilkan pesan sukses
            //                     Swal.fire({
            //                         title: 'Sukses!',
            //                         text: 'berhasil',
            //                         icon: 'success'
            //                     }).then(() => {
            //                         // Memuat ulang data produk setelah menghapus
            //                         loadPelanggan();
            //                     });
            //                 },
            //                 error: function (error) {
            //                     console.error("Terjadi kesalahan dalam permintaan AJAX:", error);
            //                 }
            //             });
            //         }
            //     })
            // })
            }
            function resetFormPelanggan() {
                $('#pelangganID').val('');
                $('#NamaPelanggan').val('');
                $('#Alamat').val('');
                $('#NomorTelepon').val('');
            }
        });
    </script>
</body>
<?= $this->endSection('content'); ?>