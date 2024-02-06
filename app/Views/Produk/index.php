<?= $this->extend('layout/index'); ?>
<?= $this->section('content') ?>
<h4 align=center class="text-dark font-weight-bold">PRODUK</h4>
<br>
<body>
    <!-- Form untuk menambah dan mengupdate produk -->
    <form id="formProduk">
        <input type="hidden" id="produkID" name="produkID">
        <label for="namaProduk">Nama Produk:</label>
        <input type="text" id="NamaProduk" name="NamaProduk" required>

        <label for="Harga">Harga:</label>
        <input type="number" id="Harga" name="Harga" required>

        <label for="Stok">Stok:</label>
        <input type="number" id="Stok" name="Stok" required>

        <!-- <input type ="submit" value="Simpan" class="btn btn-danger"> -->
        <button id="simpan" class="btn btn-success">Simpan</button>
        <button id="batal" class="btn btn-danger" onclick="resetFormProduk()">Batal</button>
    </form>
    <br>
    <!-- Tabel untuk menampilkan data produk -->
    <table class="table table-bordered" id="tbProduk">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="dataProduk">
            <!-- Data produk akan ditampilkan di sini -->
        </tbody>
    </table>


    <!-- Tambahkan script JavaScript dan AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        // main.js
        $(document).ready(function () {
            loadProduk();

            $('#simpan').on('click', function (e) {
                e.preventDefault();
                simpanProduk();
            })

            function loadProduk() {
                $.ajax({
                    url: '/produk/getAllProduk',
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        var dataProduk = '';
                        $.each(response.products, function (key, value) {
                            dataProduk += '<tr>';
                            dataProduk += '<td>' + (key + 1) + '</td>'; // Kolom nomor
                            dataProduk += '<td>' + value.NamaProduk + '</td>';
                            dataProduk += '<td>' + formatHarga(value.Harga) + '</td>';
                            dataProduk += '<td>' + value.Stok + '</td>';
                            dataProduk += '<td><button type="button" class="btn btn-secondary" id="edit" data-id="' + value.produkID + '">Edit</button>';
                            dataProduk += ' <button type="button" class="btn btn-danger" id="hapus" data-id="' + value.produkID + '">Hapus</button></td>';
                            dataProduk += '</tr>';
                        });
                        $('#dataProduk').html(dataProduk);
                    }
                });
            }

            function simpanProduk() {
                var idproduk = $('#produkID').val();
                var Nama = $('#NamaProduk').val().trim();
                var Harga = $('#Harga').val().trim();
                var Stok = $('#Stok').val().trim();


                // Memeriksa apakah form kosong
                if (Nama == '' || Harga == '' || Stok == '') {
                    // Menampilkan alert warning jika form kosong
                    Swal.fire({
                        title: 'Peringatan!',
                        text: 'Form tidak boleh kosong.',
                        icon: 'warning'
                    });
                    return; // Menghentikan eksekusi fungsi jika form kosong
                }

                var url = idproduk ? '/produk/updateProduk' : '/produk/addProduk';
                //Status
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: $('#formProduk').serialize(),
                    dataType: 'json',
                    success: function (response) {
                        // Menggunakan SweetAlert2 untuk menampilkan pesan
                        Swal.fire({
                            title: 'Sukses!',
                            text: response.message,
                            icon: 'success'
                        });
                        // alert(response.message);
                        loadProduk();
                        resetFormProduk();

                    },
                    error: function (error) {
                        console.error("Terjadi kesalahan dalam permintaan AJAX:", error);
                    }
                });
            }

            $('#dataProduk').on('click', '#edit', function () {
                var idproduk = $(this).data('id');

                $.ajax({
                    url: '/produk/getProdukById/',
                    data: { idproduk: idproduk },
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#produkID').val(data.produkID);
                        $('#NamaProduk').val(data.NamaProduk);
                        $('#Harga').val(data.Harga);
                        $('#Stok').val(data.Stok);
                    }
                });
            })

            $('#dataProduk').on('click', '#hapus', function () {
                var idproduk = $(this).data('id');
                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: 'Apakah Anda yakin ingin menghapus produk?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Melakukan permintaan AJAX untuk menghapus produk
                        $.ajax({
                            url: '/produk/hapusProduk',
                            type: 'POST',
                            data: { produkID: idproduk },
                            // dataType: 'json',
                            success: function (data) {
                                // Menampilkan pesan sukses
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: 'berhasil',
                                    icon: 'success'
                                }).then(() => {
                                    // Memuat ulang data produk setelah menghapus
                                    loadProduk();
                                });
                            },
                            error: function (error) {
                                console.error("Terjadi kesalahan dalam permintaan AJAX:", error);
                            }
                        });
                    }
                })
            })

            function formatHarga(harga) {
                // Gunakan fungsi toLocaleString() untuk menambahkan format harga
                return 'Rp ' + harga.toLocaleString('id-ID');
            }

            function resetFormProduk() {
                $('#ProdukID').val('');
                $('#NamaProduk').val('');
                $('#Harga').val('');
                $('#Stok').val('');
            }
        });
    </script>
</body>
<?= $this->endSection('content'); ?>