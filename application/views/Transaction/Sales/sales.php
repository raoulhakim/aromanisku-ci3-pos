<section class="content-header">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-gradient-blue">
                    <div class="card-title">

                    </div>
                </div>
                <div class="card-body">
                    <h1>Transaction Page</h1>
                    <small>Sales</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <!-- <form action="<?= site_url('sales/add'); ?>" method="post">
        <button type="submit" class="btn btn-block btn-primary">
            ECHO
        </button>
    </form> -->
    <form action="<?= site_url('sales/add'); ?>" method="post">
        <div class="row d-flex justify-content-between">
            <div class="col">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal" class="col-form-label">Tanggal</label>
                                    <input type="date" name="field_tanggal" class="form-control" id="tanggal"
                                        value="<?= date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_kasir" class="col-form-label">Username</label>
                                    <input type="text" name="nama_kasir" class="form-control" id="nama_kasir"
                                        value="<?= $this->fungsi->userLogin()->nama_user; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customer" class="col-form-label">Customer</label>
                                    <select name="customer" id="customer" class="form-control">
                                        <option value="">-- Choose Customer --</option>
                                        <option value="Umum">Umum</option>
                                        <?php foreach ($customer as $cust => $value): ?>
                                            <option value="<?= $value->id_customer; ?>">
                                                <?= $value->nama_customer; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="barcode_produk" class="col-form-label">Barcode</label>
                                    <div class="form-group input-group">
                                        <input type="hidden" name="id_item" id="id_item">
                                        <input type="text" name="barcode_item" id="barcode_item" class="form-control"
                                            required readonly>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                                                data-target="#modal-item">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="qty" class="col-form-label">Qty</label>
                                    <input type="number" name="field_qty" class="form-control" id="qty"
                                        placeholder="Ex. 10000"
                                        style="-webkit-appearance: textfield; -moz-appearance: textfield;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_produk" class="col-form-label">Product Name</label>
                                    <input type="text" name="name_item" id="name_item" class="form-control" required
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_produk" class="col-form-label">Price</label>
                                    <input type="text" name="price_item" id="price_item" class="form-control" required
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-block btn-primary" onclick="tambahPesanan()"><i
                                        class="fa fa-cart-plus"></i> add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="total_sementara" class="col-sm-8 col-form-label">Total Pembelanjaan</label>
                        </div>
                        <label for="" name="total_sementara">
                            <h1>Rp.
                                <span id="total_sementara">
                                    0
                                </span>
                            </h1>
                            <input type="hidden" id="hidden_input_total" name="nilai_sementara_total" value="0">
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-between">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Cart</h4>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabel-pesanan">
                                <!-- Isi dari tabel pesanan akan di-generate oleh JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-between">
            <!-- Isi formulir lainnya -->

            <div class="col">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-8 col-form-label">Cash</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="number" name="field_cash" class="form-control" id="cash_input"
                                        placeholder="Ex. 10000" style="-webkit-appearance: none; margin: 0;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="change" class="col-sm-8 col-form-label">Change</label>
                            <div class="col-sm-10">
                                <h1>Rp. <span id="change_output">0</span></h1>
                                <input type="hidden" id="hidden_input" name="nilai_sementara" value="0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label for="textarea" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                                <textarea id="textarea" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-block btn-success"><i class="fas fa-check"></i> Confirm</button>
    </form>
</section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Product Item</h4>
                <button type="button" class="close" data-dismiss='modal' aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="tabel1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($item as $items): ?>
                            <tr>
                                <td>
                                    <?= $items->barcode_item; ?>
                                </td>
                                <td>
                                    <?= $items->name_item; ?>
                                </td>
                                <td>
                                    <?= $items->nama_unit; ?>
                                </td>
                                <td>
                                    Rp.
                                    <?= $items->price_item; ?>
                                </td>
                                <td>
                                    <?= $items->stock_item; ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary" id="select" data-id="<?= $items->id_item; ?>"
                                        data-barcode="<?= $items->barcode_item; ?>" data-name="<?= $items->name_item; ?>"
                                        data-unit="<?= $items->nama_unit; ?>" data-stock="<?= $items->stock_item; ?>"
                                        data-price="<?= $items->price_item; ?>">
                                        <i class="fa fa-check"></i> Select
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    let cashInput = document.getElementById('cash_input'); // String
    let changeOutput = document.getElementById('change_output'); // String
    let totalOutput = document.getElementById('total_sementara'); // String
    let hiddenInput = document.getElementById('hidden_input'); // String
    let hiddenInputTotal = document.getElementById('hidden_input_total'); // String
    let idTotalSementara = document.getElementById('total_sementara'); // String

    cashInput.addEventListener('blur', function () {
        let cashValue = parseInt(cashInput.value, 10); // Number
        let totalSementaraValue = parseInt(idTotalSementara.textContent, 10); // Number

        if (cashValue > totalSementaraValue) {
            let result = cashValue - totalSementaraValue; // Number

            let resultString = result.toString(); // String

            changeOutput.textContent = resultString;
            salinNilaiKeInput();
        } else {
            changeOutput.textContent = '0';
        }
    });

    function salinNilaiKeInput() {
        let nilaiSpan = changeOutput.innerText;
        hiddenInput.value = nilaiSpan;
    }

    function salinNilaiInputTotal() {
        let nilaiSpanTotal = totalOutput.innerText;
        hiddenInputTotal.value = nilaiSpanTotal;
    }

    $(document).ready(function () {
        $(document).on('click', '#select', function () {
            var id_item = $(this).data('id');
            var barcode_item = $(this).data('barcode');
            var name_item = $(this).data('name');
            var nama_unit = $(this).data('unit');
            var price_item = $(this).data('price');
            var stock_item = $(this).data('stock');
            $('#id_item').val(id_item);
            $('#barcode_item').val(barcode_item);
            $('#name_item').val(name_item);
            $('#nama_unit').val(nama_unit);
            $('#stock_item').val(stock_item);
            $('#price_item').val(price_item);
            $('#modal-item').modal('hide');
        })
    })

    function changeDropDownText(text) {
        document.getElementById('dropdownMenuButton').textContent = text;
    }
    function changeDropDownTextProduk(text) {
        document.getElementById('dropdownMenuButtonProduk').textContent = text;
    }

    let cart = [];

    function tambahPesanan() {
        let barcodeItem = document.getElementById('barcode_item').value;
        let qty = document.getElementById('qty').value;

        if (barcodeItem.trim() === '' || qty.trim() === '') {
            alert('Barcode dan Qty harus diisi!');
            return;
        }

        let idItem = document.getElementById('id_item').value;
        let nameItem = document.getElementById('name_item').value;
        let price = document.getElementById('price_item').value;
        let total = qty * price;

        let order = {
            idItem: idItem,
            barcodeItem: barcodeItem,
            nameItem: nameItem,
            qty: qty,
            price: price,
            total: total
        };

        cart.push(order);
        tampilkanPesananSementara();
        salinNilaiInputTotal();
    }

    function tampilkanPesananSementara() {
        let tabelPesanan = document.getElementById('tabel-pesanan');
        let fieldTotal = document.getElementById('total_sementara');

        let totalSementara = 0;
        cart.forEach(function (order) {
            totalSementara += order.total;
        });

        fieldTotal.textContent = totalSementara;

        tabelPesanan.innerHTML = '';

        cart.forEach(function (order, index) {
            let row = tabelPesanan.insertRow();

            let cellBarcode = row.insertCell(0);
            cellBarcode.innerHTML = order.barcodeItem;

            let cellName = row.insertCell(1);
            cellName.innerHTML = order.nameItem;

            let cellPrice = row.insertCell(2);
            cellPrice.innerHTML = order.price;

            let cellQty = row.insertCell(3);
            cellQty.innerHTML = order.qty;

            let cellTotal = row.insertCell(4);
            cellTotal.innerHTML = order.total;

            let cellDelete = row.insertCell(5);
            let deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.classList.add('btn', 'btn-danger', 'btn-block');
            deleteButton.onclick = function () {
                hapusPesanan(index);
            };
            cellDelete.appendChild(deleteButton);
        });
    }

    function hapusPesanan(index) {
        cart.splice(index, 1);
        tampilkanPesananSementara();
    }

    // let totalSementara = document.getElementById('total_sementara').innerText;
    // document.getElementById('nilai_sementara').value = totalSementara;

</script>