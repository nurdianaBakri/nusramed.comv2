  
 
  <script src="<?php echo base_url()."assets/excel_export/js/" ?>FileSaver.js"></script>
  <script src="<?php echo base_url()."assets/excel_export/js/" ?>jhxlsx.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/xlsx.core.min.js"></script>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1><?= $title; ?></h1> 
            <button type="button" class="btn btn-xs btn-success pull-right waves-effect m-r-20 button_tambah" data-toggle="modal" data-target="#myModal" onclick="form_search()"> Tambah
            </button>    
            <button type="button"  class="btn btn-xs btn-warning pull-right waves-effect m-r-20" id="btnExport" onclick="exportToExel()">
                Export semua data ke Excel
            </button>  
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

               <button type="button" class="btn btn-default toastsDefaultDefault">
                  Launch Default Toast
                </button>

                  <?php if ($this->session->flashdata('pesan')!="") {
                     echo $this->session->flashdata('pesan');
                  } ?> 

                  <div id="dvjson"></div>  
                  <input type="hidden" name="url" value="<?php echo $url ?>" id="url"> 

                  <table id="reminders" class="table table-sriped display nowrap" width="100%">  
                      <thead>
                          <tr> 
                              <th>No</th>
                              <th></th>  
                              <th>KD Industri</th>
                              <th>Nama</th>
                              <th>Alamat</th>
                              <th>No. Telp</th>   
                              <th>Email</th> 
                              <th>Status</th> 
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>

                      <tfoot>
                          <tr> 
                              <th>No</th>
                              <th></th>  
                              <th>KD Industri</th>
                              <th>Nama</th>
                              <th>Alamat</th>
                              <th>No. Telp</th>   
                              <th>Email</th> 
                              <th>Status</th>  
                          </tr>
                      </tfoot>
                  </table> 
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
    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Extra Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="">
              <div class="modal-body form-group">
                 
              </div>  
              <div class="container_table_search"> </div>  

          </div> 
        </div>
      </div>
    </div>  
      
  <script src="<?php echo base_url()."assets/fgs/" ?>fgsIndustri.js"></script>  
 