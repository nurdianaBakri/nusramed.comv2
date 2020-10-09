
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
            <select name="id_obat" class="form-control js-example-basic-single" required id="id_obat"> 
              <?php
              foreach ($obat as $key) {
              ?>
                <option value="<?=$key['id_obat']?>"><?=$key['nama_obat']?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class="form-group col-sm-3">
            <label for="exampleInputPassword1">Pembelian Dari</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="<?= date('Y-m-d') ?>">
          </div>
          <div class="form-group col-sm-3">
            <label for="exampleInputPassword1">Sampai</label>
            <input type="date" name="tanggal_sampai" class="form-control" value="<?= date('Y-m-d') ?>">
          </div>
         
        </div>
      </form>
      <button class="btn btn-success" onclick="get_laporan()">Print label</button> 
    </div>
  </div> 
  

<!-- <div class="box">
  <div class="box-header with-border"> 
  </div>
  <div class="box-body">
    <img class="loading" src="<?php echo base_url()."assets/data_image/loading.gif" ?>"  height="70" width="200" >
    <div class="panel panel-success table_laporan">
    </div>
  </div>
</div> -->

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

                var k = $('#id_obat').val();
                try{   

                  var win = window.open('http://localhost/nusramed.com/data/LabelNamaGudang/cetak/'+k, '_blank');
                  if (win) {
                      //Browser has allowed it to be opened
                      win.focus();
                  } else {
                      //Browser has blocked it
                      alert('Please allow popups for this website');
                  } 
                     // $('.table_laporan').html(response);
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } ); 
        $('.loading').hide(); 
    }     
    </script>
 
