
<html style="width: 1920px;height: 1080px;">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>OnlyGifs</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Image-Uploader.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
</head>

<body style="background: #303a44;height: 900px;color: rgb(255,255,255);width: 1920px;">
    <?php
    session_start();
    function OpenCon()
      {
       $dbhost = "localhost";
       $dbuser = "root";
       $dbpass = "1234";
       $db = "OnlyGif";
       $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
       
       return $conn;
     }

      function CloseCon($conn)
      {
       $conn -> close();
      }

      $conn = OpenCon();
      if($conn === false){
        die("ERROR: Could not connect. " . $conn->connect_error);
      } 
      ?>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand" href="#">OnlyGif</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav" style="margin-left: 1100px;">
                    <li class="nav-item"><a class="nav-link active" href="#"><i class="fa fa-home" style="font-size: 30px;"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-heart" style="font-size: 30px;"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-user" style="font-size: 30px;"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card-group" style="margin-top: 30px;height: 369px;">
        <?php
        $sql3 = "SELECT * FROM images where imgid=1";  
        $result = $conn->query($sql3);

         

        if ($result->num_rows> 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $imgsrc=$row["image"];
            $image_base64=explode(';base64,',$imgsrc)[1];
            $image_url="data:image/gif;base64,$image_base64";
          } 
        }
          ?>

        <div class="card" style="background: #000000;"><img class="card-img-top w-100 d-block" src="<?php echo $image_url; ?>" center / cover no-repeat;height: 517px;padding-right: 0px;padding-left: 0px;margin-left: 10px;margin-right: 10px;>
            <div class="card-body" style="background: #262525;">
                <h1 style="height: 49px;font-size: 27px;">Username</h1>
                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><button class="btn btn-primary" type="button" style="text-align: center;margin-left: 250px;">Button</button></div>
        </div>
        <div class="card" style="background: #000000;"><img class="card-img-top w-100 d-block" src="<?php echo $image_url; ?>" center / cover;padding-right: 0px;padding-left: 0px;margin-left: 10px;margin-right: 10px;>
            <div class="card-body" style="background: #262525;">
                <h1 style="height: 49px;font-size: 27px;">Username<br><br></h1>
                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><button class="btn btn-primary" type="button" style="text-align: center;margin-left: 250px;">Button</button></div>
        </div>
        <div class="card" style="background: #000000;"><img class="card-img-top w-100 d-block" src="<?php echo $image_url; ?>" center / cover;padding-right: 0px;padding-left: 0px;margin-left: 10px;margin-right: 10px;>
            <div class="card-body" style="background: #262525;">
                <h1 style="height: 49px;font-size: 27px;">Username<br><br></h1>
                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><button class="btn btn-primary" type="button" style="text-align: center;margin-left: 250px;">Button</button></div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Bootstrap-Image-Uploader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>