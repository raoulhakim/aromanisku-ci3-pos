<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>customer</h1>
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
                        <i class="fa fa-user-plus"></i> Add Customer
                    </h3>
                </div>
                <div class="col-auto">
                    <a href="<?= site_url('customer'); ?>" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4 offset-4">
                    <form action="<?= site_url('customer/process'); ?>" method="post">
                        <div class="form-group">
                            <label for=" nama_customer">Customer Name*</label>
                            <input type="hidden" name="id_customer" value="<?= $row->id_customer; ?>">
                            <input type="text" name="nama_customer" class="form-control"
                                value="<?= $row->nama_customer; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin_customer">Gender</label>
                            <select name="jenis_kelamin_customer" class="form-control" required>
                                <option value="">-- Choose Gender --</option>
                                <option value="L" <?= $row->jenis_kelamin_customer == 'L' ? 'selected' : null; ?>>Laki-Laki
                                </option>
                                <option value="P" <?= $row->jenis_kelamin_customer == 'P' ? 'selected' : null; ?>>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for=" no_hp_customer">Phone Number*</label>
                            <input type="number" name="no_hp_customer" class="form-control"
                                value="<?= $row->no_hp_customer; ?>">
                        </div>
                        <div class="form-group">
                            <label for=" alamat_customer">Address*</label>
                            <textarea type="number" name="alamat_customer"
                                class="form-control"><?= $row->alamat_customer; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" name="<?= $page; ?>"><i
                                class="fa fa-save"></i>
                            <?= $page; ?>
                            customer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>