 <!-- Select2 -->
 <link rel="stylesheet" href="<?php echo base_url()."assest_lte3/" ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assest_lte3/" ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1><?= $title; ?></h1>
              
            <div class="button-datatable"></div>
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section> 


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <div class="card-body">
               
                <input type="hidden" name="url" value="<?php echo $url ?>" id="url"> 

            
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
              <button class="btn btn-success btn-block" onclick="get_laporan()">Lihat Kartu Stok</button>
            
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


         <div class="row">
          <div class="col-12">  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Hasil</h3>
              </div>

               <div class="table_laporan"></div> 
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 



  </div>
  <!-- /.content-wrapper --> 
 

    <!-- Modal -->
    <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cari Obat</h4>
                </div>
                <div class="">
                    <div class="modal-body form-group">
                       
                    </div>  
                    <div class="container_table_search"> </div>  

                </div> 
            </div>
        </div>
    </div> 
 

  <script>
   function get_laporan() {  

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
    }     
    </script>




 
