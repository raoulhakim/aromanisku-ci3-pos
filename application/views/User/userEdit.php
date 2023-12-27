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
                        <i class="fa fa-user-plus"></i> Edit User
                    </h3>
                </div>
                <div class="col-auto">
                    <a href="<?= site_url('user'); ?>" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4 offset-4">
                    <form action="" method="post">
                        <div class="form-group <?= form_error('nama_user') ? 'has-error' : null; ?>">
                            <label for="nama_user">Full Name*</label>
                            <input type="hidden" name="id_user" value="<?= $row->id_user; ?>">
                            <input type="text" name="nama_user" class="form-control"
                                value="<?= $this->input->post('nama_user') !== null ? $this->input->post('nama_user') : $row->nama_user ?>"
                                <?= form_error('nama_user'); ?>>
                            <div class="form-group <?= form_error('username') ? 'has-error' : null; ?>">
                                <label for="username">Username*</label>
                                <input type="text" name="username" class="form-control"
                                    value="<?= $this->input->post('username') !== null ? $this->input->post('username') : $row->username ?>">
                                <?= form_error('username'); ?>
                            </div>
                            <div class="form-group <?= form_error('password') ? 'has-error' : null; ?>">
                                <label for="password">Password</label><small>Kosongkan apabila tidak akan mengganti
                                    password</small>
                                <input type="password" name="password" class="form-control"
                                    value="<?= $this->input->post('password'); ?>">
                                <?= form_error('password'); ?>
                            </div>
                            <div class="form-group <?= form_error('password_confirmation') ? 'has-error' : null; ?>">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    value="<?= $this->input->post('password_confirmation'); ?>">
                                <?= form_error('password_confirmation'); ?>
                            </div>
                            <div class="form-group <?= form_error('alamat_user') ? 'has-error' : null; ?>">
                                <label for="alamat_user">Address</label>
                                <textarea name="alamat_user"
                                    class="form-control"><?= $this->input->post('alamat_user') !== null ? $this->input->post('alamat_user') : $row->alamat_user ?></textarea>
                                <?= form_error('alamat_user'); ?>
                            </div>
                            <div class="form-group <?= form_error('level_user') ? 'has-error' : null; ?>">
                                <label for="level_user">Level</label>
                                <select name="level_user" class="form-control">
                                    <?php $level = $this->input->post('level_user') ? $this->input->post('level_user') : $row->level_user ?>
                                    <option value="1" <?= $level == 1 ? 'selected' : null; ?>>Admin
                                    </option>
                                    <option value="2" <?= $level == 2 ? 'selected' : null; ?>>Kasir
                                    </option>
                                </select>
                                <?= form_error('level_user'); ?>
                            </div>
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check"></i>
                                Confirm</button>
                            <button type="reset" class="btn btn-secondary btn-block">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>