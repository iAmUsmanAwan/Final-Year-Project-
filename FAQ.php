<?php

      // set connection variables
      $server ="localhost";
      $username ="root";
      $password ="";

      // create a database connection
      $con = mysqli_connect($server, $username, $password);

      // check for connection success
      if(!$con){
         die("connection to the server failed due to " . mysqli_connect_error());
      }
      // echo"Success connecting to the db";

      $sql = "SELECT * FROM `cms` . `faq`";
      // echo $sql;

      $result = $con->query($sql);

      // close the connection
      $con->close();

?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Cloud-Inspector</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <div class="header">
            <div class="header_to d_none">
               <div class="container">
                  <div class="row">
                                          
                  </div>
               </div>
            </div>
            <div class="header_midil">
               <div class="container">
                  <div class="row d_flex">
                    
                     <div class="col-md-4 col-sm-4 ">
                        <a class="logo" href="#"><img src="images/logo.png" alt="#" /></a>
                     </div>
                     
                  </div>
               </div>
            </div>
            <div class="header_bo">
               <div class="container">
                  <div class="row">
                     <div class="col-md-9 col-sm-7">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse"
                              data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                              aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item">
                                    <a class="nav-link" href="index.html"> Home </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="about.html">Cloud services</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="service.php">Services We Offer</a>
                                 </li>
                                 
                                 <li class="nav-item active">
                                    <a class="nav-link" href="FAQ.php">FAQ</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="contact.php"> Contact us </a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
   
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
   
   <!-- testimonial -->
   <div id="client" class="testimonial">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2><strong class="yellow">FAQ</strong><br>Some Basics about the Cloud Services</h2>
               </div>
            </div>
         </div>
      </div>
      <div id="testimo" class="carousel slide testimonial_Carousel " data-ride="carousel">
         <!-- <ol class="carousel-indicators">
            <li data-target="#testimo" data-slide-to="0" class="active"></li>
            <li data-target="#testimo" data-slide-to="1"></li>
            <li data-target="#testimo" data-slide-to="2"></li>
         </ol> -->
         <div class="carousel-inner">
<?php

if ($result->num_rows > 0) {
   $count = 1;
   // output data of each row
   while($row = $result->fetch_assoc()) {
      
      ?>
      
      <div class="carousel-item active">
               <div class="container">
                  <div class="carousel-caption ">
                     <div class="row">
                        <div class="col-md-6 offset-md-3">
                           <div class="test_box">
                              <p>
                                 <b><?php echo $row["question"] ?></b>
                                 <br>
                                 <?php echo $row["answer"] ?>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

<?php
$count += 1;
   }
 } else {
   echo "0 results";
 }

?>
            


            <!-- <div class="carousel-item">
               <div class="container">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-6 offset-md-3">
                           <div class="test_box">
                              <p>Cloud computing is when computing services are provided by a company or place outside of where they are being used. It is like the way in which electricity is sent to users: they simply use the electricity that is sent to them and do not need to worry where the electricity is from or how it is made and brought to them. Every month, they pay only for what they used and nothing more.</p>
                              <i style="width:83px;height:79px;"><img src="images/cos2.jpg" alt="#" /></i> <span>Simple.Wikipedia</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-6 offset-md-3">
                           <div class="test_box">
                              <p>Based on the thinking from the concepts of SOA and virtualization,  everything in
                                 the cloud environments is considered as a service (usually abbreviated as XaaS), e.g.,
                                 Hardware-as-a-Service, Storage-as-a-Service, Database-as-a-Service, and Security-as-a-Service, Trust-as-a-Service. In general, all cloud services can be typically
                                 classified into three service models: Infrastructure-as-a-Service, Platform-as-a-Service 
                                 and Software-as-a-Service</p>
                              <i><img src="images/cos.jpg" alt="#" /></i> <span>Researcher</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div> -->
         </div>
         <a class="carousel-control-prev" href="#testimo" role="button" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
         </a>
         <a class="carousel-control-next" href="#testimo" role="button" data-slide="next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
         </a>
      </div>
   </div>
   <!-- end testimonial -->
   
   <!--  footer -->
   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <a class="logo2" href="#"><img src="images/loogo2.png" alt="#" /></a>
               </div>
               <div class="col-lg-5 col-md-6 col-sm-6">
                  <h3>Contact Us</h3>
                  <ul class="location_icon">
                     <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> United Kingdom
                        <br> Lahore
                     </li>
                     <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>abdullahrashid059@gmail.com<br>
                        muhammadusmanawan88@gmail.com</li>
                     <li><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a>+92
                        3095219445<br>+92 3354013870</li>
                  </ul>
                  <ul class="social_icon" >
                     <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                     <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                     <li> <a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                     <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                  </ul>
               </div>
               <div class="col-lg-2 col-md-6 col-sm-6">
                  <h3>Menus</h3>
                  <ul class="link_icon">
                     <li> <a href="index.html"> Home</a></li>
                     <li>
                        <a href="about.html">
                           </i>Cloud Services
                     </li>
                     <li> <a href="service.php"> </i>Services We Offer</a></li>
                    
                     <li class="active"> <a href="FAQ.php"></i>FAQ</a></li>
                     <li> <a href="contact.php"></i>Contact us</a></li>
                  </ul>
               </div>
          
               
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <p>© 2022 All Rights Reserved.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- end footer -->

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>
