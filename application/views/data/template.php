 
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
              <!-- /.card-header -->
              <div class="card-body">
                 <?php if ($this->session->flashdata('pesan')!="") {
               echo $this->session->flashdata('pesan');
            } ?> 

            <div id="dvjson"></div>  
            <input type="hidden" name="url" value="<?php echo $url ?>" id="url"> 

            <!-- <table id="reminders" class="display nowrap" cellspacing="0" width="100%">   -->
            <table id="reminders" class="nowrap" width="100%">  
                <thead>
                    <tr> 
                        <th>No</th>
                        <th></th>
                        <th>Barcode</th>
                        <th>Nama</th>
                        <th>Satuan</th> 
                        <th>Industri</th> 
                        <th>Kadungan</th> 
                        <th>Deskripsi</th>
                        <th>Jenis Terapi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                    <tr> 
                        <th>No</th>
                        <th></th>
                        <th>Barcode</th>
                        <th>Nama</th>
                        <th>Satuan</th> 
                        <th>Industri</th> 
                        <th>Kadungan</th> 
                        <th>Deskripsi</th>
                        <th>Jenis Terapi</th>
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
 
 