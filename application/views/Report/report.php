<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-red" style="display: flex; justify-content: space-between; align-items: center;">

            </div>
            <div class="card-body">
                <h1 style="margin-bottom: 0;">Reports</h1>
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
                        <h4>Report Data Table</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="tabel1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item Name</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Date</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($row as $key => $info): ?>
                                    <tr>
                                        <td>
                                            <?= $key + 1; ?>
                                        </td>
                                        <td>
                                            <?= $info->item_name; ?>
                                        </td>
                                        <td>
                                            <?= $info->type_stock; ?>
                                        </td>
                                        <td>
                                            <?= $info->detail_stock; ?>
                                        </td>
                                        <td>
                                            <?= $info->qty; ?>
                                        </td>
                                        <td>
                                            <?= $info->date; ?>
                                        </td>
                                        <!-- <td class="text-center">
                                            <a href="<?= site_url('report/report_print/' . $info->id_item); ?>"
                                                class="btn btn-block btn-primary" target="_blank"><i
                                                    class="fa fa-print"></i> Print</a>
                                        </td> -->
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