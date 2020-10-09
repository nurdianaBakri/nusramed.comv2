
    <link href="<?php echo base_url()."assets/" ?>select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url()."assets/" ?>select2.min.js"></script> 

<!-- Main content -->
<section class="content">
  
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Sortir laporan Penjualan</h3>
      
    </div>
    <div class="box-body">
      <input type="hidden" name="url" value="<?php echo $url ?>" id="url">
      <form role="form" id="myForm1">
        <div class="row">

           <div class="col-sm-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Jenis Laporan</label>
              <select name="jenis_laporan" class="form-control js-example-basic-single" required id="jenis_laporan"> 
                <option value="1">Frekuesnsi Order</option> 
                <option value="2">Jumlah Transaksi</option> 
                <option value="3">General</option> 
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Outlet</label>
              <select name="id_outlet" class="form-control js-example-basic-single" required id="id_outlet">
                <option value="all">Semua Outlet</option>
                <?php
                foreach ($outlet as $key) {
                ?>
                <option value="<?=$key['id_outlet']?>"><?=$key['id_outlet']." - ".$key['nama']?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="exampleInputPassword1">Penjualan dari tanggal</label>
              <input type="date" name="tanggal_mulai" class="form-control" value="<?= date('Y-m-d') ?>">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="exampleInputPassword1">Sampai tanggal</label>
              <input type="date" name="tanggal_sampai" class="form-control" value="<?= date('Y-m-d') ?>">
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="col-sm-12">
            <button class="btn btn-success btn-block" onclick="get_laporan()">Lihat Laporan</button>
          </div>
        </div>
      </form>
      
      <br>
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-success table_laporan">
            
          </div>
        </div>
      </div>
      
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      
    </div>
    <!-- /.box-footer-->
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
         // get_laporan(); 
        $('select').select2();  
    });   

    $("#myForm1").submit(function(e) {
        e.preventDefault();
    });   
    
     function get_laporan() { 
      //call to prevent default refresh
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"get_laporan";
        console.log(url);
        console.log($('#myForm1').serialize());
        $.ajax( {
            type: "POST",
            url: url,
            data: $('#myForm1').serialize(),
            dataType: "HTML",
            success: function( response ) { 
                console.log(response);
                //alert("dafa");
                try{   
                     $('.table_laporan').html(response);
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }     
    </script>
 
