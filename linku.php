
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

 <link rel="icon" type="image/png" href=" https://h.top4top.io/p_17151twq30.png">
  <title>ShortLink No Ads</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
<link rel="shortcut icon" href="https://h.top4top.io/p_17118j63o0.png"/>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> 
</head>
<body>
     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           RECENTS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><center>Original URL</center></th>
                                        <th><center>Short URL</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
<?php  
include "config.php";  // Sesuaikan Dengan Pemanggil Koneksi Anda
$batas = 5;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
if ( empty( $pg ) ) {
$posisi = 0;
$pg = 1;
} else {
$posisi = ( $pg - 1 ) * $batas;
}
$recent = mysqli_query($kon, "SELECT * FROM url_shortner ORDER BY id DESC limit $posisi, $batas");
while ($erlangga = mysqli_fetch_array($recent)) { 
?> 


                                <tr>
                                        <td><p align="left"><?=$erlangga['long_url'];?></p></td>
                                        <td><p align="left"><a href="<?=$erlangga['short_url'];?>"><?=$erlangga['short_url'];?></a></p></td></tr>
<?php 
}
?>
                                    
                                </tbody>
                            </table>
                           
  <nav aria-label="Page navigation">
  <ul class="pagination">
<?php
//hitung jumlah data
$jml_data = "SELECT * FROM url_shortner";
$result = $kon->query($jml_data) or die($mysqli->error.__LINE__);
$jml_data = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM url_shortner"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
 
//Navigasi ke sebelumnya
if ( $pg > 1 ) {
$link = $pg-1;
$prev = "<a href='?pg=$link'>&#9754;  Previous</a>";
} else {
$prev = "&#9754; Previous    ";
}
 
//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){
 
if ( $i == $pg ) {
$nmr .= $i . " ";
} else {
$nmr .= "<a href='?pg=$i'>$i</a> ";
}
}

//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
$link = $pg + 1;
$next = "<a href='?pg=$link'>Next &#9755;</a>";
} else {
$next = "    Next &#9755;";
}
 
//Tampilkan navigasi
echo $prev . $nmr . $next;
?>
                            
    </ul>
</nav>
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>