<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1><?= $title; ?></h1>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <input type="hidden" name="url" value="<?php echo $url ?>" id="url">
        <div class="info-box bg-gradient-info">
          <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
          <div class="info-box-content">
            <span class="info-box-number"><h4>Selamat datang <?= $this->session->userdata('username'); ?>!</h4> </span>
            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 class="jumlah_ed">...</h3>
                <p>Obat akan ED</p>
              </div>
              <div class="icon">
                <i class="ion ion-backspace"></i>
              </div>
              <a href="<?= base_url()."Home/get_obat_ed_detail" ?>" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3 class='jumlah_notSetPrice'>...</h3>
                <p>Obat Belum Set Harga Jual</p>
              </div>
              <div class="icon">
                <i class="ion ion-pricetag"></i>
              </div>
              
              <a href="<?= base_url()."Home/get_obat_not_set_price_detail" ?>" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3 class="PenjualanNotVerified">...</h3>
                
                <p>Penjualan Belum diverifikasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-checkmark"></i>
              </div>
              <a  href="<?= base_url()."Home/get_penjualan_not_verified_detail" ?>" target="_blank"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3 class="jatuh_tempo">...</h3>
                
                <p>Piutang Outlet jatuh tempo</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="<?= base_url()."Home/get_penjualan_jatuh_tempo_detail" ?>" target="_blank"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                Outlet<h3 class="SIA_habis">...</h3>
                <p>Masa Berlaku SIA yang hampir habis</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                RP. <h3 class="credit_today">...</h3>
                <p>Penjualan Kredit Hari Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-card"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                RP. <h3 class='cash_today'>...</h3>
                <p>Penjualan Cash Hari Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                RP. <h3 class="sell_today">...</h3>
                <p>Total Penjualan Hari Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-ribbon-b"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="log_activity">
                  <div class="loading">Loading...</div>
                  <div class="data"></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



<script type="text/javascript">
  $(document).ready(function() {
    $('#example333').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>
    
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>


<table id="example333" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
    </tbody>
    </table>

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
    <script type="text/javascript">    

    	$(document).on({
		    ajaxStart: function() { 
          $(".log_activity .loading").show();     

		    },
		     ajaxStop: function() {    
          $(".log_activity .loading").hide();   
		     }    
		 });
 
        $(document).ready(function(){ 
            $(".log_activity .loading").hide();   

            reload_data();   
        }); 

         function reload_data() { 
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_log_activity";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data:{},
                dataType: "html",
                success: function( response ) { 
                    try{   
                        $('.log_activity .data').html(response); 

                        reload_obat_ed();
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }  

        function reload_obat_ed() { 
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_obat_ed";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data:{},
                dataType: "json",
                success: function( response ) { 
                    try{   
                        // $('.log_obat_ed .data').html(response); 
                        $('.jumlah_ed').text(response);

                        reload_obat_not_set_price();
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     

          function reload_obat_not_set_price() { 
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_obat_not_set_price";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data:{},
                dataType: "json",
                success: function( response ) { 
                    try{   
                        $('.jumlah_notSetPrice').text(response); 
                        // $('.log_obat_not_set_price .data').html(response); 

                        reload_penjualan_not_verified();
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }        

         function reload_penjualan_not_verified() { 
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_penjualan_not_verified";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data:{},
                dataType: "json",
                success: function( response ) { 
                    try{   
                        // $('.log_penjualan_not_verified .data').html(response); 
                        $('.PenjualanNotVerified').text(response); 
                        
                        reload_penjualan_jatuh_tempo();
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }         


         function reload_penjualan_jatuh_tempo() { 
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_penjualan_jatuh_tempo";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data:{},
                dataType: "json",
                success: function( response ) { 
                    try{   
                        $('.jatuh_tempo').text(response); 
                        get_masa_berlaku_SIA();
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }         

          function get_masa_berlaku_SIA() { 
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_masa_berlaku_SIA";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data:{},
                dataType: "json",
                success: function( response ) { 
                    try{   
                        $('.SIA_habis').text(response); 
                        credit_today();
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }      

         function credit_today() { 
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"credit_today";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data:{},
                dataType: "json",
                success: function( response ) { 
                    try{   
                        $('.credit_today').text(response.credit_today); 
                        $('.cash_today').text(response.cash_today); 
                        $('.sell_today').text(response.sell_today); 
                        
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }         

        
    </script>
 