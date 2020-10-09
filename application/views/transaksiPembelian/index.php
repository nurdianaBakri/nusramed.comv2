<link href="<?php echo base_url()."assets/" ?>select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url()."assets/" ?>select2.min.js"></script>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Input Transaksi Pembelian</h3>
        </div>
        <div class="box-body">
            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">
            <div class="row">
                <div class="col-sm-12">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-success">
                        <div class="body">
                            <form role="form" id="myForm1">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Suplier</label> 

                                        <select name="kd_suplier" class="form-control js-example-basic-single" required id="kd_suplier">
                                            <?php
                                            foreach ($suplier as $key) {
                                            ?>
                                            <option value="<?=$key['kd_suplier']?>"><?= $key['kd_suplier']." - ".$key['nama']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No Faktur Penjualan</label>
                                        <input type="text" class="form-control myForm1" name="no_faktur myForm1"
                                        id="no_faktur" >
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Metode Pembayaran</label>
                                                <select name="kode_pembayaran"
                                                    class="form-control js-example-basic-single" required
                                                    id="kode_pembayaran" onchange="togle_jatuh_tempo(this.value)">
                                                    <?php
                                                    foreach ($metode_pembayaran as $key) {
                                                    ?>
                                                    <option value="<?=$key['kd_pembayaran']?>">
                                                        <?= $key['kd_pembayaran']." - ".$key['nama_metode_pembayaran']?>
                                                    </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12 tgl_jatuh_tempo">
                                            <div class="form-group">
                                                <?php
                                                    $date=date('Y-m-d')
                                                ?>
                                                <label for="exampleInputPassword1">Jatuh Tempo</label>
                                                <input type="date" class="form-control myForm1" id="tgl_jatuh_tempo"
                                                name="tgl_jatuh_tempo" min="<?= $date; ?>">
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="row"> 
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="form-group"> 
                                                <label for="exampleInputPassword1">Tanggal Faktur</label>
                                                <input type="date" class="form-control myForm1" id="tgl_faktur"
                                                name="tgl_faktur" value="<?= $date; ?>">
                                            </div>
                                        </div> 
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </form>
                            <div class="box-footer">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="panel panel-success">
                        <div class="body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Cari obat berdasarkan barcode</label>
                                    <input type="text" name="barcode" id="barcode"
                                    class="form-control input-lg input_barcode">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Cari Obat berdasarkan nama dan barcode</label>
                                    <select name="barcode_nama"
                                        class="form-control js-example-basic-single input_nama_barang" id="barcode_nama"
                                        onchange="get_barang_by_barcode()">
                                        <?php
                                        foreach ($Obat as $key) {
                                        ?>
                                        <option value="<?=$key['barcode']?>"><?= $key['barcode']." - ".$key['nama']?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Obat</label>
                                    <input type="text" name="nama_obat" id="nama_obat" class="form-control"
                                    readonly="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kandungan</label>
                                    <textarea name="kandungan" id="kandungan" class="form-control" readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-success">
                        <div class="body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Grand Total</label>
                                    <input type="text" name="total" id="total" class="form-control input-lg"
                                    readonly="true" value="">
                                </div>
                                <button type="submit" class="btn btn-success btn-block simpan_pembelian" onclick="simpan_pembelian()">Simpan Transaksi</button>
                                <img class="loading" src="<?php echo base_url()."assets/data_image/loading.gif" ?>"  height="70" width="200" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-success">
                        <!-- <form id="myForm2" name="myForm2" novalidate="novalidate">  -->
                            <form method="post" id="myForm2" novalidate="novalidate">
                            <table class="table table-bordered table-hover" id="tab_logic" style="font-size: 10px">
                                <thead>
                                    <tr >
                                        <th class="text-center"> # </th>
                                        <th class="text-center" style="width:9%;"> Barcode</th> 
                                        <th class="text-center"> Satuan</th>
                                        <th class="text-center"> No. Batch</th>
                                        <th class="text-center"> No. Reg</th>
                                        <th class="text-center"> Tgl Exp</th>
                                        <th class="text-center" style="width:10%;"> Harga</th>
                                        <th class="text-center" style="width:7%;"> Diskon %</th>
                                        <th class="text-center" style="width:7%;"> Nilai PPN</th>
                                        <th class="text-center" style="width:7%;"> Qty</th>
                                        <th class="text-center"> Sub Total</th>
                                        <th class="text-center"> Lokasi</th>
                                        <th class="text-center" > </th>
                                    </tr>
                                </thead>
                                <tbody id='element_table'>
                                </tbody>
                                <tr>
                                    <td colspan="4">
                                        Diskon : <input type="number" name="jumlah_diskon"
                                        class="form-control jumlah_diskon" value="" readonly>
                                    </td>
                                    <td>
                                        PPN (%): <input type="number" name="ppn" class="form-control ppn" value="10">
                                    </td>
                                </tr>
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
    

<script type="text/javascript" src="<?= base_url()."assets" ?>/simple.money.format.js"></script>
 
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


<script>  

$(document).ready(function() {

    document.getElementById("barcode").focus();
    $('.money').simpleMoneyFormat();

    $('select').select2();
    $('.tgl_jatuh_tempo').hide(); 
    $('.loading').hide();   
    reload_cart(); 
});
 

function togle_jatuh_tempo(kode) {
    if (kode == 100) {
        $('.tgl_jatuh_tempo').hide();
    } else {
        $('.tgl_jatuh_tempo').show();
    }
}

$("#myForm1").submit(function(e) {
    e.preventDefault();
    input_stok();
});


function reload_cart() {
    var url_controller = $('#url').val();
    var url = "<?php echo base_url() ?>" + url_controller + "load_cart";
    $('#element_table').load(url);

    console.log(url);
    setTimeout(() => {
        total_diskon()
        get_grand_total();
    }, 2000); 
}

function get_grand_total() {
    var url_controller = $('#url').val();
    var url = "<?php echo base_url() ?>" + url_controller + "get_grand_total/";
    console.log(url);

    $.ajax({
        type: "POST",
        url: url,
        data: {},
        dataType: "html",
        success: function(response) {
            console.log(response);
            try {
                $('#total').val(response);
            } catch (e) {
                // alert('Exception while request..');
            }
        }
    });
}


$("#myForm1").submit(function(e) {
    e.preventDefault();
    input_stok();
});

function add_row(response, barcode) {
    // console.log(response);
    if (/^[a-zA-Z0-9- ]*$/.test(response) == false) {
        // alert('Your search string contains illegal characters.');
        get_kandungan(barcode);
        // $(response).prependTo($("#element_table")); 
        reload_cart();
    } else {
        // swal("Perhatian", response, "error");
        sukses2(0, response);

    }
}

function kalkulasiDiskonPerItem(x) {

    var rowIndex = x.rowIndex - 1;
    console.log("Row index is: " + rowIndex);

    var index_val = x.rowIndex - 1;

    // var harga = $(".harga")[index_val].value;
    var diskon = $(".diskon")[index_val].value;
    var harga_jual = $(".harga")[index_val].value;
    var no_batch = $(".no_batch")[index_val].value;
    var no_reg = $(".no_reg")[index_val].value;
    var tgl_exp = $(".tgl_exp")[index_val].value;
    var lokasi = $(".lokasi")[index_val].value;
    // var nilai_ppn = $(".nilai_ppn")[index_val].value;
    var ppn = parseFloat($("#ppn").val()).toFixed(2);
    var qty = $(".stok_awal")[index_val].value;    
    var harga_setelah_diskon = $('.harga_setelah_diskon')[index_val];
        harga_setelah_diskon.value =(harga_jual * (diskon/ 100)*qty);        
        var total = (qty * harga_jual) - harga_setelah_diskon.value;
        // console.log("Diskon = "+harga_setelah_diskon.value);
        // console.log("Total harga item = "+total);
        $(x).find(".subtotal").text(formatRupiah(total.toString()));
        var ppn = parseFloat($(".ppn").val());
        // alert(ppn);
        var ppn_value = parseFloat((parseFloat(ppn) / 100) * total).toFixed(2);
        // console.log("ppn = "+ppn+" nilai = "+ppn_value)
        $(x).find(".nilai_ppn").text(formatRupiah(ppn_value.toString()));
        var total_produk = 0;       
        $('#myForm2').find("tr").not(':first').not(':last').each(function() {
            ppn_count = parseFloat($(this).find('.nilai_ppn').text().replace(',', ''));
            total_produk += parseFloat($(this).find('.subtotal').text().replace(',', '')) +  ppn_count;
              console.log("total product ="+total_produk);            
        });
        $("#total").val(formatRupiah((total_produk).toString()));
    var rowid = $(x).attr('data-id');
    var data = {
        rowid: rowid,
        qty: parseFloat(qty).toFixed(2),
        diskon: diskon,
        no_batch: no_batch,
        no_reg : no_reg,
        tgl_exp : tgl_exp,
        lokasi : lokasi,
        price : harga_jual,
        ppn: parseFloat(ppn).toFixed(2)
    };
    update_cart_onchange(data);
    total_diskon();
}

function total_diskon() {
    var totalPoints = 0;
    $('.harga_setelah_diskon').each(function() {
        totalPoints += parseFloat($(this).val())
        console.log("total = "+totalPoints);
    });
    $('.jumlah_diskon').val(totalPoints);
}

function update_cart_onchange(update) {
    var url_controller = $('#url').val();
    var url = "<?php echo base_url() ?>" + url_controller + "update_cart_onchange";
    console.log(update);
    console.log("update cart onchange");
    $.ajax({
        type: "POST",
        url: url,
        data: update
    }).done(function(html) {

        //check apakah form valid  
        console.log(html);
    })
    .fail(function(jqXHR, textStatus) {
        //    console.log(data);
        // console.log("reqest error")
    });
}

function update_cart() {
    var url_controller = $('#url').val();
    var url = "<?php echo base_url() ?>" + url_controller + "update_cart";
    $.ajax({
        url: url,
        method: "POST",
        data: $('#myForm2').serialize(),
        success: function(data) {
            console.log(data);
        }
    });
}

$('#barcode').keypress(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        // console.log("fungsi get_barang_by_barcode");
        get_barang_by_barcode(13);
    }
});
  

    function simpan_pembelian() {  
  
         if ($('#no_faktur').val()=="")
         {
            sukses2(0, "Nomor Faktur tidak boleh kosong");  
         } 
         else
         {
            if (confirm("Apakah anda yakin ingin menyimpan data ini ?")) { 


                $('.loading').show();
                var url_controller  = $('#url').val(); 
                    var url = "<?php echo base_url() ?>"+url_controller+"simpan_pembelian/";
                    // console.log(url);

                    var kd_suplier =$('#kd_suplier').val();
                    var no_faktur =$('#no_faktur').val();
                    var kode_pembayaran =$('#kode_pembayaran').val();
                    var tgl_jatuh_tempo =$('#tgl_jatuh_tempo').val();
                    var tgl_faktur =$('#tgl_faktur').val();

                    var data = $('#myForm2').serialize()+"&kd_suplier="+kd_suplier+"&no_faktur="+no_faktur+"&kode_pembayaran="+kode_pembayaran+"&tgl_jatuh_tempo="+tgl_jatuh_tempo+"&tgl_faktur="+tgl_faktur;
                    // console.log(data);

                    $.ajax( {
                        type: "POST",
                        url: url,
                        data: data,
                        dataType: "json",
                        success: function( response ) { 
                            console.log(response);
                        try{     
                            //reload page
                            if (response.return=="1" || response.return==1)
                            {
                                printTrxPembelian(no_faktur); 
                            }   

                            if (response.pesan_sweet_alert=="barang tidak boleh boleh kosong, silahkan masukkan item barang kedalam cart ")
                            { 
                                sukses2(response.return, response.pesan_sweet_alert);   
                            }
                            else{   
                                sukses2(response.return, response.pesan_sweet_alert);   

                                setInterval(function(){ 
                                   $('.modal-body').html(response.pesan);
                                   $('#myModal').modal({
                                        show: 'true',
                                    });  
                                }, 6000);  
                            }  
 
                        }catch(e) {  
                            alert('Exception while request..');
                        }  
                    }
                } );  
                $('.loading').hide(); 
            } 
        }        
     }

     //Hapus Item Cart
    $(document).on('click', '.close', function() {
        location.reload(); 
         // $('#myModal').modal('hide'); 
         // reload_cart();
         // $('#myModal').modal('hide'); 
    });

  function printTrxPembelian(no_faktur) {
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"printTrxPembelian/"+no_faktur;
        // console.log(url); 
            $.ajax( {
                type: "POST",
                url: url,
                data:{},
                dataType: "html",
                success: function( response ) { 
                // console.log(response);
                try{  
                    var w = window.open('about:blank');
                    w.document.open();
                    w.document.write(response);
                    w.document.close();
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } ); 
     }

//Hapus Item Cart
$(document).on('click', '.romove_cart', function() {
    var url_controller = $('#url').val();
    var url = "<?php echo base_url() ?>" + url_controller + "hapus_cart";

    var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
    $.ajax({
        url: url,
        method: "POST",
        data: {
            row_id: row_id
        },
        success: function(data) {
            reload_cart(); 
        }
    });
});

$(document).on('click', '.update_cart', function() {
    var url_controller = $('#url').val();
    var url = "<?php echo base_url() ?>" + url_controller + "update_cart";
    console.log(url);

    var row_id = $(this).attr("id"); //mengambil row_id dari artibut id 

    $.ajax({
        url: url,
        method: "POST",
        dataType: "html",
        data: $('#myForm2').serialize() + "&row_id=" + row_id,
        success: function(data) {
            console.log(data);
            reload_cart();
        }
    });
});


function get_barang_by_barcode(keycode = null) {

    var barcode = "";
    // console.log(keycode);  
    if (keycode == 13) {
        barcode = $('#barcode').val();
    } else {
        barcode = $('#barcode_nama').val();
    }

    if (barcode != "") {
        var url_controller = $('#url').val();
        var url = "<?php echo base_url() ?>" + url_controller + "get_barang_by_barcode/" + barcode;
        console.log(url);
        $.ajax({
            type: "POST",
            url: url,
            data: {},
            dataType: "html",
            success: function(response) {
                //check if table transaksi is empty or not    
                add_row(response, barcode);
                $('#barcode').val('');
            }
        });
    }
}
 


function get_kandungan(barcode) {
    var url_controller = $('#url').val();
    var url = "<?php echo base_url() ?>" + url_controller + "get_kandungan/";
    console.log("fugsi get kandungan obat : "+url);
    $.ajax({
        type: "POST",
        url: url,
        data: {
            barcode: barcode,
        },
        dataType: "json",
        success: function(response) {
            // console.log(response);
            try {
                $('#kandungan').val(response.kandungan);
                $('#nama_obat').val(response.nama);
            } catch (e) {
                alert('Exception while request..');
            }
        }
    });
}

function input_stok() {
    //chhekc apakah form invalid 
    var id_outlet = $('#id_outlet').val();
    var no_faktur = $('#no_faktur').val();

    if ($('#kode_pembayaran').val() == 100) {
        if (id_outlet == "" || no_faktur == "") {
            alert("Silahkan isi form dengan lengkap");
        } else {
            $("#myForm1 select").attr("disabled", "disabled");
            $("#myForm1 .myForm1").attr("readonly", true);

            $("#barcode").attr("readonly", false);
            $("#kandungan").attr("readonly", true);
            $(".simpan_pembelian").attr("disabled", false);

            $(".form-group .input_nama_barang").removeAttr("disabled");
            document.getElementById("barcode").focus();
        }
    } else {
        var tgl_jatuh_tempo = $('#tgl_jatuh_tempo').val();
        if (id_outlet == "" || no_faktur == "" || tgl_jatuh_tempo == "") {
            alert("Silahkan isi form dengan lengkap");
        } else {
            $(".simpan_pembelian").attr("disabled", false);

            $("#myForm1 select").attr("disabled", "disabled");
            $("#myForm1 .myForm1").attr("readonly", true);

            $("#barcode").attr("readonly", false);
            $("#kandungan").attr("readonly", true);
            $(".form-group .input_nama_barang").removeAttr("disabled");
            document.getElementById("barcode").focus();
        }
    }

}
</script>