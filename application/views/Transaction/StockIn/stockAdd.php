<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Transaction</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col">
                    <h3 class="box-title">
                        <i class="fa fa-box-open"></i>
                        <?= $page; ?>
                    </h3>
                </div>
                <div class="col-auto">
                    <a href="<?= $page == "Stock In" ? site_url('stock/in') : site_url('stock/out'); ?>"
                        class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4 offset-4">
                    <form action="<?= site_url('stock/process'); ?>" method="post">
                        <div class="form-group">
                            <label for=" nama_stock">Date*</label>
                            <input type="date" name="date" class="form-control" value="<?= date('Y-m-d'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Barcode*</label>
                        </div>
                        <div class="form-group input-group">
                            <input type="hidden" name="id_item" id="id_item">
                            <input type="text" name="barcode_item" id="barcode_item" class="form-control" required
                                autofocus>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                                    data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Item Name</label>
                            <input type="text" name="name_item" id="name_item" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="nama_unit">Unit Name</label>
                                    <input type="text" class="form-control" name="nama_unit" id="nama_unit" value='-'
                                        readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="stock">Initial Stock</label>
                                    <input type="text" class="form-control" name="stock_item" id="stock_item" value='-'
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Detail*</label>
                            <input type="text" name="detail_stock" id="detail_stock" class="form-control"
                                placeholder="Detail mengenai produk...." required>
                        </div>
                        <?php if ($page == "Stock In"): ?>
                            <div class="form-group">
                                <label for="">Supplier</label>
                                <select name="nama_supplier" id="nama_supplier" class="form-control">
                                    <option value="">-- Choose Supplier --</option>
                                    <?php foreach ($supplier as $i => $data):
                                        echo '<option value="' . $data->id_supplier . '">' . $data->nama_supplier . '</option>';
                                    endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="">Qty</label>
                            <input type="number" name="qty" id="qty" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block"
                            name="<?= $page == "Stock In" ? 'in_add' : 'out_add'; ?>"><i class="fa fa-save"></i>
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                                        data-unit="<?= $items->nama_unit; ?>" data-stock="<?= $items->stock_item; ?>">
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
    $(document).ready(function () {
        $(document).on('click', '#select', function () {
            var id_item = $(this).data('id');
            var barcode_item = $(this).data('barcode');
            var name_item = $(this).data('name');
            var nama_unit = $(this).data('unit');
            var stock_item = $(this).data('stock');
            $('#id_item').val(id_item);
            $('#barcode_item').val(barcode_item);
            $('#name_item').val(name_item);
            $('#nama_unit').val(nama_unit);
            $('#stock_item').val(stock_item);
            $('#modal-item').modal('hide');
        })
    })
</script>