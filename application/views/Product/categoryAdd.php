<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category</h1>
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
                        <i class="fa fa-user-plus"></i> Add Category
                    </h3>
                </div>
                <div class="col-auto">
                    <a href="<?= site_url('category'); ?>" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4 offset-4">
                    <form action="<?= site_url('category/process'); ?>" method="post">
                        <div class="form-group">
                            <label for=" nama_category">Category Name*</label>
                            <input type="hidden" name="id_category" value="<?= $row->id_category; ?>">
                            <input type="text" name="nama_category" class="form-control"
                                value="<?= $row->nama_category; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" name="<?= $page; ?>"><i
                                class="fa fa-save"></i>
                            <?= $page; ?>
                            category
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>