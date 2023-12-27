<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User</h1>
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
                        User List
                    </h3>
                </div>
                <div class="col-auto">
                    <a href="<?= site_url('user/add'); ?>" class="btn btn-block btn-primary"><i
                            class="fa fa-user-plus"></i> Add User</a>
                </div>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>Level</th>
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
                                <?= $data->username; ?>
                            </td>
                            <td>
                                <?= $data->nama_user; ?>
                            </td>
                            <td>
                                <?= $data->alamat_user; ?>
                            </td>
                            <td>
                                <?= $data->level_user == 1 ? "Admin" : "Kasir"; ?>
                            </td>
                            <td class="text-center">
                                <form action="<?= site_url('user/del/' . $data->id_user); ?>" method="post">
                                    <a href="<?= site_url('user/edit/' . $data->id_user); ?>" class="btn btn-secondary">
                                        <i class="fa fa-pencil-alt"></i> Edit User
                                    </a>
                                    <input type="hidden" value="<?= $data->id_user; ?>" name="id_user">
                                    <button class="btn btn-danger"
                                        onclick="return confirm('WARNING!!! ARE YOU SURE TO DELETE THIS USER?')">
                                        <i class="fa fa-trash"></i> Delete User
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>