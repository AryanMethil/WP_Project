


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>OnlyGifs</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Image-Uploader.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel-1.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider-1.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider.css">
    <link rel="stylesheet" href="assets/css/Custom-File-Upload.css">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="assets/css/Drag-and-Drop-Multiple-File-Form-Input-upload-Advanced.css">
    <link rel="stylesheet" href="assets/css/Drag-Drop-File-Input-Upload.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
</head>

<body style="background: #303a44;height: 1080px;color: rgb(255,255,255);width: 100vw;">

 <?php

    session_start();
    if(isset($_POST['refresh'])){
        $_SESSION["gif_number"]++;
    }
        $_SESSION["gif_number"]=7;
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

      $sql_liked = "CREATE TABLE IF NOT EXISTS LikedImages(
        uid VARCHAR(200) NOT NULL,
        imgid INT NOT NULL,
        PRIMARY KEY(uid,imgid)
      )";

      if( $conn->query($sql_liked) === false ){
        die("ERROR: Could not able to execute $sql. " . $conn->error);
      }

      function getImageURL($conn,$num){
        $sql2="SELECT * FROM images";
        $result_2=$conn->query($sql2);
        $rows=$result_2->num_rows;

        $num=$num%$rows;
        if($num==0)
          $num=$rows;
        $sql3 = "SELECT * FROM images where imgid='$num'";  
        $result = $conn->query($sql3);

         
        $arr=array();
        if ($result->num_rows> 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $imgsrc=$row["image"];
            $image_base64=explode(';base64,',$imgsrc)[1];
            $image_ur="data:image/gif;base64,$image_base64";

            $caption_text=$row["caption"];

            $likes=$row["likes"];

            array_push($arr, $image_ur, $caption_text, $likes);

          } 
        }
        return $arr;
      }

?>

    <script type="text/javascript">

    function refresh1(id_number){

      <?php $random=rand(7,100);
            $image_array= getImageURL($conn,$random);
            $image_source= $image_array[0];
            $image_caption= $image_array[1];
            $image_likes= $image_array[2]; 
        ?>;
      document.getElementById(String(id_number)).src = "<?php echo $image_source ?>";
      var caption_id=String(id_number)+"_caption";
      document.getElementById(caption_id).innerHTML= "<?php echo $image_caption ?>";
      var likes_id=String(id_number)+"_likes";
      document.getElementById(likes_id).innerHTML= "<?php echo $image_likes ?>"+" likes";
      
    }

    function refresh2(id_number){

      <?php $random=rand(7,100);
            $image_array= getImageURL($conn,$random);
            $image_source= $image_array[0];
            $image_caption= $image_array[1];
            $image_likes= $image_array[2]; 
        ?>;
      document.getElementById(String(id_number)).src = "<?php echo $image_source ?>";
      var caption_id=String(id_number)+"_caption";
      document.getElementById(caption_id).innerHTML= "<?php echo $image_caption ?>";
      var likes_id=String(id_number)+"_likes";
      document.getElementById(likes_id).innerHTML= "<?php echo $image_likes ?>"+" likes";

      <?php
      $session=$_SESSION["gif_number"];
      $session++;
      $_SESSION["gif_number"]=$session;
      ?>;
    }

    function refresh3(id_number){

      <?php $random=rand(7,100);
            $image_array= getImageURL($conn,$random);
            $image_source= $image_array[0];
            $image_caption= $image_array[1];
            $image_likes= $image_array[2]; 
        ?>;
      document.getElementById(String(id_number)).src = "<?php echo $image_source ?>";
      var caption_id=String(id_number)+"_caption";
      document.getElementById(caption_id).innerHTML= "<?php echo $image_caption ?>";
      var likes_id=String(id_number)+"_likes";
      document.getElementById(likes_id).innerHTML= "<?php echo $image_likes ?>"+" likes";
      <?php
      $session=$_SESSION["gif_number"];
      $session++;
      $_SESSION["gif_number"]=$session;
      ?>;
    }

    function refresh4(id_number){

      <?php $random=rand(7,100);
            $image_array= getImageURL($conn,$random);
            $image_source= $image_array[0];
            $image_caption= $image_array[1];
            $image_likes= $image_array[2]; 
        ?>;
      document.getElementById(String(id_number)).src = "<?php echo $image_source ?>";
      var caption_id=String(id_number)+"_caption";
      document.getElementById(caption_id).innerHTML= "<?php echo $image_caption ?>";
      var likes_id=String(id_number)+"_likes";
      document.getElementById(likes_id).innerHTML= "<?php echo $image_likes ?>"+" likes";
      <?php
      $session=$_SESSION["gif_number"];
      $session++;
      $_SESSION["gif_number"]=$session;
      ?>;
    }

    function refresh5(id_number){

      <?php $random=rand(7,100);
            $image_array= getImageURL($conn,$random);
            $image_source= $image_array[0];
            $image_caption= $image_array[1];
            $image_likes= $image_array[2]; 
        ?>;
      document.getElementById(String(id_number)).src = "<?php echo $image_source ?>";
      var caption_id=String(id_number)+"_caption";
      document.getElementById(caption_id).innerHTML= "<?php echo $image_caption ?>";
      var likes_id=String(id_number)+"_likes";
      <?php
      $session=$_SESSION["gif_number"];
      $session++;
      $_SESSION["gif_number"]=$session;
      ?>;
    }

    function refresh6(id_number){

      <?php $random=rand(7,100);
            $image_array= getImageURL($conn,$random);
            $image_source= $image_array[0];
            $image_caption= $image_array[1];
            $image_likes= $image_array[2]; 
        ?>;
      document.getElementById(String(id_number)).src = "<?php echo $image_source ?>";
      var caption_id=String(id_number)+"_caption";
      document.getElementById(caption_id).innerHTML= "<?php echo $image_caption ?>";
      var likes_id=String(id_number)+"_likes";
      document.getElementById(likes_id).innerHTML= "<?php echo $image_likes ?>"+" likes";
      <?php
      $session=$_SESSION["gif_number"];
      $session++;
      $_SESSION["gif_number"]=$session;
      ?>;
    }

    function updateLikes(id_number){
        var card_no=String(id_number)+"_IMGID";
        // alert(card_no);
         var a= document.getElementById(String(id_number)+"_IMGID").innerHTML;
         alert(a);
        '<?php $img_id = '.document.writeln(a);.' ?>';

        
        <?php
        $img_id=intval($img_id);
        echo 'alert('.intval($img_id).')';
        $sql4 = "SELECT * FROM likedimages where imgid='$img_id' AND uid='1'";  
        $result = $conn->query($sql4);
        if ($result->num_rows> 0) {

            $sql5="DELETE FROM likedimages where imgid='$img_id' AND uid='1'";
            $delete_result = $conn->query($sql5);
        }
        else{
            $sql6="INSERT INTO likedimages SET imgid='$img_id', uid='1'";
            $insert_result=$conn ->query($sql6);
        }
        ?>;

    }
    </script>

    <nav class="navbar navbar-light navbar-expand-md fixed-top" style="color: #ffffff;background: #322f2f;height: 50px;width: 100vw;">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color: #ffffff;font-size: 31px;margin-top: -15px;">OnlyGIFs</a>
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="Profile.php" style="color: #ffffff;margin-left: 935px;font-size: 19px;margin-top: -15px;">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="LikedImages.html" style="color: #ffffff;font-size: 19px;margin-top: -15px;">Liked Images</a></li>
                <li class="nav-item"><a class="nav-link" href="Start.html" style="color: #ffffff;font-size: 19px;margin-top: -15px;">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="card-group" style="margin-top: 50px;height: 270px;background: #595757;width: 100vw;border-width: 8px;border-color: #1f2021;">
        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" id="1" style="height: 320px;border-style: none;" src="<?php echo getImageURL($conn,1)[0]; ?>" >
            <div class="card-body" style="background: #475d62;width: 100vw;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;">Username<button style="margin-left: 125px;" onclick="updateLikes(1)"><i class="far fa-heart" data-bs-hover-animate="rubberBand" style="align:center;"></i></button><span style="margin-left: 20px" id="1_likes"><?php echo getImageURL($conn,1)[2]; ?> likes</span>

                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" name="refresh" onclick="refresh1(1)">

                    <i class="fa fa-refresh" data-bs-hover-animate="flash" style="align: center; "></i></button>

                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="1_caption"><?php echo getImageURL($conn,1)[1]; ?> </p>
                
            </div>
        </div>

        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" style="height: 320px;border-style: none;" id="2" src="<?php echo getImageURL($conn,2)[0]; ?>">
            <div class="card-body" style="background: #475d62;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;">Username
                    <i class="far fa-heart" data-bs-hover-animate="rubberBand" style="margin-left: 125px;"></i>
                    <span style="margin-left: 20px" id="2_likes"><?php echo getImageURL($conn,2)[2]; ?> likes</span>

                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" onclick="refresh2(2)">
                    <i class="fa fa-refresh" data-bs-hover-animate="flash" style="align: center; "></i></button>
                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="2_caption"><?php echo getImageURL($conn,2)[1]; ?></p>
            </div>
        </div>

        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" style="height: 320px;border-style: none;" id="3" src="<?php echo getImageURL($conn,3)[0]; ?>">
            <div class="card-body" style="background: #475d62;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;">Username<i class="far fa-heart" data-bs-hover-animate="rubberBand" style="margin-left: 125px;"></i><span style="margin-left: 20px" id="3_likes"><?php echo getImageURL($conn,3)[2]; ?> likes</span>
                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" onclick="refresh3(3)">
                    <i class="fa fa-refresh" data-bs-hover-animate="flash" style="align: center; "></i></button>
                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="3_caption"><?php echo getImageURL($conn,3)[1]; ?><br></p>
            </div>
        </div>
    </div>

    <div class="card-group" style="margin-top: 200px;height: 270px;background: #595757;width: 100vw;border-width: 8px;border-color: #1f2021;">
        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" style="height: 320px;border-style: none;" id="4" src="<?php echo getImageURL($conn,4)[0]; ?>">
            <div class="card-body" style="background: #475d62;width: 100vw;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;">Username<i class="far fa-heart" data-bs-hover-animate="rubberBand" style="margin-left: 125px;"></i><span style="margin-left: 20px" id="4_likes"><?php echo getImageURL($conn,4)[2]; ?> likes</span>
                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" onclick="refresh4(4)">
                    <i class="fa fa-refresh" data-bs-hover-animate="flash" style="align: center; "></i></button>
                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="4_caption"><?php echo getImageURL($conn,4)[1]; ?></p>
            </div>
        </div>

        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" style="height: 320px;border-style: none;" id="5" src="<?php echo getImageURL($conn,5)[0]; ?>">
            <div class="card-body" style="background: #475d62;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;">Username<i class="far fa-heart" data-bs-hover-animate="rubberBand" style="margin-left: 125px;"></i><span style="margin-left: 20px" id="5_likes"><?php echo getImageURL($conn,5)[2]; ?> likes</span>
                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" onclick="refresh5(5)">
                    <i class="fa fa-refresh" data-bs-hover-animate="flash" style="align: center; "></i></button>
                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="5_caption"><?php echo getImageURL($conn,5)[1]; ?><br></p>
                <p hidden id="5_IMGID">5</p>
            </div>
        </div>

        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" style="height: 320px;border-style: none;" id="6" src="<?php echo getImageURL($conn,6)[0]; ?>">
            <div class="card-body" style="background: #475d62;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;">Username<i class="far fa-heart" data-bs-hover-animate="rubberBand" style="margin-left: 125px;"></i><span style="margin-left: 20px" id="6_likes"><?php echo getImageURL($conn,6)[2]; ?> likes</span>
                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" onclick="refresh6(6)">
                    <i class="fa fa-refresh" data-bs-hover-animate="flash" style="align: center; "></i></button>
                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="6_caption"><?php echo getImageURL($conn,6)[1]; ?><br></p>
                <p hidden id="6_IMGID">6</p>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Bootstrap-Image-Uploader.js"></script>
    <script src="assets/js/Card-Carousel.js"></script>
    <script src="assets/js/Custom-File-Upload.js"></script>
    <script src="assets/js/Drag-and-Drop-Multiple-File-Form-Input-upload-Advanced.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/InfiniteScroll.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>