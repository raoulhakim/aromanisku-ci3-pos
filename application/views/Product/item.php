<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Items</h1>
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
                        Item List
                    </h3>
                </div>
                <div class="col-auto">
                    <a href="<?= site_url('item/add'); ?>" class="btn btn-block btn-primary"><i
                            class="fa fa-user-plus"></i> Add Item</a>
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
                        <th>Category</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row->result() as $key => $data): ?>
                        <tr>
                            <td>
                                <?= $key + 1; ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->barcode_item, $generator::TYPE_CODE_128)) . '">';
                                ?>
                                <br>
                                <?= $data->barcode_item; ?>
                                <br>
                                <a href="<?= site_url('item/barcode_print/' . $data->id_item); ?>"
                                    class="btn btn-block btn-primary" target="_blank"><i class="fa fa-print"></i> Print</a>
                            </td>
                            <td>
                                <?= $data->name_item; ?>
                            </td>
                            <td>
                                <?= $data->nama_category; ?>
                            </td>
                            <td>
                                <?= $data->nama_unit; ?>
                            </td>
                            <td>
                                <?= $data->price_item; ?>
                            </td>
                            <td>
                                <?= $data->stock_item; ?>
                            </td>
                            <td>
                                <?php if ($data->image_item != null): ?>
                                    <img src="<?= base_url('upload/product/' . $data->image_item) ?>" style="width : 100px">
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= site_url('item/edit/' . $data->id_item); ?>" class="btn btn-secondary">
                                    <i class="fa fa-pencil-alt"></i> Edit Item
                                </a>
                                <a href="<?= site_url('item/del/' . $data->id_item); ?>" class="btn btn-danger"
                                    onclick="return confirm('WARNING!!! ARE YOU SURE TO DELETE THIS item?')">
                                    <i class="fa fa-trash"></i> Delete Item
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- <script>
    $(function () {
        $("#tabel1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "processing": true,
            "serverSide": true,
            "ajax": "<?= site_url('item/get_ajax'); ?>"
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#tabel2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script> -->