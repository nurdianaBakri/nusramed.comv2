<link href="<?php echo base_url()."assets/" ?>select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url()."assets/" ?>select2.min.js"></script>

<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/start/jquery-ui.css">


<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Verifikasi Pembelian Barang</h3>

        </div>
        <div class="box-body">
            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">

            <div class="row">
                <div class="col-sm-12">

                    <a class="btn btn-warning btn-block btn-xs" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" id="background">Lihat informasi di sini !</a> 

                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                          <div class="card card-body alert alert-success" role="alert">
                              YAY!, fitur ini berfungsi untuk menverifiksi pembelian barang sekaligus mengubah data PO berdasarkan Nomor Faktur. Silahkan pilih nomor faktur yang Anda inginkan dan lakukan verifikasi dengan teliti.
                              <p style="font-weight: bold;">TIPS:</p>
                              <li>Cek kesesuian nomor batch, no registrasi, tanggal expired yang ada pada form dengan fisik Obat</li> 
                              <li>Ingat ! nomor batch tidak boleh kosong </li> 
                              <li>Tidak boleh ada nomor Batch yang sama</li> 
                          </div>
                        </div> 

                    
                </div>
                <div class="col-sm-12">
                    <div class="panel panel-success">
                        <div class="body">

                            <form role="form" id="myForm1">
                                <div class="box-body">
                                    <div class="form-group barcode">
                                        <label for="exampleInputPassword1">No Faktur Pembelian</label>
                                        <select name="barcode" class="form-control js-example-basic-single" required id="barcode">
                                            <?php
                                          foreach ($list_faktur as $key) {
                                            ?>
                                            <option value="<?=$key['barcode']?>">
                                                <?= $key['label']?></option>
                                            <?php
                                          } 
                                        ?>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3" >
                                            Metode Pembayaran : <b id="metode_pembayaran"></b>
                                        </div>
                                        <div class="col-sm-3 tgl_jatuh_tempo">
                                            Tgl jatuh Tempo : <b id="tgl_jatuh_tempo"></b>
                                        </div>
                                        <div class="col-sm-3">
                                            Tgl Input : <b id="tgl_input"></b>
                                        </div>
                                        <div class="col-sm-3">
                                            Nama Penginput : <b id="id_penginput"></b>
                                        </div>
                                    </div>

 

                                </div>
                                <!-- /.box-body --> 
                            </form>

                            <div class="box-footer">
                                <button id="cek_transaksi" class="btn btn-success" onclick="cek_transaksi()">Cek
                                    transaksi</button> 
                                <button class="btn btn-success" id="verifikasi" disabled>Verifikasi Pengambilan barang
                                </button> 

                               <!--  <img class="loading" src="<?php echo base_url()."assets/data_image/loading.gif" ?>"  height="70" width="200" > -->
                            </div>

                        </div>
                    </div>
                </div> 

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-success">
                        <h3>Data Transaksi Pembelian</h3>
                        <form id="myForm2">
                            <table class="table table-bordered table-hover table-responsive" id="tab_logic" style="font-size: 10px">
                                <thead>
                                    <tr>
                                        <!-- <th class="text-center"> # </th> -->
                                        <th class="text-center" style="width:10%;"> time</th>
                                        <th class="text-center" style="width:10%;"> No Faktur</th>
                                        <th class="text-center"> Otlet</th>
                                        <th class="text-center"> Barcode</th> 
                                        <th class="text-center"> Satuan</th>
                                        <th class="text-center"> No. Batch</th>
                                        <th class="text-center"> No. Reg</th>
                                        <th class="text-center" style="width:7%;"> QTY verified</th>
                                        <th class="text-center"> no faktur</th>
                                        <th class="text-center"> Asal faktur</th>
                                        <!-- <th> aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody id='element_table'>


                                </tbody> 
                            </table>

                     

                        </form>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Informasi !</h4>
            </div>
            <div class="modal-body"> 
                
            </div>  
            <div class="modal-footer"> 
            </div>
        </div>
    </div>
</div>
 
<script src="<?php echo base_url()."assets/fgs/" ?>fgsVerifPembelian.js"></script>  
