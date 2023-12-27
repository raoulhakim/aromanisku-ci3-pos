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
                        <i class="fa fa-user-plus"></i> Add Item
                    </h3>
                </div>
                <div class="col-auto">
                    <a href="<?= site_url('item'); ?>" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4 offset-4">
                    <?= form_open_multipart('item/process') ?>
                    <div class="form-group">
                        <label for="nama_item">Barcode*</label>
                        <input type="hidden" name="id_item" value="<?= $row->id_item; ?>">
                        <input type="text" name="barcode_item" class="form-control" value="<?= $row->barcode_item; ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Product Name*</label>
                        <input type="text" name="name_item" class="form-control" value="<?= $row->name_item; ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Product Category*</label>
                        <select name="category_item" class="form-control" required>
                            <option value="">--
                                Choose Category --</option>
                            <?php foreach ($category->result() as $key => $data): ?>
                                <option value="<?= $data->id_category; ?>" <?= $data->id_category == $row->id_category ? "selected" : null; ?>>
                                    <?= $data->nama_category; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_unit">Product Unit*</label>
                        <?= form_dropdown('unitss', $unitss, $selected_unit, ['class' => 'form-control', 'required' => 'required']); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Product Price*</label>
                        <input type="text" name="price_item" class="form-control" value="<?= $row->price_item; ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Product Image</label>
                        <?php if ($page == 'edit'):
                            if ($row->image_item != null): ?>
                                <img src="<?= base_url('upload/product/' . $row->image_item) ?>" style="width : 80%">
                            <?php endif;
                        endif;
                        ?>
                        <input type="file" name="image_item" class="form-control">
                        <small>
                            <?= $page == 'edit' ? '' : '*tidak wajib diisi'; ?>
                        </small>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" name="<?= $page; ?>"><i
                            class="fa fa-save"></i>
                        <?= $page; ?>
                        Item
                    </button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>