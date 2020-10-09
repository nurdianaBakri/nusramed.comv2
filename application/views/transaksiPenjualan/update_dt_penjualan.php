<table class="table table-bordered table-hover" id="tab_logic" style="font-size: 10px">
    <thead>
        <tr>
            <th class="text-center"> # </th>
            <th class="text-center" style="width:15%;"> Barcode</th> 
            <th class="text-center"> No. Batch</th>
            <th class="text-center"> No. Reg</th>
            <th class="text-center"> Tgl Exp</th>
            <th class="text-center" style="width:7%;"> Qty</th>
            <th class="text-center"> terjual </th>
        </tr>
    </thead>
    <tbody id='element_table'>
        <?php
        $no=1;
        foreach ($penjualan as $key) {
        $query = $this->db->query("SELECT SUM(qty_verified) as qty_verified  from trx_penjualan_tmp WHERE no_batch='".$key->no_batch."' and no_reg='".$key->no_reg."' and barcode='".$key->barcode."' and tgl_exp='".$key->tgl_exp."'");
        ?>
        <tr>
            <th class="text-center"> <?= $no++ ?> </th>
            <th class="text-center" style="width:15%;"> <?= $key->barcode ?> </th>
            <th class="text-center" style="width:15%;"> <?= $key->no_batch ?> </th>
            <th class="text-center" style="width:15%;"> <?= $key->no_reg ?> </th>
            <th class="text-center" style="width:15%;"> <?= $key->tgl_exp ?> </th>
            <th class="text-center" style="width:15%;"> <?= $key->qty_verified ?> </th>
            <th class="text-center" style="width:15%;"> <?php
            if ($query->num_rows()>0)
            {
               $terjual = $query->row()->qty_verified;
               echo $terjual;
            }
            else
            {
                echo "-";
            }
            ?> </th> 
        </tr>
        
        <?php
        }
        
        ?>
    </tbody>
</table>