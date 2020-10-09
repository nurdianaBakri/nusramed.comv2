    <!-- Main content -->
    <section class="content">
    
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border"> 
          <b>Untuk menambah angsuran, silahkan pilih jenis ansuran kemudian pilih outlet/Distributor</b> 
        </div>
        <div class="box-body">
            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">  
                
                <form role="form" id="myForm2">  

                <div class="row">
                    <div class="col-sm-5">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Angsuran</label>
                        <select name="jenis_objek" class="form-control js-example-basic-single" required id="jenis_objek" onchange="get_outlet_pbf()">
                            <option value="">-Pilih-</option>  
                            <option value="penjualan">Penjulan</option>  
                            <option value="pembelian">Pembelian</option>  
                          </select>
                        </div> 
                    </div>   
                   
                    <div class="form-group col-sm-5 ">
                      <label for="exampleInputEmail1">Outlet/Suplier</label>
                      <select class="form-control get_outlet_pbf" name="objek" > 
                           
                      </select>
                    </div>

                     <div class="col-sm-2">
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

   
    $("#myForm2").submit(function(e) {
        e.preventDefault();
    });  


     function get_outlet_pbf() {      

      //call to prevent default refresh
        var url_controller  = $('#url').val();  
        var url = "<?php echo base_url() ?>"+url_controller+"get_outlet_pbf";
        console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data: $("#myForm2").serialize(),
            dataType: "HTML",
            success: function( response ) {  
                try{   
                     $('.get_outlet_pbf').html(response);
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   

    }     
     
    
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
 
