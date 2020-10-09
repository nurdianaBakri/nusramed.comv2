
 <div class="table-responsive">
    <table id="example" class="display table table-bordered table-striped table-hover " style="width:100%">
        <thead>
            <tr>
                <th>Tanggal Input</th>
                <th>No Faktur</th>
                <th>Uraian</th>
                <th>No Batch (pilih nomor bacth)</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Sisa</th>
                <th>Paraf </th>
            </tr>
        </thead>
        <tbody>

            <?php

$sisa = 0;
foreach ($laporan as $key)
//GET SUPLIER

//GET
: ?>
                <tr>
					<?php
$uraian = "";
if ($key['jenis_faktur'] == "Pembelian") {
    $sisa = $sisa + $key['masuk'];
    $uraian = $this->db->query("SELECT nama FROM suplier WHERE kd_suplier='" . $key['uraian'] . "'")->row_array()['nama'];
} else if ($key['jenis_faktur'] == "Stok Opname") {
    $sisa = $key['sisa'];
    $uraian = "Stok Opname";
} else {
    $sisa = $sisa - $key['keluar'];
    $uraian = $this->db->query("SELECT nama FROM outlet1 WHERE id_outlet='" . $key['uraian'] . "'")->row_array()['nama'];
}
?>

                    <td><?=$key['tanggal']?></td>
                    <td><?=$key['no_faktur']?> </td>
                    <td><?=$uraian;?> </td>
                    <td><?=$key['no_batch']?></td>
                    <td><?=$key['masuk']?> </td>
                    <td><?=$key['keluar']?> </td>
                    <td> <?=$sisa;?> </td>
                    <td><?="-"?> </td>
                </tr>
            <?php endforeach?>
        </tbody>
        <tfoot>
            <tr>
                <th>Tanggal Input</th>
                <th>No Faktur</th>
                <th>Uraian</th>
                <th>No Batch (pilih nomor bacth)</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Sisa</th>
                <th>Paraf </th>
            </tr>
        </tfoot>
    </table>
</div>
