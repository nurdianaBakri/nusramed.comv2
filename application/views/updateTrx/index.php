
<link href="<?php echo base_url()."assets/" ?>select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url()."assets/" ?>select2.min.js"></script>
<!-- Main content -->
<section class="content">
  
  <!-- Default box -->
  <input type="hidden" name="url" value="<?php echo $url ?>" id="url">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Sortir Kartu Stok</h3>
      </div>
      <div class="box-body">
        <form role="form" id="myForm1">
          <div class="row">
          <div class="form-group col-sm-6">
            <label for="exampleInputEmail1">Obat</label>
            <select name="barcode" class="form-control js-example-basic-single" required id="barcode"> 
              <?php
              foreach ($obat as $key) {
              ?>
                <option value="<?=$key['barcode']?>"><?=$key['barcode']." - ".$key['nama']?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class="form-group col-sm-3">
            <label for="exampleInputPassword1">Dari tanggal</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="<?= date('Y-m-d') ?>">
          </div>
          <div class="form-group col-sm-3">
            <label for="exampleInputPassword1">Sampai tanggal</label>
            <input type="date" name="tanggal_sampai" class="form-control" value="<?= date('Y-m-d') ?>">
          </div>
         
        </div>
      </form>
      <button class="btn btn-success" onclick="get_laporan()">Lihat Kartu Stok</button>
      <a class="btn btn-success" onclick="print_kartu_stok_kosong()">Print Kartu Stok Kosong</a>
    </div>
  </div> 
  

<div class="box">
  <div class="box-header with-border">
    <!-- <h3 class="box-title">Sortir laporan pembelian (Pertanggal dan persuplier)</h3> -->
  </div>
  <div class="box-body">
    <img class="loading" src="<?php echo base_url()."assets/data_image/loading.gif" ?>"  height="70" width="200" >
    <div class="panel panel-success table_laporan">
    </div>
  </div>
</div>

<!-- /.box -->
</section> 
<script>  

  $(document).on({
      ajaxStart: function() { 
        window.swal({
            title: "Loading...",
            text: "Mohon menunggu", 
            showConfirmButton: false,
            allowOutsideClick: false
          });

      },
      ajaxStop: function() { 
          window.swal({
            title: "Finished!", 
            showConfirmButton: false,
            timer: 1000
          });    
      }    
   });

  
    $(document).ready(function(){ 
        $('select').select2();  
        $('.loading').hide();
    });   

    $("#myForm2").submit(function(e) {
        e.preventDefault();
    });  
    
     function get_laporan() { 
        $('.loading').show(); 

      //call to prevent default refresh
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"get_laporan";
        console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data: $('#myForm1').serialize(),
            dataType: "HTML",
            success: function( response ) { 
                // console.log(response);
                try{   
                     $('.table_laporan').html(response);
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } ); 
        $('.loading').hide(); 
    }    

    function print_kartu_stok_kosong() {

        var barcode  = $('#barcode').val(); 
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"print_kartu_stok_kosong/"+barcode; 
        window.open(url, '_blank');
/*
       
      //call to prevent default refresh
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"print_kartu_stok_kosong";
        console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data: $('#myForm1').serialize(),
            dataType: "HTML",
            success: function( response ) { 
                console.log(response);
                try{   
                     $('.table_laporan').html(response);
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } ); 
        $('.loading').hide(); */
     } 
    </script>
 
