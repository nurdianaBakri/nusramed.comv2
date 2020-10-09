  <script src="<?= base_url()."assets/" ?>dataTables.buttons.min.js"></script>
  <script src="<?= base_url()."assets/" ?>pdfmake.min.js"></script>
  <script src="<?= base_url()."assets/" ?>vfs_fonts.js"></script>
  <script src="<?= base_url()."assets/" ?>buttons.html5.min.js"></script>
  <script src="<?= base_url()."assets/" ?>jszip.min.js"></script>
  <script src="<?= base_url()."assets/" ?>buttons.colVis.min.js"></script> 
  <link href="<?php echo base_url('assets/buttons.dataTables.min.css')?>" rel="stylesheet" />

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
                <th>Tanggal Faktur</th>  
                <th>Suplier</th>
                <th>Barcode</th>
                <th>No Batch</th>
                <th>No Register</th>
                <th>Tgl Exp</th>
                <th>Kode Pembayaran</th>
                <th>Jatuh Tempo</th>
                <th>Jumlah Beli</th>
                <th>Sisa Stok</th>
                <th>Terjual</th>
                <th>Return</th>
                <th>Sub total</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Diskon</th>
                <th>Kode User</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($laporan->result_array() as $key) 
            //GET SUPLIER  
           
            //GET  
            : 

             //update data terjual
            $where = array(
                'barcode' => $key['barcode'], 
                'no_batch' => $key['no_batch'], 
                'no_reg' => $key['no_reg'], 
                'tgl_exp' => $key['tgl_exp'], 
            );
            $this->db->where($where);
            $this->db->select_sum('qty_verified');
            $terjual_real = $this->db->get('trx_penjualan_tmp')->row_array()['qty_verified'];

            /*$where = array(
                'barcode' => $key['barcode'], 
                'no_batch' => $key['no_batch'], 
                'no_reg' => $key['no_reg'], 
                // 'no_faktur' => $key['no_faktur'], 
                'tgl_exp' => $key['tgl_exp'], 
            );
            $this->db->order_by('tgl_exp','ASC');
            $this->db->where($where );
            $check = $this->db->get('detail_obat')->result_array();*/

            /*foreach ($check as $key2) {
                if ($key2['qty_verified']>$terjual_real || $key2['qty_verified']==$terjual_real)
                {
                    $data_update = array(
                        'sisa_stok' => $key['stok_awal']-$terjual_real, 
                        'terjual' => $terjual_real, 
                    );
                    $this->db->where(array('id_detail_obat' =>$key2['id_detail_obat'] )); 
                    $this->db->update('detail_obat',  $data_update );
                    $terjual_real =0;
                } 
                else
                {
                    //get qty verified 
                    $terjual_real = $terjual_real - $key2['qty_verified'];

                    $data_update = array(
                        'sisa_stok' => $key['stok_awal']-$terjual_real, 
                        'terjual' => $terjual_real, 
                    );
                    $this->db->where(array('id_detail_obat' =>$key2['id_detail_obat'] )); 
                    $this->db->update('detail_obat',  $data_update );
                }
            }*/

                
 
            ?>
                <tr>
                    <td><?= date("Y-m-d", strtotime($key['time']))  ?></td>
                    <td><?= $key['no_faktur'] ?> </td>
                    <td><?php 
                    if ($key['tgl_faktur']==null) {
                        echo "-";
                    }
                    else
                    { 
                        $key['tgl_faktur'];
                    }
                    ?> </td>
                    <td><?php  echo $key['nama_suplier'] ?></td>
                    <td><?php  echo $key['nama_obat']  ?></td>
                    <td><?= $key['no_batch'] ?> </td>
                    <td><?= $key['no_reg'] ?> </td>
                    <td><?= date("d/m/Y", strtotime($key['tgl_exp']))  ?> </td>
                    <td><?php echo $key['kode_pembayaran']?> </td>
                    <td><?php  
                    if ($key['tgl_jatuh_tempo']=="0000-00-00 00:00:00") {
                        echo "-";
                    }
                    else {
                        $s = strtotime($key['tgl_jatuh_tempo']); 
                        echo date('d M Y', $s);
                    }
                     ?> </td>
                    <td><?= $key['qty_verified'] ?> </td>
                    <td><?= $key['sisa_stok'] ?> </td>
                    <td><?= $key['terjual'] ?></td>
                    <td><?= $key['return'] ?></td>
                    <td><?= number_format($key['sub_total'],2); ?> </td>
                    <td><?= number_format($key['harga_beli'],2); ?> </td>
                    <td><?= number_format($key['harga_jual'],2); ?> </td>
                    <td><?= $key['diskon_beli'] ?></td>
                    <td><?= $key['id_user'] ?> </td>
                </tr>
            <?php endforeach ?> 
        </tbody>
        <tfoot>
            <tr>
                <th>Tanggal Input</th>
                <th>No Faktur</th>
                <th>Tanggal Faktur</th>
                <th>Suplier</th>
                <th>Barcode</th>
                <th>No Batch</th>
                <th>No Register</th>
                <th>Tgl Exp</th>
                <th>Kode Pembayaran</th>
                <th>Jatuh Tempo</th>
                <th>Jumlah Beli</th>
                <th>Sisa Stok</th>
                <th>Terjual</th>
                <th>Return</th>
                <th>Sub total</th>
                <th>Harga Beli</th> 
                <th>Harga Jual</th>
                <th>Diskon</th>
                <th>Kode User</th>
            </tr>
        </tfoot>
    </table>
</div>
