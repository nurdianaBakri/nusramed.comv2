<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: false, 
         // paging:   false, 
        autoWidth : false, 
    });   
});
</script> 

<div class="table-responsive">
                       
<table class="table table-bordered table-hover js-basic-example" id="tab_logic" style="font-size: 10px">
        <thead>
          <tr >
            <th> # </th>
            <th style="width:20%;"> Barcode</th>
            <!-- <th> No. faktur</th> -->
            <th> Satuan</th>
            <th> No. Reg</th>
            <th> Lokasi</th>
            <th style="width:15%;"> Harga Beli</th>
            <th style="width:10%;"> Last Update</th>
            <th style="width:7%;"> Sisa Stok</th> 
            <th style="width:1%;"> No. Batch</th>
            <th style="width:1%;"> Tgl Exp</th> 
            <th style="width:1%;"> Stok Real</th>
          </tr>
        </thead>
        <tbody id='element_table'>

            <?php 
            $no=1; 
            foreach ($detail_obat->result() as $items ):

                    $subtotal = $items->harga_beli*$items->stok_awal;
                    ?> 
                        <tr>
                            <td><?= $no++; ?></td>
                            <td> 
                                <input type="hidden"  id="barcode_item" name="barcode[]" value="<?= $items->barcode ?>" >
                        
                                <input type="hidden" name="no_batch_old[]" value="<?= $items->no_batch ?>" >

                                <input type="hidden"  name="no_reg[]" value="<?= $items->no_reg ?>" >  
                                <input type="hidden"  name="tgl_exp_old[]" value="<?= $items->tgl_exp ?>" >  
                                <input type="hidden"  name="id_detail_obat[]" value="<?= $items->id_detail_obat ?>" >  

                                 <input type="hidden"  name="nama[]" value="<?= $items->nm_obat  ?>" >  
                            <?php echo $items->label ?></td> 
                            <!-- <td><?php echo $items->no_faktur ?></td>  -->
                             
                            <td><?= $items->nm_satuan ?></td> 
                            <td><?= $items->no_reg ?></td>  

                            <td> <?= $items->lokasi ?></td>
                             <td><?= number_format($items->harga_beli,2); ?></td>
                             <td><?= date_from_datetime($items->time,3); ?></td>
                            <td> <?= $items->sisa_stok_total ?></td> 
                            <td>
                                <input type="text" name="no_batch[]" value="<?= $items->no_batch; ?>" class="form-control" >
                            </td>
                            <td>  
                                 <?php
                                    $s = strtotime($items->tgl_exp); 
                                    $date_2 =  date('Y-m-d', $s);   
                                ?> 
                                <input type="date" name="tgl_exp[]" value="<?= $date_2; ?>" class="form-control" >
                            </td>   
                              <td> 
                                 <input type="hidden" name="sisa_stok[]"  value="<?= $items->sisa_stok_total ?>"  class="form-control" min="0" max="100">

                                <input type="number" size="2" name="stok_real[]" value="" class="form-control" min="0" >
                            </td> 
                             
                        </tr>
  

             <?php endforeach ?>

        </tbody>
       
    </table>

</div>