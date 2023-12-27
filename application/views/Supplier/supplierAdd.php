<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Supplier</h1>
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
                        <i class="fa fa-user-plus"></i> Add Supplier
                    </h3>
                </div>
                <div class="col-auto">
                    <a href="<?= site_url('supplier'); ?>" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4 offset-4">
                    <form action="<?= site_url('supplier/process'); ?>" method="post">
                        <div class="form-group">
                            <label for=" nama_supplier">Supplier Name*</label>
                            <input type="hidden" name="id_supplier" value="<?= $row->id_supplier; ?>">
                            <input type="text" name="nama_supplier" class="form-control"
                                value="<?= $row->nama_supplier; ?>">
                        </div>
                        <div class="form-group">
                            <label for=" no_hp_supplier">Phone Number*</label>
                            <input type="number" name="no_hp_supplier" class="form-control"
                                value="<?= $row->no_hp_supplier; ?>">
                        </div>
                        <div class="form-group">
                            <label for=" alamat_supplier">Address*</label>
                            <textarea type="number" name="alamat_supplier"
                                class="form-control"><?= $row->alamat_supplier; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for=" deskripsi_supplier">Description</label>
                            <textarea type="number" name="deskripsi_supplier"
                                class="form-control"><?= $row->deskripsi_supplier; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" name="<?= $page; ?>"><i
                                class="fa fa-save"></i>
                            <?= $page; ?>
                            Supplier
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>