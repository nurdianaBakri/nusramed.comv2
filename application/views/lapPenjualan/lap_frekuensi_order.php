  <script src="<?= base_url()."assets/chart/"?>highcharts.src.js"></script>   
  <script src="<?= base_url()."assets/chart/"?>exporting.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>

  
  <script src="<?= base_url()."assets/" ?>dataTables.buttons.min.js"></script>
  <script src="<?= base_url()."assets/" ?>pdfmake.min.js"></script>
  <script src="<?= base_url()."assets/" ?>vfs_fonts.js"></script>
  <script src="<?= base_url()."assets/" ?>buttons.html5.min.js"></script>
  <script src="<?= base_url()."assets/" ?>jszip.min.js"></script>
  <script src="<?= base_url()."assets/" ?>buttons.colVis.min.js"></script> 
  <link href="<?php echo base_url('assets/buttons.dataTables.min.css')?>" rel="stylesheet" />


   <script type="text/javascript"> 

    function get_chart_wil() {

         var judul = $('#judul').val();

        Highcharts.chart('container2', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Chart Pembelian berdasarkan wilayah dari '+judul
            },  
            xAxis: {
                categories: <?php 
                    $nama = array_column($pecentPerWil['data_detail'], 'nama'); 
                    echo json_encode($nama);
                ?> ,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} outlet</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
                series: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'Jumlah',
                data: <?php 
                    $jumlah = array_column($pecentPerWil['data_detail'], 'jumlah'); 
                    echo json_encode($jumlah);
                ?>    
            }, {
                name: 'Jumlah Outlet yang sudah Order',
                 data: <?php 
                    $jumlah_order = array_column($pecentPerWil['data_detail'], 'jumlah_order'); 
                    echo json_encode($jumlah_order);
                ?>   
            }]
        });
    }

    function get_chart_frek() {

        var hijau = Number($('#hijau').val());
        var merah = Number($('#merah').val());
        var kuning = Number($('#kuning').val());
        var judul = $('#judul').val();

        console.log(judul);
        var jumlah = hijau+merah+kuning;
 
        var Persenhijau = hijau / jumlah *100;
        var Persenkuning = kuning / jumlah *100;
        var Persenmerah = merah / jumlah *100;

        Persenmerah = Number(Persenmerah.toFixed(2));
        Persenkuning = Number(Persenkuning.toFixed(2));
        Persenhijau = Number(Persenhijau.toFixed(2));  

        Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: "Laporan Frekuensi Order outlet dari "+judul
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        exporting: {
            buttons: { 
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Merah',
                y: Persenmerah,
                sliced: true,
                color:'#b83542',
                selected: true
            }, {
                name: 'Kuning',
                color:'#d3d930',
                y: Persenkuning
            }, {
                name: 'Hijau',
                color:'#32a852',
                y: Persenhijau
            }]
        }]
        });
    }

    $(document).ready(function() { 
     
    $('#example').DataTable( {
        dom: 'Bfrtip', 
        buttons: [ 
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                },
                customize: function(xlsx) {
                    /*var sheet = xlsx.xl.worksheets['sheet1.xml'];
     
                    // Loop over the cells in column `C`
                    $('row c[r^="C"]', sheet).each( function () {
                        // Get the value

                        if ( ($('is t', this).text() == '0')  || ($('is t', this).text() == 0) ) {
                            $(this).attr( 's', '20' );
                        }
                    });*/
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
    } );


    $('#example2').DataTable( {
        dom: 'Bfrtip', 
        buttons: [ 
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }, 
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
    } );

    setTimeout(get_chart_frek, 3000); 
    setTimeout(get_chart_wil, 5000); 

} ); 
</script>  

<div class="row">
    <div class="col-md-6">
        <div class="table-responsive">
            <input type="hidden" name="tanggal_mulai" id="tanggal_mulai" value="<?= $tanggal_mulai ?>">
            <input type="hidden" name="tanggal_sampai" id="tanggal_sampai" value="<?= $tanggal_sampai ?>">
            <input type="hidden" name="kd_outlet" id="kd_outlet" value="<?= $kd_outlet ?>">
            <input type="hidden" name="merah" id="merah" value="<?= $sizeRed ?>">
            <input type="hidden" name="judul" id="judul" value="<?= $judul ?>">
            <table id="example" class="display table table-bordered table-hover " style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Outlet</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($ada!=false)
                    {
                        $hijau=0;
                        $kuning=0;
                        $no=1;
                        foreach ($laporan as $key) {
                        if ($key['jumlah']>=6)
                        {
                            echo "<tr class='hijau' >";
                            $hijau = $hijau+1;
                        }
                        else if ($key['jumlah']>0 && $key['jumlah']<=5)
                        {
                            echo "<tr class='kuning' >";
                            $kuning = $kuning+1;
                        }
                        else
                        {
                            echo "<tr class='merah' >";
                        }
                        ?>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo  $key['nama'] ?></td>
                            <td><?php echo $key['jumlah'] ?></td>
                        </tr>
                        <?php } 
                    } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Outlet</th>
                        <th>Jumlah</th>
                    </tr>
                    </tfoot>
                    </table>
                    <input type="hidden" name="hijau" id="hijau" value="<?= $hijau ?>">
                    <input type="hidden" name="kuning" id="kuning" value="<?= $kuning ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div id="container"  ></div>
            </div>
        </div>

        <hr>
<div class="row">
    <div class="col-md-6">
        <div id="container2"  ></div>
    </div>
    <div class="col-md-6">
        <div class="table-responsive">
            <table id="example2" class="display table table-bordered table-hover " style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Outlet</th>
                        <th>Jumlah</th>
                        <th>Jumlah Order</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($ada!=false)
                    {
                        $hijau=0;
                        $kuning=0;
                        $no=1;
                        foreach ($pecentPerWil['data_detail'] as $key) {?>
                      
                        <tr>  
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $key['nama'] ?></td>
                            <td><?php echo $key['jumlah'] ?></td>
                            <td><?php echo $key['jumlah_order'] ?></td>
                            <td><?php echo $key['persentase'] ?></td>
                        </tr>
                        <?php } } ?> 
                        </tbody>
                        <tfoot>
                        <tr>
                             <th>No</th>
                            <th>Outlet</th>
                            <th>Jumlah</th>
                            <th>Jumlah Order</th>
                            <th>Persentase</th>
                        </tr>
                        </tfoot>    
                    </table> 
                </div>
            </div>
            
        </div> 