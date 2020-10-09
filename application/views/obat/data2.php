

<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : false, 
    });   
});
</script>   

<div class="callout callout-info">
    <?php echo $pesan ?>
</div>


<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th></th>  
            <th></th>  
            <th></th>  
            <th>KD</th>
            <th>Nama</th>
            <th>Satuan</th>
            <th>Industri</th>
            <th>Suplier</th>
            <th>Lokasi Rak</th>
            <th>Kadungan</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <!-- <th>Deskripsi</th> -->
            <th>Jenis Terapi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data as $key => $value) {
        ?>
            <tr> 
                 <td>
                    <a  href="<?= base_url().'Obat/edit/'.$value['id_obat']?>" class="btn btn-sm btn-warning " data-toggle="tooltip" title="Edit">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a> 
                </td>
                  <td>
                    <a  href="<?= base_url().'Detail_obat/index/'.$value['id_obat'] ?>" class="btn btn-sm btn-success " data-toggle="tooltip" title="Detail">
                        <i class="fa fa-fw fa-list"></i>
                    </a> 
                </td>
                  <td>
                   <button class="btn btn-sm btn-danger  " data-toggle="tooltip" title="Hapus" onclick="hapus(<?php echo $value['id_obat'] ?>)">
                   <i class="fa fa-fw fa-trash"></i>
                    </button>
                </td>

                <td><?=$value['id_obat'];?></td>
                <td style="cursor: pointer;">
                      <?=$value['nama'];?> 
                </td>
                <td>
                    <?=
                    $satuan = $this->Satuan_obat->get(array('kd_satuan' => $value['kd_satuan'] ))->row_array()['nm_satuan']; 
                    echo $satuan; 
                    ?> 
                    </td>
                 <td>
                    <?=
                    $nama_industri = $this->Industri_model->getBy(array('kd_industri' => $value['kd_industri'] ))['nama']; 
                    ?> 
                    </td>
                <td><?=

                 $Suplier = $this->Suplier_model->get(array('kd_suplier' => $value['kd_suplier'] ))->row_array()['nama']; 
                ?></td>
                <td><?=$value['lokasi_rak'];?></td>
                <td><?=$value['kandungan'];?></td>
                <td><?=$value['harga_beli'];?></td>
                <td><?=$value['harga_jual'];?></td>
                <!-- <td><?=$value['deskripsi'];?></td> -->
                <td><?=$value['jenis_terapi'];?></td>    
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>     

<script type="text/javascript">
     function hapus(primary) { 
            var url_controller  = $('#url').val();    
            var url = "<?php echo base_url() ?>"+url_controller+'hapus/'+primary; 

            console.log(url);
              $.ajax( {
                type: "POST",
                url: url,
                data: {},
                dataType: "json",
                success: function( response ) {   
                    console.log(response);
                    try{       
                        $('.modal-body').text(response.pesan);
                        $('.modal-footer').show();
                         $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });  
                         //reload tabel 
                        reload_data(); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }  

        //  function reload_data() { 
        //     var url_controller  = $('#url').val();
        //     var data = $('#myForm').serialize();
        //     var url = "<?php echo base_url() ?>"+url_controller+"reload_data";
        //     console.log(url);
        //     $.ajax( {
        //         type: "POST",
        //         url: url,
        //         data:data,
        //         dataType: "html",
        //         success: function( response ) { 
        //             try{   
        //                 $('.table-responsive').html(response); 
        //             }catch(e) {  
        //                 alert('Exception while request..');
        //             }  
        //         }
        //     } );  
        // }     

</script>

 