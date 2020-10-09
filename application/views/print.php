<html>
<head>
    <title>Cetak PDF</title>

	<style type="text/css">
nav {
    text-align: center;
    height: 100px;
    width: 100%;
    padding-left: 25%;
    padding-right: 25%;
    background-color: #7F7F7F;
}

#menuBar{
    padding: 5%;
  height:90%;
  width:90%;
}

#menuBar img{
	
	 transform: rotate(270deg);
  -ms-transform: rotate(270deg);
  -moz-transform: rotate(270deg);
  -webkit-transform: rotate(270deg);
  -o-transform: rotate(270deg); 
  
    width: 74px;
    height: 124px;
    
}


th, td {
  padding: 4px;
}

img{ 
	width: 230px;
    height: 74px; 
}
	</style>
</head>
<body>  

<?php
if (!empty($load)) {

    echo "<table border='1' class='table' id=''>";
    foreach ($load as $data) {

        $gambar = base_url() . "assets/barcode/" . $data->barcode . ".jpg";

        echo "<tr  class=''> ";
        echo "<td style='font-size:8px; padding: 4px;'>Tgl Input </td>";
        echo "<td style='font-size:12px; padding: 4px;'>" . $data->time . "</td>";
        echo "<td rowspan='6' > <img style='display:block;' src='$gambar' > </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='font-size:8px; padding: 4px;'>Barcode</td>";
        echo "<td style='font-size:12px; padding: 4px;'>" . $data->barcode . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='font-size:8px; padding: 4px;'>Nama</td>";
        echo "<td style='font-size:12px; padding: 4px;'>" . $data->nama . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='font-size:8px; padding: 4px;'>No. Batch</td>";
        echo "<td style='font-size:12px; padding: 4px;'>" . $data->no_batch . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='font-size:8px; padding: 4px;'>Tgl. exp</td>";
        echo "<td style='font-size:12px; padding: 4px;'>" . $data->DATE_PURCHASED . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='font-size:8px; padding: 4px;'>No. Faktur</td>";
        echo "<td style='font-size:12px; padding: 4px;'>" . $data->no_faktur . "</td>";
        echo "</tr>"; 
    }

    echo "</table>";
}
?>
</body>
</html>