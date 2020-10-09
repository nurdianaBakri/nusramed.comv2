 

    <!-- Main content -->
    <section class="content">
    
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Sortir Faktur</h3>  
        </div>
        <div class="box-body">
            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">  
                
                <form role="form" id="myForm2">  

                <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Faktur</label>
                        <select name="jenis_faktur" class="form-control js-example-basic-single" required id="jenis_faktur">
                            <option value="penjualan">Penjulan</option>  
                            <option value="pembelian">Pembelian</option>  
                          </select>
                        </div> 
                    </div>  

                   <div class="form-group col-sm-3">
                      <label for="exampleInputPassword1">Pembalian dari tanggal</label>
                      <input type="date" name="tanggal_mulai" class="form-control" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="form-group col-sm-3">
                      <label for="exampleInputPassword1">Sampai tanggal</label>
                      <input type="date" name="tanggal_sampai" class="form-control" value="<?= date('Y-m-d') ?>">
                    </div>

                     <div class="col-sm-3">
                      <div class="form-group">
                            <label for="exampleInputEmail1">Lihat Laporan</label>
                            <button class="btn btn-success btn-block" onclick="get_laporan()">Lihat Laporan</button> 
                        </div> 
                    </div>  

                </div>   
            </form> 
                     

            <br> 

            <div class="row">
                <div class="col-sm-12">

                    <img class="loading" src="<?php echo base_url()."assets/data_image/loading.gif" ?>"  height="70" width="200" > 
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
        $('.loading').hide();
    });   

    $("#myForm2").submit(function(e) {
        e.preventDefault();
    });  
     
    
     function get_laporan() {      

      //call to prevent default refresh
        var url_controller  = $('#url').val();  
        var url = "<?php echo base_url() ?>"+url_controller+"get_laporan";
        console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data: $("#myForm2").serialize(),
            dataType: "HTML",
            success: function( response ) {  
                try{   
                     $('.table_laporan').html(response);
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   

    }     
    </script>
 
