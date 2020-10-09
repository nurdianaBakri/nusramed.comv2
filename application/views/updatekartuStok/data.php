 
 <script type="text/javascript">  

    $(document).ready(function() {
      $('input, select, textarea').on('change', function() {
        $(this).addClass('changed');
      });
      
      $('form').on('submit', function() {

        console.log( "ready!" );

        $('input:not(.changed), textarea:not(.changed)').prop('disabled', true);
        
        // alert and return just for showing
        alert($(this).serialize().replace('%5B', '[').replace('%5D', ']'));
        return false;
      }); 

      function getComboA(selectObject) {
  var value = selectObject.value;  
  console.log(value);
}


    });

 </script>
 <div class="table-responsive"> 
    <table id="example" class="display table table-bordered table-striped table-hover " style="width:100%">
        <thead>
            <tr>
                <th>Tanggal Input</th>
                <th>No Faktur</th>
                <th>Uraian</th>    
                <th>No Batch / Exp </th>  
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Sisa</th> 
                <th>Submit </th>
            </tr>
        </thead>
        <tbody>
 
            <?php  
                $sisa = 0;
                foreach ($laporan as $key) {  
                    $no_ = $key['id_transaksi'];
                    $jenis_faktur = $key['jenis_faktur'];

					$uraian = "";
					if ($key['jenis_faktur']=="Pembelian") {
						$sisa = $sisa+$key['masuk'];
						$uraian = $this->db->query("SELECT nama FROM suplier WHERE kd_suplier='".$key['uraian']."'")->row_array()['nama'];
					}
					else if ($key['jenis_faktur']=="Stok Opname") {
						$sisa = $key['sisa'];
						$uraian = "Stok Opname";
					}
					else
					{
						$sisa = $sisa-$key['keluar'];
						$uraian = $this->db->query("SELECT nama FROM outlet1 WHERE id_outlet='".$key['uraian']."'")->row_array()['nama'];
					}   
              ?>
                <tr>
                    <td><?= $key['tanggal']  ?></td>
                    <td><?= $key['no_faktur'] ?> </td>
                    <td><?= $uraian;?> </td>
                    <td><?= $key['no_batch']." / ".$key['tgl_exp'];?> </td>
                    <td><?= $key['masuk'] ?> </td>
                    <td><?= $key['keluar']?> </td> 
                    <td>
                        <?php  echo $sisa; ?> </td> 
                    <td>
                    <button type="button" class="btn btn-xs btn-success pull-right waves-effect m-r-20"  data-toggle="modal" data-target="#myModal" onclick="edit(<?= $no_.",'".$jenis_faktur."')"?>"> edit
                    <button type="button" class="btn btn-xs btn-success pull-right waves-effect m-r-20"  data-toggle="modal" data-target="#myModal"> edit2
                    </button>   
                </td> 
                </tr>
            <?php } ?>   
        </tbody>
        <tfoot>
            <tr>
                <th>Tanggal Input</th>
                <th>No Faktur</th>
                <th>Uraian</th>    
                <th>No Batch</th> 
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Sisa</th> 
                <th>  </th>
            </tr>
        </tfoot>
    </table>
</div>


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
    


<script>  


   function edit(id_trx, jenis_faktur) { 
       console.log(id_trx); 
       console.log(jenis_faktur); 

    //call to prevent default refresh
      var url_controller  = $('#url').val(); 
      var url = "<?php echo base_url() ?>"+url_controller+"edit/";
      console.log(url);
      $.ajax( {
          type: "POST",
          url: url,
          data:{
            id_trx : id_trx,
            jenis_faktur : jenis_faktur,
          },
          dataType: "json",
          success: function( response ) { 
              console.log(response);
              try{   
                  //tampilkan ke form
              }catch(e) {  
                  alert('Exception while request..');
              }  
          }
      } );  
  }    
  
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
              try{   
                   $('.table_laporan').html(response);
              }catch(e) {  
                  alert('Exception while request..');
              }  
          }
      } ); 
      $('.loading').hide(); 
  }    

</script>
