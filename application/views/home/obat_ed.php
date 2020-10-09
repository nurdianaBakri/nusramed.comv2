<script type="text/javascript">
    $(function () {
    $('.js-basic-example2').DataTable({
        responsive: true, 
        autoWidth : false,  
        scrollCollapse: true,
    });   
});
</script> 

<!-- Main content -->
<section class="content">  
    
    <div class="row"> 
        <div class="col-sm-12 col-xs-12">
        <div class="box">
        <div class="box-header with-border"> 

          <div class="alert alert-warning" role="alert">
          Obat yang akan kadaluarsa 8 bulan kedepan
          </div> 
        </div>
        <div class="box-body"> 
            <?php 
            if ($obat_ed->num_rows()>0)
            {
                ?> 
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example2 dataTable">
                        <thead>
                            <tr>
                                <th>#</th>  
                                <th>Barcode </th>
                                <th>No Batch </th>
                                <th>No Reg </th> 
                                <th>Tgl ED </th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                foreach ($obat_ed->result_array() as $key => $value) { ?>
                                <tr>   
                                    <td><?=$no++;?></td>  
                                    <td><?= $value['barcode'] ." - <br>".$value['nama'];?></td> 
                                    <td><?= $value['no_batch'];?></td> 
                                    <td><?= $value['no_reg'];?></td> 
                                    <td><?= date_from_datetime($value['tgl_exp'],3); ?></td> 
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div> 
                <?php 
            }
            else
            {
                echo "Tidak Ada Obat yang mendekati ED";
            }
            ?>
        </div> 
        <!-- /.box-footer-->
      </div> 
        </div> 
    </div> 
     
</section> 


      