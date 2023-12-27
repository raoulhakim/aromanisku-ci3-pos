<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report
        <?= $row->barcode_item; ?>
    </title>
</head>

<body>
    <?php
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode_item, $generator::TYPE_CODE_128)) . '" style="width : 200px">';
    ?>
    <br>
    <?= $row->barcode_item; ?>
    <br>
    <?php
    foreach ($row as $key => $value) {
        echo "$key: $value <br>";
    }
    ?>
</body>

</html>