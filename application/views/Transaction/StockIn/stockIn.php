<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="<?= $page == "Stock In" ? 'fa fa-box' : 'fa fa-box-open'; ?>"></i>
                    <?= $page == "Stock In" ? 'Stock In' : 'Stock Out'; ?>
                </h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col">
                    <h3 class="box-title">
                        Stock Data Tables
                    </h3>
                </div>
                <div class="col-auto">
                    <a href="<?= $page == "Stock In" ? site_url('stock/in/add') : site_url('stock/out/add'); ?>"
                        class="btn btn-block btn-primary"><i class="fa fa-user-plus"></i> Add stock</a>
                </div>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="tabel1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $key => $data): ?>
                        <tr>
                            <td>
                                <?= $key + 1; ?>
                            </td>
                            <td>
                                <?= $data->barcode_item; ?>
                            </td>
                            <td>
                                <?= $data->item_name; ?>
                            </td>
                            <td>
                                <?= $data->qty; ?>
                            </td>
                            <td>
                                <?= indo_date($data->date); ?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-secondary" data-toggle="modal" data-target="#modal-detail" id="detail"
                                    data-barcode="<?= $data->barcode_item; ?>" data-itemname="<?= $data->item_name; ?>"
                                    data-suppliername="<?= $page == "Stock Out" ? '' : $data->supplier_name; ?>"
                                    data-qty="<?= $data->qty; ?>" data-date="<?= $data->date; ?>"
                                    data-detailstock="<?= $data->detail_stock; ?>">
                                    <i class="fa fa-eye"></i> Detail
                                </a>
                                <a href="<?= $page == "Stock In" ? site_url('stock/in/del/' . $data->id_stock . '/' . $data->id_item) : site_url('stock/out/del/' . $data->id_stock . '/' . $data->id_item); ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('WARNING!!! ARE YOU SURE TO DELETE THIS DATA?')">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modl-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Stock In</h4>
                <button type="button" class="close" data-dismiss='modal' aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="">Barcode</th>
                            <td><span id='barcode_item'></span></td>
                        </tr>
                        <tr>
                            <th style="">Product Name</th>
                            <td><span id='name_item'></span></td>
                        </tr>
                        <tr>
                            <th style="">Detail</th>
                            <td><span id='detail_stock'></span></td>
                        </tr>
                        <?php if ($page == "Stock In"): ?>
                            <tr>
                                <th style="">Supplier Name</th>
                                <td><span id='nama_supplier'></span></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <th style="">QTY</th>
                            <td><span id='qty'></span></td>
                        </tr>
                        <tr>
                            <th style="">Date</th>
                            <td><span id='date'></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(document).on('click', '#detail', function () {
            var barcode_item = $(this).data('barcode');
            var name_item = $(this).data('itemname');
            var nama_supplier = $(this).data('suppliername');
            var detail_stock = $(this).data('detailstock');
            var qty = $(this).data('qty');
            var date = $(this).data('date');
            $('#barcode_item').text(barcode_item);
            $('#name_item').text(name_item);
            $('#nama_supplier').text(nama_supplier);
            $('#qty').text(qty);
            $('#date').text(date);
            $('#detail_stock').text(detail_stock);
            $('#modal-detail').modal('hide');
        })
    })
</script>