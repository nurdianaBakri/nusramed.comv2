
<?php
$this->load->view('include2/data_table');
?>


<script type="text/javascript">
    $(document).ready(function() {

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
                
            },
            {
                extend: 'pdfHtml5',
                 orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
    } );
} );
</script>


 <div class="table-responsive">
    <table id="example" class="display table table-bordered table-striped table-hover " style="width:100%">
        <thead>
            <tr>
                <th>Tanggal Input</th>
                <th>No Faktur</th>
                <th>Uraian</th>
                <th>No Batch</th>
                <th>Tgl Exp</th>
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
                    <td><?=$key['time']?></td>
                    <td><?=$key['no_faktur']?> </td>
                    <td><?=$key['nama_obat'];?> </td>
                    <td><?=$key['no_batch']?></td>
                    <td><?=$key['tgl_exp']?> </td>
                </tr>
            <?php endforeach?>
        </tbody>
        <tfoot>
            <tr>
                <th>Tanggal Input</th>
                <th>No Faktur</th>
                <th>Uraian</th>
                <th>No Batch</th>
                <th>Tgl Exp</th>
            </tr>
        </tfoot>
    </table>
</div>
