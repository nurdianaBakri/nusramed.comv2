<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="alert alert-success" role="alert">
        YAY!, fitur ini berfungsi mengubah data pembian seperti nomor batch dan no reg Jika obat tidak muncul di tabel ini, silahkan klik tombol "cari obat" untuk mencarinya
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data</h3>
            <button class="btn btn-success pull-right waves-effect m-r-20" onclick="setOpname()">Simpan Perubahan</button>
            <button class="btn btn-success pull-right waves-effect m-r-20 button_tambah" onclick="form_search_modal()"> Cari Obat
            </button> 
        </div>
        <div class="box-body">
            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">
            <div class="row">
                <div class="col-sm-12">
                    <img class="loading" src="<?php echo base_url()."assets/data_image/loading.gif" ?>"  height="70" width="200" >
                    <form id="myForm2">
                        
                    </form>

                        <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>   

                </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>

<!-- Modal -->
<div class="modal fade" id="modal_alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cari Obat</h4>
            </div>
            <div class="modal-body">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cari Obat</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-sm-12">
                        Nama Obat
                    </div>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="keyword_nama_obat" placeholder="Masukkan nama obat yang anda cari" name="nama">
                    </div>
                </div>
                <img class="loading" src="<?php echo base_url()."assets/data_image/loading.gif" ?>"  height="70" width="200" >
                <div class="container_table_search">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- <script src="<?= base_url()."assets/" ?>dataTables.buttons.min.js"></script>
<script src="<?= base_url()."assets/" ?>dataTables.select.min.js"></script>
<script src="<?= base_url()."assets/" ?>dataTables.editor.min.js"></script> -->


<script>   

    $(document).on({
        ajaxStart: function() { 
            $(".loading").show();    
        },
         ajaxStop: function() { 
            $(".loading").hide();    
         }    
    });  

    $(document).ready(function(){
  
      function load_data()
      {
        $.ajax({
          url:"<?php echo base_url(); ?>data/ManagemenDataPembelianObat/load_data",
          dataType:"JSON",
          success:function(data){ 
            
            var html = '<tr>';
            html += '<td id="barcode" contenteditable placeholder="Enter First Name"></td>';
            html += '<td id="nama" placeholder="Enter Last Name"></td>';
            html += '<td id="kd_satuan" contenteditable></td>';
            html += '<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span></button></td></tr>';
            for(var count = 0; count < data.length; count++)
            {
              html += '<tr>';
              html += '<td class="table_data" data-row_id="'+data[count].id_obat+'" data-column_name="barcode" contenteditable>'+data[count].barcode+'</td>';
              html += '<td class="table_data" data-row_id="'+data[count].id_obat+'" data-column_name="nama">'+data[count].nama+'</td>';
              html += '<td class="table_data" data-row_id="'+data[count].id_obat+'" data-column_name="kd_satuan" contenteditable>'+data[count].kd_satuan+'</td>';
              html += '<td><button type="button" name="delete_btn" id="'+data[count].id_obat+'" class="btn btn-xs btn-danger btn_delete"><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
            }
            $('tbody').html(html);
          }
        });
      }

      load_data();

      $(document).on('click', '#btn_add', function(){
        var barcode = $('#barcode').text();
        var nama = $('#nama').text();
        var kd_satuan = $('#kd_satuan').text();
        if(barcode == '')
        {
          alert('Enter First Name');
          return false;
        }
        if(nama == '')
        {
          alert('Enter Last Name');
          return false;
        }
        $.ajax({
          url:"<?php echo base_url(); ?>data/ManagemenDataPembelianObat/insert",
          method:"POST",
          data:{
                barcode:barcode,
             nama:nama,
             kd_satuan:kd_satuan,
         },
          success:function(data){
            load_data();
          }
        })
      });

      $(document).on('blur', '.table_data', function(){
        var id = $(this).data('row_id');
        var table_column = $(this).data('column_name');
        var value = $(this).text();
        $.ajax({
          url:"<?php echo base_url(); ?>data/ManagemenDataPembelianObat/update",
          method:"POST",
          data:{id:id, table_column:table_column, value:value},
          success:function(data)
          {
            load_data();
          }
        })
      });

      $(document).on('click', '.btn_delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to delete this?"))
        {
          $.ajax({
            url:"<?php echo base_url(); ?>data/ManagemenDataPembelianObat/delete",
            method:"POST",
            data:{id:id},
            success:function(data){
              load_data();
            }
          })
        }
      });
      
    });
     


    function reload_data() { 

        var url_controller  = $('#url').val();
        // var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"reload_data";
        console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:{},
            dataType: "html",
            success: function( response ) {  
                try{      
                    $('#myForm2').html(response); 
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }   



    function form_search_modal(){
        $('#myModal').modal({
            show: 'true'
        }); 
    }

    $('#keyword_nama_obat').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){   

            event.preventDefault(); 
            var url_controller  = $('#url').val();
            var keyword_nama_obat = $('#keyword_nama_obat').val();
            var url = "<?php echo base_url() ?>"+url_controller+"cari_nama_obat/"+keyword_nama_obat;
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data:{
                    keyword_nama_obat:keyword_nama_obat
                },
                dataType: "html",
                success: function( response ) {  
                    try{     
                        $('.container_table_search').html(response);
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );   
        }
    });  

    function setOpname() {   
     if ($("#myForm2").valid()==false)
     {
        return false;
     }
     else
     {
        if (confirm("Apakah anda yakin ingin menyimpan data ini ?")) { 

            var url_controller  = $('#url').val(); 
                var url = "<?php echo base_url() ?>"+url_controller+"setOpname"; 
                var data = $('#myForm2').serialize();
                console.log(url);

                $.ajax( {
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "Json",
                    success: function( response ) { 
                        console.log(response);
                    try{     
                        //reload page  
                        $('#modal_alert .modal-title').text("Proses Stok Opname");
                        $('#modal_alert .modal-body').html(response.pesan);
                        reload_data();  
                        $('#modal_alert').modal({
                            show: 'true'
                        }); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }
    }        
 }
  
</script>