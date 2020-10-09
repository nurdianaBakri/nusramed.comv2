 

<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: false, 
        autoWidth : false, 
    });   
});
</script> 
 

    <button class="btn btn-success pull-right waves-effect m-r-20" onclick="setHarga()">Update harga Obat</button>  

    <form id="myForm3"> 
        <table class="table table-bordered table-hover js-basic-example2" id="tab_logic" style="font-size: 10px">
            <thead>
              <tr > 
                <th> Barcode</th>
                <th> Satuan</th>
                <th> No. Batch/No. Reg</th> 
                <th> Tgl Exp</th>
                <th> Diskon %</th>
                <th> Nilai PPN</th>
                <th> Qty</th> 
                <th> Harga Beli</th>
                <th> Diskon Maximal</th>
                <th> Harga Jual</th>
              </tr>
            </thead>
            <tbody id='element_table'>

                <?php 
                $no=1; 
                foreach ($detail_obat as $items ):

                     $this->db->where('barcode', $items->barcode);
                     $items2 = $this->db->get('detail_obat');

                     $this->db->where('kd_satuan', $items->kd_satuan);
                    $satuan = $this->db->get('satuan')->row();  

                    if ($items2->num_rows()>0) {
                        $items22 = $items2->result(); 

                        foreach ($items2->result() as $items22)
                        {
                            $subtotal = $items22->harga_beli*$items22->stok_awal;
                            ?>
                                 <tr> 
                                    <td> 
                                        <input type="hidden"  id="barcode_item" name="barcode[]" value="<?= $items22->barcode ?>" >
                                
                                        <input type="hidden" name="no_batch[]" value="<?= $items22->no_batch ?>" >

                                        <input type="hidden"  name="no_reg[]" value="<?= $items22->no_reg ?>" >  
                                    <?php echo $items22->barcode. " - <br>".$items->nama ?></td> 
                                     
                                    <td><?= $satuan->nm_satuan ?></td> 
                                    <td><?= $items22->no_batch."<br>".$items22->no_reg ?></td>

                                    <td> 
                                         <?php
                                        $s = strtotime($items22->tgl_exp); 
                                        $date_2 =  date('Y-m-d', $s);   
                                        ?>

                                          <input type="date" name="tgl_exp[]" value="<?php echo $date_2 ?>" size="1" class="form-control">
                                    </td> 
                                     
                                    <td><?= $items22->diskon_beli ?></td>

                                    <td> <?php 
                                    echo number_format((($items22->ppn/100)*($subtotal-($subtotal*($items22->diskon_beli/100)))),2) ?></b>
                                    </td> 

                                    <td> <?= $items22->stok_awal ?></td> 
                                     <td><?= number_format($items22->harga_beli,2); ?></td>
                                     <td>
                                        <input type="text" min="0" max="5"  class="form-control" name="diskon_maximal[]" value="<?= $items22->diskon_maximal ?>" >
                                    </td>
                                    <td>
                                        <input type="text" name="harga_jual[]" class="form-control"  value="<?= number_format($items22->harga_jual,2) ?>">
                                    </td>
                                     
                                </tr>
                            <?php 
                        }  
                    }  ?>   
                 <?php endforeach ?>

            </tbody>
           
        </table> 
    </form>    


<script type="text/javascript">

      

    function setHarga() {   
         if ($("#myForm2").valid()==false)
         {
            return false;
         }
         else
         {
            if (confirm("Apakah anda yakin ingin menyimpan data ini ?")) { 

                var url_controller  = $('#url').val(); 
                    var url = "<?php echo base_url() ?>"+url_controller+"setHarga"; 
                    var data = $('#myForm3').serialize();
                    console.log(url);

                    $.ajax( {
                        type: "POST",
                        url: url,
                        data: data,
                        dataType: "json",
                        success: function( response ) {  
                        try{     
                            //reload page
                            reload_data(); 
                            $('#myModal').modal('hide'); 
                            sukses2(response.return, response.pesan);  
                             
                        }catch(e) {  
                            alert('Exception while request..');
                        }  
                    }
                } );  
            }
        }        
     }
  
</script>


       