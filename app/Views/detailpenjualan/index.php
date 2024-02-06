<?= $this->extend('layout/index'); ?>
<?= $this->section('content') ?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="col-md-6 d-flex">
                <a class="btn btn-outline-secondary rounded-pill text-light fw-light mr-2">
                    <i class="fa fa-circle-dot"></i> Tabel
                </a>
                <a class="btn btn-outline-secondary rounded-pill text-light fw-light">
                    <i class="fa fa-utensils"></i> In/Away
                </a>
                <a class="navbar-brand" href="#">
                    <h6 class="text-light fw-light ">Order</h6>
                </a>
            </div>
            <div class="col-md-6 d-flex">
                <div class="col-md-4">
                    <a href="#">
                        <h6 class="text-light fw-light text-center">Produk</h6>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <h6 class="text-light fw-light text-center">Barcode</h6>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <h6 class="text-light fw-light text-center">Custom</h6>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <br>
                <h6 class="text-info fw-bold text-center">Dine-In (1 Pax)</h6>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Harga Satuan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sabun</td>
                            <td>1</td>
                            <td>5000</td>
                            <td>5000</td>
                        </tr>
                        <tr>
                            <td>Shampo</td>
                            <td>2</td>
                            <td>10.000</td>
                            <td>20.000</td>
                        </tr>
                        <tr>
                            <td>Teh</td>
                            <td>3</td>
                            <td>2000</td>
                            <td>6000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6 d-flex bg-primary vh-110 text-center">
                <!-- Span Satu -->
                <div class="col-md-3">
                    <div class="card item-center" style="width:120px">
                        <img class="card-img-top" src="public/image/kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Americano</p>
                            <p class="card-text">Rp10.000</p>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width:120px">
                        <img class="card-img-top" src="kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Americano</p>
                            <p class="card-text">Rp10.000</p>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width:120px">
                        <img class="card-img-top" src="kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Americano</p>
                            <p class="card-text">Rp10.000</p>
                        </div>
                    </div>
                </div>
                <!-- Akhir Span Satu -->
                <!-- Span Dua -->
                <div class="col-md-3">
                    <div class="card" style="width:120px">
                        <img class="card-img-top" src="kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Cappucino</p>
                            <p class="card-text">Rp10.000</p>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width:120px">
                        <img class="card-img-top" src="kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Americano</p>
                            <p class="card-text">Rp10.000</p>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width:120px">
                        <img class="card-img-top" src="kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Americano</p>
                            <p class="card-text">Rp10.000</p>
                        </div>
                    </div>
                </div>
                <!-- Akhir Span Dua -->
                <!-- Span Tiga -->
                <div class="col-md-3">
                    <div class="card" style="width:120px">
                        <img class="card-img-top" src="kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Black Coffe </p>
                            <p class="card-text">Rp10.000</p>
                            <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width:120px">
                        <img class="card-img-top" src="kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Americano</p>
                            <p class="card-text">Rp10.000</p>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width:120px">
                        <img class="card-img-top" src="kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Americano</p>
                            <p class="card-text">Rp10.000</p>
                        </div>
                    </div>
                </div>
                <!-- Akhir Span Tiga -->
                <!-- Span Empat -->
                <div class="col-md-3">
                    <div class="card" style="width:120px">
                        <img class="card-img-top" src="kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Black Coffe </p>
                            <p class="card-text">Rp10.000</p>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width:120px">
                        <img class="card-img-top" src="kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Americano</p>
                            <p class="card-text">Rp10.000</p>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width:120px">
                        <img class="card-img-top" src="kopi1.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-title">Americano</p>
                            <p class="card-text">Rp10.000</p>
                        </div>
                    </div>
                </div>
                <!-- Akhir Span Empat -->
            </div>
        </div>
</body>

<?= $this->endSection('content'); ?>