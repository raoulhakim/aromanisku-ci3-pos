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
                        <i class="fa fa-user-plus"></i> Add User
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
                    <!-- <?= validation_errors(); ?> -->
                    <form action="" method="post">
                        <div class="form-group <?= form_error('nama_user') ? 'has-error' : null; ?>">
                            <label for="nama_user">Full Name*</label>
                            <input type="text" name="nama_user" class="form-control"
                                value="<?= set_value('nama_user'); ?>">
                            <?= form_error('nama_user'); ?>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null; ?>">
                            <label for="username">Username*</label>
                            <input type="text" name="username" class="form-control"
                                value="<?= set_value('username'); ?>">
                            <?= form_error('username'); ?>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null; ?>">
                            <label for="password">Password*</label>
                            <input type="password" name="password" class="form-control"
                                value="<?= set_value('password'); ?>">
                            <?= form_error('password'); ?>
                        </div>
                        <div class="form-group <?= form_error('password_confirmation') ? 'has-error' : null; ?>">
                            <label for="password_confirmation">Password Confirmation*</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                value="<?= set_value('password_confirmation'); ?>">
                            <?= form_error('password_confirmation'); ?>
                        </div>
                        <div class="form-group <?= form_error('alamat_user') ? 'has-error' : null; ?>">
                            <label for="alamat_user">Address</label>
                            <textarea name="alamat_user"
                                class="form-control"><?= set_value('alamat_user'); ?></textarea>
                            <?= form_error('alamat_user'); ?>
                        </div>
                        <div class="form-group <?= form_error('level_user') ? 'has-error' : null; ?>">
                            <label for="level_user">Level*</label>
                            <select name="level_user" class="form-control">
                                <option value="">--Choose Role--</option>
                                <option value="1" <?= set_value('level_user') == 1 ? "selected" : null; ?>>Admin</option>
                                <option value="2" <?= set_value('level_user') == 2 ? "selected" : null; ?>>Kasir</option>
                            </select>
                            <?= form_error('level_user'); ?>
                        </div>
                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Add
                            User</button>
                        <button type="reset" class="btn btn-secondary btn-block">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>