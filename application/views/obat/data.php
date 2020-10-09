<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : true, 
    });   
});
</script>   

<div class="callout callout-warning">
    <?php echo $pesan ?>
</div> 

<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr> 
            <th></th>  
            <th>No</th>
            <th>Barcode</th>
            <th>Nama</th>
            <th>Satuan</th> 
            <th>Industri</th> 
            <th>Kadungan</th> 
            <th>Deskripsi</th>
            <th>Jenis Terapi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data as $key => $value) {
        ?>
            <tr>   
                <td>
                   <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Aksi
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a  href="<?= base_url().'Obat/edit/'.$value['id_obat']?>">Detail
                        </a> </li>
                      <li>
                        <a  href="#" onclick="hapus('<?php echo $value['barcode'] ?>')">Hapus
                        </a> 
                       </li>
                      <li><a  href="<?= base_url().'Obat/print/'.$value['id_obat']?>" target="_blank">Print
                        </a></li>
                    </ul>
                  </div> 
                </td>

                <td><?=$value['id_obat'];?></td>
                <td><?=$value['barcode'];?></td>
                <td style="cursor: pointer;">  <?=$value['nama'];?>  </td>
                <td>
                    <?=
                        $satuan = $this->Satuan_obat->get(array('kd_satuan' => $value['kd_satuan'] ))->row_array()['nm_satuan']; 
                    ?> 
                </td> 
                 <td>
                    <?=
                        $nama_industri = $this->Industri_model->getBy(array('kd_industri' => $value['kd_industri'] ))['nama']; 
                    ?> 
                    </td>  
                <td><?=$value['kandungan'];?></td> 
                <td><?=$value['deskripsi'];?></td>
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
            if (confirm("Apakah anda yakin ingin menghapus data ini ?")) {
                   $.ajax( {
                    type: "POST",
                    url: url,
                    data: {},
                    dataType: "json",
                    success: function( response ) {   
                        console.log(response);
                        try{    
                            sukses2(response.return, response.pesan);  
                            reload_data(); 
                        }catch(e) {  
                            alert('Exception while request..');
                        }  
                    }
                } ); 
            }
            return false;  
               
        }  
    

</script>

 