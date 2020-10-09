<!-- DATA TABEL-->  
  <link href="<?php echo base_url()."assets/" ?>buttons.bootstrap.min.css"> 
  <script src="<?php echo base_url()."assets/" ?>dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url()."assets/" ?>buttons.bootstrap.min.js"></script>
  <script src="<?php echo base_url()."assets/" ?>jszip.min.js"></script>
  <script src="<?php echo base_url()."assets/" ?>pdfmake.min.js"></script>
  <script src="<?php echo base_url()."assets/" ?>vfs_fonts.js"></script>
  <script src="<?php echo base_url()."assets/" ?>buttons.html5.min.js"></script>
  <script src="<?php echo base_url()."assets/" ?>buttons.print.min.js"></script> 
 
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
             <button class="btn btn-xs btn-success pull-right waves-effect m-r-20 button_tambah" onclick="form_search()"> Tambah
            </button>    
             <button class="btn btn-xs btn-warning pull-right waves-effect m-r-20 button_inport" onclick="import_form()">Inport
            </button>  
             <button class="btn btn-xs btn-success pull-right waves-effect m-r-20 button_form_genbar" onclick="form_generate_barcode_obat()">
                Generete Barcode Obat
            </button>  
            <button class="btn btn-xs btn-warning pull-right waves-effect m-r-20" id="btnExport" onclick="exportToExel()">
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
            <table id="reminders" class="table table-striped nowrap" width="100%">  
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

  <script src="<?php echo base_url()."assets/fgs/" ?>fgsObat.js"></script>  