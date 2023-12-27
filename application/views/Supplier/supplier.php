<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-red" style="display: flex; justify-content: space-between; align-items: center;">

            </div>
            <div class="card-body">
                <h1 style="margin-bottom: 0;">Supplier</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col">
                        <h4>Supplier Data Table</h4>
                    </div>
                    <a href="<?= site_url('supplier/add'); ?>" class="btn btn-primary btn-block w-auto"><i
                            class="fa fa-user-plus"></i> Add
                        Supplier</a>
                </div>
            </div>
            <div class="card-body">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="tabel1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($row->result() as $key => $data): ?>
                                    <tr>
                                        <td>
                                            <?= $key + 1; ?>
                                        </td>
                                        <td>
                                            <?= $data->nama_supplier; ?>
                                        </td>
                                        <td>
                                            <?= $data->no_hp_supplier; ?>
                                        </td>
                                        <td>
                                            <?= $data->alamat_supplier; ?>
                                        </td>
                                        <td>
                                            <?= $data->deskripsi_supplier; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= site_url('supplier/edit/' . $data->id_supplier); ?>"
                                                class="btn btn-secondary">
                                                <i class="fa fa-pencil-alt"></i> Edit
                                            </a>
                                            <!-- <a href="" class="btn btn-danger"
                                    onclick="return confirm('WARNING!!! ARE YOU SURE TO DELETE THIS SUPPLIER?')">
                                    <i class="fa fa-trash"></i> Delete Supplier
                                </a> -->
                                            <a href="#modal-delete" class="btn btn-danger" data-toggle="modal"
                                                onclick="$('#modal-delete #form-delete').attr('action', '<?= site_url('supplier/del/' . $data->id_supplier); ?>')">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure?</h4>
                <button type="button" class="close" data-dismiss='modal' aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-delete" action="" method="post">
                    <button class="btn btn-block btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-block btn-danger" type="submit">Yes, Delete This Data</button>
                </form>
            </div>
        </div>
    </div>
</div>