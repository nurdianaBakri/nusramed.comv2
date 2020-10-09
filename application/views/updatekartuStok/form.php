<form role="form" id="myForm1">
    <div class="row">
    <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">Obat</label>


    <?php 
    $barcode = $data['barcode'];
    $obat = $this->db->query("SELECT no_batch, barcode, DATE(tgl_exp) as tgl_exp, id_detail_obat, no_faktur from detail_obat where barcode = '".$barcode."' group by no_batch")->result_array(); ?>
    <select name="id_detail_obat[]" class="form-control" required id="barcode"> 
        <?php foreach ($obat as $ke3) { ?>
        <option value="<?=$ke3['id_detail_obat']?>"><?=$ke3['no_batch']." / ".$ke3['tgl_exp']?></option>
        <?php } ?>
    </select>  
    </div>

    <div class="form-group col-sm-3">
        <label for="exampleInputPassword1"></label>
        <input type="datetime-local" name="tanggal" class="form-control" value="<?= $data['tanggal']?>">
    </div> 

    </div>
</form>



 <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-xs">Save</button> 
      <button type="button" class="btn btn-warning btn-xs" data-dismiss="modal">Close</button> 