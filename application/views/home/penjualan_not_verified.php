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
        <?php 
            if ($penjualan_not_verified->num_rows()>0)
            {
                ?> 
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example3 dataTable">
                        <thead>
                            <tr>
                                <th>#</th>  
                                <th>Tanggal Input Penjualan </th>
                                <th>No Faktur </th>
                                <th>Nama Outlet</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                foreach ($penjualan_not_verified->result_array() as $key => $value){
                            ?>
                                <tr>   
                                    <td><?=$no++;?></td>  
                                    <td><?= date_from_datetime($value['time'],3);?></td>  
                                    <td><?= $value['no_faktur'];?></td>
                                    <td><?= $value['nama'];?></td> 
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>    
                </div> 
                <?php 
            }
            else
            {
                echo "Harga obat sudah di-Set";
            }
            ?>
        </div> 
        <!-- /.box-footer-->
      </div> 
        </div> 
    </div> 
     
</section> 


      