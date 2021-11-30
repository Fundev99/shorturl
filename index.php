<?php

function generateRandomString() 
{
  $characters = 'arisrysnanto123rembangkragansemarangjawatengahmpussfitrianigolekartikelcomsmkumarfatahrekayasaperangkatlunakREMBANGTIMURfundevfaizinlalaarisilovelalakrganakamstisbesoktescalonpradanan9812kentodkintilkemplu081225599141covid';
  $charactersLength = strlen($characters);
  $randomString = '';

  for ($i = 0; $i < 5; $i++) 
  {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  
  return  $randomString;
}

?>
<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'id15077259_myfiles');
  define('DB_PASSWORD', 'Lenny123#indo');
  define('DB_DATABASE', 'id15077259_files');
  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  
  $site = "https://inifilesaya.000webhostapp.com/"; 
  
  
  $msg = "";
  
if(isset($_GET['r']) || !empty($_GET['r']))
{
  $url_id = $_GET['r'];

  // Checking database if the the URL keyword is in it or not.
  // If query is true it will redirect to long URL.
  // Otherwise it will redirect to url.php ( our home page )
  
  $sql = "SELECT long_url FROM url_shortner WHERE url_id = '$url_id'"; 
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

  if(mysqli_num_rows($result) == 1)
  {
    $l_url = $row['long_url'];
    header('Location:' .$l_url);
  }
  else
  {
    header('Location: url.php');
  }
}


  
if(isset($_POST["submit"])) 
{
  // Checking database if the the Long URL already exist or not.
  // If result is true it will show message that this URL already exit.
  // Otherwise it will add to database and you will get a short URL.
  
  $long_url = $_POST["long_url"];
  $long_url = mysqli_real_escape_string($db, $long_url);
  
  $sql="SELECT long_url FROM url_shortner WHERE long_url = '$long_url'";
  $result=mysqli_query($db,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

  if(mysqli_num_rows($result) == 0)
  {
    // URL Validation
    if (!filter_var($_POST['long_url'], FILTER_VALIDATE_URL) === false) 
    {
      $url_id = generateRandomString();
      $short_url = $site . "" . $url_id;
      
      
      $query = mysqli_query($db, "INSERT url_shortner (url_id, long_url, short_url) VALUES ('$url_id','$long_url','$short_url')");
      
      if($query)
      {
        $msg = "<b>Your Short URL is</b>: <a href='".$short_url."' target='_blank'>$short_url</a>";
      }
      else
      {
        $msg = "There is some problem";
      }
    } 
    else 
    {
      $msg = $_POST['long_url'] ."is not a valid URL";
    }
  }
  else
  {
    $msg = "Sorry! This URL already exist. Terjemahan : Url sudah ada ";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Short Link | Mpuss</title>
  <meta content="pemendek url gratis dan tapa iklan " name="descriptison">
  <meta content="shorturl , pastelink , bitly" name="keywords">
<meta name="google-site-verification" content="LrjjxirpRFGEZRM07MwPho0T9Ivmz9cG-KHeeEIl1TQ" />

  <!-- Favicons -->
  <link href="https://d.top4top.io/p_17155a6kh0.png" rel="apple-touch-icon">
  
  <link href="https://d.top4top.io/p_17155a6kh0.png" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
<style>img[alt="www.000webhost.com"]{display:none;}</style>

 </head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">mpuss</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
Tahap Pengembangan
        </ul>
      </nav><!-- .nav-menu -->

      <a href="#about" class="get-started-btn scrollto">Login</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Short Url Free</h1>
          <h2>Pendekin Link Mu yang panjang menjadi pendek hanya disini tanpa iklan (mpuss.my.id/codeacak)</h2>
          <div class="d-flex">
            <form method="post">
            <input type="url" name="long_url" placeholder="Masukkan Link Wweb" class="form-control" autocomplete="off" required>
            <input type="submit" name="submit" value="Short it!" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">
            </form>
            <h4 style="font-family:monospace;" ><?php echo strip_tags($msg);?></h2><br/>
            
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
    
  </section><!-- End Hero -->

   </div>
   </div>
   </div>
<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://mpuss.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript"></a></noscript>
<!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">


        

     

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span> Mpuustols</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
    <a href=""></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<script id="dsq-count-scr" src="//mpuss.disqus.com/count.js" async></script>
</body>

</html>