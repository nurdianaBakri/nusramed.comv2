<html>
<head>
    <title>Cetak PDF</title>
</head>
<body>
<h1 style="text-align: center;">Data Siswa</h1>
<a href="<?php echo base_url("index.php/main/cetak"); ?>">Cetak Data</a><br><br>
<table border="1" width="100%">
<tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Telepon</th>
    <th>Alamat</th>
</tr>
<?php

var_dump($load);

if (!empty($load)) {
    $no = 1;
    foreach ($load as $data) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $data->barcode . "</td>";
        echo "<td>" . $data->barcode . "</td>";
        echo "<td>" . $data->barcode . "</td>";
        echo "<td>" . $data->barcode . "</td>";
        echo "<td>" . $data->barcode . "</td>";
        echo "</tr>";
        $no++;
    }
}
?>
</table>
</body>
</html>