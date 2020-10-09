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
        <div class="row">
          <div class="col-12">  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                  <thead>
                      <tr>
                          <th></th>   
                          <th>KD Industri</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>No. Telp</th>   
                          <th>Email</th>   
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                          foreach ($data as $key => $value) {
                      ?>
                          <tr> 

                              <td>
                                 <div class="dropdown">
                                  <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Aksi
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu">
                                    <li><a  href="#" onclick="detail(<?php echo "'".$value['kd_industri']."'"; ?>)">Detail
                                      </a> </li>
                                    <li>
                                      <a  href="#" onclick="hapus('<?php echo $value['kd_industri']; ?>')">Hapus
                                      </a> 
                                     </li> 
                                  </ul>
                                </div> 
                              </td>  
                              <td><?=$value['kd_industri'];?></td>
                              <td style="cursor: pointer;"><?=$value['nama'];?> 
                              <td><?=$value['alamat'];?></td>
                              <td><?=$value['no_telp'];?></td>
                              <td><?=$value['email'];?></td> 
                          </tr>
                      <?php
                          }
                      ?>
                  </tbody>
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
 

   

<script type="text/javascript">
     function hapus(primary) { 
            var url_controller  = $('#url').val();    
            var url = "<?php echo base_url() ?>"+url_controller+'hapus/'+primary; 

            console.log(url); 
            if (confirm("Apakah anda yakin ingin menghapus data ini ?")) {
                $.ajax( {
                    type: "POST",
                    url: url,
                    data: {},
                    dataType: "json",
                    success: function( response ) {   
                        console.log(response);
                        try{       
                            // $('.pesan').html(response);
                             //reload tabel 
                            sukses2(response.return, response.pesan); 
                            reload_data(); 
                        }catch(e) {  
                            alert('Exception while request..');
                        }  
                    }
                } );  
            }
            return false; 
        }   


    function sukses2(kode, pesan) { 
      if (kode==1)
      {
        swal({
          title: "Success !",
          text: pesan,
          icon: "success",
          button: false,
          timer: 2000,
        });
      }
      else
      {
        swal({
          title: "Gagal !",
          text: pesan,
          icon: "error",
          button: false,
          timer: 2000,
        });
      } 
    }
         
</script>

 