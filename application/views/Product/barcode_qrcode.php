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
                        <i class="fa fa-barcode"></i> Barcode Generator
                    </h3>
                </div>
                <div class="col-auto">
                    <a href="<?= site_url('item'); ?>" class="btn btn-warning btn-sm">Back</a>
                </div>
            </div>
        </div>

        <div class="box-body">
            <?php
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode_item, $generator::TYPE_CODE_128)) . '">';
            ?>
            <br>
            <?= $row->barcode_item ?>
        </div>
    </div>
</section>