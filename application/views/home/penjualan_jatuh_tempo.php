<script type="text/javascript">
    $(function () {
    $('.js-basic-example3').DataTable({
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
        </div>
        <div class="box-body"> 
        
        <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example3 dataTable">
                        <thead>
                            <tr>
                                <th>#</th>  
                                <th>Tanggal Jatuh Tempo </th>
                                <th>Nama Outlet</th>  
                                <th>No Faktur</th>  
                                <th>Piutang </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                foreach ($penjualan_jatuh_tempo as $key => $value){
                            ?>
                                <tr>   
                                    <td><?=$no++;?></td>  
                                    <td><?= date_from_datetime($value['tgl_jatuh_tempo'],2);?></td>  
                                    <td><?= $value['nama'];?></td>
                                    <td><?= $value['no_faktur'];?></td>
                                    <td><?= number_format($value['harga_stl_pajak'],2);?></td> 
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>    
                </div>  

        </div> 
        <!-- /.box-footer-->
      </div> 
        </div> 
    </div> 
     
</section> 
 