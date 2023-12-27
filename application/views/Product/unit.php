<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Units</h1>
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
                        Unit List
                    </h3>
                </div>
                <div class="col-auto">
                    <a href="<?= site_url('unit/add'); ?>" class="btn btn-block btn-primary"><i
                            class="fa fa-user-plus"></i> Add Unit</a>
                </div>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="tabel1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
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
                                <?= $data->nama_unit; ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= site_url('unit/edit/' . $data->id_unit); ?>" class="btn btn-secondary">
                                    <i class="fa fa-pencil-alt"></i> Edit unit
                                </a>
                                <a href="<?= site_url('unit/del/' . $data->id_unit); ?>" class="btn btn-danger"
                                    onclick="return confirm('WARNING!!! ARE YOU SURE TO DELETE THIS unit?')">
                                    <i class="fa fa-trash"></i> Delete unit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>